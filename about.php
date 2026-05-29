<?php
// about.php
require_once __DIR__ . '/config/config.php';

$pageTitle = "About - " . (defined('SITE_NAME') ? SITE_NAME : 'The Grant Ship');
$pageDesc = "About The Grant Ship - a grant strategy and proposal partner helping organizations turn vision into funded programs with clarity and structure.";

$team = [
  [
    'name' => 'Founder & CEO',
    'role' => 'Grant strategy and proposal leadership',
    'img' => 'assets/img/profile.jpg',
    'linkedin' => 'https://www.linkedin.com/company/thegrantship/'
  ],
  [
    'name' => 'Proposal Lead',
    'role' => 'Narrative structure and compliance delivery',
    'img' => 'assets/img/profile.jpg',
    'linkedin' => 'https://www.linkedin.com/company/thegrantship/'
  ],
  [
    'name' => 'MEL + Budget Specialist',
    'role' => 'Workplans, indicators, and budget alignment',
    'img' => 'assets/img/profile.jpg',
    'linkedin' => 'https://www.linkedin.com/company/thegrantship/'
  ],
];
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

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Favicons -->
<?php include __DIR__ . '/partials/favicons.php'; ?>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/base.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/navbar.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/footer.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/about.css?v=7'), ENT_QUOTES); ?>">
</head>

<body class="gs-page gs-page--about">

<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-ab3">

  <header class="gs-ab3-hero">
    <div class="gs-container">
      <div class="gs-ab3-hero__grid">

        <div class="gs-ab3-hero__text gs-reveal">
          <div class="gs-ab3-pill">
            <span class="gs-ab3-pill__dot" aria-hidden="true"></span>
            About
          </div>

          <h1 class="gs-ab3-title">
            A grant partner built for
            <span class="gs-ab3-typeWrap">
              <span class="gs-ab3-type" data-phrases="clarity|structure|reviewer flow|submission-ready delivery"></span>
            </span>
          </h1>

          <p class="gs-ab3-sub">
            The Grant Ship supports mission-driven teams with grant strategy, proposal writing, and budget alignment.
            We make complex work feel clear, fundable, and reviewer-ready.
          </p>

          <div class="gs-ab3-badges">
            <span class="gs-ab3-badge">Strategy</span>
            <span class="gs-ab3-badge">Proposal writing</span>
            <span class="gs-ab3-badge">Budget logic</span>
            <span class="gs-ab3-badge">MEL alignment</span>
          </div>

          <div class="gs-ab3-proof">
            <div class="gs-ab3-proof__item">
              <div class="gs-ab3-proof__k">Senior led</div>
              <div class="gs-ab3-proof__v">Hands-on strategy and narrative direction.</div>
            </div>
            <div class="gs-ab3-proof__item">
              <div class="gs-ab3-proof__k">Compliance first</div>
              <div class="gs-ab3-proof__v">Requirements mapped early and tracked to close.</div>
            </div>
            <div class="gs-ab3-proof__item">
              <div class="gs-ab3-proof__k">Submission ready</div>
              <div class="gs-ab3-proof__v">Clean packaging and reviewer-friendly flow.</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </header>

  <section class="gs-ab3-section">
    <div class="gs-container">

      <div class="gs-ab3-head gs-reveal">
        <h2 class="gs-ab3-h2">What we do</h2>
        <p class="gs-ab3-muted">
          We help teams turn complex ideas into fundable scope, then deliver a proposal package that reviewers can score with confidence.
        </p>
      </div>

      <div class="gs-ab3-flow">
        <article class="gs-ab3-item gs-reveal">
          <div class="gs-ab3-item__n">01</div>
          <div class="gs-ab3-item__body">
            <h3 class="gs-ab3-item__t">Grant strategy</h3>
            <p class="gs-ab3-item__p">Opportunity fit, positioning, and a clean scope designed around funder priorities.</p>
          </div>
        </article>

        <article class="gs-ab3-item gs-reveal">
          <div class="gs-ab3-item__n">02</div>
          <div class="gs-ab3-item__body">
            <h3 class="gs-ab3-item__t">Proposal writing</h3>
            <p class="gs-ab3-item__p">Structured narrative with strong reviewer flow, clear section logic, and crisp language.</p>
          </div>
        </article>

        <article class="gs-ab3-item gs-reveal">
          <div class="gs-ab3-item__n">03</div>
          <div class="gs-ab3-item__body">
            <h3 class="gs-ab3-item__t">Budget and compliance</h3>
            <p class="gs-ab3-item__p">Budget narratives and justifications tied to tasks, outputs, and allowable cost logic.</p>
          </div>
        </article>

        <article class="gs-ab3-item gs-reveal">
          <div class="gs-ab3-item__n">04</div>
          <div class="gs-ab3-item__body">
            <h3 class="gs-ab3-item__t">Submission packaging</h3>
            <p class="gs-ab3-item__p">Formatting, attachments, checks, and a clean final package aligned to requirements.</p>
          </div>
        </article>
      </div>

    </div>
  </section>

  <section class="gs-ab3-section">
    <div class="gs-container">

      <div class="gs-ab3-head gs-reveal">
        <h2 class="gs-ab3-h2">How we work</h2>
        <p class="gs-ab3-muted">A simple process designed for clarity and momentum.</p>
      </div>

      <div class="gs-ab3-steps">
        <div class="gs-ab3-step gs-reveal">
          <div class="gs-ab3-step__n">01</div>
          <div class="gs-ab3-step__b">
            <div class="gs-ab3-step__t">Discovery</div>
            <div class="gs-ab3-step__p">Fit, scope, timeline, and what success must look like for reviewers.</div>
          </div>
        </div>
        <div class="gs-ab3-step gs-reveal">
          <div class="gs-ab3-step__n">02</div>
          <div class="gs-ab3-step__b">
            <div class="gs-ab3-step__t">Design</div>
            <div class="gs-ab3-step__p">Outcomes, activities, evaluation, and budget logic mapped early.</div>
          </div>
        </div>
        <div class="gs-ab3-step gs-reveal">
          <div class="gs-ab3-step__n">03</div>
          <div class="gs-ab3-step__b">
            <div class="gs-ab3-step__t">Draft and refine</div>
            <div class="gs-ab3-step__p">Write, review, improve structure, and finalize the submission package.</div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="gs-ab3-section">
    <div class="gs-container">
      <div class="gs-ab3-head gs-reveal">
        <h2 class="gs-ab3-h2">Where we help most</h2>
        <p class="gs-ab3-muted">Focused support for complex proposals and high-stakes submissions.</p>
      </div>

      <div class="gs-ab3-split">
        <div class="gs-ab3-panel gs-reveal">
          <h3 class="gs-ab3-h3">Programs and proposals</h3>
          <div class="gs-ab3-list">
            <div class="gs-ab3-li">
              <span class="gs-ab3-li__dot" aria-hidden="true"></span>
              <span>Program design with clear outcomes and activities.</span>
            </div>
            <div class="gs-ab3-li">
              <span class="gs-ab3-li__dot" aria-hidden="true"></span>
              <span>Competitive narratives that match funder priorities.</span>
            </div>
            <div class="gs-ab3-li">
              <span class="gs-ab3-li__dot" aria-hidden="true"></span>
              <span>Evaluation, MEL, and indicator alignment.</span>
            </div>
          </div>
        </div>

        <div class="gs-ab3-panel gs-reveal">
          <h3 class="gs-ab3-h3">Operations and delivery</h3>
          <div class="gs-ab3-list">
            <div class="gs-ab3-li">
              <span class="gs-ab3-li__dot" aria-hidden="true"></span>
              <span>Budget narratives tied to outputs and costs.</span>
            </div>
            <div class="gs-ab3-li">
              <span class="gs-ab3-li__dot" aria-hidden="true"></span>
              <span>Compliance checks and final packaging.</span>
            </div>
            <div class="gs-ab3-li">
              <span class="gs-ab3-li__dot" aria-hidden="true"></span>
              <span>Clear timelines, checkpoints, and review loops.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="gs-ab3-section">
    <div class="gs-container">
      <div class="gs-ab3-head gs-reveal">
        <h2 class="gs-ab3-h2">Team</h2>
        <p class="gs-ab3-muted">A small, senior team focused on strategy, clarity, and execution.</p>
      </div>

      <div class="gs-ab3-teamGrid">
        <?php foreach ($team as $idx => $t): ?>
          <article class="gs-ab3-teamCard gs-reveal" style="transition-delay: <?php echo min($idx * 60, 180); ?>ms">
            <div class="gs-ab3-teamPhoto">
              <img src="<?php echo htmlspecialchars(gs_url($t['img']), ENT_QUOTES); ?>" alt="<?php echo htmlspecialchars($t['name']); ?>" loading="lazy">
            </div>
            <div class="gs-ab3-teamInfo">
              <div class="gs-ab3-teamName"><?php echo htmlspecialchars($t['name']); ?></div>
              <div class="gs-ab3-teamRole"><?php echo htmlspecialchars($t['role']); ?></div>
              <a class="gs-ab3-teamLink" href="<?php echo htmlspecialchars($t['linkedin'], ENT_QUOTES); ?>" target="_blank" rel="noopener">
                <span class="gs-ab3-teamLinkDot" aria-hidden="true">in</span>
                LinkedIn
              </a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=1'), ENT_QUOTES); ?>" defer></script>
<script src="<?php echo htmlspecialchars(gs_url('assets/js/pages/about.js?v=3'), ENT_QUOTES); ?>" defer></script>
</body>
</html>
