-- CodeConnect 2025 Badge Generator Database Schema
-- Database: iwillbethere

-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS iwillbethere CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE iwillbethere;

-- Table to store badge information
CREATE TABLE IF NOT EXISTS badges (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    language ENUM('en', 'fr') DEFAULT 'en',
    badge_filename VARCHAR(255) NOT NULL,
    badge_path VARCHAR(255) NOT NULL,
    ip_address VARCHAR(45) NULL,
    user_agent TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX idx_created_at (created_at),
    INDEX idx_full_name (full_name),
    INDEX idx_language (language)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table to store download statistics (optional)
CREATE TABLE IF NOT EXISTS download_stats (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    badge_id INT(11) UNSIGNED NOT NULL,
    downloaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45) NULL,
    
    FOREIGN KEY (badge_id) REFERENCES badges(id) ON DELETE CASCADE,
    INDEX idx_badge_id (badge_id),
    INDEX idx_downloaded_at (downloaded_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
