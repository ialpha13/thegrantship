<?php
// services.php
require_once __DIR__ . '/config/config.php';

$pageTitle = SITE_NAME . ' - Services';
$pageDesc = 'Grant strategy, proposal development, budgeting, MEL frameworks, and concept notes - services by The Grant Ship.';
$pageImage = 'assets/img/og-default.png';

$services = [
  [
    'title' => 'Grant Strategy & Opportunity Fit',
    'cat' => 'Strategy',
    'tag' => 'strategy',
    'price' => '$2,500-$6,000',
    'timeline' => '1-3 weeks',
    'desc' => 'We map your goal to the right funders, define a winnable scope, and build a reviewer path before writing starts.',
    'deliverables' => ['Opportunity fit matrix', 'Eligibility + priority alignment', 'Scope + scoring map'],
    'ideal' => 'Teams planning a new grant pursuit or repositioning an existing program.',
  ],
  [
    'title' => 'Full Proposal Development',
    'cat' => 'Proposals',
    'tag' => 'proposal',
    'price' => '$8,000-$25,000',
    'timeline' => '3-8 weeks',
    'desc' => 'End-to-end proposal writing with structure, compliance, and reviewer flow built in.',
    'deliverables' => ['Narrative + attachments', 'Compliance checklist', 'Final QA + submission-ready package'],
    'ideal' => 'Organizations responding to competitive or high-stakes solicitations.',
  ],
  [
    'title' => 'Budget, Narrative & Justification',
    'cat' => 'Budgets',
    'tag' => 'budget',
    'price' => '$2,000-$6,500',
    'timeline' => '1-3 weeks',
    'desc' => 'Budgets that read clean: every line item connects to tasks, timelines, and outputs.',
    'deliverables' => ['Budget model + calculations', 'Budget narrative', 'Allowability + reasonableness check'],
    'ideal' => 'Teams with a strong program plan that needs financial alignment.',
  ],
  [
    'title' => 'Concept Notes & Pitch Materials',
    'cat' => 'Strategy',
    'tag' => 'strategy',
    'price' => '$1,500-$4,000',
    'timeline' => '1-2 weeks',
    'desc' => 'Fast, donor-aligned concept notes and pitch docs to test fit before full proposals.',
    'deliverables' => ['2-5 page concept note', 'Theory of change snapshot', 'Donor-ready language'],
    'ideal' => 'Early-stage funding conversations or pre-RFP positioning.',
  ],
  [
    'title' => 'Programs, Workplans & MEL',
    'cat' => 'Program Design',
    'tag' => 'program',
    'price' => '$4,000-$12,000',
    'timeline' => '2-6 weeks',
    'desc' => 'We translate your mission into a program spine: workplan, outputs, indicators, and reporting logic.',
    'deliverables' => ['Workplan + milestones', 'MEL framework', 'Indicator definitions + sources'],
    'ideal' => 'Programs that need stronger evidence and measurement structure.',
  ],
  [
    'title' => 'Partnerships & Letters of Support',
    'cat' => 'Proposals',
    'tag' => 'proposal',
    'price' => '$1,200-$3,500',
    'timeline' => '1-2 weeks',
    'desc' => 'We secure and structure partner inputs so your application reads coordinated and credible.',
    'deliverables' => ['LOS templates + drafting', 'Partner role clarity', 'Subrecipient coordination support'],
    'ideal' => 'Multi-partner proposals or consortium applications.',
  ],
];

$models = [
  [
    'title' => 'Strategy Sprint',
    'price' => '$1,500-$3,500',
    'timeline' => '1-2 weeks',
    'desc' => 'Short engagement to confirm fit, define a winnable scope, and map next steps before a full proposal.',
    'deliverables' => ['Funder fit memo', 'Priority + eligibility map', 'Go/no-go recommendation'],
  ],
  [
    'title' => 'Full Proposal Package',
    'price' => '$8,000-$25,000',
    'timeline' => '3-8 weeks',
    'desc' => 'Complete proposal development, budget, attachments, and compliance checks from draft to submission-ready.',
    'deliverables' => ['Narrative + attachments', 'Budget + justification', 'Submission-ready package'],
  ],
  [
    'title' => 'Ongoing Grants Support',
    'price' => '$2,500-$7,500/mo',
    'timeline' => 'Monthly',
    'desc' => 'Retained support for pipeline management, rapid responses, and donor communications.',
    'deliverables' => ['Pipeline tracking', 'Rapid response drafts', 'Donor follow-up support'],
  ],
];

$cases = [
  [
    'title' => 'Regional Health Nonprofit',
    'sector' => 'Public health',
    'challenge' => 'Program needed a clearer theory of change and evidence pathway for a multi-year grant.',
    'approach' => 'Rebuilt the narrative spine, aligned outcomes to indicators, and tightened the budget logic.',
    'result' => 'Submission positioned for panel scoring with reduced compliance risk and stronger reviewer flow.',
  ],
  [
    'title' => 'Education Access Initiative',
    'sector' => 'Education',
    'challenge' => 'Competitive RFP required cross-partner roles and a unified implementation plan.',
    'approach' => 'Structured partner contributions, drafted support letters, and created a unified workplan.',
    'result' => 'Partners aligned, roles clarified, and a cohesive package delivered on deadline.',
  ],
  [
    'title' => 'Community Innovation Lab',
    'sector' => 'Civic innovation',
    'challenge' => 'Early-stage concept needed funder-ready language to test fit with donors.',
    'approach' => 'Developed a 3-page concept note, outcomes ladder, and donor-ready messaging.',
    'result' => 'Clear positioning for outreach and faster movement into full proposal stages.',
  ],
];

$faqs = [
  [
    'q' => 'What do you need from us to start?',
    'a' => 'A short call plus any existing documents (prior proposals, budgets, program notes). If you are early stage, we start with a fit and scope session to reduce risk and rework.'
  ],
  [
    'q' => 'Do you work with nonprofits only?',
    'a' => 'No - nonprofits, mission-driven startups, education programs, community initiatives, and research teams. If your work has measurable impact and a clear funding path, we can help.'
  ],
  [
    'q' => 'Can you do rush deadlines?',
    'a' => 'Sometimes. We confirm feasibility after a quick intake. If the timeline is too tight for quality, we will propose a faster alternative (concept note, partial package, or staged submission plan).'
  ],
  [
    'q' => 'Do you guarantee funding?',
    'a' => 'No one can guarantee funding. What we do guarantee is structure, clarity, compliance discipline, and a reviewer-friendly narrative so your proposal is as strong as possible.'
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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">

  <!-- Favicons -->
<?php include __DIR__ . '/partials/favicons.php'; ?>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/base.css'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/navbar.css'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/footer.css'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/services.css?v=8'), ENT_QUOTES); ?>">
</head>
<body>

<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-sv">
  <div class="gs-sv-bg" aria-hidden="true"></div>

  <!-- HERO -->
  <section class="gs-sv-hero">
    <div class="gs-container">
      <div class="gs-sv-heroGrid gs-reveal">
        <div class="gs-sv-heroCopy">
          <div class="gs-sv-pill">
            <span class="gs-sv-pill__dot"></span>
            Services
          </div>

          <h1 class="gs-sv-title">
            Built for clarity, compliance, and
            <span class="gs-sv-type" data-phrases="reviewer flow|funding clarity|proposal strength"></span>
          </h1>

          <p class="gs-sv-sub">
            We help you move from idea to funder fit to proposal to a submission-ready package with structure that reads clean and feels inevitable.
          </p>

          <div class="gs-sv-heroNote">Typical engagements run 2-8 weeks depending on scope.</div>

        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section class="gs-sv-services" id="gsServices">
    <div class="gs-container">
      <div class="gs-sv-sectionHead gs-reveal">
        <h2 class="gs-sv-h2">Services, one by one.</h2>
        <p class="gs-sv-p2">Scroll to reveal each service with scope, timeline, and typical pricing in a clean, professional format.</p>
      </div>

      <div class="gs-sv-flow">
        <?php foreach ($services as $i => $s): ?>
          <?php
            $title = htmlspecialchars($s['title']);
            $cat = htmlspecialchars($s['cat']);
            $desc = htmlspecialchars($s['desc']);
            $ideal = htmlspecialchars($s['ideal']);
            $side = ($i % 2 === 0) ? 'left' : 'right';
          ?>
          <article class="gs-sv-item gs-sv-item--<?php echo $side; ?> gs-reveal" style="transition-delay: <?php echo min($i * 60, 240); ?>ms">
            <div class="gs-sv-item__index"><?php echo str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT); ?></div>
            <div class="gs-sv-item__body">
              <div class="gs-sv-item__meta">
                <span class="gs-sv-item__cat"><?php echo $cat; ?></span>
              </div>

              <h3 class="gs-sv-item__h"><?php echo $title; ?></h3>
              <p class="gs-sv-item__p"><?php echo $desc; ?></p>

              <div class="gs-sv-item__cols">
                <div>
                  <div class="gs-sv-item__k">Deliverables</div>
                  <ul class="gs-sv-list">
                    <?php foreach ($s['deliverables'] as $b): ?>
                      <li><?php echo htmlspecialchars($b); ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div>
                  <div class="gs-sv-item__k">Best for</div>
                  <p class="gs-sv-item__p2"><?php echo $ideal; ?></p>
                </div>
              </div>

              <div class="gs-sv-item__bottom">
                <a class="gs-sv-link" href="<?php echo gs_url('contact.php'); ?>">
                  Discuss this service <span aria-hidden="true">&rarr;</span>
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="gs-sv-note gs-reveal" style="transition-delay:.08s">
        <div class="gs-sv-note__inner">
          Pricing ranges are typical. Exact scope, pacing, and fixed fees are confirmed after a short intake call and document review.
        </div>
      </div>
    </div>
  </section>

  <!-- ENGAGEMENT MODELS -->
  <section class="gs-sv-models">
    <div class="gs-container">
      <div class="gs-sv-sectionHead gs-reveal">
        <div class="gs-sv-pill">
          <span class="gs-sv-pill__dot"></span>
          Engagement models
        </div>
        <h2 class="gs-sv-h2">Choose the right level of support.</h2>
        <p class="gs-sv-p2">Start with a sprint, move into full proposal delivery, or keep us on retainer for ongoing submissions.</p>
      </div>

      <div class="gs-sv-modelGrid">
        <?php foreach ($models as $i => $m): ?>
          <?php
            $title = htmlspecialchars($m['title']);
            $desc = htmlspecialchars($m['desc']);
          ?>
          <article class="gs-sv-model gs-reveal" style="transition-delay: <?php echo min($i * 60, 240); ?>ms">
            <div class="gs-sv-model__top">
              <h3 class="gs-sv-model__h"><?php echo $title; ?></h3>
            </div>
            <p class="gs-sv-model__p"><?php echo $desc; ?></p>
            <div class="gs-sv-model__k">Typical deliverables</div>
            <ul class="gs-sv-list">
              <?php foreach ($m['deliverables'] as $b): ?>
                <li><?php echo htmlspecialchars($b); ?></li>
              <?php endforeach; ?>
            </ul>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CASE SNAPSHOTS -->
  <section class="gs-sv-cases">
    <div class="gs-container">
      <div class="gs-sv-sectionHead gs-reveal">
        <div class="gs-sv-pill">
          <span class="gs-sv-pill__dot"></span>
          Case snapshots
        </div>
        <h2 class="gs-sv-h2">Anonymized examples of how we work.</h2>
        <p class="gs-sv-p2">Representative snapshots that show the type of challenges we solve and the clarity we deliver.</p>
      </div>

      <div class="gs-sv-caseGrid">
        <?php foreach ($cases as $i => $c): ?>
          <?php
            $title = htmlspecialchars($c['title']);
            $sector = htmlspecialchars($c['sector']);
            $challenge = htmlspecialchars($c['challenge']);
            $approach = htmlspecialchars($c['approach']);
            $result = htmlspecialchars($c['result']);
          ?>
          <article class="gs-sv-case gs-reveal" style="transition-delay: <?php echo min($i * 60, 240); ?>ms">
            <div class="gs-sv-case__head">
              <div class="gs-sv-case__title"><?php echo $title; ?></div>
              <div class="gs-sv-case__sector"><?php echo $sector; ?></div>
            </div>
            <div class="gs-sv-case__row">
              <div class="gs-sv-case__label">Challenge</div>
              <div class="gs-sv-case__text"><?php echo $challenge; ?></div>
            </div>
            <div class="gs-sv-case__row">
              <div class="gs-sv-case__label">Approach</div>
              <div class="gs-sv-case__text"><?php echo $approach; ?></div>
            </div>
            <div class="gs-sv-case__row">
              <div class="gs-sv-case__label">Outcome</div>
              <div class="gs-sv-case__text"><?php echo $result; ?></div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="gs-sv-note gs-reveal" style="transition-delay:.08s">
        <div class="gs-sv-note__inner">
          Case snapshots are anonymized and representative of common engagements.
        </div>
      </div>
    </div>
  </section>

  <!-- PROCESS -->
  <section class="gs-sv-process">
    <div class="gs-container">
      <div class="gs-sv-sectionHead gs-reveal">
        <div class="gs-sv-pill">
          <span class="gs-sv-pill__dot"></span>
          How we work
        </div>
        <h2 class="gs-sv-h2">A clean, repeatable system.</h2>
        <p class="gs-sv-p2">Designed to reduce rework and keep reviewers oriented from start to finish.</p>
      </div>

      <div class="gs-sv-steps">
        <div class="gs-sv-step gs-reveal" style="transition-delay:.06s">
          <div class="gs-sv-step__n">01</div>
          <div class="gs-sv-step__t">Fit + scope</div>
          <div class="gs-sv-step__d">Confirm eligibility, priorities, and the winnable angle. Define what complete means.</div>
        </div>
        <div class="gs-sv-step gs-reveal" style="transition-delay:.12s">
          <div class="gs-sv-step__n">02</div>
          <div class="gs-sv-step__t">Structure</div>
          <div class="gs-sv-step__d">Build the narrative spine, outline, and evidence plan so the proposal reads effortlessly.</div>
        </div>
        <div class="gs-sv-step gs-reveal" style="transition-delay:.18s">
          <div class="gs-sv-step__n">03</div>
          <div class="gs-sv-step__t">Draft + refine</div>
          <div class="gs-sv-step__d">Write with clarity, polish for reviewer flow, and align every section to scoring criteria.</div>
        </div>
        <div class="gs-sv-step gs-reveal" style="transition-delay:.24s">
          <div class="gs-sv-step__n">04</div>
          <div class="gs-sv-step__t">QA + ready</div>
          <div class="gs-sv-step__d">Compliance check, file and format readiness, and final packaging for clean submission.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="gs-sv-faq">
    <div class="gs-container">
      <div class="gs-sv-sectionHead gs-reveal">
        <div class="gs-sv-pill">
          <span class="gs-sv-pill__dot"></span>
          FAQ
        </div>
        <h2 class="gs-sv-h2">Answers, without the fluff.</h2>
        <p class="gs-sv-p2">Click a question to expand. Smooth, accessible accordion.</p>
      </div>

      <div class="gs-sv-acc" id="gsSvAcc">
        <?php foreach ($faqs as $idx => $f): ?>
          <div class="gs-sv-qa gs-reveal" style="transition-delay: <?php echo min($idx * 60, 240); ?>ms">
            <button class="gs-sv-q" type="button" aria-expanded="false">
              <span><?php echo htmlspecialchars($f['q']); ?></span>
              <span class="gs-sv-q__ico" aria-hidden="true">+</span>
            </button>
            <div class="gs-sv-a" hidden>
              <div class="gs-sv-a__inner">
                <?php echo htmlspecialchars($f['a']); ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="gs-sv-cta gs-reveal" style="transition-delay:.12s">
        <div class="gs-sv-cta__glass">
          <div class="gs-sv-cta__h">Ready to build a submission-ready package?</div>
          <div class="gs-sv-cta__p">Tell us your goal, deadline, and funder type and we will respond with the cleanest next step.</div>
          <a class="gs-sv-btn gs-sv-btn--primary" href="<?php echo gs_url('contact.php'); ?>">
            Contact us <span aria-hidden="true">&rarr;</span>
          </a>
        </div>
      </div>

    </div>
  </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=10'), ENT_QUOTES); ?>"></script>
<script src="<?php echo htmlspecialchars(gs_url('assets/js/pages/services.js?v=10'), ENT_QUOTES); ?>"></script>
</body>
</html>
