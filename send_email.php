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

    $mail->CharSet      = 'UTF-8';
    $mail->SMTPDebug    = 0;                            // Enable verbose debug output
    $mail->isSMTP();                                    // Set mailer to use SMTP
    $mail->Host         = 'auth.smtp.1and1.fr';         // Specify main and backup SMTP servers
    $mail->SMTPAuth     = true;                         // Enable SMTP authentication
    $mail->Username     = 'test@asheart.fr';            // SMTP username
    $mail->Password     = '@x8NfZB8zDSFRgU';            // SMTP password
    $mail->SMTPSecure   = 'ssl';                        // Enable TLS encryption, `ssl` also accepted
    $mail->Port         =  465;                         // TCP port to connect to

    //Recipients

    $mail->setFrom('test@asheart.fr', 'MIW Party');/*axel.amghar@gmail.com*/
    $mail->addAddress($_POST['email'], '');     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Join the party';
    $mail->Body = file_get_contents('email/email_party.html');
    $mail->AltBody = 'Consultez le site pour participer : http://axelamghar.alwaysdata.net/miw_day3/email/email_party.html#';

    $mail->send();
    //echo 'Message has been sent';
    header('Location: index.php?delivery=sent');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}