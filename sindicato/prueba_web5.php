<?php

;
$client = new SoapClient("http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap/wsdl/ldap.wsdl");
var_dump($client->__getFunctions()); 
var_dump($client->__getTypes());

$servicio="http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap/wsdl/ldap.wsdl"; //url del servicio
$parametros=array(); //parametros de la llamada
$parametros['numeroEmpleado']=""; //poner numero de empleo
$parametros['password']=""; //poner pass
$parametros['idApp']="00410204010";
$parametros['claveApp']="c0rr32016";

$client = new SoapClient($servicio, $parametros);
$result = $client->autenticarUsuarioApp($parametros);//llamamos al métdo que nos interesa con los parámetros

var_dump($result);
?>