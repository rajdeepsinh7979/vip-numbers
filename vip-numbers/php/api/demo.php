<?php

require_once "../lib/db.php";

$full_name = "Admin User";
$username = "admin";
$email = "admin@example.com";
$mobile_number = "9876543210";

// Password
$password = "admin123";

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO users
    (full_name, username, email, mobile_number, password)
    VALUES (?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $full_name,
    $username,
    $email,
    $mobile_number,
    $hashedPassword
);

if (mysqli_stmt_execute($stmt)) {
    echo "Admin created successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}