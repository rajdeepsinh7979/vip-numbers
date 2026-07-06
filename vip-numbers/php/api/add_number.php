<?php
header('Content-Type: application/json');

require_once '../lib/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request."
    ]);
    exit;
}

// Get POST data
$mobile_number = trim($_POST['mobile_number'] ?? '');
$sum1 = intval($_POST['sum1'] ?? 0);
$sum2 = intval($_POST['sum2'] ?? 0);
$sum3 = intval($_POST['sum3'] ?? 0);
$highlight_ranges = trim($_POST['highlight_ranges'] ?? '');
$original_price = intval($_POST['original_price'] ?? 0);
$discount = intval($_POST['discount'] ?? 0);
$status = $_POST['status'] ?? 'Available';
$category = $_POST['category'] ?? 'VIP';

// Validation
if (
    empty($mobile_number) ||
    strlen($mobile_number) != 10 ||
    !ctype_digit($mobile_number)
) {
    echo json_encode([
        "success" => false,
        "message" => "Enter a valid 10 digit mobile number."
    ]);
    exit;
}

if ($discount < 0 || $discount > 100) {
    echo json_encode([
        "success" => false,
        "message" => "Discount must be between 0 and 100."
    ]);
    exit;
}

// Calculate selling price
$selling_price = $original_price + (($original_price * $discount) / 100);

// Check duplicate number
$check = $conn->prepare("SELECT id FROM vip_numbers WHERE mobile_number=?");
$check->bind_param("s", $mobile_number);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo json_encode([
        "success" => false,
        "message" => "This mobile number already exists."
    ]);
    exit;
}

$check->close();

// Insert
$stmt = $conn->prepare("
INSERT INTO vip_numbers
(
mobile_number,
sum1,
sum2,
sum3,
highlight_ranges,
original_price,
discount,
selling_price,
status,
category
)
VALUES
(
?,?,?,?,?,?,?,?,?,?
)
");

$stmt->bind_param(
    "siiisiisss",
    $mobile_number,
    $sum1,
    $sum2,
    $sum3,
    $highlight_ranges,
    $original_price,
    $discount,
    $selling_price,
    $status,
    $category
);

if ($stmt->execute()) {

    echo json_encode([
        "success" => true,
        "message" => "VIP Number added successfully."
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => "Database Error : " . $stmt->error
    ]);

}

$stmt->close();
$conn->close();
?>