<?php
// articles/featured-grant-writing.php (single featured article - static)

require_once __DIR__ . '/../config/config.php';

$pageTitle = "Grant Writing That Actually Wins - " . (defined('SITE_NAME') ? SITE_NAME : 'The Grant Ship');
$pageDesc = "A practical, reviewer-first guide to grant writing: alignment, evidence, workplans, budgets, evaluation, and sustainability.";
$pageType = 'article';
$pageImage = 'articles/articleimgs/featuredarticleimage.webp';
$pagePublished = '2026-01-12';
$pageModified = '2026-01-12';
$pageSection = 'Grant Writing';
$pageTags = ['grant writing', 'proposal strategy', 'alignment', 'evaluation'];

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
// include navbar from /partials/
include __DIR__ . '/../partials/navbar.php';
?>

<main class="gs-ar">

  <!-- HERO -->
  <header class="gs-ar__hero gs-container">
    <nav class="gs-ar__crumbs gs-reveal" aria-label="Breadcrumb">
      <a class="gs-ar__crumbLink" href="<?php echo htmlspecialchars(gs_a_url('blog.php'), ENT_QUOTES); ?>">Blog</a>
      <span class="gs-ar__crumbSep" aria-hidden="true">/</span>
      <span class="gs-ar__crumbHere">Featured</span>
    </nav>

    <div class="gs-ar__heroGrid">
      <div class="gs-ar__heroText gs-reveal">
        <div class="gs-ar__metaRow">
          <span class="gs-ar__tag"><i aria-hidden="true"></i> Grant Writing</span>
          <span class="gs-ar__metaDot" aria-hidden="true">-</span>
          <span class="gs-ar__meta">10 min read</span>
          <span class="gs-ar__metaDot" aria-hidden="true">-</span>
          <time class="gs-ar__meta" datetime="2026-01-12">January 12, 2026</time>
        </div>

        <h1 class="gs-ar__title">Grant Writing That Actually Wins</h1>

        <p class="gs-ar__sub">
          How to turn a good idea into a fundable, competitive proposal-without guessing.
          A reviewer-first framework for alignment, feasibility, and credibility.
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
        <!-- Replace with your featured hero image -->
        <img src="<?php echo htmlspecialchars(gs_a_url('articles/articleimgs/featuredarticleimage.webp'), ENT_QUOTES); ?>" alt="" loading="lazy">
        <div class="gs-ar__mediaOverlay" aria-hidden="true"></div>
        <figcaption class="gs-ar__cap">A reviewer-first approach to proposals.</figcaption>
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
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-1">Start with the funder's logic</a></li>
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-2">Problem statement with proof</a></li>
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-3">Make the solution inevitable</a></li>
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-4">Build a workplan that survives reality</a></li>
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-5">Budget = credibility</a></li>
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-6">Evaluation that matters</a></li>
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-7">Sustainability beyond promises</a></li>
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-8">Final polish for reviewers</a></li>
            <li><a href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES); ?>#sec-9">A repeatable grant-winning process</a></li>
          </ol>

          </div>

          <div class="gs-ar__railBlock">
            <p class="gs-ar__railTitle">Quick takeaway</p>
            <p class="gs-ar__railNote">
              Most proposals aren't lost because your mission isn't meaningful - they're lost because the plan isn't unmistakably clear.
            </p>
          </div>
        </div>
      </aside>

      <!-- Main article -->
      <article class="gs-ar__article gs-reveal" aria-label="Article content">

        <p class="gs-ar__lede">
          Most grants aren't lost because your idea isn't strong. They're lost because the proposal doesn't make the funder's job easy.
          Grant writing is less about "beautiful writing" and more about clear decision-making:
          can this team deliver, will the plan work, is the budget believable, and will results be measured?
        </p>

        <div class="gs-ar__callout">
          <p class="gs-ar__calloutText">
            <strong>Featured insight:</strong> A winning proposal reduces uncertainty. It helps reviewers score you with confidence.
          </p>
        </div>

        <h2 id="sec-1" class="gs-ar__h2">Start with the funder's logic, not your organization's story</h2>
        <p class="gs-ar__p">
          Your story matters - but it shouldn't be the structure. Funders publish priorities, selection criteria, and expected outcomes.
          Your proposal should read like it was built directly from those requirements.
        </p>
        <ul class="gs-ar__list">
          <li>Extract the funder's goals and scoring criteria into a checklist.</li>
          <li>Map each criterion to a specific section (no gaps).</li>
          <li>Use the funder's language strategically (alignment, not copy/paste).</li>
        </ul>

        <blockquote class="gs-ar__quote">
          If a reviewer can't quickly match your content to the scoring rubric, you're donating points.
        </blockquote>

        <h2 id="sec-2" class="gs-ar__h2">Problem statement with proof</h2>
        <p class="gs-ar__p">
          A strong need statement defines the issue clearly, identifies who is affected (and how many), and proves urgency with credible data.
          Keep it specific and local whenever possible.
        </p>

        <div class="gs-ar__tri">
          <div class="gs-ar__triItem">
            <p class="gs-ar__triTitle">Define</p>
            <p class="gs-ar__triText">One sentence that names the problem and where it shows up.</p>
          </div>
          <div class="gs-ar__triItem">
            <p class="gs-ar__triTitle">Quantify</p>
            <p class="gs-ar__triText">Who is affected, how many, and what the baseline looks like.</p>
          </div>
          <div class="gs-ar__triItem">
            <p class="gs-ar__triTitle">Prove</p>
            <p class="gs-ar__triText">Why it's urgent - with indicators, surveys, or program data.</p>
          </div>
        </div>

        <figure class="gs-ar__img">
          <img src="<?php echo htmlspecialchars(gs_a_url('assets/img/article-inline-1.jpg'), ENT_QUOTES); ?>" alt="" loading="lazy">
          <figcaption>Great proposals translate need into measurable baselines and targets.</figcaption>
        </figure>

        <h2 id="sec-3" class="gs-ar__h2">Make the solution inevitable</h2>
        <p class="gs-ar__p">
          The best proposals make the solution feel like the only reasonable next step. Show why the strategy works, why your team can deliver,
          and why now. Then connect goals -> objectives -> activities -> outputs -> outcomes.
        </p>
        <ul class="gs-ar__list">
          <li><strong>Why it works:</strong> evidence, best practices, prior results.</li>
          <li><strong>Why you:</strong> capacity, partners, systems, experience.</li>
          <li><strong>Why now:</strong> readiness, timing, and clear opportunity.</li>
        </ul>

        <div class="gs-ar__tip">
          <p class="gs-ar__tipTitle">Tip</p>
          <p class="gs-ar__tipText">
            Keep your objectives measurable: define the number served, the change expected, and the timeframe.
          </p>
        </div>

        <h2 id="sec-4" class="gs-ar__h2">Build a workplan that survives reality</h2>
        <p class="gs-ar__p">
          Reviewers read your timeline to assess risk. If it's vague or overly ambitious, trust drops. A solid workplan shows phases,
          owners, dependencies, and delivery milestones.
        </p>
        <ul class="gs-ar__list">
          <li>Phases: setup -> delivery -> evaluation -> sustainability</li>
          <li>Responsible parties for each activity</li>
          <li>Month-by-month or quarter-by-quarter milestones</li>
          <li>Dependencies and checkpoints that prove momentum</li>
        </ul>

        <h2 id="sec-5" class="gs-ar__h2">Budget = credibility</h2>
        <p class="gs-ar__p">
          Budgets fail when they look like guesses. A fundable budget matches the workplan, uses realistic unit costs,
          and explains assumptions clearly in the budget narrative/justification.
        </p>

        <div class="gs-ar__callout">
          <p class="gs-ar__calloutText">
            <strong>Common budget red flags:</strong> personnel with no role definition, travel without purpose, large "miscellaneous" lines,
            equipment with no use plan, or missing evaluation resources.
          </p>
        </div>

        <h2 id="sec-6" class="gs-ar__h2">Evaluation that matters</h2>
        <p class="gs-ar__p">
          Funders don't just want activity counts. They want evidence of change. Start with a baseline, set targets, define tools and frequency,
          and show how learning improves delivery.
        </p>
        <ul class="gs-ar__list">
          <li>Baseline measurement (where you're starting)</li>
          <li>Targets (what success looks like)</li>
          <li>Tools/methods + collection frequency</li>
          <li>Responsibility (who collects and reports)</li>
          <li>Learning loop (how findings improve delivery)</li>
        </ul>

        <figure class="gs-ar__img">
          <img src="<?php echo htmlspecialchars(gs_a_url('assets/img/article-inline-2.jpg'), ENT_QUOTES); ?>" alt="" loading="lazy">
          <figcaption>Evaluation builds trust when it's specific, resourced, and tied to outcomes.</figcaption>
        </figure>

        <h2 id="sec-7" class="gs-ar__h2">Sustainability beyond promises</h2>
        <p class="gs-ar__p">
          "We will seek additional funding" isn't a sustainability strategy. A credible plan shows how impact continues through earned revenue,
          institutional adoption, partnership commitments, or cost reduction over time.
        </p>
        <ul class="gs-ar__list">
          <li>Earned revenue (fees, memberships, services)</li>
          <li>Institutional adoption (district, clinic, municipality)</li>
          <li>Partnership commitments (MOUs, co-funding, in-kind)</li>
          <li>System change (embedding into operations)</li>
        </ul>

        <h2 id="sec-8" class="gs-ar__h2">Final polish for reviewers</h2>
        <p class="gs-ar__p">
          Reviewers are scanning under time pressure. Reduce friction with short paragraphs, rubric-aligned headings,
          bullets for requirements, and consistent naming across narrative, timeline, and budget.
        </p>

        <blockquote class="gs-ar__quote">
          If you removed your organization's name, would a reviewer still know this proposal fits this funder? If not, tighten alignment.
        </blockquote>

        <h2 id="sec-9" class="gs-ar__h2">A repeatable grant-winning process</h2>
        <p class="gs-ar__p">
          Here's a workflow you can reuse for almost any opportunity:
        </p>

        <div class="gs-ar__check">
          <label class="gs-ar__checkRow"><input type="checkbox"> Opportunity Fit (eligibility, priorities, scoring, timeline)</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> Blueprint (problem -> objectives -> activities -> evaluation)</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> Resourcing (budget, staffing, partners, risk plan)</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> Narrative Build (write to the rubric)</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> Compliance Pass (requirements + attachments)</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> Strength Pass (clarity, specificity, credibility)</label>
          <label class="gs-ar__checkRow"><input type="checkbox"> Final Review (proof, formatting, submission readiness)</label>
        </div>

        <div class="gs-ar__divider"></div>

        <div class="gs-ar__end">
          <p class="gs-ar__endTitle">Ready to strengthen your next proposal?</p>
          <p class="gs-ar__endText">
            If you want clarity on fit, competitiveness, or how to structure narrative + budget so reviewers trust it,
            we can help you build a clean, compliant, reviewer-ready package.
          </p>
          <a class="gs-ar__ctaBtn" href="<?php echo htmlspecialchars(gs_a_url('contact.php'), ENT_QUOTES); ?>">Contact The Grant Ship</a>
        </div>

      </article>
    </div>
  </section>

  <!-- RELATED -->
   <?php include __DIR__ . '/../articles/relatedarticles.php'; ?>

</main>

<?php
include __DIR__ . '/../partials/footer.php';
?>

<script src="<?php echo htmlspecialchars(gs_a_url('assets/js/components/navbar.js?v=1'), ENT_QUOTES); ?>" defer></script>
<script src="<?php echo htmlspecialchars(gs_a_url('assets/js/pages/article.js?v=2'), ENT_QUOTES); ?>" defer></script>
</body>
</html>
