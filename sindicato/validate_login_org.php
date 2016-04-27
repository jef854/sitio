<?php

$usr = $_POST['empleado'];
$pas = $_POST['pass'];

try{
	$clienteSOAP = new SoapClient('http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap/wsdl/ldap.wsdl');
	$parameters = array('numeroempleado' => $usr, 'password' => $pas);
	$auth = $clienteSOAP->autenticarUsuario($parameters)->autenticarUsuarioReturn;
	//print_r ($auth);
	if( $auth == "3" || $auth == "2"){
		echo "error";
	}else{
		session_start();
		$_SESSION['username'] = $usr;
		$_SESSION['logged'] = TRUE;
		echo "ok";
	}
 
} catch (SoapFault $e) {
	echo $e->faultcode;
}

?>