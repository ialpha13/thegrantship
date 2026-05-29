<?php
declare(strict_types=1);

// /errors/error-handler.php
require_once __DIR__ . '/../config/config.php';

$code = isset($_GET['code']) ? (int)$_GET['code'] : 404;
if ($code < 400 || $code > 599) $code = 404;

$map = [
  400 => ["Bad Request", "We couldn't process that request. It may be malformed, missing required data, or blocked by the browser.", "Request Issue", "assets/img/errors/error-400.svg"],
  401 => ["Unauthorized", "This page requires authentication. If you believe you should have access, please contact support.", "Access Check", "assets/img/errors/error-401.svg"],
  403 => ["Forbidden", "You don't have permission to view this page. If this is unexpected, we can help.", "Access Restricted", "assets/img/errors/error-403.svg"],
  404 => ["Not Found", "The page you're looking for doesn't exist - it may have moved, or the link is outdated.", "Page Missing", "assets/img/errors/error-404.svg"],
  429 => ["Too Many Requests", "You're moving fast. Please wait a moment and try again.", "Rate Limited", "assets/img/errors/error-429.svg"],
  500 => ["Server Error", "Something went wrong on our side. Please refresh once, or come back shortly.", "System Error", "assets/img/errors/error-500.svg"],
  503 => ["Service Unavailable", "We're performing maintenance or experiencing heavy traffic. Please try again soon.", "Maintenance Mode", "assets/img/errors/error-503.svg"],
];

$title = $map[$code][0] ?? "Something went wrong";
$desc  = $map[$code][1] ?? "Please try again.";
$pill  = $map[$code][2] ?? "System Notice";
$image = $map[$code][3] ?? "assets/img/errors/error-404.svg";

include __DIR__ . "/_layout.php";
