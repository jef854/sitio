<?php

$usr = '8730';//$_POST['empleado'];
$pas = 'lupita03';//$_POST['pass'];
 
try{
	$clienteSOAP = new SoapClient('http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap/wsdl/ldap.wsdl');
	$parameters = array('numeroempleado' => $usr, 'password' => $pas);
	$auth = $clienteSOAP->autenticarUsuario($parameters)->autenticarUsuarioReturn;
	
	print_r ($auth);


	var_dump($auth);
	
	if( $auth == "3" || $auth == "2"){
		echo "error $auth";
	}else{
		session_start();
		$_SESSION['username'] = $usr;
		$_SESSION['logged'] = TRUE;
		echo "ok";
	}
 
} catch (SoapFault $e) {
	echo $e->faultcode;
	var_dump($e);
	echo "error <bR><bR>";

	echo json_encode($e);
}

$texto = file_get_contents("http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap/wsdl/ldap.wsdl");
echo $texto;

?>
