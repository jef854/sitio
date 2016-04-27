<?php

require_once('PHPMailerAutoload.php');

$mail             = new PHPMailer();

$mail->IsSMTP(); 
$mail->Host       = "smtp.telcel.com"; 
$mail->SMTPDebug  = 0; 
$mail->SMTPAuth   = false;       
$mail->SMTPSecure = "";         
$mail->Host       = "smtp.telcel.com";   
$mail->Port       = 25;                 
$mail->Username   = "correyjuega@mail.telcel.com";  
$mail->Password   = "2c7107b8";   

$mail->IsHTML(true);

?>
