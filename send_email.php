<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->CharSet = 'utf-8';
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->Host = '*****.***.*****';                    // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = '*****@*****.****.***';                     // SMTP username
    $mail->Password = '*****';                               // SMTP password

    //Recipients
    $mail->setFrom('*****@****.****.****', 'MIW Party official');
    $mail->addAddress($_GET['email']);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Invitation à la soirée XMAS party';
    $mail->Body = file_get_contents('email/email_party.html');
    $mail->AltBody = 'Vous êtes invités à la soirée des MIW le 19 décembre ! Rendez-vous sur https://unsitedesoiree.fr pour en savoir davantage';
    $mail->send();
    header('Location: index.php?delivery=sent');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}