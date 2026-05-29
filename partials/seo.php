<?php
// partials/seo.php
// Usage: set $pageTitle, $pageDesc, optional $pageType, $pageImage, $pageNoIndex, $pagePublished, $pageModified, $pageSection, $pageTags, $pageCanonical

$seoSiteName = defined('SITE_NAME') ? SITE_NAME : 'The Grant Ship';
$seoDomain = 'https://thegrantship.com';

$seoTitle = $pageTitle ?? $seoSiteName;
$seoDesc = $pageDesc ?? '';
$seoType = $pageType ?? 'website';
$seoImage = $pageImage ?? 'assets/img/og-default.png';
$seoNoIndex = $pageNoIndex ?? false;

$reqPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$reqPath = $reqPath ? $reqPath : '/';
$seoUrl = $pageCanonical ?? (rtrim($seoDomain, '/') . $reqPath);

if (preg_match('~^https?://~i', $seoImage)) {
  $seoImageUrl = $seoImage;
} else {
  $seoImageUrl = rtrim($seoDomain, '/') . '/' . ltrim($seoImage, '/');
}

$robots = $seoNoIndex ? 'noindex, nofollow' : 'index, follow';

$orgId = rtrim($seoDomain, '/') . '/#organization';
$websiteId = rtrim($seoDomain, '/') . '/#website';
$webPageId = $seoUrl . '#webpage';
$logoUrl = rtrim($seoDomain, '/') . '/assets/img/logofinal8.png';
?>
<link rel="canonical" href="<?php echo htmlspecialchars($seoUrl, ENT_QUOTES); ?>">
<meta name="robots" content="<?php echo htmlspecialchars($robots, ENT_QUOTES); ?>">
<meta name="author" content="<?php echo htmlspecialchars($seoSiteName, ENT_QUOTES); ?>">

<meta property="og:site_name" content="<?php echo htmlspecialchars($seoSiteName, ENT_QUOTES); ?>">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="<?php echo ($seoType === 'article') ? 'article' : 'website'; ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($seoTitle, ENT_QUOTES); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($seoDesc, ENT_QUOTES); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($seoUrl, ENT_QUOTES); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($seoImageUrl, ENT_QUOTES); ?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($seoTitle, ENT_QUOTES); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($seoDesc, ENT_QUOTES); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($seoImageUrl, ENT_QUOTES); ?>">

<?php
$schemaGraph = [];

$schemaGraph[] = array_filter([
  '@type' => 'Organization',
  '@id' => $orgId,
  'name' => $seoSiteName,
  'url' => $seoDomain,
  'email' => defined('SITE_EMAIL') ? SITE_EMAIL : null,
  'logo' => $logoUrl,
  'sameAs' => [
    'https://www.linkedin.com/company/thegrantship/'
  ],
]);

$schemaGraph[] = [
  '@type' => 'WebSite',
  '@id' => $websiteId,
  'name' => $seoSiteName,
  'url' => $seoDomain,
  'publisher' => ['@id' => $orgId],
  'inLanguage' => 'en-US',
];

if ($seoType === 'article') {
  $article = [
    '@type' => 'Article',
    '@id' => $seoUrl . '#article',
    'headline' => $seoTitle,
    'description' => $seoDesc,
    'image' => [$seoImageUrl],
    'mainEntityOfPage' => ['@id' => $seoUrl],
    'author' => ['@id' => $orgId],
    'publisher' => ['@id' => $orgId],
    'datePublished' => $pagePublished ?? null,
    'dateModified' => $pageModified ?? ($pagePublished ?? null),
    'articleSection' => $pageSection ?? null,
    'keywords' => !empty($pageTags) ? implode(', ', (array)$pageTags) : null,
  ];
  $schemaGraph[] = array_filter($article);
} else {
  $webPage = [
    '@type' => 'WebPage',
    '@id' => $webPageId,
    'url' => $seoUrl,
    'name' => $seoTitle,
    'description' => $seoDesc,
    'isPartOf' => ['@id' => $websiteId],
    'about' => ['@id' => $orgId],
    'inLanguage' => 'en-US',
  ];
  $schemaGraph[] = array_filter($webPage);
}

$schema = [
  '@context' => 'https://schema.org',
  '@graph' => $schemaGraph,
];
?>
<script type="application/ld+json">
<?php echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
