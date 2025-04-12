<?php
ob_start(); // Start output buffering
session_start();
require_once 'config.php';
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to send email
function send_application_email($data) {
    $to = "digitalpioneertraininginstitut@gmail.com";
    $subject = "New Course Application - " . $data['fullname'];
    
    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . $data['email'] . "\r\n";
    $headers .= "Reply-To: " . $data['email'] . "\r\n";
    
    // Email body
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #1E3A8A; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background: #f8f9fa; }
            .footer { text-align: center; padding: 20px; font-size: 0.9em; color: #666; }
            .info-box { background: white; padding: 15px; margin: 10px 0; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Course Application</h2>
            </div>
            <div class='content'>
                <div class='info-box'>
                    <h3>Applicant Information</h3>
                    <p><strong>Name:</strong> " . $data['fullname'] . "</p>
                    <p><strong>Email:</strong> " . $data['email'] . "</p>
                    <p><strong>Phone:</strong> " . $data['phone'] . "</p>
                    <p><strong>Course:</strong> " . $data['course'] . "</p>
                </div>
                <div class='info-box'>
                    <h3>Additional Information</h3>
                    <p>" . nl2br($data['message']) . "</p>
                </div>
            </div>
            <div class='footer'>
                <p>Digital Pioneer Training Institute</p>
                <p>Location: Ruaka, Nairobi</p>
                <p>Phone: +254713093046</p>
                <p>Email: digitalpioneertraininginstitut@gmail.com</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    return mail($to, $subject, $message, $headers);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = sanitize_input($_POST['fullname'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $phone = sanitize_input($_POST['phone'] ?? '');
    $course = sanitize_input($_POST['course'] ?? '');
    $message = sanitize_input($_POST['message'] ?? '');

    // Validate input
    if (empty($fullname) || empty($email) || empty($phone) || empty($course)) {
        $_SESSION['error'] = "Please fill in all required fields.";
        header("Location: application.php");
        exit();
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: application.php");
        exit();
    }

    try {
        // Send notification to admin
        $mail = new PHPMailer(true);
        
        // Enable debugging
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        
        // Server settings
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;

        // Recipients
        $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $mail->addAddress(SMTP_FROM_EMAIL);
        $mail->addReplyTo($email, $fullname);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Course Application: " . $course;
        $mail->Body = "
            <h2>New Course Application</h2>
            <p><strong>Applicant Name:</strong> {$fullname}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Course:</strong> {$course}</p>
            <p><strong>Additional Information:</strong></p>
            <p>{$message}</p>
        ";

        // Process uploaded files
        $uploadedFiles = [];
        if (!empty($_FILES['documents']['name'][0])) {
            $uploadDir = 'uploads/';
            foreach ($_FILES['documents']['name'] as $key => $name) {
                $tmpName = $_FILES['documents']['tmp_name'][$key];
                $filePath = $uploadDir . basename($name);
                if (move_uploaded_file($tmpName, $filePath)) {
                    $uploadedFiles[] = $filePath;
                }
            }
        }

        // Attach files to the email
        foreach ($uploadedFiles as $file) {
            $mail->addAttachment($file);
        }

        $mail->send();
        
        // Send confirmation to the applicant
        $confirmationMail = new PHPMailer(true);
        
        // Enable debugging
        $confirmationMail->SMTPDebug = 2;
        $confirmationMail->Debugoutput = 'html';
        
        $confirmationMail->isSMTP();
        $confirmationMail->Host = SMTP_HOST;
        $confirmationMail->SMTPAuth = true;
        $confirmationMail->Username = SMTP_USERNAME;
        $confirmationMail->Password = SMTP_PASSWORD;
        $confirmationMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $confirmationMail->Port = SMTP_PORT;

        $confirmationMail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $confirmationMail->addAddress($email, $fullname);
        
        $confirmationMail->isHTML(true);
        $confirmationMail->Subject = "Application Received - Digital Pioneer Training Institute";
        $confirmationMail->Body = "
            <h2>Thank you for your application!</h2>
            <p>Dear {$fullname},</p>
            <p>We have received your application for the {$course} course.</p>
            <p>Here are your application details:</p>
            <ul>
                <li><strong>Name:</strong> {$fullname}</li>
                <li><strong>Email:</strong> {$email}</li>
                <li><strong>Phone:</strong> {$phone}</li>
                <li><strong>Course:</strong> {$course}</li>
            </ul>
            <p>We will review your application and get back to you shortly.</p>
            <p>If you have any questions, please don't hesitate to contact us.</p>
            <p>Best regards,<br>Digital Pioneer Training Institute</p>
        ";

        $confirmationMail->send();

        $_SESSION['success'] = "Your application has been submitted successfully. We will contact you soon!";
        header("Location: application.php");
        exit();

    } catch (Exception $e) {
        $_SESSION['error'] = "Application could not be submitted. Error: " . $e->getMessage();
        header("Location: application.php");
        exit();
    }
} else {
    // If someone tries to access this page directly
    header("Location: application.php");
    exit();
}
ob_end_flush(); // End output buffering and send output
?> 