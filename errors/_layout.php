<?php
// /errors/_layout.php
// Variables expected:
// $code (int), $title (string), $desc (string), $pill (string), $image (string)

declare(strict_types=1);

require_once __DIR__ . '/../config/config.php';
http_response_code((int)$code);

if (!isset($code))  $code  = 404;
if (!isset($title)) $title = "Something went wrong";
if (!isset($desc))  $desc  = "Please try again.";
if (!isset($pill))  $pill  = "System Notice";
if (!isset($image)) $image = "assets/img/errors/error-404.svg";

/**
 * Safe URL helper
 */
if (!function_exists('gs_err_url')) {
  function gs_err_url(string $path): string {
    $path = ltrim($path, '/');
    return function_exists('gs_url') ? gs_url($path) : $path;
  }
}

/**
 * Normalize image to be subfolder-safe
 * Accepts:
 * - assets/img/errors/xxx.svg
 * - /assets/img/errors/xxx.svg
 * - already absolute (http...)
 */
$imageRaw = (string)$image;
if (preg_match('~^https?://~i', $imageRaw)) {
  $imageUrl = $imageRaw;
} else {
  $imageUrl = gs_err_url(ltrim($imageRaw, '/'));
}

// Reference / timestamp (helps "company-grade" feel)
$ref = substr(hash('sha256', (string)($code . '|' . ($_SERVER['REQUEST_URI'] ?? '') . '|' . microtime(true))), 0, 10);
$whenIso = (new DateTimeImmutable('now'))->format(DateTimeInterface::ATOM);
$whenHuman = (new DateTimeImmutable('now'))->format('M j, Y - H:i');

$statusLine = "An unexpected error occurred.";
switch ((int)$code) {
  case 400:
    $statusLine = "Request could not be understood by the server.";
    break;
  case 401:
    $statusLine = "Authentication is required to access this page.";
    break;
  case 403:
    $statusLine = "You are not allowed to access this resource.";
    break;
  case 404:
    $statusLine = "We couldn't find the page you requested.";
    break;
  case 429:
    $statusLine = "Request limit reached. Please slow down briefly.";
    break;
  case 500:
    $statusLine = "An internal error occurred on our server.";
    break;
  case 503:
    $statusLine = "Service is temporarily unavailable (maintenance/traffic).";
    break;
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <base href="<?php echo htmlspecialchars(BASE_URL_PATH, ENT_QUOTES); ?>">
  <title><?php echo htmlspecialchars(SITE_NAME); ?> • <?php echo (int)$code; ?></title>
  <meta name="robots" content="noindex, nofollow" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">
  
<?php include __DIR__ . '/../partials/favicons.php'; ?>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_err_url('assets/css/base.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_err_url('assets/css/components/navbar.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_err_url('assets/css/components/footer.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_err_url('assets/css/pages/error.css?v=4'), ENT_QUOTES); ?>">
</head>
<body>

<?php include __DIR__ . '/../partials/navbar.php'; ?>

<main class="gs-er">
  <div class="gs-container">
    <section class="gs-er-shell gs-reveal" aria-labelledby="gs-er-title">

      <div class="gs-er-top">
        <div class="gs-er-pill">
          <span class="gs-er-pill__dot" aria-hidden="true"></span>
          <?php echo htmlspecialchars($pill); ?>
        </div>

        <div class="gs-er-code" aria-label="Error code">
          <strong><?php echo (int)$code; ?></strong>
          <span><?php echo htmlspecialchars($title); ?></span>
        </div>
      </div>

      <div class="gs-er-grid">
        <!-- Left -->
        <div class="gs-er-left">
          <h1 class="gs-er-title" id="gs-er-title">
            <?php echo htmlspecialchars($title); ?>
            <span aria-hidden="true">-</span> let's get you back on track.
          </h1>

          <p class="gs-er-sub">
            <?php echo htmlspecialchars($desc); ?>
          </p>

          <p class="gs-er-status">
            <?php echo htmlspecialchars($statusLine); ?>
          </p>

          <div class="gs-er-actions" role="group" aria-label="Recovery actions">
            <a class="gs-er-btn gs-er-btn--primary" href="<?php echo htmlspecialchars(gs_err_url('index.php'), ENT_QUOTES); ?>">Go to Home -></a>
            <a class="gs-er-btn" href="<?php echo htmlspecialchars(gs_err_url('contact.php'), ENT_QUOTES); ?>">Contact Support -></a>
            <button class="gs-er-btn" type="button" data-gs-back hidden>Go Back</button>
          </div>

          <div class="gs-er-mini">
            <div class="gs-er-mini__row">
              <span class="gs-er-mini__k">Reference</span>
              <span class="gs-er-mini__v">
                <code class="gs-er-ref" id="gsErRef"><?php echo htmlspecialchars($ref); ?></code>
                <button class="gs-er-copy" type="button" data-gs-copy-ref aria-label="Copy reference ID">Copy</button>
              </span>
            </div>
            <div class="gs-er-mini__row">
              <span class="gs-er-mini__k">Time</span>
              <span class="gs-er-mini__v">
                <time datetime="<?php echo htmlspecialchars($whenIso, ENT_QUOTES); ?>"><?php echo htmlspecialchars($whenHuman); ?></time>
              </span>
            </div>
            <div class="gs-er-mini__row">
              <span class="gs-er-mini__k">Support</span>
              <span class="gs-er-mini__v">
                <a class="gs-er-mini__link" href="mailto:<?php echo htmlspecialchars(SITE_EMAIL, ENT_QUOTES); ?>">
                  <?php echo htmlspecialchars(SITE_EMAIL); ?>
                </a>
              </span>
            </div>
          </div>

          <div class="gs-er-help">
            <p class="gs-er-help__title">Try this</p>
            <ul class="gs-er-help__list">
              <li>Double-check the URL for typos.</li>
              <li>Refresh the page once.</li>
              <li>If it keeps happening, share the reference ID with support.</li>
            </ul>
          </div>
        </div>

        <!-- Right -->
        <aside class="gs-er-side" aria-label="Illustration">
          <div class="gs-er-illus" aria-hidden="true">
            <img src="<?php echo htmlspecialchars($imageUrl, ENT_QUOTES); ?>" alt="">
          </div>
        </aside>
      </div>

    </section>
  </div>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_err_url('assets/js/components/navbar.js?v=10'), ENT_QUOTES); ?>" defer></script>
<script src="<?php echo htmlspecialchars(gs_err_url('assets/js/pages/error.js?v=4'), ENT_QUOTES); ?>" defer></script>
</body>
</html>
