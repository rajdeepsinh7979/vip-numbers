<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$id = intval($_POST["id"] ?? 0);

$mobile   = trim($_POST["mobile_number"] ?? "");
$category = trim($_POST["category"] ?? "");
$sum1     = $_POST["sum1"] ?? "";
$sum2     = $_POST["sum2"] ?? "";
$sum3     = $_POST["sum3"] ?? "";
$ranges   = trim($_POST["highlight_ranges"] ?? "");
$original = $_POST["original_price"] ?? "";
$discount = $_POST["discount"] ?? "";
$selling  = $_POST["selling_price"] ?? "";
$status   = $_POST["status"] ?? "";

if ($id <= 0) {
    echo json_encode(["success" => false, "message" => "Missing or invalid record id"]);
    exit;
}

if (!preg_match('/^\d{10}$/', $mobile)) {
    echo json_encode(["success" => false, "message" => "Mobile number must be 10 digits"]);
    exit;
}

$sql = "UPDATE vip_numbers SET
    mobile_number = ?,
    category = ?,
    sum1 = ?,
    sum2 = ?,
    sum3 = ?,
    highlight_ranges = ?,
    original_price = ?,
    discount = ?,
    selling_price = ?,
    status = ?,
    updated_at = NOW()
    WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
    exit;
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssdddsi",
    $mobile,
    $category,
    $sum1,
    $sum2,
    $sum3,
    $ranges,
    $original,
    $discount,
    $selling,
    $status,
    $id
);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        "success" => true,
        "message" => "Number updated"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => mysqli_stmt_error($stmt)
    ]);
}

mysqli_stmt_close($stmt);