<?php // partials/navbar.php ?>

<?php
require_once __DIR__ . '/../config/config.php';

// Current route filename (handles query strings safely, e.g., /about.php?x=1)
$path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
$currentPage = basename($path ?: ($_SERVER['PHP_SELF'] ?? 'index.php'));

// Helpers (guarded to avoid redeclare errors if included multiple times)
if (!function_exists('gs_active')) {
  function gs_active(string $file, string $currentPage): string {
    return ($currentPage === $file) ? ' is-active' : '';
  }
}

if (!function_exists('gs_aria_current')) {
  function gs_aria_current(string $file, string $currentPage): string {
    return ($currentPage === $file) ? ' aria-current="page"' : '';
  }
}
?>

<header class="gs-nav" id="gsNav">

  <div class="gs-nav__inner">

    <a class="gs-nav__brand" href="<?php echo gs_url('index.php'); ?>" aria-label="Go to homepage">
<img class="gs-nav__logo" src="<?php echo gs_url('assets/img/logofinal8.png'); ?>" alt="The Grant Ship logo">
    </a>

    <!-- Desktop links -->
    <nav class="gs-nav__links" aria-label="Primary navigation">

      <a class="gs-nav__link<?php echo gs_active('index.php', $currentPage); ?>"
         <?php echo gs_aria_current('index.php', $currentPage); ?>
         href="<?php echo gs_url('index.php'); ?>">Home</a>

      <a class="gs-nav__link<?php echo gs_active('services.php', $currentPage); ?>"
         <?php echo gs_aria_current('services.php', $currentPage); ?>
         href="<?php echo gs_url('services.php'); ?>">Services</a>

      <a class="gs-nav__link<?php echo gs_active('portfolio.php', $currentPage); ?>"
         <?php echo gs_aria_current('portfolio.php', $currentPage); ?>
         href="<?php echo gs_url('portfolio.php'); ?>">Portfolio</a>

      <a class="gs-nav__link<?php echo gs_active('resources.php', $currentPage); ?>"
         <?php echo gs_aria_current('resources.php', $currentPage); ?>
         href="<?php echo gs_url('resources.php'); ?>">Resources</a>

      <a class="gs-nav__link<?php echo gs_active('blog.php', $currentPage); ?>"
         <?php echo gs_aria_current('blog.php', $currentPage); ?>
         href="<?php echo gs_url('blog.php'); ?>">Blog</a>

      <a class="gs-nav__link<?php echo gs_active('about.php', $currentPage); ?>"
         <?php echo gs_aria_current('about.php', $currentPage); ?>
         href="<?php echo gs_url('about.php'); ?>">About</a>

      <a class="gs-nav__link gs-nav__link--cta<?php echo gs_active('contact.php', $currentPage); ?>"
         <?php echo gs_aria_current('contact.php', $currentPage); ?>
         href="<?php echo gs_url('contact.php'); ?>">Contact</a>

    </nav>

    <!-- Mobile Toggle Button -->
    <button class="gs-nav__toggle" id="gsNavToggle"
      type="button"
      aria-label="Open menu"
      aria-expanded="false"
      aria-controls="gsNavPanel">
      <span class="gs-nav__burger" aria-hidden="true">
        <span></span><span></span><span></span>
      </span>
    </button>

  </div>

  <!-- Mobile Overlay Menu Panel -->
  <div class="gs-nav__panel" id="gsNavPanel" hidden>

    <div class="gs-nav__panelInner">

      <a class="gs-nav__mLink<?php echo gs_active('index.php', $currentPage); ?>"
         <?php echo gs_aria_current('index.php', $currentPage); ?>
         href="<?php echo gs_url('index.php'); ?>">Home</a>

      <a class="gs-nav__mLink<?php echo gs_active('services.php', $currentPage); ?>"
         <?php echo gs_aria_current('services.php', $currentPage); ?>
         href="<?php echo gs_url('services.php'); ?>">Services</a>

      <a class="gs-nav__mLink<?php echo gs_active('portfolio.php', $currentPage); ?>"
         <?php echo gs_aria_current('portfolio.php', $currentPage); ?>
         href="<?php echo gs_url('portfolio.php'); ?>">Portfolio</a>

      <a class="gs-nav__mLink<?php echo gs_active('resources.php', $currentPage); ?>"
         <?php echo gs_aria_current('resources.php', $currentPage); ?>
         href="<?php echo gs_url('resources.php'); ?>">Resources</a>

      <a class="gs-nav__mLink<?php echo gs_active('blog.php', $currentPage); ?>"
         <?php echo gs_aria_current('blog.php', $currentPage); ?>
         href="<?php echo gs_url('blog.php'); ?>">Blog</a>

      <a class="gs-nav__mLink<?php echo gs_active('about.php', $currentPage); ?>"
         <?php echo gs_aria_current('about.php', $currentPage); ?>
         href="<?php echo gs_url('about.php'); ?>">About</a>

      <a class="gs-nav__mLink gs-nav__mLink--cta<?php echo gs_active('contact.php', $currentPage); ?>"
         <?php echo gs_aria_current('contact.php', $currentPage); ?>
         href="<?php echo gs_url('contact.php'); ?>">Contact</a>

    </div>

  </div>

</header>
