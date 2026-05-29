<?php // partials/footer.php ?>
<?php
require_once __DIR__ . '/../config/config.php';
?>

<footer class="gs-ft" aria-labelledby="gs-footer-title">
  <div class="gs-container gs-ft__box">

    <!-- ROW 1 -->
    <div class="gs-ft__row gs-ft__row1">
      <div class="gs-footer__brand">
        <img
          src="<?php echo gs_url('assets/img/logofinal8.png'); ?>"
          alt="The Grant Ship logo"
          class="gs-footer__logo"
          loading="lazy"
          decoding="async"
        />
      </div>
    </div>

    <!-- ROW 2 -->
    <div class="gs-ft__row gs-ft__row2">
      <div class="gs-ft__col">
        <h4 class="gs-ft__headline">Explore</h4>
        <nav class="gs-ft__linkGrid" aria-label="Explore">
          <a class="gs-ft__link" href="<?php echo gs_url('services.php'); ?>">Services</a>
          <a class="gs-ft__link" href="<?php echo gs_url('portfolio.php'); ?>">Portfolio</a>
          <a class="gs-ft__link" href="<?php echo gs_url('resources.php'); ?>">Resources</a>
          <a class="gs-ft__link" href="<?php echo gs_url('blog.php'); ?>">Blog</a>
        </nav>
      </div>

      <div class="gs-ft__col">
        <h4 class="gs-ft__headline">Company</h4>
        <nav class="gs-ft__linkGrid" aria-label="Company">
          <a class="gs-ft__link" href="<?php echo gs_url('about.php'); ?>">About</a>
          <a class="gs-ft__link" href="<?php echo gs_url('faq.php'); ?>">FAQ</a>
          <a class="gs-ft__link" href="<?php echo gs_url('contact.php'); ?>">Contact</a>
        </nav>
      </div>

      <div class="gs-ft__col gs-ft__col--contact">
        <h4 class="gs-ft__headline">Connect</h4>
       
        <a class="gs-ft__email" href="mailto:<?php echo htmlspecialchars(SITE_EMAIL); ?>">
          <?php echo htmlspecialchars(SITE_EMAIL); ?>
        </a>
        <div class="gs-ft__pillRow">
          <a class="gs-ft__pill" href="https://www.linkedin.com/company/thegrantship" aria-label="LinkedIn">LinkedIn</a>
          <a class="gs-ft__pill" href="mailto:<?php echo htmlspecialchars(SITE_EMAIL); ?>" aria-label="Email">Email</a>
        </div>
      </div>
    </div>

    <!-- ROW 3 -->
    <div class="gs-ft__row gs-ft__row3">
      <div class="gs-ft__meta">
        <a class="gs-ft__metaLink" href="<?php echo gs_url('privacy-policy.php'); ?>">Privacy</a>
        <span class="gs-ft__sep">&bull;</span>
        <a class="gs-ft__metaLink" href="<?php echo gs_url('terms.php'); ?>">Terms</a>
        <span class="gs-ft__sep">&bull;</span>
        <span class="gs-ft__copy">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars(SITE_NAME); ?></span>
      </div>
    </div>

    <!-- ROW 4: Newsletter -->
    <div class="gs-ft__row gs-ft__row4">
      <div class="gs-ft__newsletter">
        <div class="gs-ft__nlText">
          <h4 class="gs-ft__nlTitle">Get grant insights in your inbox</h4>
          <p class="gs-ft__nlDesc">Monthly notes, templates, and funding strategy&#8212;no spam.</p>
        </div>

        <form class="gs-ft__nlForm" action="<?php echo gs_url('newsletter_submit.php'); ?>" method="POST" novalidate>
          <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($_SESSION['csrf'] ?? '', ENT_QUOTES); ?>">
          <input type="text" name="website" class="gs-ft__hp" tabindex="-1" autocomplete="off" aria-hidden="true">
          <label class="gs-srOnly" for="nl_email">Email</label>
          <div class="gs-ft__nlField">
            <input
              id="nl_email"
              class="gs-ft__nlInput"
              type="email"
              name="email"
              placeholder="Email address"
              autocomplete="email"
              inputmode="email"
              required
            >
            <button class="gs-ft__nlBtn" type="submit">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</footer>
