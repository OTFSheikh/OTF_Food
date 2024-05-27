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
$mail->setFrom('otfphp@gmail.com', 'OTF FOOD');
$mail->addAddress($email, $_POST["username"]);
$mail-> isHTML(true);

$mail->Subject = "Email de confirmation | OTF_FOOD";
$mail->Body = 'Bonjour, cliquer sur <a href="localhost/otf_food/include/verification.php?email='.$_POST["email"].'&token='.$token.'">le lien de confirmation</a> pour valider votre inscription à notre application web.';

$mail->SMTPDebug = 0; // desactiver le debug

if (!$mail->send()) {
    $message = "Email de confirmation non envoyé";
    echo 'Erreurs:'.$mail->ErrorInfo;
}else {
    $message = "Un mail de confirmation vous a été envoyé (Vérifier votre boîte spam).";
}
?>