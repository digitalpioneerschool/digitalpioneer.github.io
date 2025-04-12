<?php
require_once 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class EmailHandler {
    private $mail;
    
    public function __construct() {
        $this->mail = new PHPMailer(true);
        
        // Server settings
        $this->mail->isSMTP();
        $this->mail->Host = SMTP_HOST;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = SMTP_USERNAME;
        $this->mail->Password = SMTP_PASSWORD;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = SMTP_PORT;
        
        // Sender info
        $this->mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
    }
    
    public function sendContactForm($name, $email, $subject, $message) {
        try {
            $this->mail->addAddress(SMTP_FROM_EMAIL);
            $this->mail->addReplyTo($email, $name);
            
            $this->mail->isHTML(true);
            $this->mail->Subject = "Contact Form: " . $subject;
            $this->mail->Body = "
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Subject:</strong> {$subject}</p>
                <p><strong>Message:</strong></p>
                <p>{$message}</p>
            ";
            
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Email could not be sent. Mailer Error: {$this->mail->ErrorInfo}");
            return false;
        }
    }
    
    public function sendApplicationForm($data) {
        try {
            $this->mail->addAddress(SMTP_FROM_EMAIL);
            $this->mail->addReplyTo($data['email'], $data['name']);
            
            $this->mail->isHTML(true);
            $this->mail->Subject = "New Application: " . $data['course'];
            
            $body = "
                <h2>New Application Form Submission</h2>
                <p><strong>Name:</strong> {$data['name']}</p>
                <p><strong>Email:</strong> {$data['email']}</p>
                <p><strong>Phone:</strong> {$data['phone']}</p>
                <p><strong>Course:</strong> {$data['course']}</p>
                <p><strong>Message:</strong></p>
                <p>{$data['message']}</p>
            ";
            
            if(isset($data['attachments'])) {
                foreach($data['attachments'] as $attachment) {
                    $this->mail->addAttachment($attachment['tmp_name'], $attachment['name']);
                }
            }
            
            $this->mail->Body = $body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Email could not be sent. Mailer Error: {$this->mail->ErrorInfo}");
            return false;
        }
    }
}

$emailHandler = new EmailHandler();
?> 