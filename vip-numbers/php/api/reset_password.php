<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$code            = trim($_POST['code'] ?? '');
$newPassword     = $_POST['new_password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if ($code === '' || $newPassword === '' || $confirmPassword === '') {
    echo json_encode(["success" => false, "message" => "Missing required fields"]);
    exit;
}

if ($newPassword !== $confirmPassword) {
    echo json_encode(["success" => false, "message" => "Passwords do not match"]);
    exit;
}

if (strlen($newPassword) < 8
    || !preg_match('/[A-Z]/', $newPassword)
    || !preg_match('/[a-z]/', $newPassword)
    || !preg_match('/[0-9]/', $newPassword)
    || !preg_match('/[^A-Za-z0-9]/', $newPassword)) {
    echo json_encode(["success" => false, "message" => "Password does not meet the strength requirements"]);
    exit;
}

$codeHash = hash('sha256', $code);

$sql = "SELECT id, user_id, expires_at FROM reset_pass WHERE code_hash = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $codeHash);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$row) {
    echo json_encode(["success" => false, "message" => "This reset link is invalid"]);
    exit;
}

if (strtotime($row['expires_at']) < time()) {
    $del = mysqli_prepare($conn, "DELETE FROM reset_pass WHERE id = ?");
    mysqli_stmt_bind_param($del, "i", $row['id']);
    mysqli_stmt_execute($del);
    mysqli_stmt_close($del);

    echo json_encode(["success" => false, "message" => "This reset link has expired"]);
    exit;
}

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$update = mysqli_prepare($conn, "UPDATE users SET password = ?, updated_at = NOW() WHERE id = ?");
mysqli_stmt_bind_param($update, "si", $hashedPassword, $row['user_id']);

if (!mysqli_stmt_execute($update)) {
    echo json_encode(["success" => false, "message" => "Could not update password"]);
    exit;
}
mysqli_stmt_close($update);

// Invalidate the code immediately so the same link can't be used twice
$del = mysqli_prepare($conn, "DELETE FROM reset_pass WHERE id = ?");
mysqli_stmt_bind_param($del, "i", $row['id']);
mysqli_stmt_execute($del);
mysqli_stmt_close($del);

echo json_encode(["success" => true, "message" => "Password reset successfully"]);
