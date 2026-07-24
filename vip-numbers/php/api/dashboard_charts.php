<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$months = [];
$added = [];
$sold = [];

for ($i = 5; $i >= 0; $i--) {

    $month = date("Y-m", strtotime("-$i month"));
    $label = date("M", strtotime($month . "-01"));

    $months[] = $label;

    // Numbers Added
    $sql = "
        SELECT COUNT(*) AS total
        FROM vip_numbers
        WHERE DATE_FORMAT(created_at,'%Y-%m') = '$month'
    ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $added[] = (int)$row['total'];

    // Numbers Sold
    $sql = "
        SELECT COUNT(*) AS total
        FROM vip_numbers
        WHERE status='Sold'
        AND DATE_FORMAT(updated_at,'%Y-%m') = '$month'
    ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sold[] = (int)$row['total'];
}

echo json_encode([
    "months" => $months,
    "added"  => $added,
    "sold"   => $sold
]);