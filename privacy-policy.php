<?php
// privacy-policy.php
require_once __DIR__ . '/config/config.php';
$pageTitle = "Privacy Policy - " . SITE_NAME;
$pageDesc = "Privacy Policy for The Grant Ship website.";
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
      <h1 class="gs-legal-title">Privacy Policy</h1>
      <p class="gs-legal-sub">
        This Privacy Policy explains how <?php echo SITE_NAME; ?> collects, uses, and protects information when you use our website.
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
          <h2 class="gs-legal-h2">1) Information we collect</h2>
          <p class="gs-legal-p">We may collect information you provide directly, such as when you contact us via forms or email.</p>
          <ul class="gs-legal-ul">
            <li class="gs-legal-li"><span class="gs-legal-strong">Contact details:</span> name, email address, phone number (if provided)</li>
            <li class="gs-legal-li"><span class="gs-legal-strong">Message content:</span> information you include in your inquiry</li>
          </ul>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">2) How we use information</h2>
          <ul class="gs-legal-ul">
            <li class="gs-legal-li">To respond to inquiries and provide requested services</li>
            <li class="gs-legal-li">To improve site performance and content</li>
            <li class="gs-legal-li">To support operations and service delivery</li>
          </ul>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">3) Cookies & analytics</h2>
          <p class="gs-legal-p">
            We may use cookies for basic website functionality. If analytics tools are enabled, they may collect
            anonymized usage data to help us improve the website.
          </p>
          <div class="gs-legal-note">
            <p class="gs-legal-p">
              For more detail, see our <a class="gs-legal-link" href="<?php echo gs_url('cookie-notice.php'); ?>">Cookie Notice</a>.
            </p>
          </div>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">4) Data sharing</h2>
          <p class="gs-legal-p">
            We do not sell personal information. We may share information only when required to provide services,
            comply with legal obligations, or protect the security of our systems.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">5) Data security</h2>
          <p class="gs-legal-p">
            We take reasonable measures to protect information. However, no method of transmission or storage is 100% secure.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">6) Contact</h2>
          <p class="gs-legal-p">
            Questions about this Privacy Policy? Email us at
            <a class="gs-legal-link" href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>.
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
