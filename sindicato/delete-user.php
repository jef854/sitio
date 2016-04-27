<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}
include("../connection/web.php");

$user = $_SESSION['username'];

$query_empleado = "DELETE FROM registros WHERE id_empleado = '$user'";
$query_invitado = "DELETE FROM registros WHERE id_invitado = '$user'";
$query_nino = "DELETE FROM ninos WHERE id_empleado = '$user'";

$borrar_empleado  = mysql_query($query_empleado);
$borrar_invitado  = mysql_query($query_invitado);
$borrar_nino  = mysql_query($query_nino);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Circuito Sindicato Telcel</title>
<link href="../css/telcel-styles.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery-ui/jquery-ui.js"></script>
<script src="../js/functions.js" type="text/javascript"></script>

</head>

<body>
<div class="telcel-menu">
	<div class="telcel-menu-cont">
        <ul>
            <li><a href="index.php">Volver</a></li>
        </ul>
        <div class="session">
        	<img src="../images/user-icon.png" />
            <div class="session-info">
            	<p>Empleado: <?php echo $_SESSION['username']; ?></p>
                <a href="logout.php">Cerrar Sesión</a>                
            </div>
        </div>
    </div>
</div>
<div class="telcel-wrapper">
    <div class="telcel-container">
        <div class="telcel-sus telcel-section">
        	<div class="telcel-sus-cont">
            	<h2 class="header">INSCRÍBE A UN INVITADO</h2>
				<div class="no-invitados">
                    <p>Se ha eliminado la suscripción a la carrera, así como todos los invitados y niños vinculados a este número de empleado</p>
                </div>
			</div>
        </div>
    </div>	
</div>

</body>
</html>
