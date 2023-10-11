<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Retrieve form data
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Enable SMTP
$mail->isSMTP();
$mail->Host = 'smtp.example.com'; // SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'your_email@example.com'; // SMTP username
$mail->Password = 'your_password'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, you can use 'ssl' for SSL encryption
$mail->Port = 587; // Port number, 587 for TLS, 465 for SSL

// Sender information
$mail->setFrom('your_email@example.com', 'Your Name');
$mail->addAddress('recipient@example.com', 'Recipient Name'); // Recipient's email and name

// Email content
$mail->isHTML(false);
$mail->Subject = $subject;
$mail->Body = "From: $name\n\n$message";

// Send email
if ($mail->send()) {
    echo 'Email sent successfully';
} else {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}
