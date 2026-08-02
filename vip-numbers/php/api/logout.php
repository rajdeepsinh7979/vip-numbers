<?php
// php/admin/logout.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Clear all session data
$_SESSION = [];

// Remove the session cookie itself (not just the data)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destroy the session on the server
session_destroy();

// Send them back to the login page
header("Location: /vip-numbers/vip-numbers/php/login.php");
exit;
