<?php

$usr = '8730';//$_POST['empleado'];
$pas = 'lupita03';//($_POST['pass'];


$servicio="http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap/wsdl/ldap.wsdl"; //url del servicio
$parametros=array(); //parametros de la llamada
$parametros['numeroEmpleado']=""; //poner numero de empleo
$parametros['password']=""; //poner pass


$client = new SoapClient($servicio, $parametros);
$result = $client->autenticarUsuario($parametros);//llamamos al métdo que nos interesa con los parámetros

var_dump($result);

$auth =$result['autenticarUsuarioReturn'];

if( $auth == "0" ){
		echo "Error de conexion ldap";
	}elseif($auth == "1"){
		
		echo "ok-logueo existoso";
	}elseif($auth == "2"){
		echo "Password Incorrecto";
	}
	elseif($auth == "3"){
		echo "Usuario incorrecto o inexistente";
	}
	elseif($auth == "4"){
		echo "Número de Intentos excedido para el password";
	}
	elseif($auth == "5"){
		echo "Error de Ldap 5. Favor de contactar con el administrador del sistema";
	}
	elseif($auth == "6"){
		echo "Error de desconexion Ldap. Intente mas tarde";
	}
	elseif($auth == "8"){
		echo "Error de base de datos. Intente mas tarde";
	}
	elseif($auth == "9"){
		echo "No existe aplicacion asociada, Por favor intente nuevamente";
	}else{
		echo "Error desconocido:$auth";
	}
?>