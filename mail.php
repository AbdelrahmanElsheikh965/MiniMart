<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
//Load Composer's autoloader
require 'PHPMailer/autoload.php';

$client_email = $_GET['email'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                                      //SMTP username
    $mail->Password   = '';                                     //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('admin@minimart.com', 'Admin of MiniMart Store');
    //Recipients
    $mail->addAddress("$client_email");     //Add a recipient

    //Content
    $mail->Subject = 'Reset Your Password';
    $mail->Body    .= 'Click the following link to reset your password  ';
    $mail->Body    .= '  127.0.0.1/minimart/cnfPass.php?mail=' . $client_email; 
    $mail->Body    .= '  with best regards from MINIMART Store';
    $mail->Body    .= '  thanks for cooperating with US.';

    $mail->send();
    echo 'A Message has been sent with a reset link , Check out your inbox.';
    exit;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>