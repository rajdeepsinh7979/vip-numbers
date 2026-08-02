<?php

header("Content-Type: application/json");

require_once "../lib/db.php";
require_once "../vendor/autoload.php"; // Composer autoload for PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Single-admin system — there's only one row in users, so no email input needed.
$result = mysqli_query($conn, "SELECT id, email FROM users LIMIT 1");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo json_encode(["success" => false, "message" => "No admin account found"]);
    exit;
}

// Generate a long random code; only its hash is ever stored.
$code     = bin2hex(random_bytes(32));
$codeHash = hash('sha256', $code);
$expiresAt = date('Y-m-d H:i:s', strtotime('+5 minutes'));

// Housekeeping: purge any codes (for any user) that have already expired,
// so they don't just sit in the table forever if nobody ever clicks them.
mysqli_query($conn, "DELETE FROM reset_pass WHERE expires_at < NOW()");

// Invalidate any earlier unused reset codes for this user first.
$del = mysqli_prepare($conn, "DELETE FROM reset_pass WHERE user_id = ?");
mysqli_stmt_bind_param($del, "i", $user['id']);
mysqli_stmt_execute($del);
mysqli_stmt_close($del);

$stmt = mysqli_prepare($conn, "INSERT INTO reset_pass (user_id, code_hash, expires_at) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "iss", $user['id'], $codeHash, $expiresAt);

if (!mysqli_stmt_execute($stmt)) {
    echo json_encode(["success" => false, "message" => "Could not create reset code"]);
    exit;
}
mysqli_stmt_close($stmt);

$resetLink = $LINK . $code;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $MAIL;     // TODO: your Gmail address
    $mail->Password   = $APP_PASSWORD; // TODO: Gmail App Password (not your login password)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // TEMPORARY — prints the full SMTP conversation so you can see exactly
    // why authentication is failing. Remove these two lines once it's working.
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {
        error_log("PHPMailer debug: $str");
    };

    $mail->setFrom('jalpitparmar1234@gmail.com', 'Bhudev Sim Store');
    $mail->addAddress($user['email']);

    $mail->isHTML(true);
    $mail->Subject = 'Reset your Bhudev Sim Store password';
 $mail->Body    = '
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
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:480px; background-color:#131318; border:1px solid #2a2a33; border-radius:14px; overflow:hidden;">
 
                        <!-- Gold top accent -->
                        <tr>
                            <td style="height:4px; background:linear-gradient(90deg,#9c7a22,#D4AF37,#f5e1a4,#D4AF37,#9c7a22); background-color:#D4AF37; font-size:0; line-height:0;">&nbsp;</td>
                        </tr>
 
                        <!-- Header / Brand -->
                        <tr>
                            <td style="padding:32px 32px 8px; text-align:center;">
                                <div style="display:inline-block; width:44px; height:44px; line-height:44px; border-radius:10px; background-color:#D4AF37; color:#0a0a0f; font-weight:bold; font-size:20px; font-family: Georgia, serif;">V</div>
                                <div style="margin-top:12px; color:#ffffff; font-size:17px; font-weight:600; letter-spacing:0.02em;">
                                    Bhudev <span style="color:#D4AF37;">Sim Store</span>
                                </div>
                                <div style="color:#8a8a94; font-size:11px; letter-spacing:0.12em; text-transform:uppercase; margin-top:2px;">
                                    Premium VIP Numbers
                                </div>
                            </td>
                        </tr>
 
                        <!-- Body -->
                        <tr>
                            <td style="padding:24px 32px 8px; text-align:center;">
                                <div style="display:inline-block; width:52px; height:52px; line-height:52px; border-radius:50%; background-color:rgba(212,175,55,0.1); border:1px solid rgba(212,175,55,0.3); color:#D4AF37; font-size:22px; margin-bottom:20px;">&#128274;</div>
                                <h1 style="margin:0 0 12px; color:#ffffff; font-size:20px; font-weight:600;">Reset your password</h1>
                                <p style="margin:0 0 28px; color:#a7a7b3; font-size:14px; line-height:1.6;">
                                    We received a request to reset the password for your admin account.
                                    Click the button below to choose a new one.
                                </p>
                            </td>
                        </tr>
 
                        <!-- CTA Button -->
                        <tr>
                            <td style="padding:0 32px 28px; text-align:center;">
                                <a href="' . $resetLink . '" target="_blank" style="display:inline-block; padding:14px 32px; background-color:#D4AF37; color:#0a0a0f; text-decoration:none; font-weight:600; font-size:14px; border-radius:10px;">
                                    Reset Password
                                </a>
                            </td>
                        </tr>
 
                        <!-- Expiry notice -->
                        <tr>
                            <td style="padding:0 32px 28px; text-align:center;">
                                <table role="presentation" cellpadding="0" cellspacing="0" style="margin:0 auto; background-color:rgba(212,175,55,0.06); border:1px solid rgba(212,175,55,0.2); border-radius:8px;">
                                    <tr>
                                        <td style="padding:10px 16px; color:#D4AF37; font-size:12px; font-weight:500;">
                                            &#9201; This link expires in 5 minutes
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
 
                        <!-- Fallback link -->
                        <tr>
                            <td style="padding:0 32px 28px;">
                                <p style="margin:0 0 6px; color:#6f6f79; font-size:12px;">Button not working? Paste this link into your browser:</p>
                                <p style="margin:0; color:#4A9DFF; font-size:12px; word-break:break-all;">' . $resetLink . '</p>
                            </td>
                        </tr>
 
                        <!-- Divider -->
                        <tr>
                            <td style="padding:0 32px;">
                                <div style="border-top:1px solid #2a2a33;"></div>
                            </td>
                        </tr>
 
                        <!-- Footer -->
                        <tr>
                            <td style="padding:20px 32px 28px; text-align:center;">
                                <p style="margin:0; color:#6f6f79; font-size:12px; line-height:1.6;">
                                    If you did not request this password reset, you can safely ignore this email —
                                    your password will remain unchanged.
                                </p>
                            </td>
                        </tr>
                    </table>
 
                    <p style="margin:20px 0 0; color:#4a4a52; font-size:11px; letter-spacing:0.05em; text-transform:uppercase;">
                        Bhudev Sim Store &middot; VIP Number Management
                    </p>
                </td>
            </tr>
        </table>
    </body>
    </html>
    ';
 
    $mail->AltBody = "Reset your Bhudev Sim Store password\n\n"
        . "We received a request to reset the password for your admin account.\n"
        . "Open this link to choose a new one (expires in 5 minutes):\n\n"
        . $resetLink . "\n\n"
        . "If you did not request this, you can ignore this email.";
 
    $mail->send();
 
    echo json_encode(["success" => true, "message" => "Reset link sent to your email"]);
 
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Could not send email: " . $mail->ErrorInfo]);
}