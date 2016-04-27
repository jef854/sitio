<?php



$servicio="http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap/wsdl/ldap.wsdl"; //url del servicio
$parametros=array(); //parametros de la llamada
$parametros['numeroEmpleado']="8730"; //poner numero de empleo
$parametros['password']="lupita03"; //poner pass
$parametros['idApp']="00410204010";
$parametros['claveApp']="c0rr32016";

$client = new SoapClient($servicio, $parametros);
$result = $client->autenticarUsuarioApp($parametros);//llamamos al métdo que nos interesa con los parámetros

var_dump($result);

$auth1 =$result->autenticarUsuarioAppReturn;

$auth = explode("|", $auth1);

if( $auth[0] == "0" ){
		echo "Error de conexion ldap";
	}elseif($auth[0] == "1"){
	
		echo "ok-logueo existoso";
	}elseif($auth[0] == "2"){
		echo "Password Incorrecto";
	}
	elseif($auth[0] == "3"){
		echo "Usuario incorrecto o inexistente";
	}
	elseif($auth[0] == "4"){
		echo "Número de Intentos excedido para el password";
	}
	elseif($auth[0] == "5"){
		echo "Error de Ldap 5. Favor de contactar con el administrador del sistema";
	}
	elseif($auth[0] == "6"){
		echo "Error de desconexion Ldap. Intente mas tarde";
	}
	elseif($auth[0] == "8"){
		echo "Error de base de datos. Intente mas tarde";
	}
	elseif($auth[0] == "9"){
		echo "No existe aplicacion asociada, Por favor intente nuevamente";
	}else{
		echo "<bR><bR>Mensjae:$auth1";
	}
?>