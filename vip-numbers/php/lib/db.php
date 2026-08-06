<?php
// db.php - Database connection

$host = 'localhost';
$dbname = 'vip_numbers_db';
$dbuser = 'root';
$dbpass = '';

$MAIL ='jalpitparmar1234@gmail.com';
$APP_PASSWORD = 'bmbf bgad tgve nyeu';
$LINK = 'http://localhost/vip-numbers/vip-numbers/php/forgot-password.php?cod=';

$SECRET_KEY = '6LfAeHgtAAAAAKr7fMUxmzQHlzUyawqVTjitYJds';

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);   

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

$conn->set_charset('utf8mb4');


// if (!isset($_SESSION['admin_id'])) {
//     echo json_encode([
//         "success" => false,
//         "message" => "Please login first."
//     ]);
//     exit;
// }