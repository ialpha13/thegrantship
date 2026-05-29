<?php
// config/mail.php

// Where submissions go:
define('MAIL_TO', getenv('MAIL_TO') ?: 'info@thegrantship.com');

// Appears as sender in email (some hosts require same domain)
define('MAIL_FROM', getenv('MAIL_FROM') ?: 'no-reply@thegrantship.com');
define('MAIL_FROM_NAME', getenv('MAIL_FROM_NAME') ?: 'The GrantShip Website');

// Subject prefix
define('MAIL_SUBJECT_PREFIX', getenv('MAIL_SUBJECT_PREFIX') ?: '[The GrantShip Contact]');

// === OPTIONAL SMTP SETTINGS ===
// If you configure SMTP (recommended), set to true and fill values
define('USE_SMTP', filter_var(getenv('USE_SMTP') ?: false, FILTER_VALIDATE_BOOLEAN));
define('SMTP_HOST', getenv('SMTP_HOST') ?: 'smtp.yourhost.com');
define('SMTP_PORT', getenv('SMTP_PORT') ?: 587);
define('SMTP_USER', getenv('SMTP_USER') ?: 'no-reply@thegrantship.com');
define('SMTP_PASS', getenv('SMTP_PASS') ?: 'yourpassword');
define('SMTP_SECURE', getenv('SMTP_SECURE') ?: 'tls'); // tls or ssl
