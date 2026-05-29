<?php
// newsletter-success.php
require_once __DIR__ . '/config/config.php';
$pageTitle = "Subscribed - " . SITE_NAME;
$pageDesc = "Newsletter subscription confirmation - The Grant Ship.";
$pageNoIndex = true;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDesc, ENT_QUOTES); ?>" />
  <?php include __DIR__ . '/partials/seo.php'; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/components/navbar.css">
  <link rel="stylesheet" href="assets/css/components/footer.css">

  <style>
    .gs-nsx{ padding-top:110px; min-height:100vh; position:relative; overflow-x:hidden; }
    .gs-nsx-bg{ position:fixed; inset:0; z-index:-1; pointer-events:none; background:linear-gradient(180deg,var(--bg0),var(--bg1)); }
    .gs-nsx-bg__grid{ position:absolute; inset:0;
      background:linear-gradient(rgba(255,255,255,.055) 1px, transparent 1px),
                 linear-gradient(90deg, rgba(255,255,255,.055) 1px, transparent 1px);
      background-size:52px 52px; opacity:.22;
    }
    .gs-nsx-bg__glow{ position:absolute; inset:0;
      background:
        radial-gradient(900px 520px at 50% 10%, rgba(79,125,255,.18), transparent 60%),
        radial-gradient(900px 520px at 18% 32%, rgba(18,163,120,.14), transparent 62%),
        radial-gradient(900px 520px at 82% 40%, rgba(209,138,61,.10), transparent 65%);
      opacity:.95;
    }

    .gs-nsx-wrap{ width:min(980px, calc(100% - 28px)); margin:0 auto; padding:12px 0 18px; }
    .gs-nsx-card{
      border-radius:26px; padding:18px;
      background:rgba(255,255,255,.08);
      border:1px solid rgba(255,255,255,.12);
      box-shadow:0 34px 120px rgba(0,0,0,.55), inset 0 1px 0 rgba(255,255,255,.12);
      backdrop-filter:blur(calc(var(--blur) + 6px));
      -webkit-backdrop-filter:blur(calc(var(--blur) + 6px));
      overflow:hidden;
      position:relative;
    }

    .gs-nsx-pill{
      display:inline-flex; align-items:center; gap:8px;
      padding:8px 12px; border-radius:999px;
      border:1px solid rgba(255,255,255,.12);
      background:rgba(255,255,255,.06);
      font-weight:900; color:rgba(244,246,250,.74);
    }
    .gs-nsx-dot{
      width:9px; height:9px; border-radius:999px;
      background:linear-gradient(180deg,var(--blue), rgba(79,125,255,.6));
      box-shadow:0 0 0 6px rgba(79,125,255,.16);
    }

    .gs-nsx-title{
      margin:14px 0 6px; font-family:var(--display);
      font-weight:800; letter-spacing:-.03em; line-height:1.05;
      font-size:clamp(28px, 4vw, 52px);
      color:rgba(244,246,250,.92);
    }
    .gs-nsx-sub{
      margin:0 0 14px; color:rgba(244,246,250,.66);
      font-weight:650; line-height:1.85;
      max-width:820px;
      font-size: 14px;
    }

    .gs-nsx-panel{
      margin-top: 14px;
      border-radius:22px;
      padding:14px;
      background: rgba(0,0,0,.20);
      border: 1px solid rgba(255,255,255,.10);
      display:grid;
      gap: 10px;
    }
    .gs-nsx-h{
      margin:0;
      font-family: var(--display);
      font-weight: 800;
      letter-spacing: -.02em;
      color: rgba(244,246,250,.92);
      font-size: 16px;
    }
    .gs-nsx-p{
      margin:0;
      color: rgba(244,246,250,.66);
      font-weight: 650;
      line-height: 1.85;
      font-size: 13.8px;
    }

    .gs-nsx-actions{
      margin-top: 8px;
      display:flex; gap:10px; flex-wrap:wrap; align-items:center;
    }
    .gs-nsx-btn{
      display:inline-flex; align-items:center; justify-content:center;
      padding:10px 14px; border-radius:999px;
      border:1px solid rgba(79,125,255,.28);
      background:linear-gradient(180deg, rgba(79,125,255,.18), rgba(79,125,255,.08));
      color:rgba(244,246,250,.92);
      font-weight:900; text-decoration:none;
      box-shadow:0 16px 44px rgba(0,0,0,.46);
      transition:transform .18s var(--ease), border-color .18s var(--ease);
    }
    .gs-nsx-btn:hover{ transform:translateY(-2px); border-color:rgba(79,125,255,.42); }

    .gs-nsx-btn--alt{
      border-color: rgba(255,255,255,.14);
      background: rgba(255,255,255,.06);
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/partials/navbar.php'; ?>

<main class="gs-nsx">
  <div class="gs-nsx-bg" aria-hidden="true">
    <div class="gs-nsx-bg__grid"></div>
    <div class="gs-nsx-bg__glow"></div>
  </div>

  <div class="gs-nsx-wrap">
    <section class="gs-nsx-card">
      <div class="gs-nsx-pill"><span class="gs-nsx-dot"></span> Success</div>
      <h1 class="gs-nsx-title">You're subscribed.</h1>
      <p class="gs-nsx-sub">
        Thanks for joining. We'll send occasional updates on grant strategy, funding trends, and practical tools.
      </p>

      <div class="gs-nsx-panel">
        <h2 class="gs-nsx-h">What you'll receive</h2>
        <p class="gs-nsx-p">
          Short, useful insights - not spam. You can unsubscribe anytime using a link in any email.
        </p>

        <div class="gs-nsx-actions">
          <a class="gs-nsx-btn" href="resources.php">Explore Resources ↗</a>
          <a class="gs-nsx-btn gs-nsx-btn--alt" href="blog.php">Read the Blog ↗</a>
          <a class="gs-nsx-btn gs-nsx-btn--alt" href="index.php">Back to Home ↗</a>
        </div>
      </div>
    </section>
  </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="assets/js/components/navbar.js?v=10"></script>
</body>
</html>
