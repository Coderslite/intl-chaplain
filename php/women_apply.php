<?php
session_start();
include "session.php";
include "db_config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';


/**
 * -----------------------------------------------------------------------
 * SEND REGISTRATION CONFIRMATION EMAIL
 * -----------------------------------------------------------------------
 */
function sendWomenConferenceEmail($first_name, $last_name, $email)
{
    $mail = new PHPMailer(true);

    // ── SMTP CONFIGURATION ───────────────────────────────────────────────
    $smtpHost = 'intlchaplains.com';
    $smtpUsername = 'info@intlchaplains.com';
    $smtpReplyEmail = 'cmintlcorp@gmail.com';
    $smtpPassword = 'K*@@cHDq?*U*';
    $fromName = 'Chaplain Ministries Intl Corp';
    // ─────────────────────────────────────────────────────────────────────

    $full_name = htmlspecialchars($first_name . ' ' . $last_name);

    // ── HTML EMAIL BODY ──────────────────────────────────────────────────
    $htmlBody = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Women Conference Registration Confirmed</title>
</head>
<body style="margin:0;padding:0;background-color:#fdf4ff;font-family:\'Segoe UI\',Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#fdf4ff;padding:40px 0;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="max-width:620px;background-color:#ffffff;border-radius:12px;
                           overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.08);">

                    <!-- HEADER -->
                    <tr>
                        <td align="center"
                            style="background:linear-gradient(135deg, #6a1b9a 0%, #c2185b 100%);
                                   padding:44px 40px 36px;">

                            <!-- LOGO -->
                            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 20px;">
                                <tr>
                                    <td align="center" valign="middle"
                                        style="width:90px;height:90px;
                                               background-color:rgba(255,255,255,0.15);
                                               border-radius:50%;">
                                        <img src="https://intlchaplains.com/assets/img/client-logos/logo.png"
                                             alt="Chaplain Ministries Logo"
                                             width="60" height="60"
                                             style="display:block;width:60px;height:60px;
                                                    object-fit:contain;border:0;margin:0 auto;" />
                                    </td>
                                </tr>
                            </table>

                            <h1 style="margin:0 0 6px;color:#ffffff;font-size:24px;font-weight:700;letter-spacing:0.5px;">
                                Women Conference 2026
                            </h1>
                            <p style="margin:0;color:rgba(255,255,255,0.80);font-size:13px;
                                      letter-spacing:1.5px;text-transform:uppercase;">
                                Registration Confirmed
                            </p>
                        </td>
                    </tr>

                    <!-- PINK SUCCESS BANNER -->
                    <tr>
                        <td align="center"
                            style="background-color:#fce4ec;padding:18px 40px;
                                   border-bottom:3px solid #e91e63;">
                            <p style="margin:0;color:#880e4f;font-size:15px;font-weight:600;">
                                🎉 &nbsp;You are successfully registered for the Women Conference!
                            </p>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:40px 40px 30px;">

                            <p style="margin:0 0 10px;color:#555;font-size:15px;">
                                Dear <strong style="color:#6a1b9a;">' . $full_name . '</strong>,
                            </p>

                            <p style="margin:0 0 20px;color:#555;font-size:15px;line-height:1.7;">
                                Thank you for registering for the <strong>Women Conference 2026</strong>!
                                We are so excited to have you join us for this inspiring and empowering event.
                            </p>

                            <p style="margin:0 0 24px;color:#555;font-size:15px;line-height:1.7;">
                                Our team will review your registration and send you full event details —
                                including the schedule, venue, and speakers — within
                                <strong>1–3 business days</strong>.
                            </p>

                            <!-- INFO BOX -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:linear-gradient(135deg,#f3e5f5,#fce4ec);
                                       border-radius:12px;margin-bottom:28px;">
                                <tr>
                                    <td style="padding:24px 24px;">

                                        <p style="margin:0 0 14px;color:#6a1b9a;font-size:13px;
                                                  font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">
                                            🕊️ &nbsp;What Happens Next
                                        </p>

                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td valign="top" width="28"
                                                    style="padding:0 0 12px;color:#c2185b;
                                                           font-size:18px;font-weight:700;">1.
                                                </td>
                                                <td style="padding:0 0 12px;color:#555;font-size:14px;line-height:1.6;">
                                                    Check your inbox — we will send event details within 1–3 business days.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" width="28"
                                                    style="padding:0 0 12px;color:#c2185b;
                                                           font-size:18px;font-weight:700;">2.
                                                </td>
                                                <td style="padding:0 0 12px;color:#555;font-size:14px;line-height:1.6;">
                                                    Save the date and make arrangements to attend.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" width="28"
                                                    style="color:#c2185b;font-size:18px;font-weight:700;">3.
                                                </td>
                                                <td style="color:#555;font-size:14px;line-height:1.6;">
                                                    Reply to this email if you have any questions — we are happy to help!
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                            <!-- QUOTE / ENCOURAGEMENT -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="border-left:4px solid #e91e63;
                                       background-color:#fff8fb;
                                       border-radius:0 8px 8px 0;
                                       margin-bottom:28px;">
                                <tr>
                                    <td style="padding:18px 20px;">
                                        <p style="margin:0;color:#880e4f;font-size:14px;
                                                  font-style:italic;line-height:1.7;">
                                            "She is clothed with strength and dignity, and she laughs without fear of the future."
                                        </p>
                                        <p style="margin:8px 0 0;color:#c2185b;font-size:13px;font-weight:600;">
                                            — Proverbs 31:25
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0 0 6px;color:#555;font-size:15px;line-height:1.7;">
                                We look forward to seeing you at the conference. If you have any questions,
                                feel free to reply to this email.
                            </p>

                            <p style="margin:24px 0 0;color:#555;font-size:15px;">
                                Warmly,<br/>
                                <strong style="color:#6a1b9a;">The Chaplain Ministries Intl Corp Team</strong>
                            </p>
                        </td>
                    </tr>

                    <!-- DIVIDER -->
                    <tr>
                        <td style="padding:0 40px;">
                            <hr style="border:none;border-top:1px solid #f3e5f5;margin:0;">
                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td align="center" style="padding:24px 40px 32px;">
                            <p style="margin:0 0 6px;color:#bbb;font-size:12px;">
                                This is an automated confirmation — reply to this email for any enquiries.
                            </p>
                            <p style="margin:0;color:#bbb;font-size:12px;">
                                &copy; ' . date('Y') . ' Chaplain Ministries Intl Corp. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>';

    // ── PLAIN TEXT FALLBACK ──────────────────────────────────────────────
    $plainBody = "Dear $full_name,\n\n"
        . "Thank you for registering for the Women Conference 2026!\n\n"
        . "We are excited to have you join us. Our team will send you full event details "
        . "— including the schedule, venue, and speakers — within 1–3 business days.\n\n"
        . "WHAT HAPPENS NEXT:\n"
        . "1. Check your inbox for event details within 1–3 business days.\n"
        . "2. Save the date and make arrangements to attend.\n"
        . "3. Reply to this email if you have any questions.\n\n"
        . "Warmly,\n"
        . "The Chaplain Ministries Intl Corp Team";

    try {
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($smtpUsername, $fromName);
        $mail->addReplyTo($smtpReplyEmail, $fromName);
        $mail->addAddress($email, $full_name);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = '🎉 You\'re Registered — Women Conference 2026';
        $mail->Body = $htmlBody;
        $mail->AltBody = $plainBody;
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'error_log';

        $mail->send();
        return [true, "Confirmation email sent."];

    } catch (Exception $e) {
        error_log("Women conference email failed: " . $mail->ErrorInfo);
        return [false, "Email could not be sent: " . $mail->ErrorInfo];
    }
}


/**
 * -----------------------------------------------------------------------
 * PROCESS FORM
 * -----------------------------------------------------------------------
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // CHECK IF EMAIL ALREADY REGISTERED
    $checkEmail = mysqli_query($conn, "
        SELECT id FROM women_event
        WHERE email = '$email'
        AND status != 'deleted'
        LIMIT 1
    ");

    if (mysqli_num_rows($checkEmail) > 0) {
        $_SESSION['ErrorMessage'] = "This email is already registered for the conference.";
        header("Location: ../event.php");
        exit();
    }

    // INSERT INTO DATABASE
    $query = mysqli_query($conn, "
        INSERT INTO women_event (firstname, lastname, email, phone)
        VALUES ('$first_name', '$last_name', '$email', '$phone')
    ");

    if ($query) {

        // SEND CONFIRMATION EMAIL
        list($mailSent, $mailMessage) = sendWomenConferenceEmail(
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email']
        );

        if (!$mailSent) {
            error_log("Women event: registration saved but email failed for {$_POST['email']} — $mailMessage");
        }

        $_SESSION['SuccessMessage'] = "You're registered! Please check your email for confirmation.";
        header("Location: ../event.php");
        exit();

    } else {
        $_SESSION['ErrorMessage'] = "Registration failed. Please try again.";
        header("Location: ../event.php");
        exit();
    }
}
?>