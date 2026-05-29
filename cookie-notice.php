<?php
// cookie-notice.php
require_once __DIR__ . '/config/config.php';
$pageTitle = "Cookie Notice - " . SITE_NAME;
$pageDesc = "Cookie Notice for The Grant Ship website.";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <base href="<?php echo htmlspecialchars(BASE_URL_PATH, ENT_QUOTES); ?>">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDesc, ENT_QUOTES); ?>" />
  <?php include __DIR__ . '/partials/seo.php'; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">
<!-- Favicons -->
<?php include __DIR__ . '/partials/favicons.php'; ?>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/base.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/navbar.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/footer.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/legal.css?v=2'), ENT_QUOTES); ?>">
</head>
<body>

<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-legal">
  <div class="gs-legal-bg" aria-hidden="true">
    <div class="gs-legal-bg__grid"></div>
    <div class="gs-legal-bg__glow"></div>
  </div>

  <div class="gs-container">
    <header class="gs-legal-hero">
      <div class="gs-legal-pill"><span class="gs-legal-pill__dot" aria-hidden="true"></span> Legal</div>
      <h1 class="gs-legal-title">Cookie Notice</h1>
      <p class="gs-legal-sub">
        This Cookie Notice explains what cookies are and how <?php echo SITE_NAME; ?> may use them on this website.
      </p>
      <div class="gs-legal-meta">
        <div class="gs-legal-meta__item">
          <span class="gs-legal-meta__label">Effective</span>
          <span class="gs-legal-meta__value">January 26, 2026</span>
        </div>
        <div class="gs-legal-meta__item">
          <span class="gs-legal-meta__label">Last updated</span>
          <span class="gs-legal-meta__value">January 26, 2026</span>
        </div>
        <div class="gs-legal-meta__item">
          <span class="gs-legal-meta__label">Contact</span>
          <a class="gs-legal-link gs-legal-meta__value" href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
        </div>
      </div>
    </header>

    <article class="gs-legal-card">
      <div class="gs-legal-card__inner">

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">1) What are cookies?</h2>
          <p class="gs-legal-p">
            Cookies are small text files stored on your device that help websites function and improve user experience.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">2) Cookies we may use</h2>
          <ul class="gs-legal-ul">
            <li class="gs-legal-li"><span class="gs-legal-strong">Essential cookies:</span> required for core website features</li>
            <li class="gs-legal-li"><span class="gs-legal-strong">Analytics cookies:</span> used to understand website usage (if enabled)</li>
          </ul>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">3) Managing cookies</h2>
          <p class="gs-legal-p">
            You can control cookies through your browser settings. Disabling cookies may impact site functionality.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">4) Contact</h2>
          <p class="gs-legal-p">
            Questions about cookies? Email us at
            <a class="gs-legal-link" href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">Optional: Cookie consent</h2>
          <p class="gs-legal-p">
            If you enable non-essential analytics (e.g., Google Analytics), we recommend adding a cookie banner so visitors can accept or reject non-essential cookies.
          </p>
        </section>

      </div>
    </article>
  </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=10'), ENT_QUOTES); ?>"></script>
</body>
</html>
