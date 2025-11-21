<?php
// Simple auth gate
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Allow hitting login page without redirect loop
if (basename($_SERVER['PHP_SELF']) === 'login.php') {
    return;
}

if (empty($_SESSION['admin_authenticated'])) {
    header('Location: login.php');
    exit;
}
