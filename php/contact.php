<?php
    //Include required PHPMailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $message = "";
    $messageClass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $messageContent = htmlspecialchars(trim($_POST['message']));

        // Validate form data
        if (empty($name) || empty($email) || empty($messageContent)) {
            $message = "All fields are required.";
            $messageClass = "error-message";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email format.";
            $messageClass = "error-message";
        } else {
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();                                      
                $mail->Host       = 'techvistaagency.com';  
                $mail->SMTPAuth   = true;                              
                $mail->Username   = 'admin@techvistaagency.com';            
                $mail->Password   = 'U%pO!hTZ?}Dg';             
                $mail->SMTPSecure = 'tls';                              
                $mail->Port       = 465;     
                $mail->SMTPDebug  = 2; // Enable SMTP debugging                           

                // Recipients
                $mail->setFrom('techvistaagency@gmail.com', 'TechVista');
                $mail->addAddress('techvistaagency@gmail.com', 'TechVista');     
                $mail->addReplyTo($email, $name);

                // Content
                $mail->isHTML(true);                                  
                $mail->Subject = " $email Contact Form Submission";
                $mail->Body    = "Name: $name<br>Email: $email<br>Message:<br>$messageContent";
                $mail->AltBody = "Name: $name\nEmail: $email\nMessage:\n$messageContent";

                $mail->send();
                $message = 'Thank you for contacting us. We will get back to you shortly.';
                $messageClass = "success-message";
            } catch (Exception $e) {
                $message = "Sorry, there was an error sending your message. Please try again later. Mailer Error: {$mail->ErrorInfo}";
                $messageClass = "error-message";
            }
        }
    }
?>