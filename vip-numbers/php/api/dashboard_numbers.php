<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$sql = "SELECT
            id,
            mobile_number,
            category,
            selling_price,
            status,
            created_at
        FROM vip_numbers
        ORDER BY created_at DESC
        LIMIT 5";

$result = mysqli_query($conn, $sql);

$numbers = [];

while($row = mysqli_fetch_assoc($result)){

    $numbers[] = [
        "id"       => $row["id"],
        "number"   => $row["mobile_number"],
        "category" => $row["category"],
        "price"    => $row["selling_price"],
        "status"   => $row["status"],
        "date"     => date("M d, Y", strtotime($row["created_at"]))
    ];

}

echo json_encode([
    "success"=>true,
    "numbers"=>$numbers
]);