<?php
/**
 * Database Setup Script
 * 
 * Run this file once to set up the database and tables
 * Access via: http://localhost/iwillbethere/setup.php
 */

// Include database configuration
require_once __DIR__ . '/config/database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup - CodeConnect 2025</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2rem;
        }
        
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 1rem;
        }
        
        .status {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .warning {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        
        .info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: transform 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: #6c757d;
        }
        
        .step {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            border-left: 4px solid #667eea;
        }
        
        .step h3 {
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }
        
        .step p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        .code {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 0.9rem;
            overflow-x: auto;
            margin: 15px 0;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Database Setup</h1>
        <p class="subtitle">CodeConnect 2025 Badge Generator</p>
        
        <?php
        if (isset($_POST['setup'])) {
            echo '<div class="status info">⏳ Setting up database...</div>';
            
            try {
                // Read SQL file
                $sqlFile = __DIR__ . '/config/schema.sql';
                
                if (!file_exists($sqlFile)) {
                    throw new Exception('Schema file not found at: ' . $sqlFile);
                }
                
                $sql = file_get_contents($sqlFile);
                
                // Connect to MySQL without selecting a database first
                $pdo = new PDO(
                    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET,
                    DB_USER,
                    DB_PASS,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
                
                // Execute SQL statements
                $pdo->exec($sql);
                
                echo '<div class="status success">✅ Database setup completed successfully!</div>';
                echo '<div class="status info">';
                echo '<strong>Database Created:</strong> ' . DB_NAME . '<br>';
                echo '<strong>Tables Created:</strong><br>';
                echo '• badges (stores badge information)<br>';
                echo '• download_stats (tracks downloads)';
                echo '</div>';
                
                echo '<div class="button-group">';
                echo '<a href="index.php" class="btn">Go to Badge Generator</a>';
                echo '<a href="?test=1" class="btn btn-secondary">Test Connection</a>';
                echo '</div>';
                
            } catch (PDOException $e) {
                echo '<div class="status error">❌ Database setup failed: ' . htmlspecialchars($e->getMessage()) . '</div>';
                echo '<div class="status warning">Please check your database configuration in config/database.php</div>';
            } catch (Exception $e) {
                echo '<div class="status error">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
        } elseif (isset($_GET['test'])) {
            echo '<div class="status info">🔍 Testing database connection...</div>';
            
            try {
                $pdo = getDBConnection();
                
                // Test if tables exist
                $stmt = $pdo->query("SHOW TABLES");
                $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
                
                echo '<div class="status success">✅ Database connection successful!</div>';
                echo '<div class="status info">';
                echo '<strong>Database:</strong> ' . DB_NAME . '<br>';
                echo '<strong>Host:</strong> ' . DB_HOST . '<br>';
                echo '<strong>Tables Found:</strong><br>';
                
                if (count($tables) > 0) {
                    foreach ($tables as $table) {
                        echo '• ' . htmlspecialchars($table) . '<br>';
                    }
                } else {
                    echo '<em>No tables found. Please run the setup.</em>';
                }
                echo '</div>';
                
                echo '<div class="button-group">';
                echo '<a href="index.php" class="btn">Go to Badge Generator</a>';
                echo '<a href="setup.php" class="btn btn-secondary">Back to Setup</a>';
                echo '</div>';
                
            } catch (Exception $e) {
                echo '<div class="status error">❌ Connection failed: ' . htmlspecialchars($e->getMessage()) . '</div>';
                echo '<div class="button-group">';
                echo '<a href="setup.php" class="btn btn-secondary">Try Again</a>';
                echo '</div>';
            }
        } else {
        ?>
        
        <div class="status info">
            <strong>ℹ️ Before you begin:</strong><br>
            Make sure XAMPP MySQL service is running.
        </div>
        
        <div class="step">
            <h3>📋 Step 1: Database Configuration</h3>
            <p>The database configuration is located in <code>config/database.php</code></p>
            <div class="code">
Database Name: <?php echo DB_NAME; ?><br>
Host: <?php echo DB_HOST; ?><br>
Username: <?php echo DB_USER; ?><br>
Password: <?php echo DB_PASS ? '****' : '(empty)'; ?>
            </div>
        </div>
        
        <div class="step">
            <h3>🗄️ Step 2: Create Database & Tables</h3>
            <p>Click the button below to automatically create the database and required tables.</p>
        </div>
        
        <form method="POST">
            <div class="button-group">
                <button type="submit" name="setup" class="btn">Setup Database</button>
                <a href="?test=1" class="btn btn-secondary">Test Connection</a>
            </div>
        </form>
        
        <div class="step" style="margin-top: 30px;">
            <h3>📝 Manual Setup (Optional)</h3>
            <p>If you prefer to set up manually, run this SQL in phpMyAdmin:</p>
            <div class="code" style="max-height: 200px; overflow-y: auto;">
<?php echo htmlspecialchars(file_get_contents(__DIR__ . '/config/schema.sql')); ?>
            </div>
        </div>
        
        <?php } ?>
    </div>
</body>
</html>
