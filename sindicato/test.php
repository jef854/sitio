<?php

include("mail.php");

$email = 'gugonzal@mail.telcel.com';
echo $email;
	$message = "<html xmlns='http://www.w3.org/1999/xhtml'>
				<head http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
				<title>Contacto</title>
				</head>
				
				<body>
				<font face='Arial' size=2 color='#084B8A'>
                               <center> 
                                <strong>Encuesta de Servicio de la Red de su Equipo de Computo en los Centros de Atencion a  Clientes</strong>
	<br> <br>                        </center>
Este cuestionario tiene como objetivo medir  el nivel de servicio que se esta ofreciendo en la Red de Datos de su equipo  a  partir de esta informacion se van definir acciones  de mejora y planes de trabajo que  permitan  ofrecer un mejor servicio a ustedes como usuario internos y se refleje en una mejor atencion  los clientes finales
<br><br>
Con las respuestas recibidas no se tomara alguna accion particular  sobre tus actividades laborales se haran consenso general del CAC por lo que te pedimos responder con objetividad 
<br><br>
Esta encuesta estara vigente del 13 al 19 de Enero , te  agradecemos el tiempo dedicado (5 minutos). 
<br><br>
http://encuestas.telcel.com/limesurvey_dev/index.php/211152/lang-es-MX
<br><br>
Atte
<br><br>
Gerencia de OyM de la Red MPLS 
				</font>
				</body>
				</html>
				";

echo $message;
   
        $mail->AddAddress($email, $email); 
        $mail->Subject = "Encuesta de satisfaccion CACs";	
        $message = stripslashes($message);
        $mail->Body = $message;
        $mail->SetFrom('not-reply@mail.telcel.com', 'Sistema de Encuestas');
               
        if(!$mail->Send()) {
           echo 'error'; 
        } else {
           echo 'ok';
        }
  

?>
