<?php

header("Content-Type: application/json");

require_once "../lib/db.php";

$full_name = trim($_POST['full_name'] ?? '');
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$mobile_number = trim($_POST['mobile_number'] ?? '');

if (
    empty($full_name) ||
    empty($username) ||
    empty($email) ||
    empty($mobile_number)
) {
    echo json_encode([
        "success" => false,
        "message" => "All fields are required."
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid email address."
    ]);
    exit;
}

if (!preg_match('/^[0-9]{10}$/', $mobile_number)) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid mobile number."
    ]);
    exit;
}

// Get the only user
$user = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT id FROM users LIMIT 1")
);

if (!$user) {
    echo json_encode([
        "success" => false,
        "message" => "User not found."
    ]);
    exit;
}

$id = $user['id'];

// Check duplicate username
$result = mysqli_query(
    $conn,
    "SELECT id FROM users
     WHERE username='" . mysqli_real_escape_string($conn, $username) . "'
     AND id != $id"
);

if (mysqli_num_rows($result) > 0) {
    echo json_encode([
        "success" => false,
        "message" => "Username already exists."
    ]);
    exit;
}

// Check duplicate email
$result = mysqli_query(
    $conn,
    "SELECT id FROM users
     WHERE email='" . mysqli_real_escape_string($conn, $email) . "'
     AND id != $id"
);

if (mysqli_num_rows($result) > 0) {
    echo json_encode([
        "success" => false,
        "message" => "Email already exists."
    ]);
    exit;
}

// Update profile
$stmt = mysqli_prepare(
    $conn,
    "UPDATE users
     SET
        full_name=?,
        username=?,
        email=?,
        mobile_number=?,
        updated_at=NOW()
     WHERE id=?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssssi",
    $full_name,
    $username,
    $email,
    $mobile_number,
    $id
);

if (mysqli_stmt_execute($stmt)) {

    echo json_encode([
        "success" => true,
        "message" => "Profile updated successfully."
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => "Failed to update profile."
    ]);

}