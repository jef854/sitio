<?php
/*session_start();
if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}*/
include("../connection/web.php");
$query = "SELECT * FROM registros";
$result = mysql_query($query, $db) or die(mysql_error());
$numero = mysql_num_rows($result);

$user = $_SESSION['username'];
$query_empleado = "SELECT * FROM registros WHERE id_empleado = '$user'";
$result_empleado = mysql_query($query_empleado, $db) or die(mysql_error());
$numero_empleado = mysql_num_rows($result_empleado);
$query_invitado = "SELECT * FROM registros WHERE id_invitado = '$user'";
$result_invitado = mysql_query($query_invitado, $db) or die(mysql_error());
$numero_invitado = mysql_num_rows($result_invitado);
$invitados_restantes = 2 - $numero_invitado;
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

<style>
.loader-register-container, #respuesta-register{ display: none; }
</style>

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
            	<p>Empleado: <? //php echo $_SESSION['username']; ?></p>
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
				<?php if( $numero < 1000 ){ ?>
                	<?php if( $numero_empleado == 0 ){ ?>
                    	<div class="no-invitados">
                            <p>Es necesario que el empleado se haya inscrito a la carrera, para que pueda inscribir invitados</p>
                        </div>
                    <?php }else{ ?>
						<?php if( $numero_invitado < 2 ){ ?>
                        <p class="numero-invitados">Número de invitados que puedes agregar: <?php echo $invitados_restantes; ?></p>
                        <form id="registro_invitados" action="registro_invitados.php" method="post">
                            <div class="input-wrap">
                                <label>CARRERA:</label>
                                <select name="carrera">
                                        <option value="">SELECCIONA:</option>
                                        <option value="QUERETARO">QUERETARO</option>
                                </select>
                            </div>
                            <div class="input-wrap">
                                <label>DISTANCIA:</label>
                                <select name="distancia">
                                    <option value="">SELECCIONA:</option>
                                    <option value="5K">5K</option>
                                    <option value="10K">10K</option>
                                </select>
                            </div>
                            <div class="input-wrap">
                                <label>NOMBRE:</label>
                                <input type="text" name="nombre" id="nombre" />
                            </div>
                            <div class="input-wrap">
                                <label>APELLIDO PATERNO:</label>
                                <input type="text" name="apellidop" id="apellidop" />
                            </div>
                            <div class="input-wrap">
                                <label>APELLIDO MATERNO:</label>
                                <input type="text" name="apellidom" id="apellidom" />
                            </div>
                            <div class="input-wrap">
                                <label>EMAIL:</label>
                                <input type="email" name="email" id="email" />
                            </div>
                            <div class="input-wrap">
                                <label>FECHA DE NACIMIENTO:</label>
                                <input type="text" name="edad" id="age" />
                            </div>
                            <div class="input-wrap">
                                <label>SEXO:</label>
                                <select name="sexo">
                                    <option value="">SELECCIONA:</option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMENINO</option>
                                </select>
                            </div>
                            <div class="input-wrap">
                                <label>CIUDAD:</label>
                                <input type="text" name="ciudad" id="ciudad" />
                            </div>
                            <div class="input-wrap">
                                <label>TELÉFONO:</label>
                                <input type="text" name="telefono" id="telefono" />
                            </div>
                            <div class="input-wrap">
                                <label>TALLA DE PLAYERA:</label>
                                <select name="talla">
                                    <option value="">SELECCIONA:</option>
                                    <option value="Chica">CHICA</option>
                                    <option value="Mediana">MEDIANA</option>
                                    <option value="Grande">GRANDE</option>
                                </select>
                            </div>
                            <div class="submit-wrap">
                                <input class="submit-btn" type="submit" value="Inscribir a Invitado a la Carrera" />                   
                            </div>
                            <input type="hidden" name="invitado" id="invitado" value="<?php echo $user; ?>"/>
                            <input type="hidden" name="tipo" id="tipo" value="invitado" />
                            <input type="hidden" name="estatus" id="status" value="NA" />
                        </form>
                        <div class="loader-register-container"><img src="../images/ajax-loader.gif" /></div>
                        <div id="respuesta-register"></div>
                        <?php }else{ ?>
                        <div class="no-invitados">
                            <p>Ya no puedes agregar más invitados. Haz cubierto tu cupo de invitados por empleado</p>
                        </div>
                        <?php } ?>
               		<?php } ?>
                <?php }else{ ?>
                <div class="no-capacity">
                    <p>La carrera ha cubierto su cupo. Te esperamos para la proxima carrera</p>
                </div>
                <?php } ?>
                </div>
        </div>
    </div>	
</div>

</body>
</html>
