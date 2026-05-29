<?php
// faq.php
require_once __DIR__ . '/config/config.php';
$pageTitle = "FAQ - " . SITE_NAME;
$pageDesc = "Frequently Asked Questions about services, process, timelines, and working with The Grant Ship.";
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
  
<?php include __DIR__ . '/partials/favicons.php'; ?>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/base.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/navbar.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/footer.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/legal.css?v=2'), ENT_QUOTES); ?>">

  <!-- FAQ page small additions (kept minimal + consistent) -->
  <style>
    /* Keep it scoped so it doesn't affect other pages */
    .gs-faq-acc{
      margin-top: 14px;
      border-top: 1px solid rgba(255,255,255,.10);
      padding-top: 16px;
      display: grid;
      gap: 10px;
    }
    .gs-faq-item{
      border-radius: 18px;
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.10);
      box-shadow: 0 12px 30px rgba(0,0,0,.22);
      overflow: hidden;
    }
    .gs-faq-q{
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
      padding: 16px;
      cursor: pointer;
      background: transparent;
      border: 0;
      color: rgba(244,246,250,.92);
      font-family: "Space Grotesk", system-ui;
      font-weight: 900;
      letter-spacing: -0.02em;
      font-size: 16px;
      text-align: left;
    }
    .gs-faq-q:focus-visible{
      outline: 2px solid rgba(79,125,255,.55);
      outline-offset: 3px;
      border-radius: 18px;
    }
    .gs-faq-ic{
      width: 32px;
      height: 32px;
      border-radius: 12px;
      display: grid;
      place-items: center;
      background: rgba(255,255,255,.05);
      border: 1px solid rgba(255,255,255,.10);
      color: rgba(244,246,250,.88);
      flex: 0 0 auto;
      transition: transform .2s ease, background .2s ease, border-color .2s ease;
    }
    .gs-faq-a{
      padding: 0 16px 16px;
      display: none;
    }
    .gs-faq-a .gs-legal-p{ margin: 0; }
    .gs-faq-item.is-open .gs-faq-a{ display: block; }
    .gs-faq-item.is-open .gs-faq-ic{
      background: rgba(209,138,61,.14);
      border-color: rgba(209,138,61,.25);
      transform: rotate(90deg);
    }
  </style>

  <!-- FAQ Schema (helps SEO) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What services do you provide?",
        "acceptedAnswer": { "@type": "Answer", "text": "We support grant research, strategy, proposal writing, budgeting and justifications, and compliance-ready submission packaging." }
      },
      {
        "@type": "Question",
        "name": "Do you guarantee funding?",
        "acceptedAnswer": { "@type": "Answer", "text": "No. Funding decisions are made by funders. We improve readiness and submission quality, but outcomes depend on funder priorities and competition." }
      },
      {
        "@type": "Question",
        "name": "What do you need from us to start?",
        "acceptedAnswer": { "@type": "Answer", "text": "A short project summary, your target funder or opportunity (if known), deadline, budget range, and any existing organizational documents." }
      },
      {
        "@type": "Question",
        "name": "How long does a proposal take?",
        "acceptedAnswer": { "@type": "Answer", "text": "Timelines depend on complexity and funder requirements. Many projects run in weekly milestones with defined drafts and review cycles." }
      },
      {
        "@type": "Question",
        "name": "Do you work internationally?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes. We can work remotely across regions as long as we have clear deadlines and required documents." }
      }
    ]
  }
  </script>
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
      <div class="gs-legal-pill"><span class="gs-legal-pill__dot" aria-hidden="true"></span> Support</div>
      <h1 class="gs-legal-title">Frequently Asked Questions</h1>
      <p class="gs-legal-sub">
        Clear answers about how we work, what we deliver, and what you'll need to get started.
      </p>
      <div class="gs-legal-meta">
        <div class="gs-legal-meta__item">
          <span class="gs-legal-meta__label">Updated</span>
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
          <h2 class="gs-legal-h2">Quick answers</h2>
          <p class="gs-legal-p">
            If you still have questions, email us at
            <a class="gs-legal-link" href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
            or use the <a class="gs-legal-link" href="<?php echo gs_url('contact.php'); ?>">contact form</a>.
          </p>

          <div class="gs-faq-acc" id="faq">
            <!-- 1 -->
            <div class="gs-faq-item">
              <button class="gs-faq-q" type="button" aria-expanded="false">
                What services do you provide?
                <span class="gs-faq-ic" aria-hidden="true">+</span>
              </button>
              <div class="gs-faq-a" role="region">
                <p class="gs-legal-p">
                  We support grant research, strategy, proposal writing, budgets and justifications, and compliance-ready submission packaging.
                </p>
              </div>
            </div>

            <!-- 2 -->
            <div class="gs-faq-item">
              <button class="gs-faq-q" type="button" aria-expanded="false">
                Do you guarantee funding?
                <span class="gs-faq-ic" aria-hidden="true">+</span>
              </button>
              <div class="gs-faq-a" role="region">
                <p class="gs-legal-p">
                  No. Funding decisions are made by funders. We improve readiness, alignment, and submission quality - outcomes depend on funder priorities and competition.
                </p>
              </div>
            </div>

            <!-- 3 -->
            <div class="gs-faq-item">
              <button class="gs-faq-q" type="button" aria-expanded="false">
                What do you need from us to start?
                <span class="gs-faq-ic" aria-hidden="true">+</span>
              </button>
              <div class="gs-faq-a" role="region">
                <p class="gs-legal-p">
                  A short project summary, your target funder/opportunity (if known), deadline, budget range, and any existing organizational documents (mission, programs, past results).
                </p>
              </div>
            </div>

            <!-- 4 -->
            <div class="gs-faq-item">
              <button class="gs-faq-q" type="button" aria-expanded="false">
                How long does a proposal take?
                <span class="gs-faq-ic" aria-hidden="true">+</span>
              </button>
              <div class="gs-faq-a" role="region">
                <p class="gs-legal-p">
                  It depends on complexity and requirements. Most projects are delivered in weekly milestones with defined drafts and review cycles, aligned to the funder deadline.
                </p>
              </div>
            </div>

            <!-- 5 -->
            <div class="gs-faq-item">
              <button class="gs-faq-q" type="button" aria-expanded="false">
                Do you work internationally?
                <span class="gs-faq-ic" aria-hidden="true">+</span>
              </button>
              <div class="gs-faq-a" role="region">
                <p class="gs-legal-p">
                  Yes - we can work remotely across regions. The key is clear timelines, required documents, and a shared review process.
                </p>
              </div>
            </div>

          </div>
        </section>

        <section class="gs-legal-section">
          <h2 class="gs-legal-h2">Still need help?</h2>
          <p class="gs-legal-p">
            Contact us via <a class="gs-legal-link" href="<?php echo gs_url('contact.php'); ?>">Contact</a> or email:
            <a class="gs-legal-link" href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
          </p>
        </section>

      </div>
    </article>
  </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=10'), ENT_QUOTES); ?>"></script>

<script>
(() => {
  const items = Array.from(document.querySelectorAll('.gs-faq-item'));
  items.forEach(item => {
    const btn = item.querySelector('.gs-faq-q');
    const icon = item.querySelector('.gs-faq-ic');
    if (!btn) return;

    btn.addEventListener('click', () => {
      const open = item.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
      if (icon) icon.textContent = open ? '-' : '+';
    });
  });
})();
</script>

</body>
</html>
