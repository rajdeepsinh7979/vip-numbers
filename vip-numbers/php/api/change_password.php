<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$currentPassword = trim($_POST['current_password'] ?? '');
$newPassword = trim($_POST['new_password'] ?? '');

if (empty($currentPassword) || empty($newPassword)) {
    echo json_encode([
        "success" => false,
        "message" => "All fields are required."
    ]);
    exit;
}

if (strlen($newPassword) < 8) {
    echo json_encode([
        "success" => false,
        "message" => "New password must be at least 8 characters."
    ]);
    exit;
}

// Get the only user
$result = mysqli_query($conn, "SELECT id, password FROM users LIMIT 1");

if (mysqli_num_rows($result) == 0) {
    echo json_encode([
        "success" => false,
        "message" => "User not found."
    ]);
    exit;
}

$user = mysqli_fetch_assoc($result);

// Verify current password
if (!password_verify($currentPassword, $user['password'])) {
    echo json_encode([
        "success" => false,
        "message" => "Current password is incorrect. || "
    ]);
    
    exit;
}

// Prevent same password
if (password_verify($newPassword, $user['password'])) {
    echo json_encode([
        "success" => false,
        "message" => "New password must be different from the current password."
    ]);
    exit;
}

// Hash new password
$newHash = password_hash($newPassword, PASSWORD_DEFAULT);

// Update password
$stmt = mysqli_prepare(
    $conn,
    "UPDATE users
     SET password = ?, updated_at = NOW()
     WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "si",
    $newHash,
    $user['id']
);

if (mysqli_stmt_execute($stmt)) {

    echo json_encode([
        "success" => true,
        "message" => "Password updated successfully."
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => "Failed to update password."
    ]);

}