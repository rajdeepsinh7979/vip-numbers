<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

/*
|--------------------------------------------------------------------------
| Status Distribution
|--------------------------------------------------------------------------
*/

$status = [];

$statusQuery = mysqli_query($conn,"
SELECT status,COUNT(*) total
FROM vip_numbers
GROUP BY status
");

while($row=mysqli_fetch_assoc($statusQuery)){

    $status[$row['status']] = (int)$row['total'];

}

/*
|--------------------------------------------------------------------------
| Category Distribution
|--------------------------------------------------------------------------
*/

$categoryLabels = [];
$categoryData = [];

$categoryQuery = mysqli_query($conn,"
SELECT category,COUNT(*) total
FROM vip_numbers
GROUP BY category
");

while($row=mysqli_fetch_assoc($categoryQuery)){

    $categoryLabels[] = $row['category'];
    $categoryData[] = (int)$row['total'];

}

/*
|--------------------------------------------------------------------------
| Available vs Sold (Last 6 Months)
|--------------------------------------------------------------------------
*/

$months=[];
$available=[];
$sold=[];

for($i=5;$i>=0;$i--){

    $month=date("Y-m",strtotime("-$i month"));

    $months[]=date("M",strtotime($month."-01"));

    // Available Added
    $q=mysqli_query($conn,"
    SELECT COUNT(*) total
    FROM vip_numbers
    WHERE status='Available'
    AND DATE_FORMAT(created_at,'%Y-%m')='$month'
    ");

    $available[]=(int)mysqli_fetch_assoc($q)['total'];

    // Sold
    $q=mysqli_query($conn,"
    SELECT COUNT(*) total
    FROM vip_numbers
    WHERE status='Sold'
    AND DATE_FORMAT(updated_at,'%Y-%m')='$month'
    ");

    $sold[]=(int)mysqli_fetch_assoc($q)['total'];

}

echo json_encode([

    "status"=>[
        "Available"=>$status['Available']??0,
        "Sold"=>$status['Sold']??0,
        "Reserved"=>$status['Reserved']??0
    ],

    "category"=>[
        "labels"=>$categoryLabels,
        "data"=>$categoryData
    ],

    "comparison"=>[
        "months"=>$months,
        "available"=>$available,
        "sold"=>$sold
    ]

]);