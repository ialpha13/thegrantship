<?php
// config/db.php

// Update these for your host or set env vars (DB_HOST, DB_NAME, DB_USER, DB_PASS)
define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1:3306');
define('DB_NAME', getenv('DB_NAME') ?: 'u102270697_thegrantship');
define('DB_USER', getenv('DB_USER') ?: 'u102270697_thegrantship');
define('DB_PASS', getenv('DB_PASS') ?: 'Maximum_effort_13');

function db(): PDO {
  static $pdo = null;
  if ($pdo) return $pdo;

  $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
  $pdo = new PDO($dsn, DB_USER, DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);

  return $pdo;
}
