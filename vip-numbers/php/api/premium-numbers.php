<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$status = trim($_GET['status'] ?? 'all');

// Maximum 12 VIP + 12 Premium
$limit = 12;

$params = [];
$types  = "";

/*
|--------------------------------------------------------------------------
| Build Query
|--------------------------------------------------------------------------
| Returns:
|   - First 12 VIP numbers
|   - Then 12 Premium numbers
| Optional status filter:
|   ?status=available
|   ?status=sold
|   ?status=reserved
|--------------------------------------------------------------------------
*/

$sql = "
(
    SELECT
        id,
        mobile_number,
        sum1,
        sum2,
        sum3,
        highlight_ranges,
        original_price,
        discount,
        selling_price,
        status,
        category,
        views,
        created_at,
        updated_at
    FROM vip_numbers
    WHERE category = 'vip'
";

if ($status !== "" && strtolower($status) !== "all") {
    $sql .= " AND status = ? ";
    $params[] = $status;
    $types .= "s";
}

$sql .= "
    ORDER BY created_at DESC
    LIMIT {$limit}
)

UNION ALL

(
    SELECT
        id,
        mobile_number,
        sum1,
        sum2,
        sum3,
        highlight_ranges,
        original_price,
        discount,
        selling_price,
        status,
        category,
        views,
        created_at,
        updated_at
    FROM vip_numbers
    WHERE category = 'premium'
";

if ($status !== "" && strtolower($status) !== "all") {
    $sql .= " AND status = ? ";
    $params[] = $status;
    $types .= "s";
}

$sql .= "
    ORDER BY created_at DESC
    LIMIT {$limit}
)
";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
    exit;
}

if (!empty($params)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$numbers = [];

while ($row = mysqli_fetch_assoc($result)) {

    $row['id']             = (int)$row['id'];
    $row['sum1']           = (int)$row['sum1'];
    $row['sum2']           = (int)$row['sum2'];
    $row['sum3']           = (int)$row['sum3'];
    $row['original_price'] = (float)$row['original_price'];
    $row['discount']       = (int)$row['discount'];
    $row['selling_price']  = (float)$row['selling_price'];
    $row['views']          = (int)$row['views'];

    $numbers[] = $row;
}

mysqli_stmt_close($stmt);

echo json_encode([
    "success" => true,
    "count"   => count($numbers),
    "numbers" => $numbers
]);