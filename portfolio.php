<?php
// portfolio.php (UPDATED + LOCKED)
require_once __DIR__ . '/config/config.php';

$pageTitle = SITE_NAME . ' - Portfolio';
$pageDesc = 'Downloadable proposals, grant samples, XML files, and documents from The Grant Ship portfolio library.';
$pageImage = 'assets/img/og-default.png';

/**
 * Files live in: /downloads/
 * Thumbnails live in: /assets/img/portfolio/
 *
 * Notes:
 * - Keep filenames simple (no spaces).
 * - "thumb" is used for the card image.
 */
$items = [
  [
    "title"  => "Health Research Proposal Sample",
    "type"   => "Proposal",
    "format" => "PDF",
    "desc"   => "A structured proposal sample demonstrating clean sections and reviewer flow.",
    "file"   => "placeholder.pdf",
    "tag"    => "proposal",
    "thumb"  => "assets/img/portfolio/health_research.webp",
  ],
  [
    "title"  => "Youth Development Proposal Sample",
    "type"   => "Proposal",
    "format" => "PDF",
    "desc"   => "A structured proposal sample demonstrating clean sections and reviewer flow.",
    "file"   => "placeholder.pdf",
    "tag"    => "proposal",
    "thumb"  => "assets/img/portfolio/youth_dev.webp",
  ],
  [
    "title"  => "Sports Youth Powerpoint",
    "type"   => "Slides",
    "format" => "PPTX",
    "desc"   => "A structured slides sample demonstrating clean sections and reviewer flow.",
    "file"   => "placeholder.pptx",
    "tag"    => "proposal",
    "thumb"  => "assets/img/portfolio/sports_youth.webp",
  ],
  [
    "title"  => "Logic Model",
    "type"   => "Document",
    "format" => "PDF",
    "desc"   => "Logic model for R21 Phase (Months 1-24) with inputs, activities, deliverables, and outcomes.",
    "file"   => "placeholder.pdf",
    "tag"    => "doc",
    "thumb"  => "assets/img/portfolio/logic_model.webp",
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
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/portfolio.css?v=14'), ENT_QUOTES); ?>">
</head>
<body>

<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-pf5">
  <div class="gs-pf5-bg" aria-hidden="true">
    <div class="gs-pf5-bg__grid"></div>
    <div class="gs-pf5-bg__glow"></div>
    <div class="gs-pf5-bg__noise"></div>
  </div>

  <section class="gs-pf5-wrap">
    <div class="gs-container">

      <header class="gs-pf5-head gs-reveal">
        <div class="gs-pf5-heroCopy">
          <div class="gs-pf5-pill">
            <span class="gs-pf5-pill__dot"></span>
            Portfolio Library
          </div>

          <h1 class="gs-pf5-title">
            Assets built for
            <span class="gs-pf5-type" data-phrases="reviewer clarity|funding decisions|proposal wins|donor confidence"></span>
          </h1>

          <p class="gs-pf5-sub">
            Downloadable proposals, samples, decks, and docs you can use as references or templates.
          </p>

          <div class="gs-pf5-heroNote">Curated library updated with new samples.</div>
        </div>
      </header>

      <div class="gs-pf5-controls gs-reveal" style="transition-delay:.06s">
        <div class="gs-pf5-tabs" role="tablist" aria-label="Portfolio filters">
          <button class="gs-pf5-tab is-active" type="button" data-filter="all">All</button>
          <button class="gs-pf5-tab" type="button" data-filter="proposal">Proposals</button>
          <button class="gs-pf5-tab" type="button" data-filter="sample">Samples</button>
          <button class="gs-pf5-tab" type="button" data-filter="xml">XML</button>
          <button class="gs-pf5-tab" type="button" data-filter="doc">Docs</button>
        </div>

        <div class="gs-pf5-search">
          <span class="gs-pf5-search__icon" aria-hidden="true"></span>
          <input id="gsPf5Search" class="gs-pf5-input" type="search"
                 placeholder="Search (budget, MEL, XML, checklist...)" aria-label="Search portfolio">
        </div>

        <div class="gs-pf5-sort">
          <select id="gsPf5Sort" class="gs-pf5-select gs-pf5-select--hidden" aria-label="Sort portfolio">
            <option value="az">Sort: A -> Z</option>
            <option value="za">Sort: Z -> A</option>
            <option value="type">Sort: Type</option>
            <option value="format">Sort: Format</option>
          </select>

          <div class="gs-pf5-dd" id="gsPf5Dd" data-open="0">
            <button class="gs-pf5-dd__btn" type="button" id="gsPf5DdBtn" aria-haspopup="listbox" aria-expanded="false">
              <span class="gs-pf5-dd__label">Sort: A -> Z</span>
              <span class="gs-pf5-dd__chev" aria-hidden="true">v</span>
            </button>

            <div class="gs-pf5-dd__panel" id="gsPf5DdPanel" role="listbox" aria-label="Sort options" tabindex="-1">
              <button class="gs-pf5-dd__opt is-selected" type="button" role="option" data-value="az" aria-selected="true">Sort: A -> Z</button>
              <button class="gs-pf5-dd__opt" type="button" role="option" data-value="za" aria-selected="false">Sort: Z -> A</button>
              <button class="gs-pf5-dd__opt" type="button" role="option" data-value="type" aria-selected="false">Sort: Type</button>
              <button class="gs-pf5-dd__opt" type="button" role="option" data-value="format" aria-selected="false">Sort: Format</button>
            </div>
          </div>
        </div>
      </div>

      <div class="gs-pf5-grid gs-reveal" style="transition-delay:.12s" id="gsPf5Grid">
        <?php foreach ($items as $it): ?>
          <?php
            // safe text
            $safeTitle = htmlspecialchars($it["title"] ?? "", ENT_QUOTES);
            $safeDesc  = htmlspecialchars($it["desc"] ?? "", ENT_QUOTES);
            $safeType  = htmlspecialchars($it["type"] ?? "", ENT_QUOTES);
            $safeFmt   = htmlspecialchars($it["format"] ?? "", ENT_QUOTES);
            $safeTag   = htmlspecialchars($it["tag"] ?? "doc", ENT_QUOTES);
            $safeFile  = htmlspecialchars($it["file"] ?? "", ENT_QUOTES);

            // urls
            $downloadUrl = gs_url('downloads/' . $safeFile);

            $thumbRel  = $it["thumb"] ?? "assets/img/portfolio/thumb-default.png";
            $thumbUrl  = gs_url($thumbRel);
            $safeThumb = htmlspecialchars($thumbUrl, ENT_QUOTES);

            // dataset (lowercase)
            $dsTitle  = strtolower(($it["title"] ?? "") . ' ' . ($it["desc"] ?? "") . ' ' . ($it["type"] ?? "") . ' ' . ($it["format"] ?? ""));
            $dsName   = strtolower($it["title"] ?? "");
            $dsType   = strtolower($it["type"] ?? "");
            $dsFormat = strtolower($it["format"] ?? "");
          ?>
          <article class="gs-pf5-card"
            data-tag="<?php echo $safeTag; ?>"
            data-title="<?php echo htmlspecialchars($dsTitle, ENT_QUOTES); ?>"
            data-name="<?php echo htmlspecialchars($dsName, ENT_QUOTES); ?>"
            data-type="<?php echo htmlspecialchars($dsType, ENT_QUOTES); ?>"
            data-format="<?php echo htmlspecialchars($dsFormat, ENT_QUOTES); ?>">

            <div class="gs-pf5-card__media">
              <div class="gs-pf5-thumb">
                <img src="<?php echo $safeThumb; ?>" alt="<?php echo $safeTitle; ?> preview" loading="lazy" decoding="async">
              </div>
            </div>

            <div class="gs-pf5-card__body">
              <div class="gs-pf5-card__top">
                <div class="gs-pf5-chip gs-pf5-chip--<?php echo $safeTag; ?>">
                  <span class="gs-pf5-chip__dot"></span>
                  <?php echo $safeType; ?>
                </div>
                <div class="gs-pf5-format"><?php echo $safeFmt; ?></div>
              </div>

              <h3 class="gs-pf5-card__h"><?php echo $safeTitle; ?></h3>
              <p class="gs-pf5-card__p"><?php echo $safeDesc; ?></p>

              <div class="gs-pf5-card__bottom">
                <a class="gs-pf5-dl" href="<?php echo htmlspecialchars($downloadUrl, ENT_QUOTES); ?>" download>
                  Download <span>-></span>
                </a>

                <button class="gs-pf5-qv" type="button"
                  data-title="<?php echo $safeTitle; ?>"
                  data-type="<?php echo $safeType; ?>"
                  data-format="<?php echo $safeFmt; ?>"
                  data-desc="<?php echo $safeDesc; ?>"
                  data-file="<?php echo htmlspecialchars($downloadUrl, ENT_QUOTES); ?>"
                  data-thumb="<?php echo $safeThumb; ?>">
                  Quick View
                </button>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="gs-pf5-empty" id="gsPf5Empty" hidden>
        <div class="gs-pf5-empty__glass">
          <div class="gs-pf5-empty__k">No results</div>
          <div class="gs-pf5-empty__t">Try another keyword or switch filters.</div>
          <button class="gs-pf5-btn" type="button" id="gsPf5Reset">Reset</button>
        </div>
      </div>

    </div>
  </section>
</main>

<!-- Quick View Modal (structure kept; JS upgrades layout) -->
<div class="gs-pf5-modal" id="gsPf5Modal" hidden>
  <div class="gs-pf5-modal__backdrop" data-close="1"></div>

  <div class="gs-pf5-modal__panel" role="dialog" aria-modal="true" aria-label="Portfolio item preview">
    <button class="gs-pf5-modal__close" type="button" data-close="1" aria-label="Close">x</button>

    <!-- legacy nodes (JS will reuse + re-layout them) -->
    <div class="gs-pf5-modal__tag" id="gsPf5MType">Document</div>
    <h3 class="gs-pf5-modal__title" id="gsPf5MTitle">Title</h3>
    <p class="gs-pf5-modal__desc" id="gsPf5MDesc">Description</p>

    <div class="gs-pf5-modal__row">
      <div class="gs-pf5-modal__meta">
        <div class="gs-pf5-modal__label">Format</div>
        <div class="gs-pf5-modal__value" id="gsPf5MFmt">PDF</div>
      </div>
      <div class="gs-pf5-modal__meta">
        <div class="gs-pf5-modal__label">Download</div>
        <a class="gs-pf5-dl gs-pf5-dl--modal" id="gsPf5MFile" href="#" download>
          Download <span>-></span>
        </a>
      </div>
    </div>

    <!-- Viewer -->
    <div class="gs-pf5-modal__viewer" id="gsPf5Viewer">
      <iframe class="gs-pf5-modal__iframe" id="gsPf5Iframe" title="Document preview"></iframe>

      <div class="gs-pf5-modal__fallback" id="gsPf5Fallback">
        <h4>Preview not available</h4>
        <p>
          This file type can't be embedded directly in the browser here.
          Please use the download button to open it.
        </p>
      </div>
    </div>

  </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=10'), ENT_QUOTES); ?>"></script>
<script src="<?php echo htmlspecialchars(gs_url('assets/js/pages/portfolio.js?v=15'), ENT_QUOTES); ?>"></script>
</body>
</html>
