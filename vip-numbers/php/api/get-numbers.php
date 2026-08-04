<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$search   = trim($_GET['search'] ?? '');
$category = trim($_GET['category'] ?? 'all');
$status   = trim($_GET['status'] ?? 'all');
$sort     = trim($_GET['sort'] ?? 'latest');

$where  = [];
$params = [];
$types  = '';

if ($search !== '') {
    $where[]  = "mobile_number LIKE ?";
    $params[] = '%' . $search . '%';
    $types   .= 's';
}
if ($category !== '' && $category !== 'all') {
    $where[]  = "category = ?";
    $params[] = $category;
    $types   .= 's';
}
if ($status !== '' && $status !== 'all') {
    $where[]  = "status = ?";
    $params[] = $status;
    $types   .= 's';
}

$sql = "SELECT id, mobile_number, category, sum1, sum2, sum3, highlight_ranges,
               original_price, discount, selling_price, status, views, created_at, updated_at
        FROM vip_numbers";

if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

switch ($sort) {
    case 'oldest':
        $sql .= " ORDER BY created_at ASC";
        break;
    case 'price-high':
        $sql .= " ORDER BY selling_price DESC";
        break;
    case 'price-low':
        $sql .= " ORDER BY selling_price ASC";
        break;
    default:
        $sql .= " ORDER BY created_at DESC";
}

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
    exit;
}

if ($types !== '') {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$numbers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $numbers[] = $row;
}
mysqli_stmt_close($stmt);

echo json_encode([
    "success" => true,
    "numbers" => $numbers,
    "count"   => count($numbers)
]);
