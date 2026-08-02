<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$code = trim($_GET['code'] ?? '');

if ($code === '') {
    echo json_encode(["success" => false, "message" => "Missing reset code"]);
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
    // Clean up the expired code so it can't linger in the table
    $del = mysqli_prepare($conn, "DELETE FROM reset_pass WHERE id = ?");
    mysqli_stmt_bind_param($del, "i", $row['id']);
    mysqli_stmt_execute($del);
    mysqli_stmt_close($del);

    echo json_encode(["success" => false, "message" => "This reset link has expired"]);
    exit;
}

echo json_encode(["success" => true, "message" => "Code is valid"]);
