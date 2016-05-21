<?php

include("../connection/web.php");
include("mail.php");

$emp = $_POST['invitado'];
$run = $_POST['carrera'];
$name = utf8_decode($_POST['nombre']);
$lastname = utf8_decode($_POST['apellidop']);
$lastname2 = utf8_decode($_POST['apellidom']);
$age = $_POST['edad'];
$sex = $_POST['sexo'];
$size = $_POST['talla'];
$distance = $_POST['distancia2'];
//$birthday = $_POST['nacimiento'];

//$originalDate = $birthday;
//$newBirthday = date("d/m/Y", strtotime($originalDate));

//obtener correo empleado
$query_email = "SELECT email FROM registros WHERE id_empleado=".$emp;
$result_email = mysql_query($query_email, $db) or die(mysql_error());
$get_email = mysql_fetch_row($result_email);
$email_empleado = $get_email[0];

//comprobar que no exista el usuario
$sql = "INSERT INTO ninos (id_empleado,carrera,distancia,nombre,apellido_paterno,apellido_materno,edad,sexo,talla) VALUES ('$emp','$run','$distance','$name','$lastname','$lastname2','$age','$sex','$size')";
mysql_query($sql);
	
$message = "<html xmlns='http://www.w3.org/1999/xhtml'>
			<head http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
			<title>Contacto</title>
			</head>
			
			<body>
			<font face='Arial'>
			<p><img src='http://www.correyjuega.com/images/header-mail.jpg'/></p>
			<p>Por este medio le informamos que el ni&ntilde;o(a) $name $lastname $lastname2 ha sido registrado satisfactoriamente a la carrera</p>
			<p><strong>Atentamente<br>
			Organizaci&oacute;n de la Carrera Sindicato Telcel 2016</strong></p>
			</font>
			</body>
			</html>
			";


        $mail->AddAddress($email_empleado, $email_empleado); 
        $mail->Subject = "Inscripcion de Nino";	
        $message = stripslashes($message);
        $mail->Body = $message;
        $mail->SetFrom('correyjuega@mail.telcel.com', 'Carrera Sindicato Telcel 2016');
               
        if(!$mail->Send()) {
           echo 'error'; 
        } else {
           echo 'ok';
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
