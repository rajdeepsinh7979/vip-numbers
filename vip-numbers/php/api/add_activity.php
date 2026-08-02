<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "message" => "Method Not Allowed"
    ]);
    exit;
}

$title = trim($_POST["title"] ?? "");
$description = trim($_POST["description"] ?? "");
$color = trim($_POST["color"] ?? "");

if ($title == "" || $description == "" || $color == "") {
    echo json_encode([
        "success" => false,
        "message" => "Missing required fields."
    ]);
    exit;
}

$allowedColors = ["green", "blue", "red", "purple"];

if (!in_array($color, $allowedColors)) {
    $color = "blue";
}

$stmt = $conn->prepare("
    INSERT INTO activity_log
    (title, description, color)
    VALUES (?, ?, ?)
");

$stmt->bind_param(
    "sss",
    $title,
    $description,
    $color
);

if ($stmt->execute()) {

    // Keep the table trimmed to roughly the last 30 days — delete anything older
    // every time a new activity comes in, so it never needs a separate cron job.
    $conn->query("DELETE FROM activity_log WHERE created_at < (NOW() - INTERVAL 30 DAY)");

    echo json_encode([
        "success" => true,
        "message" => "Activity added successfully."
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => $stmt->error
    ]);

}

$stmt->close();
$conn->close();