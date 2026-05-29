<?php
// newsletter_submit.php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';

function redirect_to(string $path): void {
  header('Location: ' . gs_url($path));
  exit;
}

function fail(string $msg, int $code = 400): void {
  // Store one-time message in session and redirect back to home (or referrer)
  http_response_code($code);
  $_SESSION['nl_error'] = $msg;
  $back = $_SERVER['HTTP_REFERER'] ?? gs_url('index.php');
  // Avoid open redirects
  if (strpos($back, BASE_URL_PATH) === false) $back = gs_url('index.php');
  header('Location: ' . $back);
  exit;
}

// Only POST
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
  redirect_to('index.php');
}

// Rate limit (simple)
$now = time();
$_SESSION['nl_last_submit'] = $_SESSION['nl_last_submit'] ?? 0;
if (($now - (int)$_SESSION['nl_last_submit']) < 10) {
  fail('Please wait a few seconds and try again.', 429);
}

// CSRF
$csrf = (string)($_POST['csrf'] ?? '');
if (!$csrf || empty($_SESSION['csrf']) || !hash_equals((string)$_SESSION['csrf'], $csrf)) {
  fail('Security check failed. Please refresh and try again.', 403);
}

// Honeypot
$hp = trim((string)($_POST['website'] ?? ''));
if ($hp !== '') {
  // Likely bot - act like success to reduce retries
  $_SESSION['nl_last_submit'] = $now;
  redirect_to('newsletter-success.php');
}

// Validate email
$email = trim((string)($_POST['email'] ?? ''));
$email = strtolower($email);

if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 190) {
  fail('Please enter a valid email address.');
}

try {
  $pdo = db();

  // Insert or re-activate
  $stmt = $pdo->prepare("INSERT INTO newsletter_subscribers (email, status, ip_address, user_agent)
                         VALUES (:email, 'active', :ip, :ua)
                         ON DUPLICATE KEY UPDATE status='active', updated_at=CURRENT_TIMESTAMP");
  $stmt->execute([
    ':email' => $email,
    ':ip' => substr((string)($_SERVER['REMOTE_ADDR'] ?? ''), 0, 45),
    ':ua' => substr((string)($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 255),
  ]);

  $_SESSION['nl_last_submit'] = $now;
  redirect_to('newsletter-success.php');

} catch (Throwable $e) {
  // Don't leak internal errors
  fail('We could not subscribe you right now. Please try again later.', 500);
}
