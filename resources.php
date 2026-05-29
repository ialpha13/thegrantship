<?php
// resources.php
require_once __DIR__ . '/config/config.php';

$pageTitle = SITE_NAME . ' - Resources';
$pageDesc = 'Downloadable resources from The Grant Ship: templates, toolkits, checklists, and guidebooks.';
$pageImage = 'assets/img/og-default.png';

/**
 * Resources downloads live in: /assets/downloads/
 * Resource thumbnails live in: /assets/img/resources/
 *
 * Make sure files exist in those folders.
 */

$resources = [
  [
    "title" => "Grant Writing Playbook (Book)",
    "type"  => "Books",
    "format"=> "PDF",
    "desc"  => "A practical guide to building a reviewer-friendly proposal: alignment, clarity, and structure.",
    "file"  => "assets/downloads/placeholder.pdf",
    "size"  => "PDF - 4.2 MB",
    "badge" => "Featured",
    "thumb" => "assets/img/resources/playbook.webp",
    "stage" => "proposal"
  ],
  [
    "title" => "Opportunity Fit Checklist",
    "type"  => "Checklists",
    "format"=> "PDF",
    "desc"  => "A fast decision tool to validate scope, eligibility, and competitiveness before you write.",
    "file"  => "assets/downloads/placeholder.pdf",
    "size"  => "PDF - 620 KB",
    "badge" => "New",
    "thumb" => "assets/img/resources/fitchecklist.webp",
    "stage" => "fit"
  ],
  [
    "title" => "Budget Narrative Template",
    "type"  => "Templates",
    "format"=> "PDF",
    "desc"  => "Tie each line item to tasks and outputs with defensible language funders expect.",
    "file"  => "assets/downloads/placeholder.pdf",
    "size"  => "PDF - 780 KB",
    "badge" => "",
    "thumb" => "assets/img/resources/budgetnarrativetemplete.webp",
    "stage" => "budget"
  ],
  [
    "title" => "Project Workplan + Timeline Toolkit",
    "type"  => "Toolkits",
    "format"=> "PDF",
    "desc"  => "Turn an idea into a clear workplan, milestones, responsibilities, and measurable outputs.",
    "file"  => "assets/downloads/placeholder.pdf",
    "size"  => "PDF - 1.1 MB",
    "badge" => "",
    "thumb" => "assets/img/resources/projectworkplan.webp",
    "stage" => "concept"
  ],
  [
    "title" => "Proposal Structure (Section-by-Section)",
    "type"  => "Toolkits",
    "format"=> "PDF",
    "desc"  => "Blueprint for coherence: logic spine, evidence blocks, and reviewer flow that reads cleanly.",
    "file"  => "assets/downloads/placeholder.pdf",
    "size"  => "PDF - 980 KB",
    "badge" => "",
    "thumb" => "assets/img/resources/proposalstructure.webp",
    "stage" => "proposal"
  ],
  [
    "title" => "MEL Framework (Indicators + Notes)",
    "type"  => "Templates",
    "format"=> "PDF",
    "desc"  => "Outputs, outcomes, indicators, targets, sources, and reporting notes in one clean structure.",
    "file"  => "assets/downloads/placeholder.pdf",
    "size"  => "PDF - 860 KB",
    "badge" => "",
    "thumb" => "assets/img/resources/melframework.webp",
    "stage" => "mel"
  ],
  [
    "title" => "Letter of Support (Sample)",
    "type"  => "Templates",
    "format"=> "PDF",
    "desc"  => "A credible support letter format you can adapt for partners, stakeholders, and implementers.",
    "file"  => "assets/downloads/placeholder.pdf",
    "size"  => "PDF - 410 KB",
    "badge" => "",
    "thumb" => "assets/img/resources/letterofsupport.webp",
    "stage" => "submission"
  ],
  [
    "title" => "Pitch Deck Outline (Slides)",
    "type"  => "Slides",
    "format"=> "PDF",
    "desc"  => "A donor-friendly slide structure: problem, approach, evidence, budget, and impact story.",
    "file"  => "assets/downloads/placeholder.pdf",
    "size"  => "PDF - 520 KB",
    "badge" => "",
    "thumb" => "assets/img/resources/pitchdeck.webp",
    "stage" => "proposal"
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

  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/base.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/navbar.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/components/footer.css?v=1'), ENT_QUOTES); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(gs_url('assets/css/pages/resources.css?v=12'), ENT_QUOTES); ?>">
</head>
<body class="gs-page gs-page--resources">

<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-rs5">
  <section class="gs-rs5-wrap">
    <div class="gs-container">

      <header class="gs-rs5-head gs-reveal">
        <div class="gs-rs5-heroCopy">
          <div class="gs-rs5-pill">
            <span class="gs-rs5-pill__dot"></span>
            Resources Library
          </div>

          <h1 class="gs-rs5-title">
            Resource tools for
            <span class="gs-rs5-type" data-phrases="grant workflow|proposal design|budget planning|MEL alignment"></span>
          </h1>

          <p class="gs-rs5-sub">
            Browse by type, search by keyword, quick-view PDFs, and download resources.
          </p>

          <div class="gs-rs5-heroNote">Templates, checklists, and toolkits built for real deadlines.</div>
        </div>

        <div class="gs-rs5-controls gs-reveal" style="transition-delay:.06s">
          <div class="gs-rs5-tabs" role="tablist" aria-label="Resource type filters">
            <button class="gs-rs5-tab is-active" type="button" data-filter="All">All</button>
            <button class="gs-rs5-tab" type="button" data-filter="Books">Books</button>
            <button class="gs-rs5-tab" type="button" data-filter="Templates">Templates</button>
            <button class="gs-rs5-tab" type="button" data-filter="Toolkits">Toolkits</button>
            <button class="gs-rs5-tab" type="button" data-filter="Checklists">Checklists</button>
            <button class="gs-rs5-tab" type="button" data-filter="Slides">Slides</button>
          </div>

          <div class="gs-rs5-search">
            <span class="gs-rs5-search__icon"></span>
            <input id="gsResSearch" class="gs-rs5-input" type="search"
                   placeholder="Search (budget, checklist, toolkit...)" aria-label="Search resources">
          </div>
        </div>
      </header>

      <!-- Grid -->
      <section class="gs-rs5-gridSec gs-reveal" style="transition-delay:.14s">
        <div class="gs-rs5-listHead" aria-hidden="true">
          <div>Preview</div>
          <div>Resource</div>
          <div>Format</div>
          <div>Size</div>
          <div class="gs-rs5-listHead__actions">Actions</div>
        </div>

        <div class="gs-rs5-list" id="gsResGrid">
          <?php foreach ($resources as $i => $r): ?>
            <?php
              $safeTitle = htmlspecialchars($r["title"]);
              $safeDesc  = htmlspecialchars($r["desc"]);
              $safeType  = htmlspecialchars($r["type"]);
              $safeFmt   = htmlspecialchars($r["format"]);
              $safeSize  = htmlspecialchars($r["size"]);
              $safeStage = htmlspecialchars($r["stage"]);

              $fileUrl  = gs_url($r["file"]);
              $safeFile = htmlspecialchars($fileUrl, ENT_QUOTES);

              $thumbRel = $r["thumb"] ?? "assets/img/resources/thumb-default.png";
              $thumbUrl = gs_url($thumbRel);
              $safeThumb= htmlspecialchars($thumbUrl, ENT_QUOTES);

              $searchHay = strtolower($r["title"] . " " . $r["desc"] . " " . $r["type"] . " " . $r["format"] . " " . $r["stage"]);
            ?>
            <article class="gs-rs5-card"
              data-type="<?php echo strtolower($safeType); ?>"
              data-title="<?php echo htmlspecialchars($searchHay, ENT_QUOTES); ?>">

              <div class="gs-rs5-card__sheen" aria-hidden="true"></div>
              <div class="gs-rs5-card__rim" aria-hidden="true"></div>

              <div class="gs-rs5-cell gs-rs5-cell--thumb">
                <div class="gs-rs5-thumb">
                  <img src="<?php echo $safeThumb; ?>" alt="<?php echo $safeTitle; ?> preview" loading="lazy" decoding="async">
                </div>
              </div>

              <div class="gs-rs5-cell gs-rs5-cell--main">
                <div class="gs-rs5-card__top">
                  <span class="gs-rs5-chip">
                    <span class="gs-rs5-chip__dot"></span>
                    <?php echo $safeType; ?>
                  </span>

                </div>

                <h3 class="gs-rs5-card__h"><?php echo $safeTitle; ?></h3>
                <p class="gs-rs5-card__p"><?php echo $safeDesc; ?></p>
              </div>

              <div class="gs-rs5-cell gs-rs5-cell--format">
                <span class="gs-rs5-colLabel">Format</span>
                <span class="gs-rs5-format"><?php echo $safeFmt; ?></span>
              </div>

              <div class="gs-rs5-cell gs-rs5-cell--size">
                <span class="gs-rs5-colLabel">Size</span>
                <span class="gs-rs5-meta"><?php echo $safeSize; ?></span>
              </div>

              <div class="gs-rs5-cell gs-rs5-cell--actions">
                <div class="gs-rs5-actions">
                  <a class="gs-rs5-dl" href="<?php echo $safeFile; ?>" download>
                    Download <span>-></span>
                  </a>

                  <button class="gs-rs5-qv" type="button"
                    data-title="<?php echo $safeTitle; ?>"
                    data-type="<?php echo $safeType; ?>"
                    data-format="<?php echo $safeFmt; ?>"
                    data-desc="<?php echo $safeDesc; ?>"
                    data-file="<?php echo $safeFile; ?>"
                    data-size="<?php echo $safeSize; ?>">
                    Quick View
                  </button>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>

        <div class="gs-rs5-empty" id="gsResEmpty" hidden>
          <div class="gs-rs5-empty__glass">
            <div class="gs-rs5-empty__k">No results</div>
            <div class="gs-rs5-empty__t">Try another keyword or clear filters.</div>
            <button class="gs-rs5-btn" type="button" id="gsResReset">Reset</button>
          </div>
        </div>
      </section>

    </div>
  </section>
</main>

<!-- Quick View Modal -->
<div class="gs-rs5-modal" id="gsResModal" hidden>
  <div class="gs-rs5-modal__backdrop" data-close="1"></div>

  <div class="gs-rs5-modal__panel" role="dialog" aria-modal="true" aria-label="Resource preview">
    <button class="gs-rs5-modal__close" type="button" data-close="1" aria-label="Close">x</button>

    <div class="gs-rs5-modal__grid">
      <div class="gs-rs5-modal__viewer">
        <iframe class="gs-rs5-modal__iframe" id="gsResIframe" title="Resource preview"></iframe>

        <div class="gs-rs5-modal__fallback" id="gsResFallback">
          <div class="gs-rs5-modal__fbTitle">Preview not available</div>
          <div class="gs-rs5-modal__fbText">Use Download to open this file on your device.</div>
        </div>
      </div>

      <aside class="gs-rs5-modal__side">
        <div class="gs-rs5-modal__tag" id="gsResMType">Document</div>
        <h3 class="gs-rs5-modal__title" id="gsResMTitle">Title</h3>
        <p class="gs-rs5-modal__desc" id="gsResMDesc">Description</p>

        <div class="gs-rs5-modal__metaRow">
          <div class="gs-rs5-modal__meta">
            <div class="gs-rs5-modal__label">Format</div>
            <div class="gs-rs5-modal__value" id="gsResMFmt">PDF</div>
          </div>
          <div class="gs-rs5-modal__meta">
            <div class="gs-rs5-modal__label">Size</div>
            <div class="gs-rs5-modal__value" id="gsResMSize">-</div>
          </div>
        </div>

        <a class="gs-rs5-dl gs-rs5-dl--modal" id="gsResMFile" href="#" download>
          Download <span>-></span>
        </a>

        <div class="gs-rs5-modal__hint">
          Tip: If your browser blocks preview, download and open locally.
        </div>
      </aside>
    </div>
  </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="<?php echo htmlspecialchars(gs_url('assets/js/components/navbar.js?v=10'), ENT_QUOTES); ?>"></script>
<script src="<?php echo htmlspecialchars(gs_url('assets/js/pages/resources.js?v=23'), ENT_QUOTES); ?>"></script>
</body>
</html>

