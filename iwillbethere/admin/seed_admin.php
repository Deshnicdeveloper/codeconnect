<?php
require_once __DIR__ . '/../config/database.php';

try {
    $pdo = getDBConnection();
    // Ensure table exists
    $pdo->exec("CREATE TABLE IF NOT EXISTS admin_users (\n        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,\n        username VARCHAR(60) NOT NULL UNIQUE,\n        password_hash VARCHAR(255) NOT NULL,\n        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\n        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP\n    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    $stmt = $pdo->query("SELECT COUNT(*) AS cnt FROM admin_users");
    $count = (int)$stmt->fetch()['cnt'];

    if ($count === 0) {
        $username = 'admin';
        $plain = 'password123!';
        $hash = password_hash($plain, PASSWORD_DEFAULT);
        $ins = $pdo->prepare("INSERT INTO admin_users (username, password_hash) VALUES (:u, :p)");
        $ins->execute([':u' => $username, ':p' => $hash]);
        echo "Seeded default admin user.\nUsername: admin\nPassword: $plain\nPLEASE CHANGE THIS PASSWORD AFTER LOGIN.\n";
    } else {
        echo "admin_users table already has $count user(s). No action.\n";
    }
} catch (Exception $e) {
    echo "Error seeding admin user: " . $e->getMessage() . "\n";
    exit(1);
}
