<?php

header("Content-Type: application/json");

require_once "../lib/db.php";           // only used to reuse $MAIL / $APP_PASSWORD if you keep them there
require_once "../vendor/autoload.php"; // Composer autoload for PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ---------- 1. Read & validate form input ----------
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? 'New Contact Message');
$message = trim($_POST['message'] ?? '');
$honeypot = trim($_POST['website'] ?? ''); // hidden field — bots tend to fill it in
$captchaToken = trim($_POST['g-recaptcha-response'] ?? '');

// Silently pretend success so bots don't learn the honeypot was tripped
if ($honeypot !== '') {
    echo json_encode(["success" => true, "message" => "Your message has been sent successfully"]);
    exit;
}

// ---------- Verify Google reCAPTCHA ----------
$RECAPTCHA_SECRET = $SECRET_KEY; // from https://www.google.com/recaptcha/admin

if ($captchaToken === '') {
    echo json_encode(["success" => false, "message" => "Please verify you are not a robot"]);
    exit;
}

$verify = file_get_contents(
    "https://www.google.com/recaptcha/api/siteverify?secret=" . urlencode($RECAPTCHA_SECRET)
    . "&response=" . urlencode($captchaToken)
);
$verifyData = json_decode($verify, true);

if (!$verifyData || empty($verifyData['success'])) {
    echo json_encode(["success" => false, "message" => "reCAPTCHA verification failed, please try again"]);
    exit;
}

if ($name === '' || $email === '' || $message === '') {
    echo json_encode(["success" => false, "message" => "Name, email and message are required"]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["success" => false, "message" => "Please enter a valid email address"]);
    exit;
}

// Basic length guards to stop abuse (no DB storage needed per requirement)
if (strlen($name) > 100 || strlen($subject) > 150 || strlen($message) > 3000 || strlen($phone) > 20) {
    echo json_encode(["success" => false, "message" => "One of the fields is too long"]);
    exit;
}

// ---------- 2. Find the admin's email (single-admin system) ----------
$result = mysqli_query($conn, "SELECT id, email FROM users LIMIT 1");
$admin  = mysqli_fetch_assoc($result);

if (!$admin) {
    echo json_encode(["success" => false, "message" => "Admin account not found"]);
    exit;
}

// ---------- 3. Send the email ----------
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $MAIL;         // Gmail address (from lib/db.php or your config)
    $mail->Password   = $APP_PASSWORD; // Gmail App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Send TO the admin, but set Reply-To as the visitor so you can hit "Reply" directly
    $mail->setFrom($MAIL, 'Bhudev Sim Store Website');
    $mail->addAddress($admin['email']);
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'New message from website: ' . $subject;

    $safeName    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $safeEmail   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $safePhone   = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
    $safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

    $mail->Body = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="margin:0; padding:0; background-color:#0a0a0f; font-family: Helvetica, Arial, sans-serif;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#0a0a0f; padding:40px 16px;">
            <tr>
                <td align="center">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:520px; background-color:#131318; border:1px solid #2a2a33; border-radius:14px; overflow:hidden;">

                        <tr>
                            <td style="height:4px; background-color:#D4AF37; font-size:0; line-height:0;">&nbsp;</td>
                        </tr>

                        <tr>
                            <td style="padding:32px 32px 8px; text-align:center;">
                                <div style="display:inline-block; width:44px; height:44px; line-height:44px; border-radius:10px; background-color:#D4AF37; color:#0a0a0f; font-weight:bold; font-size:20px; font-family: Georgia, serif;">V</div>
                                <div style="margin-top:12px; color:#ffffff; font-size:17px; font-weight:600;">
                                    Bhudev <span style="color:#D4AF37;">Sim Store</span>
                                </div>
                                <div style="color:#8a8a94; font-size:11px; letter-spacing:0.12em; text-transform:uppercase; margin-top:2px;">
                                    New Contact Form Message
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:24px 32px 8px;">
                                <h1 style="margin:0 0 16px; color:#ffffff; font-size:18px; font-weight:600;">' . $safeSubject . '</h1>

                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
                                    <tr>
                                        <td style="padding:6px 0; color:#8a8a94; font-size:12px; width:80px;">Name</td>
                                        <td style="padding:6px 0; color:#e8e8e8; font-size:13px;">' . $safeName . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:6px 0; color:#8a8a94; font-size:12px;">Email</td>
                                        <td style="padding:6px 0; color:#4A9DFF; font-size:13px;">' . $safeEmail . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:6px 0; color:#8a8a94; font-size:12px;">Phone</td>
                                        <td style="padding:6px 0; color:#e8e8e8; font-size:13px;">' . ($safePhone !== '' ? $safePhone : '—') . '</td>
                                    </tr>
                                </table>

                                <div style="background-color:rgba(212,175,55,0.06); border:1px solid rgba(212,175,55,0.2); border-radius:8px; padding:16px; color:#e8e8e8; font-size:13px; line-height:1.7;">
                                    ' . $safeMessage . '
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:0 32px;">
                                <div style="border-top:1px solid #2a2a33; margin-top:24px;"></div>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:16px 32px 28px; text-align:center;">
                                <p style="margin:0; color:#6f6f79; font-size:11px; line-height:1.6;">
                                    Reply directly to this email to respond to ' . $safeName . '.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>
    ';

    $mail->AltBody = "New message from website contact form\n\n"
        . "Subject: " . $subject . "\n"
        . "Name: " . $name . "\n"
        . "Email: " . $email . "\n"
        . "Phone: " . ($phone !== '' ? $phone : '-') . "\n\n"
        . "Message:\n" . $message;

    $mail->send();

    echo json_encode(["success" => true, "message" => "Your message has been sent successfully"]);

} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Could not send message: " . $mail->ErrorInfo]);
}