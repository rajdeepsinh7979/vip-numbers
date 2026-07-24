<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

// Total Numbers
$total = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM vip_numbers")
)['total'];

// Available
$available = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM vip_numbers WHERE status='Available'")
)['total'];

// Sold
$sold = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM vip_numbers WHERE status='Sold'")
)['total'];

// Reserved
$reserved = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM vip_numbers WHERE status='Reserved'")
)['total'];

// Premium Category
$premium = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM vip_numbers WHERE category='Premium'")
)['total'];

echo json_encode([

    "total"=>$total,

    "available"=>[
        "count"=>$available,
        "percent"=>$total ? round(($available/$total)*100,1):0
    ],

    "sold"=>[
        "count"=>$sold,
        "percent"=>$total ? round(($sold/$total)*100,1):0
    ],

    "premium"=>[
        "count"=>$premium,
        "percent"=>$total ? round(($premium/$total)*100,1):0
    ],

    "reserved"=>[
        "count"=>$reserved,
        "percent"=>$total ? round(($reserved/$total)*100,1):0
    ]

]);