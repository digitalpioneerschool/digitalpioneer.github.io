<?php
session_start();
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ob_start(); // Start output buffering

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validate input
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: contact.php");
        exit();
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: contact.php");
        exit();
    }

    try {
        $mail = new PHPMailer(true);
        
        // Enable debug mode
        $mail->SMTPDebug = 2;
        
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'digitalpioneertraininginstitut@gmail.com';
        $mail->Password = 'kgzcniahtqigpdpv'; // Updated to use App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        // Recipients
        $mail->setFrom('digitalpioneertraininginstitut@gmail.com', 'Digital Pioneer Training Institute');
        $mail->addAddress('digitalpioneertraininginstitut@gmail.com');
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Contact Form: " . $subject;
        $mail->Body = "
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Message:</strong></p>
            <p>{$message}</p>
        ";

        if($mail->send()) {
            // Send confirmation to the user
            $confirmationMail = new PHPMailer(true);
            $confirmationMail->isSMTP();
            $confirmationMail->Host = 'smtp.gmail.com';
            $confirmationMail->SMTPAuth = true;
            $confirmationMail->Username = 'digitalpioneertraininginstitut@gmail.com';
            $confirmationMail->Password = 'kgzcniahtqigpdpv'; // Updated to use App Password
            $confirmationMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $confirmationMail->Port = 587;
            $confirmationMail->CharSet = 'UTF-8';

            $confirmationMail->setFrom('digitalpioneertraininginstitut@gmail.com', 'Digital Pioneer Training Institute');
            $confirmationMail->addAddress($email, $name);
            
            $confirmationMail->isHTML(true);
            $confirmationMail->Subject = "Thank you for contacting Digital Pioneer Training Institute";
            $confirmationMail->Body = "
                <h2>Thank you for your message!</h2>
                <p>Dear {$name},</p>
                <p>We have received your message and will get back to you shortly.</p>
                <p>Here's a copy of your message:</p>
                <p><strong>Subject:</strong> {$subject}</p>
                <p><strong>Message:</strong></p>
                <p>{$message}</p>
                <p>Best regards,<br>Digital Pioneer Training Institute</p>
            ";

            if($confirmationMail->send()) {
                $_SESSION['success'] = "Your message has been sent successfully. We will get back to you soon!";
            } else {
                $_SESSION['error'] = "Message sent, but confirmation email failed.";
            }
        } else {
            $_SESSION['error'] = "Message could not be sent. Please try again later.";
        }

        header("Location: contact.php");
        exit();

    } catch (Exception $e) {
        $_SESSION['error'] = "Message could not be sent. Error: " . $e->getMessage();
        header("Location: contact.php");
        exit();
    }
} else {
    header("Location: contact.php");
    exit();
}

ob_end_flush(); // End output buffering and send output
?> 