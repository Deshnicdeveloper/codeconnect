<?php
session_start();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

        try {
            require_once __DIR__ . '/../config/database.php';
            $pdo = getDBConnection();
            $stmt = $pdo->prepare('SELECT id, username, password_hash FROM admin_users WHERE username = :u LIMIT 1');
            $stmt->execute([':u' => $username]);
            $row = $stmt->fetch();

            if (!$row || !password_verify($password, $row['password_hash'])) {
                $errors[] = 'Invalid credentials.';
            } else {
                $_SESSION['admin_authenticated'] = true;
                $_SESSION['admin_user'] = $row['username'];
                $_SESSION['admin_user_id'] = $row['id'];
                header('Location: dashboard.php');
                exit;
            }
        } catch (Exception $e) {
            $errors[] = 'Authentication error.';
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
body {font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Ubuntu,sans-serif; background:#0a2a66; display:flex; align-items:center; justify-content:center; min-height:100vh; margin:0;}
.login-card {background:#ffffff; width:100%; max-width:380px; padding:40px 32px; border-radius:16px; box-shadow:0 10px 30px rgba(0,0,0,0.25);} 
.login-card h1 {margin:0 0 10px; font-size:1.6rem; color:#1034A6;}
.login-card p.subtitle {margin:0 0 25px; font-size:0.9rem; color:#555;}
.form-group {margin-bottom:18px;}
label {display:block; font-size:0.8rem; font-weight:600; letter-spacing:.5px; margin-bottom:6px; text-transform:uppercase; color:#1034A6;}
input[type=text], input[type=password] {width:100%; padding:12px 14px; border:1px solid #cdd3e0; border-radius:10px; font-size:0.95rem; background:#f7f9fc; transition:.2s;border-top:2px solid #d5dbeb;}
input[type=text]:focus, input[type=password]:focus {outline:none; border-color:#1034A6; background:#fff;}
.button {width:100%; padding:14px 18px; background:linear-gradient(90deg,#0a2a66,#1034A6,#1b4fcf); color:#fff; border:none; font-weight:600; font-size:0.95rem; letter-spacing:.5px; border-radius:12px; cursor:pointer; box-shadow:0 4px 12px rgba(16,52,166,0.35); transition:.25s;}
.button:hover {filter:brightness(1.15);} 
.errors {background:#ffe9e9; color:#a30000; padding:12px 14px; border-radius:10px; font-size:0.85rem; margin-bottom:18px; line-height:1.3;}
.footer-links {margin-top:25px; text-align:center; font-size:0.75rem; color:#777;}
.footer-links a {color:#1034A6; text-decoration:none; font-weight:600;}
.user-hint {background:#eef3ff; color:#1034A6; padding:10px 12px; font-size:.75rem; border-radius:8px; margin-top:10px;}
</style>
</head>
<body>
    <form class="login-card" method="POST" action="">
        <h1>Admin Login</h1>
        <p class="subtitle">Secure access to the badge dashboard</p>
        <?php if ($errors): ?>
            <div class="errors">
                <?php foreach ($errors as $e) { echo htmlspecialchars($e) . '<br>'; } ?>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" autocomplete="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>
        </div>
        <button class="button" type="submit">Sign In</button>
        <div class="user-hint">Default user: admin<br>Set password in <code>config/admin_users.php</code>.</div>
        <div class="footer-links">© 2025 CodeConnect • <a href="../index.php">Back to site</a></div>
    </form>
</body>
</html>
