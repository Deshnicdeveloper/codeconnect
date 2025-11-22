<?php
/**
 * Database Configuration
 * 
 * This file contains the database connection settings for the CodeConnect 2025 Badge Generator
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'iwillbethere');
define('DB_USER', 'fast5003_deshnic');        // Default XAMPP MySQL username
define('DB_PASS', '@Zz738Ra+OI3');            // Default XAMPP MySQL password (empty)
define('DB_CHARSET', 'utf8mb4');

/**
 * Get database connection
 * 
 * @return PDO Database connection object
 * @throws PDOException if connection fails
 */
function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        throw new PDOException("Database connection failed. Please check your configuration.");
    }
}

/**
 * Test database connection
 * 
 * @return bool True if connection successful, false otherwise
 */
function testConnection() {
    try {
        $pdo = getDBConnection();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
