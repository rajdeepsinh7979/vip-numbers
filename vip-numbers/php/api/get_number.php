<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$id = intval($_GET["id"] ?? 0);

$result = mysqli_query($conn,"
SELECT *
FROM vip_numbers
WHERE id=$id
LIMIT 1
");

if(mysqli_num_rows($result)==0){

    echo json_encode([
        "success"=>false,
        "message"=>"Number not found"
    ]);

    exit;
}

$row=mysqli_fetch_assoc($result);

echo json_encode([
    "success"=>true,
    "number"=>$row
]);