<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$name = $_POST['fname'];
$title = $_POST['ftitle'];
$address = $_POST['faddress'];
$message = $_POST['fmessage'];

$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = false; //set to 2 for debug
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'justclaner@gmail.com';
    $mail->Password = 'srnq rpwn jibf rjhi';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('justclaner@gmail.com',$name);
    $mail->addAddress($address);

    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = 'The following message has been sent by ' . $name . ' through me.' . '\n' . $message;
    $mail->AltBody = 'There was an error in sending the message.';
    $mail->send();
    echo "Mail has been sent successfully! Thanks.";
} catch (Exception $e) {
    echo "Message could not be sent. Check if fields were inputted correctly. Mailer Error: {$mail->ErrorInfo}";
}
?>