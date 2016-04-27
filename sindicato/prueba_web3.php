<?php

$client = new SoapClient("http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap?wsdl");
var_dump($client->__getFunctions()); 
var_dump($client->__getTypes());


?>