<?php
// terms.php
require_once __DIR__ . '/config/config.php';
$pageTitle = "Terms - " . SITE_NAME;
$pageDesc = "Terms of Use for The Grant Ship website.";
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
      <h1 class="gs-legal-title">Terms of Use</h1>
      <p class="gs-legal-sub">
        By accessing this website, you agree to these Terms of Use. If you do not agree, please do not use the website.
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
          <h2 class="gs-legal-h2">1) Use of the website</h2>
          <p class="gs-legal-p">
            You agree to use the website for lawful purposes only and not to misuse, disrupt, or attempt unauthorized access.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">2) Intellectual property</h2>
          <p class="gs-legal-p">
            Content on this website (text, graphics, branding) is owned by <?php echo SITE_NAME; ?> or its licensors and may not be
            reproduced without permission.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">3) No legal advice</h2>
          <p class="gs-legal-p">
            Information on this website is for general informational purposes and does not constitute legal, financial, or professional advice.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">4) Limitation of liability</h2>
          <p class="gs-legal-p">
            <?php echo SITE_NAME; ?> is not liable for any damages arising from the use of this website or reliance on its content.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">5) External links</h2>
          <p class="gs-legal-p">
            This website may link to third-party websites. We are not responsible for the content or privacy practices of those sites.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">6) Updates to terms</h2>
          <p class="gs-legal-p">
            We may update these Terms from time to time. Continued use of the website indicates acceptance of the updated terms.
          </p>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">7) Contact</h2>
          <p class="gs-legal-p">
            Questions about these Terms? Email us at
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
