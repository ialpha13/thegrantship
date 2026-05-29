-- =========================================================
-- THE GRANTSHIP -- MINIMAL DATABASE SCHEMA (MySQL)
-- Date: 2026-01-26
-- Charset: utf8mb4 (recommended)
--
-- Notes:
-- - Resources / Portfolio / Blog pages are STATIC in this build.
-- - Database is currently used for contact form submissions only.
-- =========================================================

SET NAMES utf8mb4;
SET time_zone = "+00:00";

-- If your host does not allow CREATE DATABASE, comment out the next 3 lines
CREATE DATABASE IF NOT EXISTS thegrantship
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE thegrantship;

-- =========================================================
-- 1) GLOBAL SITE SETTINGS (optional; not required by the current PHP templates)
-- =========================================================
CREATE TABLE IF NOT EXISTS site_settings (
  id INT PRIMARY KEY AUTO_INCREMENT,
  site_name VARCHAR(155) NOT NULL DEFAULT 'The Grant Ship',
  logo_path VARCHAR(255) NOT NULL DEFAULT 'assets/img/finallogo.png',
  footer_tagline TEXT NOT NULL DEFAULT 'Turning vision into grants -- with clarity & structure.',
  footer_email VARCHAR(155) NOT NULL DEFAULT 'info@thegrantship.com',
  footer_phone VARCHAR(30) NOT NULL DEFAULT '+92 342 9390098',
  footer_location VARCHAR(155) NOT NULL DEFAULT 'Islamabad, Pakistan',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO site_settings (id) VALUES (1);

-- =========================================================
-- 2) CONTACT MESSAGES (USED by contact_submit.php)
-- =========================================================
CREATE TABLE IF NOT EXISTS contact_messages (
  id INT PRIMARY KEY AUTO_INCREMENT,
  full_name VARCHAR(160) NOT NULL,
  email VARCHAR(190) NOT NULL,
  organization VARCHAR(190) DEFAULT NULL,
  need VARCHAR(160) NOT NULL,
  message TEXT NOT NULL,
  ip_address VARCHAR(45) DEFAULT NULL,
  user_agent VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  INDEX idx_contact_created (created_at),
  INDEX idx_contact_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- =========================================================
-- 3) NEWSLETTER SUBSCRIBERS (USED by newsletter_submit.php)
-- =========================================================
CREATE TABLE IF NOT EXISTS newsletter_subscribers (
  id INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(190) NOT NULL,
  status ENUM('active','unsubscribed') NOT NULL DEFAULT 'active',
  ip_address VARCHAR(45) DEFAULT NULL,
  user_agent VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  UNIQUE KEY uniq_newsletter_email (email),
  INDEX idx_newsletter_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
