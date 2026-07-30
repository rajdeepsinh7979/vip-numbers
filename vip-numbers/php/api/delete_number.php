<?php

require_once "../lib/db.php";

// Check if ID exists
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid ID");
}

$id = (int)$_GET['id'];

// Get number details before deleting
$stmt = $conn->prepare("
    SELECT mobile_number
    FROM vip_numbers
    WHERE id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Number not found");
}

$number = $result->fetch_assoc()['mobile_number'];

$stmt->close();


// Delete number
$stmt = $conn->prepare("
    DELETE FROM vip_numbers
    WHERE id = ?
");

$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    // Activity Log
    $title = "Number Deleted";
    $description = $number . " removed from inventory";
    $color = "red";

    $log = $conn->prepare("
        INSERT INTO activity_log
        (title, description, color)
        VALUES (?, ?, ?)
    ");

    $log->bind_param(
        "sss",
        $title,
        $description,
        $color
    );

    $log->execute();
    $log->close();

    header("Location: ../admin/dashboard.php?deleted=1");
    exit;

} else {

    echo "Delete failed.";

}

$stmt->close();
$conn->close();

?>