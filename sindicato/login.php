<?php
  /*header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Content-Type: application/xml; charset=utf-8");*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Circuito Sindicato Telcel - Inicio de Sesión</title>
<link href="../css/telcel-styles.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../css/alertify.core.css" />
<link rel="stylesheet" href="../css/alertify.default.css" />
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="../js/alertify.js"></script>
<script src="../js/functions.js" type="text/javascript"></script>


</head>


<style>
.loader-login-container, #respuesta-login{ display: none; }
</style>

<body>
<?php
if (isset($_GET['err'])) 
  {
    $estado = $_GET['err'];
  }else
    {
    $estado = 7;
    }

if($estado==0){
echo "<script type=\"text/javascript\">alert(\"Error de conexion ldap\");</script>";
}elseif ($estado==2) {
  echo "<script type=\"text/javascript\">alert(\"Password Incorrecto\");</script>";
}elseif ($estado==3) {
  echo "<script type=\"text/javascript\">alert(\"Usuario incorrecto o inexistente\");</script>";
}elseif ($estado==4) {
  echo "<script type=\"text/javascript\">alert(\"Número de Intentos excedido para el password\");</script>";
}elseif ($estado==5) {
  echo "<script type=\"text/javascript\">alert(\"Error de Ldap 5. Favor de contactar con el administrador del sistema\");</script>";
}elseif ($estado==6) {
  echo "<script type=\"text/javascript\">alert(\"Error de desconexion Ldap. Intente mas tarde\");</script>";
}elseif ($estado==8) {
  echo "<script type=\"text/javascript\">alert(\"Error de base de datos. Intente mas tarde\");</script>";
}elseif ($estado==9) {
  echo "<script type=\"text/javascript\">alert(\"No existe aplicacion asociada, Por favor intente nuevamente\");</script>";
}
?>
<div class="telcel-login">
	<div class="telcel-login-container">    	
       	<h2 class="header">Iniciar Sesión</h2>
       <div class="telcel-login-form">
            <form id="login-form" action="sindicato/validate_login.php" method="post">
                <label>Número de Empleado</label><br />
                <input type="text" name="empleado" id="empleado" class="text-field" /><br />
                <label>Contraseña</label><br />
                <input type="password" name="pass" id="pass" class="text-field" /><br />
                <input type="submit" value="Iniciar Sesión" class="submit-btn" />
            </form>
            <div class="loader-login-container"><img src="../images/ajax-loader.gif" /></div>
            <div id="respuesta-login"></div>
        </div>
    </div>
</div>

</body>
</html>
