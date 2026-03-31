<?php
session_start();
include("db_config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';


/**
 * FILE UPLOAD HELPER
 */
function uploadFile($file, $folder, $allowed_types, $max_size)
{
    if ($file['error'] === 0) {

        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $allowed_types)) {
            return [false, "Invalid file type"];
        }

        if ($file_size > $max_size) {
            return [false, "File too large"];
        }

        $new_name = time() . "_" . uniqid() . "." . $file_ext;
        $destination = $folder . $new_name;

        if (move_uploaded_file($file_tmp, $destination)) {
            return [true, $new_name];
        } else {
            return [false, "Failed to upload file"];
        }
    }

    return [false, "No file uploaded"];
}


/**
 * -----------------------------------------------------------------------
 * SEND CONFIRMATION EMAIL TO CHAPLAIN
 * -----------------------------------------------------------------------
 */
function sendChaplainConfirmationEmail($first_name, $last_name, $email)
{
    $mail = new PHPMailer(true);

    // ── SMTP CONFIGURATION ──────────────────────────────────────────────
    $smtpHost = 'intlchaplains.com';
    $smtpUsername = 'info@intlchaplains.com';
    $smtpReplyEmail = 'cmintlcorp@gmail.com';
    $smtpPassword = 'K*@@cHDq?*U*';
    $fromName = 'Chaplain Ministries Intl Corp';
    // ────────────────────────────────────────────────────────────────────

    // Attachments — all 4 files from the attachments/ folder
    $attachments = [
        'attachments/Chaplain School _ Membership Application.pdf',
        'attachments/Code of Ethics _ Standards of Conduct.pdf',
        'attachments/Membership  Training Recognition Application Authorization Form.pdf',
        'attachments/Vision.pdf',
    ];

    $full_name = htmlspecialchars($first_name . ' ' . $last_name);

    // ── HTML EMAIL BODY ─────────────────────────────────────────────────
    $htmlBody = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registration Confirmation</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f9;font-family:\'Segoe UI\',Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f9;padding:40px 0;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="max-width:620px;background-color:#ffffff;border-radius:12px;
                           overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.08);">

                    <!-- HEADER -->
                    <tr>
                        <td align="center"
                            style="background:linear-gradient(135deg, #1a3c6e 0%, #2d6a9f 100%);
                                   padding:40px 40px 36px;">

                            <!-- LOGO — centered via table cell align -->
                            <table cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 20px;">
                                <tr>
                                    <td align="center" valign="middle"
                                        style="width:90px;height:90px;
                                               background-color:rgba(255,255,255,0.15);
                                               border-radius:50%;
                                               padding:0;">
                                        <img src="https://intlchaplains.com/assets/img/client-logos/logo.png"
                                             alt="Chaplain Ministries Logo"
                                             width="60"
                                             height="60"
                                             style="display:block;
                                                    width:60px;
                                                    height:60px;
                                                    object-fit:contain;
                                                    border:0;
                                                    margin:0 auto;" />
                                    </td>
                                </tr>
                            </table>

                            <h1 style="margin:0 0 8px;color:#ffffff;font-size:24px;
                                       font-weight:700;letter-spacing:0.5px;">
                                Chaplain Ministries Intl Corp
                            </h1>
                            <p style="margin:0;color:rgba(255,255,255,0.75);
                                      font-size:13px;letter-spacing:1.5px;text-transform:uppercase;">
                                Application Received
                            </p>
                        </td>
                    </tr>

                    <!-- GREEN SUCCESS BANNER -->
                    <tr>
                        <td align="center"
                            style="background-color:#e8f5e9;padding:18px 40px;
                                   border-bottom:3px solid #4caf50;">
                            <p style="margin:0;color:#2e7d32;font-size:15px;font-weight:600;">
                                ✅ &nbsp;Your application has been successfully submitted!
                            </p>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:40px 40px 30px;">

                            <p style="margin:0 0 10px;color:#555;font-size:15px;">
                                Dear <strong style="color:#1a3c6e;">' . $full_name . '</strong>,
                            </p>

                            <p style="margin:0 0 20px;color:#555;font-size:15px;line-height:1.7;">
                                Thank you for applying to join our chaplaincy network. We are delighted
                                to have received your application and look forward to reviewing it.
                            </p>

                            <p style="margin:0 0 20px;color:#555;font-size:15px;line-height:1.7;">
                                Kindly find the following <strong>4 documents</strong> attached to
                                this email. Please <strong>download</strong> each one, fill them out
                                completely, and <strong>reply to this email</strong> with all completed
                                forms attached at your earliest convenience.
                            </p>

                            <!-- ATTACHED FILES BOX -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background-color:#f0f4ff;border:1px solid #d0dcf5;
                                       border-radius:10px;margin-bottom:28px;overflow:hidden;">
                                <tr>
                                    <td style="padding:16px 20px;background-color:#1a3c6e;
                                               border-radius:10px 10px 0 0;">
                                        <p style="margin:0;color:#fff;font-size:13px;
                                                  font-weight:600;letter-spacing:0.5px;">
                                            📎 &nbsp;ATTACHED DOCUMENTS
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding:10px 20px;border-bottom:1px solid #dce6f7;">
                                                    <span style="color:#e53935;font-size:16px;margin-right:10px;">📄</span>
                                                    <span style="color:#1a3c6e;font-size:14px;font-weight:500;">
                                                        Chaplain School &amp; Membership Application
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px 20px;border-bottom:1px solid #dce6f7;">
                                                    <span style="color:#e53935;font-size:16px;margin-right:10px;">📄</span>
                                                    <span style="color:#1a3c6e;font-size:14px;font-weight:500;">
                                                        Code of Ethics &amp; Standards of Conduct
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px 20px;border-bottom:1px solid #dce6f7;">
                                                    <span style="color:#e53935;font-size:16px;margin-right:10px;">📄</span>
                                                    <span style="color:#1a3c6e;font-size:14px;font-weight:500;">
                                                        Membership Training Recognition &amp; Authorization Form
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px 20px;">
                                                    <span style="color:#e53935;font-size:16px;margin-right:10px;">📄</span>
                                                    <span style="color:#1a3c6e;font-size:14px;font-weight:500;">
                                                        Vision
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- STEPS BOX -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background-color:#fff8e1;border-left:4px solid #ffc107;
                                       border-radius:0 8px 8px 0;margin-bottom:28px;">
                                <tr>
                                    <td style="padding:18px 20px;">
                                        <p style="margin:0 0 10px;color:#7b5800;font-size:13px;
                                                  font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">
                                            📋 &nbsp;Next Steps
                                        </p>
                                        <p style="margin:0 0 8px;color:#555;font-size:14px;line-height:1.6;">
                                            <strong style="color:#1a3c6e;">1.</strong>
                                            &nbsp;Download all 4 attached documents.
                                        </p>
                                        <p style="margin:0 0 8px;color:#555;font-size:14px;line-height:1.6;">
                                            <strong style="color:#1a3c6e;">2.</strong>
                                            &nbsp;Fill out each form carefully and completely.
                                        </p>
                                        <p style="margin:0;color:#555;font-size:14px;line-height:1.6;">
                                            <strong style="color:#1a3c6e;">3.</strong>
                                            &nbsp;Reply to this email with all completed forms attached.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0 0 6px;color:#555;font-size:15px;line-height:1.7;">
                                If you have any questions or need assistance, please do not hesitate
                                to reply to this email — we are happy to help.
                            </p>

                            <p style="margin:24px 0 0;color:#555;font-size:15px;">
                                Blessings &amp; regards,<br/>
                                <strong style="color:#1a3c6e;">The Chaplain Ministries Intl Corp Team</strong>
                            </p>
                        </td>
                    </tr>

                    <!-- DIVIDER -->
                    <tr>
                        <td style="padding:0 40px;">
                            <hr style="border:none;border-top:1px solid #eeeeee;margin:0;">
                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td align="center" style="padding:24px 40px 32px;">
                            <p style="margin:0 0 6px;color:#aaa;font-size:12px;">
                                This is an automated message — please reply directly to this email
                                with your completed forms.
                            </p>
                            <p style="margin:0;color:#aaa;font-size:12px;">
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

    // ── PLAIN TEXT FALLBACK ─────────────────────────────────────────────
    $plainBody = "Dear $full_name,\n\n"
        . "Thank you for submitting your chaplaincy application. We are pleased to confirm it was received successfully.\n\n"
        . "NEXT STEPS:\n"
        . "Please download the 4 attached documents, fill them out, and reply to this email with the completed forms.\n\n"
        . "Attached Documents:\n"
        . "1. Chaplain School & Membership Application\n"
        . "2. Code of Ethics & Standards of Conduct\n"
        . "3. Membership Training Recognition & Authorization Form\n"
        . "4. Vision\n\n"
        . "If you have any questions, simply reply to this email.\n\n"
        . "Blessings & regards,\n"
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
        $mail->Subject = '✅ Application Received — Chaplain Ministries Intl Corp';
        $mail->Body = $htmlBody;
        $mail->AltBody = $plainBody;
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'error_log';

        foreach ($attachments as $filePath) {
            if (file_exists($filePath)) {
                $mail->addAttachment($filePath);
            } else {
                error_log("Chaplain email: attachment not found — $filePath");
            }
        }

        $mail->send();
        return [true, "Confirmation email sent successfully."];

    } catch (Exception $e) {
        error_log("Chaplain email failed: " . $mail->ErrorInfo);
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
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $denomination = mysqli_real_escape_string($conn, $_POST['denomination']);
    $ministry_area = mysqli_real_escape_string($conn, $_POST['ministry_area']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $motivation = mysqli_real_escape_string($conn, $_POST['motivation']);
    $referees = mysqli_real_escape_string($conn, $_POST['references']);

    $checkEmail = mysqli_query($conn, "
        SELECT id 
        FROM registered_chaplains 
        WHERE email = '$email' 
        AND status != 'deleted'
        LIMIT 1
    ");

    if (mysqli_num_rows($checkEmail) > 0) {
        $_SESSION['ErrorMessage'] = "This email has already submitted an application.";
        header("Location: ../apply.php");
        exit();
    }

    $resume_name = null;
    $drivers_license_name = null;

    if (!empty($_FILES['resume']['name'])) {
        list($success, $result) = uploadFile(
            $_FILES['resume'],
            "/home/intlkihochap.intlchaplains.com/uploads/resume/",
            ['pdf', 'doc', 'docx'],
            5 * 1024 * 1024
        );

        if ($success) {
            $resume_name = $result;
        } else {
            $_SESSION['ErrorMessage'] = "Resume Error: " . $result;
            header("Location: ../apply.php");
            exit();
        }
    }

    if (!empty($_FILES['drivers_license']['name'])) {
        list($success, $result) = uploadFile(
            $_FILES['drivers_license'],
            "/home/intlkihochap.intlchaplains.com/uploads/license/",
            ['jpg', 'jpeg', 'png', 'pdf'],
            3 * 1024 * 1024
        );

        if ($success) {
            $drivers_license_name = $result;
        } else {
            $_SESSION['ErrorMessage'] = "License Error: " . $result;
            header("Location: ../apply.php");
            exit();
        }
    }

    $sql = "INSERT INTO registered_chaplains (
        first_name, last_name, email, phone, dob, gender,
        address, city, state, zip, country,
        denomination, ministry_area, experience, education,
        motivation, referees, resume, drivers_license
    ) VALUES (
        '$first_name', '$last_name', '$email', '$phone', '$dob', '$gender',
        '$address', '$city', '$state', '$zip', '$country',
        '$denomination', '$ministry_area', '$experience', '$education',
        '$motivation', '$referees', '$resume_name', '$drivers_license_name'
    )";

    if (mysqli_query($conn, $sql)) {

        list($mailSent, $mailMessage) = sendChaplainConfirmationEmail(
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['email']
        );

        if (!$mailSent) {
            error_log("Application saved but email failed for: " . $_POST['email'] . " — " . $mailMessage);
        }

        $_SESSION['SuccessMessage'] = "Application submitted successfully! Please check your email for the next steps.";
        header("Location: ../apply.php");
        exit();

    } else {
        $_SESSION['ErrorMessage'] = "Database Error: " . mysqli_error($conn);
        header("Location: ../apply.php");
        exit();
    }
}
?>