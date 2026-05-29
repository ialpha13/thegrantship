<?php
// blog.php
require_once __DIR__ . '/config/config.php';
$pageTitle = SITE_NAME . ' - Blog';
$pageDesc = 'Insights from The Grant Ship on grants, funding strategy, proposal writing, and readiness.';
$pageImage = 'assets/img/og-default.png';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <base href="<?php echo htmlspecialchars(BASE_URL_PATH, ENT_QUOTES); ?>">
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDesc, ENT_QUOTES); ?>" />
  <?php include __DIR__ . '/partials/seo.php'; ?>

  <!-- Fonts (consistent with About/Contact) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
  
 <!-- Favicons -->
<?php include __DIR__ . '/partials/favicons.php'; ?>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/base.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/navbar.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/footer.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/blog.css?v=4'), ENT_QUOTES); ?>">
</head>

<body class="gs-page gs-page--blog">

<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-blg">

  <!-- TOP -->
  <section class="gs-blg-top">
    <div class="gs-blg-hero gs-reveal">
      <div class="gs-blg-heroCopy">
        <div class="gs-blg-pill">
          <span class="gs-blg-pill__dot" aria-hidden="true"></span>
          <span class="gs-blg-pill__text">Insights</span>
        </div>

        <h1 class="gs-blg-title">
          Writing, strategy, and
          <span class="gs-blg-type" data-phrases="funding clarity|reviewer flow|proposal structure|budget logic"></span>
        </h1>
        <p class="gs-blg-sub">
          Practical perspectives on grants, proposal design, budgeting, and readiness
          written for teams navigating real deadlines.
        </p>
        <div class="gs-blg-heroNote">New insights added regularly.</div>
      </div>
    </div>

    
<!-- FEATURED (image left on large screens) -->
  <section class="gs-blg-featured gs-reveal" aria-label="Featured article">
 <?php include __DIR__ . '/articlecards/featuredarticle.php'; ?>
  </section>
  <br>
<!-- CONTROLS -->
    <div class="gs-blg-controls gs-reveal" aria-label="Blog controls">
      <div class="gs-blg-search">
        <input id="gsBlogSearch" type="search" placeholder="Search articles…" autocomplete="off" />
        <span class="gs-blg-search__icon" aria-hidden="true">⌕</span>
      </div>
<br>
      <div class="gs-blg-filters" role="tablist" aria-label="Blog categories">
        <button class="gs-blg-filter is-active" type="button" data-filter="all">All</button>
        <button class="gs-blg-filter" type="button" data-filter="strategy">Grant Strategy</button>
        <button class="gs-blg-filter" type="button" data-filter="writing">Proposal Writing</button>
        <button class="gs-blg-filter" type="button" data-filter="budget">Budgets &amp; Compliance</button>
        <button class="gs-blg-filter" type="button" data-filter="readiness">Funding Readiness</button>
      </div>
    </div>
  </section>
  <!-- GRID -->
  <section class="gs-blg-gridSec" aria-label="Blog articles">
    <div class="gs-blg-grid" id="gsBlogGrid">

     <?php include __DIR__ . '/articlecards/article1.php'; ?>
<?php include __DIR__ . '/articlecards/article2.php'; ?>
     <?php include __DIR__ . '/articlecards/article3.php'; ?>
<?php include __DIR__ . '/articlecards/article.php'; ?>
     

      

    </div>

    <!-- Empty state -->
    <div class="gs-blg-empty" id="gsBlogEmpty" hidden>
      <div class="gs-blg-empty__card">
        <div class="gs-blg-empty__icon" aria-hidden="true">⟡</div>
        <div class="gs-blg-empty__t">No articles found</div>
        <p class="gs-blg-empty__p">Try a different keyword or choose another category.</p>
      </div>
    </div>

    <div class="gs-blg-empty__card">
        <div class="gs-blg-empty__icon" aria-hidden="true">⟡</div>
        <div class="gs-blg-empty__t">More Articles Comming Soon</div>
        <p class="gs-blg-empty__p">Try a different keyword or choose another category.</p>
      </div>
  </section>

</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=1'), ENT_QUOTES); ?>" defer></script>
<script src="<?php echo htmlspecialchars(gs_url('assets/js/pages/blog.js?v=4'), ENT_QUOTES); ?>" defer></script>
</body>
</html>
