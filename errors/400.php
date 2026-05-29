<?php
// /errors/400.php

$code  = 400;
$title = "Bad Request";
$desc  = "We couldn't process that request. It may be malformed, missing data, or blocked by the browser.";
$pill  = "Request Issue";

/**
 * Use the new professional SVG set (subfolder-safe via _layout.php).
 * IMPORTANT: pass a site-relative path (no ../).
 */
$image = "assets/img/errors/error-400.svg";

include __DIR__ . '/_layout.php';
