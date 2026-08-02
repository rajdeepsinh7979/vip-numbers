<?php

header("Content-Type: application/json");
session_start();

require_once "../lib/db.php";

$identifierRaw = trim($_POST['identifier'] ?? '');
$password      = $_POST['password'] ?? '';

if ($identifierRaw === '' || $password === '') {
    echo json_encode(["success" => false, "message" => "Email/mobile and password are required"]);
    exit;
}

// If they typed a phone number (with +91, spaces, dashes, etc.),
// normalize it down to the last 10 digits so it matches how it's stored.
$digitsOnly = preg_replace('/\D/', '', $identifierRaw);
$possiblePhone = strlen($digitsOnly) >= 10 ? substr($digitsOnly, -10) : $digitsOnly;

$sql = "SELECT id, full_name, username, email, mobile_number, password
        FROM users
        WHERE email = ? OR mobile_number = ?
        LIMIT 1";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $identifierRaw, $possiblePhone);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user || !password_verify($password, $user['password'])) {
    echo json_encode(["success" => false, "message" => "Invalid email/mobile or password"]);
    exit;
}

// Regenerate the session id on login to prevent session fixation
session_regenerate_id(true);

$_SESSION['user_id']  = $user['id'];
$_SESSION['username'] = $user['username'];

echo json_encode([
    "success"  => true,
    "message"  => "Login successful",
    "redirect" => "admin/dashboard.php"
]);
