<?php
// articles/article.php (single article template - static for now)

// FIX: missing slash + correct relative path from /articles/ to /config/
require_once __DIR__ . '/../config/config.php';

$pageTitle = "What Reviewers Actually Look For in Competitive Grant Proposals - " . (defined('SITE_NAME') ? SITE_NAME : 'The Grant Ship');
$pageDesc = "A Grant Ship article on grant strategy, proposal writing, budgeting, and readiness.";
$pageType = 'article';
$pageImage = 'articles/articleimgs/article.webp';
$pagePublished = '2026-01-10';
$pageModified = '2026-01-10';
$pageSection = 'Grant Strategy';
$pageTags = ['grant strategy', 'proposal writing', 'reviewers', 'alignment'];

// Small helper so this file is safe even if gs_url is ever unavailable
if (!function_exists('gs_a_url')) {
  function gs_a_url(string $path = ''): string {
    $path = ltrim($path, '/');
    return function_exists('gs_url') ? gs_url($path) : $path;
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- BASE URL (subfolder-safe) -->
  <base href="<?php echo htmlspecialchars(BASE_URL_PATH, ENT_QUOTES); ?>">

  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDesc, ENT_QUOTES); ?>" />
  <?php include __DIR__ . '/../partials/seo.php'; ?>

  <!-- Fonts (consistent across site) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
  
 <!-- Favicons -->
<?php include __DIR__ . '/../partials/favicons.php'; ?>

  <!-- Assets use gs_url (subfolder-safe) -->
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_a_url('assets/css/base.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_a_url('assets/css/components/navbar.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_a_url('assets/css/components/footer.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_a_url('assets/css/pages/article.css?v=5'), ENT_QUOTES); ?>">
</head>

<body class="gs-page gs-page--article">

<?php
// FIX: correct include path from /articles/ to /partials/
include __DIR__ . '/../partials/navbar.php';
?>

<main class="gs-ar">

  <!-- HERO -->
  <header class="gs-ar__hero gs-container">
    <nav class="gs-ar__crumbs gs-reveal" aria-label="Breadcrumb">
      <a class="gs-ar__crumbLink" href="<?php echo htmlspecialchars(gs_a_url('blog.php'), ENT_QUOTES); ?>">Blog</a>
      <span class="gs-ar__crumbSep" aria-hidden="true">/</span>
      <span class="gs-ar__crumbHere">Article</span>
    </nav>

    <div class="gs-ar__heroGrid">
      <div class="gs-ar__heroText gs-reveal">
        <div class="gs-ar__metaRow">
          <span class="gs-ar__tag"><i aria-hidden="true"></i> Grant Strategy</span>
          <span class="gs-ar__metaDot" aria-hidden="true">-</span>
          <span class="gs-ar__meta">8 min read</span>
          <span class="gs-ar__metaDot" aria-hidden="true">-</span>
          <time class="gs-ar__meta" datetime="2026-01-10">January 10, 2026</time>
        </div>

        <h1 class="gs-ar__title">
          What reviewers actually look for in competitive grant proposals
        </h1>

        <p class="gs-ar__sub">
          Funded proposals don't just sound good - they read like executable plans.
          Here's a practical, reviewer-first breakdown you can apply before you draft.
        </p>

        <div class="gs-ar__heroActions">
          <button class="gs-ar__shareBtn" type="button" id="gsShareBtn" aria-label="Share this article">
            Share <span aria-hidden="true">-></span>
          </button>
          <a class="gs-ar__ghostBtn" href="<?php echo htmlspecialchars(gs_a_url('contact.php'), ENT_QUOTES); ?>">Work with us</a>
        </div>

        <div class="gs-ar__author">
          <div class="gs-ar__avatar" aria-hidden="true"></div>
          <div class="gs-ar__authorText">
            <p class="gs-ar__by">By <strong>The Grant Ship</strong></p>
            <p class="gs-ar__bySub">Strategy - Writing - Budgets &amp; Compliance</p>
          </div>
        </div>
      </div>

      <figure class="gs-ar__heroMedia gs-reveal">
        <img src="<?php echo htmlspecialchars(gs_a_url('articles/articleimgs/article.webp'), ENT_QUOTES); ?>" alt="" loading="lazy">
        <div class="gs-ar__mediaOverlay" aria-hidden="true"></div>
        <figcaption class="gs-ar__cap">Clarity, structure, and reviewer-ready flow.</figcaption>
      </figure>
    </div>
  </header>

  <!-- BODY -->
  <section class="gs-ar__wrap gs-container">
    <div class="gs-ar__layout">

      <!-- Sticky side rail -->
      <aside class="gs-ar__rail gs-reveal" aria-label="Article navigation">
        <div class="gs-ar__railCard">
          <div class="gs-ar__railBlock">
            <p class="gs-ar__railTitle">On this page</p>

            <?php
            // FIX 1: base-tag safe anchors for TOC clicks
            $currentUrl = strtok($_SERVER['REQUEST_URI'], '#');
            ?>

            <ol class="gs-ar__toc" id="gsToc">
              <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-1">The reviewer's mental checklist</a></li>
              <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-2">Clarity beats complexity</a></li>
              <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-3">Alignment: narrative <-> workplan <-> budget</a></li>
              <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-4">Evidence, not adjectives</a></li>
              <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-5">A simple self-review before submission</a></li>
            </ol>
          </div>

          <div class="gs-ar__railBlock">
            <p class="gs-ar__railTitle">Quick takeaway</p>
            <p class="gs-ar__railNote">
              If the proposal reads like a plan your team can execute, reviewers can score it with confidence.
            </p>
          </div>
        </div>
      </aside>

      <!-- Main article -->
      <article class="gs-ar__article gs-reveal" aria-label="Article content">

        <p class="gs-ar__lede">
          Most proposals fail for one reason: they make reviewers work too hard to understand what will happen, who will do it,
          and why the budget is justified. Funded proposals reduce ambiguity - they make the plan feel inevitable.
        </p>

        <div class="gs-ar__callout">
          <p class="gs-ar__calloutText">
            <strong>Rule:</strong> Every paragraph should either (1) clarify the plan, (2) justify feasibility, or (3) strengthen alignment.
          </p>
        </div>

        <h2 id="sec-1" class="gs-ar__h2">The reviewer's mental checklist</h2>
        <p class="gs-ar__p">
          Reviewers often read quickly. They're scanning for structure: scope, outcomes, methods, team capability, evaluation, and a budget
          that matches the work. Your job is to make these items visible without forcing them to hunt.
        </p>

        <ul class="gs-ar__list">
          <li><strong>Fit:</strong> Is this clearly aligned to the solicitation's goals and priorities?</li>
          <li><strong>Feasibility:</strong> Does the team, timeline, and approach feel realistic?</li>
          <li><strong>Impact:</strong> Are outcomes measurable and meaningful?</li>
          <li><strong>Risk:</strong> Are challenges acknowledged with mitigation?</li>
          <li><strong>Budget logic:</strong> Does the budget match the plan line-by-line?</li>
        </ul>

        <figure class="gs-ar__img">
          <img src="<?php echo htmlspecialchars(gs_a_url('articles/articleimgs/article.png'), ENT_QUOTES); ?>" alt="" loading="lazy">
          <figcaption>Make the plan visible: headings, bullets, and clear flow reduce reviewer fatigue.</figcaption>
        </figure>

        <h2 id="sec-2" class="gs-ar__h2">Clarity beats complexity</h2>
        <p class="gs-ar__p">
          Complexity can exist in the project - it shouldn't exist in the writing. Strong proposals translate complexity into simple,
          accountable steps. Use short sections, direct language, and consistent naming for activities and outcomes.
        </p>

        <blockquote class="gs-ar__quote">
          "Your proposal should feel like the minutes from a meeting where decisions were made."
        </blockquote>

        <h2 id="sec-3" class="gs-ar__h2">Alignment: narrative <-> workplan <-> budget</h2>
        <p class="gs-ar__p">
          If one piece drifts, reviewers lose trust. The safest pattern is a tight triangle:
        </p>

        <div class="gs-ar__tri">
          <div class="gs-ar__triItem">
            <p class="gs-ar__triTitle">Narrative</p>
            <p class="gs-ar__triText">What you will do - and why it works.</p>
          </div>
          <div class="gs-ar__triItem">
            <p class="gs-ar__triTitle">Workplan</p>
            <p class="gs-ar__triText">How it happens - activities, outputs, timeline.</p>
          </div>
          <div class="gs-ar__triItem">
            <p class="gs-ar__triTitle">Budget</p>
            <p class="gs-ar__triText">What it costs - directly tied to activities.</p>
          </div>
        </div>

        <div class="gs-ar__tip">
          <p class="gs-ar__tipTitle">Micro-technique</p>
          <p class="gs-ar__tipText">
            Reuse the same labels (Activity 1, Activity 2...) across narrative, timeline, and budget notes.
            It creates instant reviewer confidence.
          </p>
        </div>

        <h2 id="sec-4" class="gs-ar__h2">Evidence, not adjectives</h2>
        <p class="gs-ar__p">
          Replace "innovative" with proof: pilot results, partner capacity, baseline data, prior outcomes, or clear rationale grounded in
          literature and field practice. Evidence makes the plan believable.
        </p>

        <figure class="gs-ar__img">
          <img src="<?php echo htmlspecialchars(gs_a_url('assets/img/article-inline-2.jpg'), ENT_QUOTES); ?>" alt="" loading="lazy">
          <figcaption>Evidence can be simple: baseline metrics, past outputs, partner commitments, or pilots.</figcaption>
        </figure>

        <h2 id="sec-5" class="gs-ar__h2">A simple self-review before submission</h2>
        <p class="gs-ar__p">
          Before you submit, pretend you're a reviewer who's reading at speed. Can you answer these in under 60 seconds?
        </p>

        <div class="gs-ar__check">
          <label class="gs-ar__checkRow"><input type="checkbox"> I can summarize the project in one sentence.</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> Outcomes are measurable and tied to activities.</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> The budget clearly maps to the workplan.</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> Risks are acknowledged with mitigation.</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> The story is coherent from start to finish.</label>
        </div>

        <div class="gs-ar__divider"></div>

        <div class="gs-ar__end">
          <p class="gs-ar__endTitle">Want help turning your plan into a reviewer-ready submission?</p>
          <p class="gs-ar__endText">
            We'll help you build structure, alignment, and clarity - then deliver a clean, compliant package.
          </p>
          <a class="gs-ar__ctaBtn" href="<?php echo htmlspecialchars(gs_a_url('contact.php'), ENT_QUOTES); ?>">Contact The Grant Ship</a>
        </div>

      </article>
    </div>
  </section>

   <?php include __DIR__ . '/../articles/relatedarticles.php'; ?>

</main>

<?php
// FIX: correct include path from /articles/ to /partials/
include __DIR__ . '/../partials/footer.php';
?>

<script src="<?php echo htmlspecialchars(gs_a_url('assets/js/components/navbar.js?v=1'), ENT_QUOTES); ?>" defer></script>
<script src="<?php echo htmlspecialchars(gs_a_url('assets/js/pages/article.js?v=2'), ENT_QUOTES); ?>" defer></script>
</body>
</html>
