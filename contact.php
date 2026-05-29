<?php
// contact.php
require_once __DIR__ . '/config/config.php';

if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));

$pageTitle = "Contact - " . (defined('SITE_NAME') ? SITE_NAME : 'The Grant Ship');
$pageDesc = "Contact The Grant Ship - grant strategy, proposal development, and funding navigation. Send a message and we will respond soon.";

$primaryEmail = (defined('SITE_EMAIL') && SITE_EMAIL) ? SITE_EMAIL : 'info@thegrantship.com';
$emails = array_values(array_unique([$primaryEmail, 'info@thegrantship.com']));
$generalEmail = $emails[0] ?? 'info@thegrantship.com';
$founderEmail = $emails[1] ?? 'info@thegrantship.com';
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
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Favicons -->
<?php include __DIR__ . '/partials/favicons.php'; ?>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/base.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/navbar.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/footer.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/contact.css?v=3'), ENT_QUOTES); ?>">
</head>

<body class="gs-page gs-page--contact">

<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-ct">
  <section class="gs-ct__hero gs-container">
    <div class="gs-ct__heroCopy gs-reveal">
      <div class="gs-ct__pill">
        <span class="gs-ct__pillDot" aria-hidden="true"></span>
        Contact
      </div>
      <h1 class="gs-ct__title">
        Let's talk <span class="gs-ct__type" data-phrases="funding|strategy|proposals|impact"></span>
      </h1>
      <p class="gs-ct__sub">
        Share your goals and timeline. We will respond with clear next steps and a practical plan.
      </p>

      <div class="gs-ct__heroActions">
        <a class="gs-ct__btn" href="mailto:<?php echo htmlspecialchars($generalEmail, ENT_QUOTES); ?>">
          Email us
        </a>
      </div>

      <div class="gs-ct__heroNote">Typical response within 24-48 hours.</div>
    </div>

  </section>

  <section class="gs-ct__main gs-container">
    <aside class="gs-ct__side">
      <div class="gs-ct__card gs-reveal">
        <h3 class="gs-ct__cardTitle">Contact details</h3>
        <div class="gs-ct__detail">
          <span class="gs-ct__detailIcon" aria-hidden="true">E</span>
          <div class="gs-ct__detailBody">
            <span class="gs-ct__detailLabel">General inquiries</span>
            <a class="gs-ct__detailValue" href="mailto:<?php echo htmlspecialchars($generalEmail, ENT_QUOTES); ?>">
              <?php echo htmlspecialchars($generalEmail); ?>
            </a>
          </div>
        </div>
        <?php if (!empty($founderEmail)): ?>
          <div class="gs-ct__detail">
            <span class="gs-ct__detailIcon" aria-hidden="true">F</span>
            <div class="gs-ct__detailBody">
              <span class="gs-ct__detailLabel">Founder &amp; CEO</span>
              <a class="gs-ct__detailValue" href="mailto:<?php echo htmlspecialchars($founderEmail, ENT_QUOTES); ?>">
                <?php echo htmlspecialchars($founderEmail); ?>
              </a>
            </div>
          </div>
        <?php endif; ?>
        <div class="gs-ct__detail">
          <span class="gs-ct__detailIcon" aria-hidden="true">IN</span>
          <div class="gs-ct__detailBody">
            <span class="gs-ct__detailLabel">LinkedIn</span>
            <a class="gs-ct__detailValue" href="https://www.linkedin.com/company/thegrantship/" target="_blank" rel="noopener" aria-label="Open LinkedIn">
              Message us
            </a>
          </div>
        </div>
      </div>

      <div class="gs-ct__card gs-reveal">
        <h3 class="gs-ct__cardTitle">What to include</h3>
        <ul class="gs-ct__list">
          <li>Your organization and mission</li>
          <li>Funding target or grant opportunity</li>
          <li>Timeline and any deadlines</li>
        </ul>
      </div>

    </aside>

    <section class="gs-ct__formWrap">
      <div class="gs-ct__formCard gs-reveal">
        <div class="gs-ct__formHead">
          <h2 class="gs-ct__formTitle">Send a message</h2>
          <p class="gs-ct__formSub">We will reply with next steps and a clear path forward.</p>
        </div>

        <form class="gs-ct__form" id="gsContactForm" method="post" action="<?php echo gs_url('contact_submit.php'); ?>" novalidate>
          <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf']); ?>">
          <input class="gs-ct__hp" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">

          <div class="gs-ct__row">
            <label class="gs-ct__field">
              <span class="gs-ct__label">Full name</span>
              <input class="gs-ct__input" type="text" name="name" placeholder="Your name" required minlength="2">
            </label>

            <label class="gs-ct__field">
              <span class="gs-ct__label">Email</span>
              <input class="gs-ct__input" type="email" name="email" placeholder="you@company.com" required>
            </label>
          </div>

          <div class="gs-ct__row">
            <label class="gs-ct__field">
              <span class="gs-ct__label">Organization (optional)</span>
              <input class="gs-ct__input" type="text" name="org" placeholder="Nonprofit, startup, agency">
            </label>

            <label class="gs-ct__field">
              <span class="gs-ct__label" id="gsTopicLabel">What can we help with?</span>
              <div class="gs-ct__selectWrap" data-select>
                <input type="hidden" name="topic" id="gsTopicInput" value="">
                <button class="gs-ct__selectButton" type="button" id="gsTopicButton" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="gsTopicLabel gsTopicButton">
                  <span class="gs-ct__selectText" data-select-text>Select a topic</span>
                  <span class="gs-ct__selectIcon" aria-hidden="true"></span>
                </button>
                <div class="gs-ct__selectMenu" role="listbox" hidden>
                  <button class="gs-ct__selectOption" type="button" role="option" data-value="Grant strategy">Grant strategy</button>
                  <button class="gs-ct__selectOption" type="button" role="option" data-value="Proposal writing">Proposal writing</button>
                  <button class="gs-ct__selectOption" type="button" role="option" data-value="Budget & compliance">Budget & compliance</button>
                  <button class="gs-ct__selectOption" type="button" role="option" data-value="Funding research">Funding research</button>
                  <button class="gs-ct__selectOption" type="button" role="option" data-value="Other">Other</button>
                </div>
                <div class="gs-ct__fieldError" data-select-error hidden>Please select a topic.</div>
              </div>
            </label>
          </div>

          <label class="gs-ct__field">
            <span class="gs-ct__label">Message</span>
            <textarea class="gs-ct__input gs-ct__textarea" name="message" placeholder="Share your goal, deadline, and context" required minlength="10"></textarea>
          </label>

          <div class="gs-ct__formActions">
            <button class="gs-ct__submit" type="submit" id="gsContactSubmit">
              <span class="gs-ct__submitText">Send message</span>
              <span class="gs-ct__spinner" aria-hidden="true"></span>
            </button>

            <p class="gs-ct__fineprint">
              By submitting, you agree we can reply to your message by email.
            </p>
          </div>

          <div class="gs-ct__status" id="gsContactStatus" role="status" aria-live="polite"></div>
        </form>
      </div>

    </section>
  </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=1'), ENT_QUOTES); ?>" defer></script>
<script src="<?php echo htmlspecialchars(gs_url('assets/js/pages/contact.js?v=2'), ENT_QUOTES); ?>" defer></script>
</body>
</html>
