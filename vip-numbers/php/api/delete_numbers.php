<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$ids = $_POST['ids'] ?? [];

if (!is_array($ids) || count($ids) === 0) {
    echo json_encode(["success" => false, "message" => "No ids provided"]);
    exit;
}

$ids = array_values(array_unique(array_filter(array_map('intval', $ids), function ($v) {
    return $v > 0;
})));

if (count($ids) === 0) {
    echo json_encode(["success" => false, "message" => "No valid ids provided"]);
    exit;
}

$placeholders = implode(',', array_fill(0, count($ids), '?'));
$types = str_repeat('i', count($ids));

$sql = "DELETE FROM vip_numbers WHERE id IN ($placeholders)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, $types, ...$ids);

if (mysqli_stmt_execute($stmt)) {
    $count = mysqli_stmt_affected_rows($stmt);
    echo json_encode(["success" => true, "message" => "$count number(s) deleted"]);
} else {
    echo json_encode(["success" => false, "message" => mysqli_stmt_error($stmt)]);
}

mysqli_stmt_close($stmt);
