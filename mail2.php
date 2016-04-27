<?php

include("connection/web.php");
include("sindicato/mail.php");

$result = mysql_query("SELECT email FROM registros WHERE carrera = 'DF'");
/*$recipients = array();
while($row = mysql_fetch_array($sql)) {
    $recipients[] = $row['email'];
}*/

   //envio del email con los datos

   $message = "<html xmlns='http://www.w3.org/1999/xhtml'>
				<head http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
				<title>Carrera Sindicato Telcel 2015</title>
				</head>
				
				<body>
				<font face='Arial'>
				<p><img src='http://www.correyjuega.com/images/header-mail.jpg'/></p>
				<p>Hola Corredores!</p>
				<p>Recuerden que la carrera empieza a las 7:00hrs en punto, por lo que les recomendamos llegar al menos media hora antes, y en caso de utilizar los estacionamientos del Bosque de Chapultepec, estar con una hora de anticipaci&oacute;n.
</p>
				<p>Sin m&aacute;s por el momento, <strong>Mucha Suerte!</p>
				<p>Organizaci&oacute;n de la Carrera Sindicato Telcel 2015</strong></p>
				</font>
				</body>
				</html>
				";
   
   /*$to = "info@correyjuega.com";
   $asunto = "Carrera Sindicato Telcel 2015 - 1° AVISO";
   $message = stripslashes($message);
   
   $headers = "MIME-Version: 1.0\r\n";
   $headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
   $headers .= "From: correyjuega@mail.telcel.com\r\n";
   //$headers .= 'BCC: ' . implode(', ', $recipients) . "\r\n";
   $headers .= "BCC: harmenta@vgstudio.com.mx\r\n";
   
   mail($to,$asunto,$message,$headers);*/

	/*$correos = explode(',', $recipients);
	foreach($correos as $email)
	{
	   $mail->AddAddress($email);
	}
	//$mail->AddAddress($email); 
	$mail->Subject = "Carrera Sindicato Telcel 2015 D.F.";	
	$message = stripslashes($message);
	$mail->Body = $message;
	$mail->SetFrom('correyjuega@mail.telcel.com', 'Carrera Sindicato Telcel 2015');
		   
	if(!$mail->Send()) {
	   echo 'error';
	} else {
	   echo 'ok';
	   
	}*/
	
	$mail = new PHPMailer(); // defaults to using php "mail()"
	$mail->SetFrom('correyjuega@mail.telcel.com', 'Carrera Sindicato Telcel 2015');
	$mail->Subject = "Carrera Sindicato Telcel 2015 D.F.";	
	
	// Start Loop of sending emails
	while ($row = mysql_fetch_array ($result)) {
		$message = stripslashes($message);
		$mail->Body = $message;
		$mail->AddAddress($row["email"]);
	}
	
	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Email campaign has been sent.";
	}

?>
