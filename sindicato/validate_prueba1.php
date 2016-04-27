<?php

/*

idapp: 00410204010
claveapp: c0rr32016
*/

$usr = '';//$_POST['empleado'];
$pas = '';//($_POST['pass'];

try{
	$clienteSOAP = new SoapClient('http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap');
	$parameters = array('numeroempleado' => $usr, 'password' => $pas, 'idapp' => '00410204010', 'password2' => 'c0rr32016');
	$auth = $clienteSOAP->autenticarUsuarioApp($parameters)->autenticarUsuarioAppReturn;
	//print_r ($auth);
	if( $auth == "0" ){
		echo "Error de conexion ldap";
	}elseif($auth == "1"){
		session_start();
		$_SESSION['username'] = $usr;
		$_SESSION['logged'] = TRUE;
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

	
 
} catch (SoapFault $e) {
	echo $e->faultcode;
}

?>