<?php
// contact_submit.php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/mail.php';

session_start();

// ---------- Helpers ----------
function json_fail($msg, $code = 400) {
  http_response_code($code);
  echo json_encode(['ok' => false, 'message' => $msg]);
  exit;
}

function clean($s) {
  return trim((string)$s);
}

// ---------- Rate limit (very simple) ----------
$now = time();
$_SESSION['ct_last_submit'] = $_SESSION['ct_last_submit'] ?? 0;
if (($now - $_SESSION['ct_last_submit']) < 12) {
  json_fail('Please wait a few seconds and try again.', 429);
}

// ---------- CSRF ----------
$csrf = $_POST['csrf'] ?? '';
if (!$csrf || empty($_SESSION['csrf']) || !hash_equals($_SESSION['csrf'], $csrf)) {
  json_fail('Security check failed. Please refresh and try again.', 403);
}

// ---------- Honeypot ----------
$website = $_POST['website'] ?? '';
if (!empty($website)) {
  // bot
  json_fail('Thanks!', 200);
}

// ---------- Inputs ----------
$name = clean($_POST['name'] ?? '');
$email = clean($_POST['email'] ?? '');
$org  = clean($_POST['organization'] ?? ($_POST['org'] ?? ''));
$need = clean($_POST['need'] ?? ($_POST['topic'] ?? ''));

$message = clean($_POST['message'] ?? '');

if ($name === '' || $email === '' || $need === '' || $message === '') {
  json_fail('Please fill all required fields.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  json_fail('Please enter a valid email.');
}
if (mb_strlen($message) < 10) {
  json_fail('Message is too short - add a little detail.');
}
if (mb_strlen($message) > 6000) {
  json_fail('Message is too long.');
}

// ---------- Save to DB ----------
$ip = $_SERVER['REMOTE_ADDR'] ?? null;
$ua = substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255);

try {
  $stmt = db()->prepare("
    INSERT INTO contact_messages
      (full_name, email, organization, need, message, ip_address, user_agent)
    VALUES
      (:full_name, :email, :organization, :need, :message, :ip, :ua)
  ");
  $stmt->execute([
    ':full_name' => $name,
    ':email' => $email,
    ':organization' => ($org !== '' ? $org : null),
    ':need' => $need,
    ':message' => $message,
    ':ip' => $ip,
    ':ua' => $ua
  ]);
} catch (Throwable $e) {
  json_fail('Database error. Please try again.', 500);
}

// ---------- Email sending ----------
$subject = MAIL_SUBJECT_PREFIX . " " . $need;
$bodyText =
  "New contact message from The GrantShip site\n\n" .
  "Name: {$name}\n" .
  "Email: {$email}\n" .
  "Organization: " . ($org ?: '-') . "\n" .
  "Need: {$need}\n" .
  "IP: " . ($ip ?: '-') . "\n\n" .
  "Message:\n{$message}\n";

$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/plain; charset=utf-8';
$headers[] = 'From: ' . MAIL_FROM_NAME . ' <' . MAIL_FROM . '>';
$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
$headers[] = 'To: ' . MAIL_TO;

$emailSent = false;

/**
 * OPTION A: SMTP (recommended on shared hosting)
 * Uses settings from config/mail.php. If SMTP fails, we fall back to mail().
 */
function smtp_send_mail(string $to, string $subject, string $body, array $headers): bool {
  $host = SMTP_HOST;
  $port = (int)SMTP_PORT;
  $secure = strtolower((string)SMTP_SECURE);
  $user = (string)SMTP_USER;
  $pass = (string)SMTP_PASS;
  $from = MAIL_FROM;

  $remote = $secure === 'ssl' ? "ssl://{$host}" : $host;
  $fp = @stream_socket_client("{$remote}:{$port}", $errno, $errstr, 12);
  if (!$fp) return false;

  $read = function() use ($fp): int {
    $data = '';
    while (($line = fgets($fp, 515)) !== false) {
      $data .= $line;
      if (preg_match('/^\\d{3} /', $line)) break;
    }
    return (int)substr($data, 0, 3);
  };
  $write = function(string $cmd) use ($fp): void {
    fwrite($fp, $cmd . "\r\n");
  };
  $ok = function(int $code, array $allowed): bool {
    return in_array($code, $allowed, true);
  };

  if (!$ok($read(), [220])) { fclose($fp); return false; }
  $write('EHLO ' . ($_SERVER['SERVER_NAME'] ?? 'localhost'));
  if (!$ok($read(), [250])) { fclose($fp); return false; }

  if ($secure === 'tls') {
    $write('STARTTLS');
    if (!$ok($read(), [220])) { fclose($fp); return false; }
    if (!stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
      fclose($fp);
      return false;
    }
    $write('EHLO ' . ($_SERVER['SERVER_NAME'] ?? 'localhost'));
    if (!$ok($read(), [250])) { fclose($fp); return false; }
  }

  if ($user !== '' && $pass !== '') {
    $write('AUTH LOGIN');
    if (!$ok($read(), [334])) { fclose($fp); return false; }
    $write(base64_encode($user));
    if (!$ok($read(), [334])) { fclose($fp); return false; }
    $write(base64_encode($pass));
    if (!$ok($read(), [235])) { fclose($fp); return false; }
  }

  $write("MAIL FROM:<{$from}>");
  if (!$ok($read(), [250])) { fclose($fp); return false; }
  $write("RCPT TO:<{$to}>");
  if (!$ok($read(), [250, 251])) { fclose($fp); return false; }
  $write('DATA');
  if (!$ok($read(), [354])) { fclose($fp); return false; }

  $dataHeaders = implode("\r\n", $headers);
  $payload = $dataHeaders . "\r\n" .
             "Subject: {$subject}\r\n" .
             "Date: " . date('r') . "\r\n\r\n" .
             preg_replace('/^\\./m', '..', $body) . "\r\n.";
  $write($payload);
  if (!$ok($read(), [250])) { fclose($fp); return false; }
  $write('QUIT');
  fclose($fp);
  return true;
}

if (USE_SMTP) {
  $emailSent = smtp_send_mail(MAIL_TO, $subject, $bodyText, $headers);
}

/**
 * OPTION B: PHP mail() fallback
 * Works only if the server is configured to send mail.
 */
if (!$emailSent) {
  $emailSent = @mail(MAIL_TO, $subject, $bodyText, implode("\r\n", $headers));
}

// Update session rate-limit timestamp only when handled
$_SESSION['ct_last_submit'] = $now;

echo json_encode([
  'ok' => true,
  'message' => $emailSent
    ? 'Message sent successfully. We will reply soon.'
    : 'Saved successfully. Email sending is not configured on this server yet.'
]);
