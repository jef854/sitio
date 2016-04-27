<?php

include("connection/web.php");

$run = $_POST['carrera'];
$distance = $_POST['distancia'];
$name = utf8_decode($_POST['nombre']);
$lastname = utf8_decode($_POST['apellidop']);
$lastname2 = utf8_decode($_POST['apellidom']);
$email = $_POST['email'];
$age = $_POST['edad'];
$sex = $_POST['sexo'];
$city = utf8_decode($_POST['ciudad']);
$phone = $_POST['telefono'];
$size = $_POST['talla'];
$type = $_POST['tipo'];
$status = $_POST['status'];
$paypal = $_POST['paypal'];

//comprobar que no exista el usuario
$query = "SELECT * FROM registros";
$myQuery = mysql_query($query, $db) or die(mysql_error());
$verifyUser = 0;

while( $result = mysql_fetch_object($myQuery) ){
	if( $result -> email == $email ){ 
		$verifyUser = 1; 
	}
}

if( $verifyUser == 0 ){
	$sql = "INSERT INTO registros (carrera,distancia,tipo_usuario,nombre,apellido_paterno,apellido_materno,email,edad,sexo,ciudad,telefono,talla,status,paypal) VALUES ('$run','$distance','$type','$name','$lastname','$lastname2','$email','$age','$sex','$city','$phone','$size','$status','$paypal')";
	mysql_query($sql);
	$message = "<html xmlns='http://www.w3.org/1999/xhtml'>
				<head http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
				<title>Contacto</title>
				</head>
				
				<body>
				<font face='Arial'>
				<p><img src='http://www.correyjuega.com/images/header-mail.jpg'/></p>
				<p>Estimado $name $lastname $lastname2,</p>
				<p>Haz completado el registro previo a la carrera. Para que tu inscripción quede completada, necesitas pagar el monto de la carrera con el botón 'Pagar Ahora' que se encuentra en el formulario de registro.</p>
				<p><strong>Atentamente<br>
				Organizaci&oacute;n de la Carrera Sindicato Telcel 2015</strong></p>
				</font>
				</body>
				</html>
				";
   
	$to = $email;
	$asunto = "Carrera Sindicato Telcel 2015";
	$message = stripslashes($message);
   
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
	$headers .= "From: noreply@correyjuega.com\r\n";
   
	mail($to,$asunto,$message,$headers);
	echo 'ok';
}else{
	echo 'error';
}


?>
