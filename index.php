<?php
// index.php
require_once __DIR__ . '/config/config.php';
if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));

/**
 * HERO MEDIA OPTIONS
 * - Default: video
 * - Optional override:
 *     index.php?hero=image
 *     index.php?hero=video
 */
$hero = 'video';
if (isset($_GET['hero'])) {
  $q = strtolower(trim($_GET['hero']));
  if ($q === 'image' || $q === 'video') $hero = $q;
}

$heroVideo = 'assets/video/hero.mp4';
$heroPoster = 'assets/img/hero22.png';
$heroPosterFallback = 'assets/img/hero22.png';

if (!file_exists(__DIR__ . '/' . $heroPoster)) {
  $heroPoster = $heroPosterFallback;
}
if (!file_exists(__DIR__ . '/' . $heroVideo)) {
  $hero = 'image';
}

$pageTitle = SITE_NAME . ' - Strategic Grant Consulting';
$pageDesc = SITE_NAME . ' supports nonprofits and mission-driven organizations with grant strategy, research, proposal writing, budgeting, and compliance-ready submissions.';
$pageImage = 'assets/img/og-default.png';
$pageType = 'website';
$pageCanonical = 'https://thegrantship.com/';
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

  <script type="application/ld+json">
    <?php
      $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [
          [
            '@type' => 'Question',
            'name' => 'How long does a typical project take?',
            'acceptedAnswer' => [
              '@type' => 'Answer',
              'text' => 'Most proposals take 4-8 weeks from kickoff to submission. We can move faster for tight deadlines.'
            ]
          ],
          [
            '@type' => 'Question',
            'name' => 'What is your pricing model?',
            'acceptedAnswer' => [
              '@type' => 'Answer',
              'text' => 'We scope based on funder type, complexity, and timeline. We will share a clear range after a short call.'
            ]
          ],
          [
            '@type' => 'Question',
            'name' => 'Do you work with international teams?',
            'acceptedAnswer' => [
              '@type' => 'Answer',
              'text' => 'Yes - nonprofits, NGOs, and research groups worldwide targeting US and global funders.'
            ]
          ]
        ]
      ];
      echo json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    ?>
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">

  <!-- Favicons -->
<?php include __DIR__ . '/partials/favicons.php'; ?>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/base.css'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/navbar.css'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/footer.css'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/index.css?v=45'), ENT_QUOTES); ?>">
</head>

<!-- IMPORTANT: start in loading mode so navbar can expand after hero text -->
<body class="gs-home is-loading">
<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-hm" data-hero-default="<?php echo htmlspecialchars($hero, ENT_QUOTES); ?>">

  <!-- Site-consistent background -->
  <div class="gs-hm-bg" aria-hidden="true">
    <div class="gs-hm-bg__grid"></div>
    <div class="gs-hm-bg__glow"></div>
  </div>

  <!-- HERO -->
  <header class="gs-hm-hero" id="top">
    <div class="gs-hm-hero__media" aria-hidden="true">
      <!-- Optional Video (kept but commented) -->
      <!--
      <video
        class="gs-hm-hero__video"
        id="gsHeroVideo"
        playsinline
        muted
        loop
        preload="metadata"
        poster="<?php echo htmlspecialchars($heroPoster, ENT_QUOTES); ?>"
      >
        <source src="<?php echo htmlspecialchars($heroVideo, ENT_QUOTES); ?>" type="video/mp4" />
      </video>
      -->

      <div
        class="gs-hm-hero__image"
        id="gsHeroImage"
        role="img"
        aria-label="Hero background image"
        style="background-image:url('<?php echo htmlspecialchars($heroPoster, ENT_QUOTES); ?>')"
      ></div>

      <div class="gs-hm-hero__overlay"></div>
      <div class="gs-hm-hero__grain"></div>
      <div class="gs-hm-hero__sheen"></div>
      <div class="gs-hm-hero__fade"></div>
    </div>

    <div class="gs-container">
      <div class="gs-hm-heroStage gs-reveal">

        <!-- Pills row -->
        <div class="gs-hm-heroPills" aria-hidden="false">
          <div class="gs-hm-heroPills__stack">
            <span class="gs-hm-heroPill">
              <span class="gs-hm-heroPill__dot" aria-hidden="true"></span>
              Welcome Aboard!
            </span>
          </div>
        </div>

        <!-- Title (UPDATED for animation sequencing) -->
        <h1 class="gs-hm-heroTitle" aria-label="Your Mission, Funded.">
          <span class="gs-hm-heroTitleLine gs-hm-heroTitleLine--a">Your Mission,</span><br>
          <span class="gs-hm-heroTitleLine gs-hm-heroTitleLine--b">
            <span class="gs-hm-heroTitle__accent">Funded.</span>
          </span>
        </h1>

        <!-- Subtitle -->
        <p class="gs-hm-heroSub">
          Helping Non-Profits And Researchers Secure The Funding<br>
          They Need To Make An Impact.
        </p>

        <!-- Buttons -->
        <div class="gs-hm-heroBtns">
          <a class="gs-hm-heroBtn gs-hm-heroBtn--primary" href="<?php echo gs_url('contact.php'); ?>">
            Start a Project
          </a>
          <a class="gs-hm-heroBtn" href="<?php echo gs_url('services.php'); ?>">
            View Services
          </a>
        </div>

        <div class="gs-hm-heroCards" aria-label="Highlights">
          <!-- Stats -->
          <div class="gs-hm-heroStat" aria-label="Impact metric">
            <div class="gs-hm-heroStat__stars" aria-hidden="true">
              <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
            <div class="gs-hm-heroStat__value">$5M+</div>
            <div class="gs-hm-heroStat__label">Secured</div>
          </div>

          <!-- Quote -->
          <div class="gs-hm-heroQuote" aria-label="Message">
            <div class="gs-hm-heroQuote__mark" aria-hidden="true">“</div>
            <p class="gs-hm-heroQuote__text">
              My goal is to handle the weight of the proposal<br>
              so you can focus on the heart of the work.
            </p>
          </div>
        </div>

      </div>
    </div>
  </header>
  <!-- JOURNEY WRAP -->
  <section class="gs-hm-journey" id="journey">
    <div class="gs-container">
      <div class="gs-hm-journeyGrid">
        <div class="gs-hm-journeyBody">
          <!-- SECTION: Cinematic -->
          <section class="gs-hm-sec gs-hm-sec--cinematic" id="moment">
            <div class="gs-hm-cine">
              <p class="gs-hm-cine__eyebrow gs-reveal gs-words" data-reveal="words">The Moment</p>
              <h2 class="gs-hm-cine__title gs-typewrite gs-reveal" data-typewriter data-typewriter-speed="22" data-typewriter-jitter="10">
                When the stakes are high,<br>
                the story must feel inevitable.
              </h2>
              <p class="gs-hm-cine__copy gs-reveal gs-ink">
                We translate complex missions into reviewer-ready proposals - clear, credible, and hard to ignore.
              </p>
            </div>
          </section>

          <!-- SECTION: Story -->
          <section class="gs-hm-sec gs-hm-sec--story" id="story">
            <div class="gs-hm-story">
              <div class="gs-hm-story__text">
                <p class="gs-hm-pill gs-reveal"><span class="gs-hm-pill__dot" aria-hidden="true"></span>The Weight</p>
                <h2 class="gs-hm-h2 gs-reveal gs-lines" data-reveal="lines">
                  Grant deadlines are heavy<br>
                  when you carry everything alone.
                </h2>
                <p class="gs-hm-lede gs-reveal gs-words" data-reveal="words">
                  Most teams juggle research, writing, budgets, compliance, and stakeholder input while still running the work.
                  That pressure makes even strong missions sound uncertain on paper.
                </p>
                <p class="gs-hm-body gs-reveal gs-ink">
                  We step in as a structured partner. We shape the scope, build a reviewer-friendly narrative, and align the budget
                  so your proposal reads like an executable plan - calm, clear, and ready to score well.
                </p>
              </div>

              <figure class="gs-hm-story__media gs-reveal" aria-label="Grant planning">
                <img src="<?php echo gs_url('assets/img/featured.webp'); ?>" alt="Planning a grant strategy" loading="lazy">
                <figcaption class="gs-hm-story__cap">Strategy -> Structure -> Submission</figcaption>
              </figure>
            </div>
          </section>

          <!-- SECTION: The Shift -->
          <section class="gs-hm-sec gs-hm-sec--shift" id="shift">
            <div class="gs-hm-shift">
              <div class="gs-hm-shift__text">
                <p class="gs-hm-pill gs-reveal">
                  <span class="gs-hm-pill__dot" aria-hidden="true"></span>
                  The Shift
                </p>
                <h2 class="gs-hm-h2 gs-reveal">The proposal stops feeling heavy when the story <span class="gs-gradText">clicks</span>.</h2>
                <p class="gs-hm-lede gs-reveal gs-ink">
                  We replace scramble with structure. Your mission becomes a clear arc: need, plan, outcomes, and proof.
                </p>
                <div class="gs-hm-shift__list">
                  <div class="gs-hm-shift__item gs-reveal gs-ink">
                    <h3>Clarity first</h3>
                    <p>Define funder fit and outcomes early so the narrative moves with purpose.</p>
                  </div>
                  <div class="gs-hm-shift__item gs-reveal gs-ink">
                    <h3>Structure reviewers follow</h3>
                    <p>Every section connects: problem, plan, budget, and evaluation align line by line.</p>
                  </div>
                  <div class="gs-hm-shift__item gs-reveal gs-ink">
                    <h3>Submission-ready confidence</h3>
                    <p>Polished writing, clean formatting, and compliance checks handled end to end.</p>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- SECTION: Path -->
          <section class="gs-hm-sec gs-hm-sec--path" id="path">
            <div class="gs-hm-path">
              <div class="gs-hm-path__intro">
                <p class="gs-hm-pill gs-reveal">
                  <span class="gs-hm-pill__dot" aria-hidden="true"></span>
                  The Path
                </p>
                <h2 class="gs-hm-h2 gs-reveal gs-lines" data-reveal="lines">
                  A calm, credible path<br>
                  from idea to submission
                </h2>
                <p class="gs-hm-body gs-reveal gs-ink">
                  We pace the work around your deadline, so every milestone feels clear, realistic, and review-ready.
                </p>
                <div class="gs-hm-path__steps">
                  <div class="gs-hm-path__step gs-reveal">
                    <div class="gs-hm-path__n">01</div>
                    <div>
                      <h3>Discovery</h3>
                      <p>Fit, scope, deadlines, and the story reviewers need to see.</p>
                    </div>
                  </div>
                  <div class="gs-hm-path__step gs-reveal">
                    <div class="gs-hm-path__n">02</div>
                    <div>
                      <h3>Build</h3>
                      <p>Narrative, workplan, and budget develop together so nothing conflicts.</p>
                    </div>
                  </div>
                  <div class="gs-hm-path__step gs-reveal">
                    <div class="gs-hm-path__n">03</div>
                    <div>
                      <h3>Submission-ready</h3>
                      <p>QA, formatting, and final polish - ready to send with confidence.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- SECTION: Services + Deliverables -->
          <section class="gs-hm-sec gs-hm-sec--servicesDeliver" id="services">
            <div class="gs-hm-sd">
              <header class="gs-hm-sd__head">
                <p class="gs-hm-pill gs-reveal">
                  <span class="gs-hm-pill__dot" aria-hidden="true"></span>
                  Services + Deliverables
                </p>
                <h2 class="gs-hm-h2 gs-reveal">
                  One clear system that turns vision into <span class="gs-gradText gs-gradText--gold">funding</span>
                </h2>
                <p class="gs-hm-lede gs-reveal gs-ink">
                  Strategic support and submission-ready outputs in a single flow - built for reviewer confidence.
                </p>
              </header>

              <div class="gs-hm-sd__highlights">
                <article class="gs-hm-sd__highlight gs-reveal">
                  <h3>Grant strategy & fit</h3>
                  <p>Opportunity alignment, competitiveness, and a scope that reads as winnable.</p>
                  <span class="gs-hm-sd__meta">Funder fit - Positioning - Scope mapping</span>
                </article>
                <article class="gs-hm-sd__highlight gs-reveal">
                  <h3>Proposal narrative</h3>
                  <p>Clear, reviewer-friendly writing with strong flow and evidence.</p>
                  <span class="gs-hm-sd__meta">Storyline - Outcomes - Compliance</span>
                </article>
                <article class="gs-hm-sd__highlight gs-reveal">
                  <h3>Budget & justification</h3>
                  <p>Budgets that match the narrative and survive compliance review.</p>
                  <span class="gs-hm-sd__meta">Cost logic - Narrative alignment - Review readiness</span>
                </article>
              </div>

              <div class="gs-hm-sd__grid">
                <div class="gs-hm-sd__col">
                  <div class="gs-hm-sd__item gs-reveal">
                    <h4>Grant research & funder fit</h4>
                    <p>Prospecting, eligibility checks, and alignment scoring to target the right calls.</p>
                  </div>
                  <div class="gs-hm-sd__item gs-reveal">
                    <h4>RFP analysis & project scoping</h4>
                    <p>We decode requirements and shape a scope that reads as fundable and feasible.</p>
                  </div>
                  <div class="gs-hm-sd__item gs-reveal">
                    <h4>Logic model & outcomes</h4>
                    <p>Clear objectives, activities, and metrics reviewers can follow at a glance.</p>
                  </div>
                </div>
                <div class="gs-hm-sd__col">
                  <div class="gs-hm-sd__item gs-reveal">
                    <h4>Proposal writing & narrative</h4>
                    <p>Structured storytelling, evidence, and impact messaging tailored to the funder.</p>
                  </div>
                  <div class="gs-hm-sd__item gs-reveal">
                    <h4>Budget & justification</h4>
                    <p>Budget logic that matches the narrative and meets compliance expectations.</p>
                  </div>
                  <div class="gs-hm-sd__item gs-reveal">
                    <h4>Compliance review & submission</h4>
                    <p>Formatting, attachments, and final QA so your package is submission-ready.</p>
                  </div>
                </div>
              </div>

              <div class="gs-hm-sd__cta gs-reveal">
                <a class="gs-hm-heroBtn gs-hm-heroBtn--secondary" href="<?php echo gs_url('services.php'); ?>">
                  View All Services
                </a>
              </div>
            </div>
          </section>

          <!-- SECTION: Proof -->
          <section class="gs-hm-sec gs-hm-sec--proof" id="proof">
            <header class="gs-hm-secHead gs-hm-proofHead">
              <p class="gs-hm-pill gs-reveal">
                <span class="gs-hm-pill__dot" aria-hidden="true"></span>
                Proof
              </p>
              <h2 class="gs-hm-h2 gs-reveal">Proof in outcomes and <span class="gs-gradText">voices</span></h2>
              <p class="gs-hm-lede gs-reveal gs-ink">Results that read clearly on paper and feel real in practice.</p>
            </header>

            <div class="gs-hm-proofGrid">
              <div class="gs-hm-proofCol">
                <div class="gs-hm-proof__stats">
                  <div class="gs-hm-proof__stat gs-reveal">
                    <div class="gs-hm-proof__value" data-count="5" data-prefix="$" data-suffix="M+">$5M+</div>
                    <div class="gs-hm-proof__label">Funding secured for clients</div>
                    <div class="gs-hm-proof__note">Across nonprofits and mission-led teams.</div>
                  </div>
                  <!-- <div class="gs-hm-proof__stat gs-reveal">
                    <div class="gs-hm-proof__value" data-count="87" data-suffix="%">87%</div>
                    <div class="gs-hm-proof__label">Proposal success rate</div>
                    <div class="gs-hm-proof__note">Competitive programs and foundations.</div>
                  </div> -->
                  
                </div>
                <ul class="gs-hm-proof__outcomes gs-reveal gs-ink">
                  <li>Compliance-ready packages with aligned budgets.</li>
                  <li>Clear logic models, outcomes, and evaluation plans.</li>
                  <li>Reviewer-friendly narratives that score well.</li>
                </ul>
              </div>

              <div class="gs-hm-proofCol gs-hm-proofCol--quotes">
                <blockquote class="gs-hm-proof__quoteCard gs-quoteDraw gs-reveal">
                  "They took the weight off our shoulders. The proposal was clear, professional, and helped us secure funding we did not think was possible."
                  <span class="gs-hm-proof__meta">- Sarah M., Executive Director</span>
                </blockquote>
                <blockquote class="gs-hm-proof__quoteCard gs-reveal">
                  "Their structure made the story undeniable. We submitted on time with confidence."
                  <span class="gs-hm-proof__meta">- Daniel R., Program Lead</span>
                </blockquote>
                <blockquote class="gs-hm-proof__quoteCard gs-reveal">
                  "Budget and narrative finally matched. Reviewers said it was one of the clearest proposals they had seen."
                  <span class="gs-hm-proof__meta">- Priya S., Research Director</span>
                </blockquote>
              </div>
            </div>
          </section>

          <!-- SECTION: FAQ -->
          <section class="gs-hm-sec gs-hm-sec--faq" id="faq">
            <header class="gs-hm-secHead">
              <p class="gs-hm-pill gs-reveal">
                <span class="gs-hm-pill__dot" aria-hidden="true"></span>
                FAQ
              </p>
              <h2 class="gs-hm-h2 gs-reveal">Quick answers, <span class="gs-gradText">zero noise</span></h2>
              <p class="gs-hm-lede gs-reveal gs-ink">A few common questions before you reach out.</p>
            </header>
            <div class="gs-hm-faqList gs-reveal gs-ink">
              <div class="gs-hm-faqRow">
                <div class="gs-hm-faqQ">How long does a typical project take?</div>
                <div class="gs-hm-faqA">Most proposals take 4-8 weeks from kickoff to submission. We can move faster for tight deadlines.</div>
              </div>
              <div class="gs-hm-faqRow">
                <div class="gs-hm-faqQ">What is your pricing model?</div>
                <div class="gs-hm-faqA">We scope based on funder type, complexity, and timeline. We will share a clear range after a short call.</div>
              </div>
              <div class="gs-hm-faqRow">
                <div class="gs-hm-faqQ">Do you work with international teams?</div>
                <div class="gs-hm-faqA">Yes - nonprofits, NGOs, and research groups worldwide targeting US and global funders.</div>
              </div>
            </div>
          </section>

          <!-- SECTION: Compact Contact -->
          <section class="gs-hm-sec gs-hm-sec--contact" id="contact">
            <div class="gs-hm-contactCard gs-reveal">
              <div class="gs-hm-contactCopy">
                <p class="gs-hm-pill">
                  <span class="gs-hm-pill__dot" aria-hidden="true"></span>
                  Contact
                </p>
                <h2 class="gs-hm-contactTitle">Send a <span class="gs-gradText gs-gradText--cool">quick message</span></h2>
                <p class="gs-hm-contactSub">
                  Short and simple. Tell us what you need and we will respond with a clear next step.
                </p>
                <div class="gs-hm-contactMeta">
                  <a class="gs-hm-contactEmail" href="mailto:info@thegrantship.com">info@thegrantship.com</a>
                  <span class="gs-hm-contactNote">Typical response: 24-48 hours</span>
                </div>
              </div>

              <form class="gs-hm-contactForm" id="gsHomeContactForm" method="post" action="<?php echo gs_url('contact_submit.php'); ?>" novalidate>
                <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf'], ENT_QUOTES); ?>">
                <input type="hidden" name="need" value="Homepage contact">
                <input class="gs-hm-hp" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">

                <label class="gs-hm-field">
                  <span class="gs-hm-label">Full name</span>
                  <input class="gs-hm-input" type="text" name="name" placeholder="Your name" required minlength="2">
                </label>

                <label class="gs-hm-field">
                  <span class="gs-hm-label">Email</span>
                  <input class="gs-hm-input" type="email" name="email" placeholder="you@company.com" required>
                </label>

                <label class="gs-hm-field">
                  <span class="gs-hm-label">Message</span>
                  <textarea class="gs-hm-input gs-hm-textarea" name="message" placeholder="Share a quick summary..." required minlength="10"></textarea>
                </label>

                <div class="gs-hm-contactActions">
                  <button class="gs-hm-contactBtn" type="submit" id="gsHomeContactSubmit">
                    <span class="gs-hm-contactBtnText">Send message</span>
                    <span class="gs-hm-contactSpinner" aria-hidden="true"></span>
                  </button>
                  <p class="gs-hm-contactFineprint">By submitting, you agree we can reply by email.</p>
                </div>

                <div class="gs-hm-contactStatus" id="gsHomeContactStatus" role="status" aria-live="polite"></div>
              </form>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=10'), ENT_QUOTES); ?>"></script>
<script src="<?php echo htmlspecialchars(gs_url('assets/js/pages/index.js?v=35'), ENT_QUOTES); ?>" defer></script>
</body>
</html>

