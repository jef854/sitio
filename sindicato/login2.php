<?php
  #header("Cache-Control: no-cache, must-revalidate");
  #header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  #header("Content-Type: application/xml; charset=utf-8");
  header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  ini_set('soap.wsdl_cache_enabled',0);
  ini_set('soap.wsdl_cache_ttl',0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Circuito Sindicato Telcel - Inicio de Sesión</title>
<link href="../css/telcel-styles.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery-ui/jquery-ui.js"></script>
<script src="../js/functions.js" type="text/javascript"></script>
</head>

<style>
.loader-login-container, #respuesta-login{ display: none; }
</style>

<body>

<div class="telcel-login">
	<div class="telcel-login-container">    	
       	<h2 class="header">Iniciar Sesión</h2>
       <div class="telcel-login-form">
            <form id="login-form" action="/sindicato/validate_login.php" method="post">
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
