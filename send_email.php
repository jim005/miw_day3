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
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    // $mail->isSMTP();                                            // Send using SMTP
    // $mail->Host = 'mail.websenso.net';                    // Set the SMTP server to send through
    // $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    // $mail->Username = 'miw@websenso.net';                     // SMTP username
    // $mail->Password = '';                               // SMTP password
    // $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    // //  $mail->Port       = 587;                                    // TCP port to connect to

    $mail->CharSet      = 'UTF-8';
    $mail->SMTPDebug    = 0;                            // Enable verbose debug output
    $mail->isSMTP();                                    // Set mailer to use SMTP
    $mail->Host         = 'XXXXXXXXX';         // Specify main and backup SMTP servers
    $mail->SMTPAuth     = true;                         // Enable SMTP authentication
    $mail->Username     = 'XXXXXXXXX';            // SMTP username
    $mail->Password     = 'XXXXXXXXX';            // SMTP password
    $mail->SMTPSecure   = 'ssl';                        // Enable TLS encryption, `ssl` also accepted
    $mail->Port         =  465;                         // TCP port to connect to

    //Recipients
    $mail->setFrom('XXXXXXXXXXX', 'MIW Party');
    $mail->addAddress('XXXXXXXX', 'James');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Xmas Party !';
    $mail->Body = file_get_contents('email/email_party.html');
    $mail->AltBody = file_get_contents('email/email_noHTML.txt');

    $mail->send();
    //echo 'Message has been sent';
    header('Location: index.php?delivery=sent');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}