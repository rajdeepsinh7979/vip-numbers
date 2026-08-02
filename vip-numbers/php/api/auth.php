<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    // Absolute path from the web root — safe no matter which folder
    // (admin/, api/, etc.) includes this file.
    header("Location: /vip-numbers/vip-numbers/php/login.php");
    exit;
}
