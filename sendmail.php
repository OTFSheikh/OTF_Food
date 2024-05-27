<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


$mail = new PHPMailer(true);
$mail->isSMTP();// phpmailer use smtp

$mail->Host = 'smtp.gmail.com'; // serveur gmail
$mail->SMTPAuth   = true; 
$mail->Username = 'otfphp@gmail.com';
$mail->Password = 'cdlxlhqrdxdbaqtm';
$mail -> SMTPSecure='tls';
$mail->Port = 587;
$mail->CharSet = "utf-8";
$mail->setFrom('otfphp@gmail.com', 'baye Cheikh');
$mail->addAddress('cheikh.baye010@gmail.com', 'baye');
$mail-> isHTML(true);

$mail->Subject = "confirmaition d'email";
$mail->Body = "bonjour, baye le beau";

$mail->SMTPDebug = 0; // desactiver le debug

if (!$mail->send()) {
    $message = "Email non envoyé";
    echo 'Erreurs:'.$mail->ErrorInfo;
}else {
    $message = "un mail vous a été envoyé";
    echo $message;
}
?>