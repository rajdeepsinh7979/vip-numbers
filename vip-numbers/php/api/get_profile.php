<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$result = mysqli_query($conn, "
    SELECT
        id,
        full_name,
        username,
        email,
        mobile_number,
        updated_at
    FROM users
    LIMIT 1
");

if ($user = mysqli_fetch_assoc($result)) {

    echo json_encode([
        "success" => true,
        "user" => $user
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => "No user found."
    ]);

}