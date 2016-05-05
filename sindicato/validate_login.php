<?php

/*
$usr = $_POST['empleado'];
$pas = $_POST['pass'];


$servicio="http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap/wsdl/ldap.wsdl"; 
$parametros=array(); 
$parametros['numeroEmpleado']="$usr"; 
$parametros['password']="$pas"; 
$parametros['idApp']="00410204010";
$parametros['claveApp']="c0rr32016";


try{
        $options = array(
                'uri'=>'http://serviciosidentidad.telcel.com:8000/ldapWeb/services/ldap',
                'style'=>SOAP_RPC,
                'use'=>SOAP_ENCODED,
                'soap_version'=>SOAP_1_1,
                'cache_wsdl'=>WSDL_CACHE_NONE,
                'connection_timeout'=>15,
                'trace'=>true,
                'encoding'=>'UTF-8',
                'exceptions'=>true,
        );

       $client = new SoapClient($servicio, $options);
       $result = $client->autenticarUsuarioApp($parametros);
       $auth1 =$result->autenticarUsuarioAppReturn;
       $auth = explode("|", $auth1);

	if ( $auth[0]  == "1") {
                
              session_start();
              $_SESSION['username'] = $usr;
              $_SESSION['logged'] = TRUE;
              header("Location: /sindicato/index.php");
                           
        } else {
            header("Location: http://www.correyjuega.telcel.com/");
        } 

} catch (SoapFault $e) {
        echo $e->faultcode;
        header("Location: http://www.correyjuega.telcel.com/"); 
}   */

//$usr = $_POST['empleado'];
//$pas = $_POST['pass'];
session_start();
$_SESSION['username'] = 1234;
$_SESSION['logged'] = TRUE;
header("Location: /sitio/sindicato/index.php");
    
?>  


