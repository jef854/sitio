<?php

include("../connection/web.php");
include("mail.php");

$run = $_POST['carrera'];
$distance = $_POST['distancia'];
$guest = $_POST['invitado'];
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
$status = $_POST['estatus'];

//comprobar que no exista el usuario
$query = "SELECT * FROM registros";
$myQuery = mysql_query($query, $db) or die(mysql_error());
$numero = mysql_num_rows($myQuery);
$filled_int = sprintf("%03d", $numero + 1);
$verifyUser = 0;

//obtener correo empleado
$query_email = "SELECT email FROM registros WHERE id_empleado=".$guest;
$result_email = mysql_query($query_email, $db) or die(mysql_error());
$get_email = mysql_fetch_row($result_email);
$email_empleado = $get_email[0];



while( $result = mysql_fetch_object($myQuery) ){
	if( $result -> email == $email ){ 
		$verifyUser = 1; 
	}
}

if( $verifyUser == 0 ){
	$sql = "INSERT INTO registros (dorsal,carrera,distancia,tipo_usuario,id_invitado,nombre,apellido_paterno,apellido_materno,email,edad,sexo,ciudad,telefono,talla,status) VALUES ('$filled_int','$run','$distance','$type','$guest','$name','$lastname','$lastname2','$email','$age','$sex','$city','$phone','$size','$status')";
	mysql_query($sql);
	$message = "<html xmlns='http://www.w3.org/1999/xhtml'>
				<head http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
				<title>Contacto</title>
				</head>
				
				<body>
				<font face='Arial'>
				<p><img src='http://www.correyjuega.com/images/header-mail.jpg'/></p>
				<p>Estimado $name $lastname $lastname2,</p>
				<p>Por este medio tenemos el gusto de informarle que su registro a la carrera se ha completado satisfactoriamente.</p>
				<p>Su n&uacute;mero para la carrera es: <strong>$filled_int</strong></p>
				<p>Es importante que tengas en mente los siguientes puntos:</p>
				<ul>
					<li>Comer m&aacute;ximo una hora antes alimentos ricos en carbohidratos para que tengas mayor energ&iacute;a durante la carrera. El peor error que puedes cometer es correr en ayunas.</li>
					<li>Lleva vestimenta adecuada, ropa y zapatos con los que haya entrenado antes para evitar molestias durante el evento.</li>
					<li>Recuerda mantenerte hidratado. Durante la carrera habr&aacute; stands de hidrataci&oacute;n, pero no tomes demasiada agua antes del evento ya que podr&iacute;as sentirte mal.</li>
					<li>Descansa bien un d&iacute;a antes. No hay nada peor que estar desvelado ya que vas estar cansado y tu rendimiento no ser&aacute; &oacute;ptimo.</li>
					<li>Calienta antes de la carrera, por lo menos diez minutos es m&aacute;s que suficiente. Antes del evento tendremos una sesi&oacute;n de calentamiento.</li>
				</ul>
				<p><strong>&iexcl;Te deseamos toda la suerte del mundo y disfruta la carrera!</strong></p>
				<p><strong>Atentamente<br>
				Organizaci&oacute;n de la Carrera Sindicato Telcel 2015</strong></p>
				</font>
				</body>
				</html>
				";
	
        $mail->AddAddress($email, $email);
        $mail->AddBCC($email_empleado, $email_empleado); 
        $mail->Subject = "Inscripcion de Invitado";	
        $message = stripslashes($message);
        $mail->Body = $message;
        $mail->SetFrom('correyjuega@mail.telcel.com', 'Carrera Sindicato Telcel 2015');
               
        if(!$mail->Send()) {
           echo 'error'; 
        } else {
           echo 'ok';
        }

}else{
	echo 'error';
}



/*$sql = "INSERT INTO registros (carrera,distancia,nombre,apellido_paterno,apellido_materno,email,edad,sexo,ciudad,telefono,talla) VALUES ('$run','$distance','$name','$lastname','$lastname2','$email','$age','$sex','$city','$phone','$size')";
$result = mysql_query($sql);

$subject = "Ha sido registrado exitosamente a la carrera ".$run."";
$body = "Ha sido registrado exitosamente a la carrera ".$run.""."\r\n"."Gracias por participar";
$headers = "From: contacto@correyjuega.com" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();
if (mail($email, $subject, $body, $headers)) {
	echo "Ha sido registrado exitosamente a la carrera ".$run."";
} else {
	echo "Ha ocurrido un error al enviar su solicitud";
}*/
  
//echo "Ha sido registrado exitosamente a la carrera ".$run."";

?>
