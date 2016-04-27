<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: login.php");
    exit;
}
include("../connection/web.php");
/*Hacer la consulta de registro maximo de niños*/
$query_nino = "SELECT * FROM ninos";
$result_nino = mysql_query($query_nino, $db) or die(mysql_error());
$numero_nino = mysql_num_rows($result_nino);
/*Fin de la consulta de numero maxi de  ninos*/
$query = "SELECT * FROM registros";
$result = mysql_query($query, $db) or die(mysql_error());
$numero = mysql_num_rows($result);
$verifyUser = 0;

while( $exist = mysql_fetch_object($result) ){
	if( $_SESSION['username'] == $exist -> id_empleado ){ 
		$verifyUser = 1; 
	}
}

date_default_timezone_set('America/Mexico_City');
$exp_date = "2016-02-07";
$todays_date = date("Y-m-d");
$today = strtotime($todays_date);
$expiration_date = strtotime($exp_date);
$final_carrera = "";
$proximamente = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Circuito Sindicato Telcel</title>
<link href="../css/telcel-styles.css" rel="stylesheet" type="text/css" />
<link href="../css/easy-slider.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../css/default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../css/colorbox.css" rel="stylesheet" />
<script src="../js/jquery-1.11.1.min.js"></script>
<!--<script src="../js/jquery.nivo.slider.js" type="text/javascript"></script>-->
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/jquery.downcount.js" type="text/javascript"></script>
<script src="../js/jquery.easytabs.js" type="text/javascript"></script>
<script src="../js/jquery.colorbox.js"></script>
<script src="../js/jquery-ui/jquery-ui.js"></script>
<script src="../js/easy-slider.js" type="text/javascript"></script>
<script src="../js/functions.js" type="text/javascript"></script>

<style>
.loader-register-container, #respuesta-register{ display: none; }
.telcel-menu-cont ul li a{ font-size: 12px; }
</style>

</head>

<body id="top">

<div class="telcel-menu">
	<div class="telcel-menu-cont">
        <ul class="scroll-menu">
            <li><a href="#top">Inicio</a></li>
            <li><a href="#what">¿Qué es el Circuito Sindicato Telcel?</a></li>
            <li><a href="#run">Carreras</a>
            	<ul class="sub-menu">
                	<li><a href="../carrera-chihuahua.html" class="generales-link" rel="carreras">Chihuahua</a></li>
                	<li><a href="../carrera-queretaro.html" class="generales-link" rel="carreras">Querétaro</a></li>
                	<li><a href="../carrera-tijuana.html" class="generales-link" rel="carreras">Tijuana</a></li>
                    <li><a href="../carrera-hermosillo.html">Hermosillo</a></li>
					<li><a>D.F.</a></li>
                    <li><a href="#run">Mérida</a></li>
                    <li><a href="../carrera-monterrey.html" class="generales-link" rel="carreras">Monterrey</a></li>
                </ul>
            </li>
            <li><a href="#sus">Inscríbete Aquí</a></li>
            <li><a href="#fut">Futbol</a>
            	<ul class="sub-menu">
                	<li><a href="../fut-df.php" class="fut-link" rel="futbol">D.F.</a></li>
                    <li><a href="../fut-hermosillo.php" class="fut-link" rel="futbol">Hermosillo</a></li>
                    <li><a href="../fut-merida.php" class="fut-link" rel="futbol">Mérida</a></li>
                    <li><a href="../fut-guadalajara.php" class="fut-link" rel="futbol">Guadalajara</a></li>
                    <li><a href="../fut-queretaro.php" class="fut-link" rel="futbol">Queretaro</a></li>
                    <li><a href="../fut-chihuahua.php" class="fut-link" rel="futbol">Chihuahua</a></li>
                    <li><a href="../fut-tijuana.php" class="fut-link" rel="futbol">Tijuana</a></li>
                    <li><a href="../fut-puebla.php" class="fut-link" rel="futbol">Puebla</a></li>
                    <li><a href="../fut-monterrey.php" class="fut-link" rel="futbol">Monterrey</a></li>
                </ul>
            </li>
            <li><a href="#gal">Galerías</a>
            <li><a href="#gym">Gimnasios</a></li>
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
    	<div class="telcel-slider telcel-section">
        	<div id="slider">
                <ul>
                	<li><img src="../images/slide-logo-carreras.jpg" alt="Carreras Sindicato Telcel" /></li>
                    <li><img src="../images/slide-logo-futbol.jpg" alt="Circuito Sindicato Telcel" /></li>			
                    <li><img src="../images/carreras/2014/df/df_2014_04.jpg" alt="Carreras Sindicato Telcel" /></li>
                    <li><img src="../images/carreras/2014/df/df_2014_14.jpg" alt="Carreras Sindicato Telcel" /></li>
                    <li><img src="../images/carreras/2014/gdl/gdl_2014_13.jpg" alt="Carreras Sindicato Telcel" /></li>
                    <li><img src="../images/carreras/2014/gdl/gdl_2014_19.jpg" alt="Carreras Sindicato Telcel" /></li>
                    <li><img src="../images/carreras/2015/chihuahua/chihuaehua_2015_06.jpg" alt="Carreras Sindicato Telcel" /></li>
                    <li><img src="../images/carreras/2015/chihuahua/chihuahua_2015_09.jpg" alt="Carreras Sindicato Telcel" /></li>
                    <li><img src="../images/carreras/2015/merida/merida_2015_14.jpg" alt="Carreras Sindicato Telcel" /></li>
                    <li><img src="../images/carreras/2015/merida/merida_2015_07.jpg" alt="Carreras Sindicato Telcel" /></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="telcel-wrapper">
    <div class="telcel-container">        
        <div id="what" class="telcel-what telcel-section">
        	<div class="telcel-what-cont">
            	<h2 class="header">¿QUÉ ES EL CIRCUITO SINDICATO TELCEL?</h2>
                <p>El <strong>SINDICATO TELCEL</strong>, siempre preocupado por el bienestar de sus trabajadores y de la	sociedad mexicana en general, organiza eventos deportivos con la intención de incrementar la actividad física y contrarrestar el sedentarismo. El circuito del <strong>SINDICATO TELCEL</strong>, incluye carreras atléticas y torneos de fútbol 7. Quédate pendiente, que muy pronto estaremos en tu ciudad.</p>
            </div>
        </div>
        <div id="run" class="telcel-run telcel-section">
        	<div class="telcel-run-cont">
				<h2 class="header">CARRERA</h2>
                <h3><strong>2a carrera sindicato Telcel Mérida 7 de febrero</strong></h3>
                <div class="countdown-cont">
                	<h4 class="header3-blue">Mérida</h4>
                    <ul class="countdown3">
                        <li> <span class="days">00</span>
                        <p class="days_ref">días</p>
                        </li>
                        <li class="seperator">.</li>
                        <li> <span class="hours">00</span>
                        <p class="hours_ref">horas</p>
                        </li>
                        <li class="seperator">:</li>
                        <li> <span class="minutes">00</span>
                        <p class="minutes_ref">minutos</p>
                        </li>
                        <li class="seperator">:</li>
                        <li> <span class="seconds">00</span>
                        <p class="seconds_ref">segundos</p>
                        </li>
                    </ul>
                </div>
                <div class="telcel-challenge">
                    <div class="telcel-challenge-item center-challenge">
                    	<img src="../images/carrera-df.jpg" alt="Carrera Sindicato Telcel D.F." />
                        <div class="challenge-text">
                       	  <h4>Carrera <br /><strong>Sindicato Telcel Mérida</strong></h4>
                          	<p><strong>Fecha:</strong> Domingo 7 de febrero del 2016<br />
                            <strong>Lugar:</strong> Mérida<br />
                            <strong>Distancias:</strong> 5K y 10K<br />
                            <strong>Horario de salida:</strong> 7:00 a.m.<br />
                            (Te esperamos desde las 6:00 a.m.)<br />
                            <ul>
                              <li><a class="rutas" href="../images/ruta-merida.jpg" rel="rutas" title="Ruta 5K y 10K">Ver Rutas</a></li>
                              <!--<li><a class="rutas" href="" rel="rutas" title="Estacionamientos">Ver Estacionamientos</a></li>-->
                              <li><a href="../files/entregadekitsf.pdf" target="_blank">Entrega de Kits</a></li>
                              <li><a href="../files/CONVOCATORIA-MERIDA-2016.pdf" target="_blank">Ver convocatoria</a></li>
                              <!--<li><a href="#sus" class="scroll-link">Inscríbete aquí</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
	</div>
</div>
<div class="telcel-wrapper">
    <div class="telcel-container-full bg-run">
    	<div class="telcel-consejos telcel-section">
        	<div class="telcel-consejos-cont">
    			<h2 class="header2">CONSEJOS PARA LA CARRERA</h2>
                <div class="telcel-consejos-tabs">
                	<div id="tab-container" class="tab-container">
                        <ul class='etabs'>
                            <li class='tab'><a href="#tabs1-antes"><span>Antes de la Carrera</span></a></li>
                            <li class='tab' style="margin-right: 0;"><a href="#tabs1-despues"><span>Después de la Carrera</span></a></li>
                        </ul>
                        <div class="panel-container">
                            <div id="tabs1-antes">
                                <h3>ANTES DE LA CARRERA</h3>
                                <ul>
                                    <li>Come máximo una hora antes alimentos ricos en carbohidratos para que tengas mayor energía durante la carrera, no te esperes media hora antes ya que esto te podría ocasionar calambres. El peor error que puedes cometer es ir en ayunas.</li>
                                    <li>Lleva contigo vestimenta adecuada, ropa con la que te sientas cómodo y zapatos con los que ya hayas entrenado antes para evitar molestias o sentirte incomodo durante la carrera. Evita llevar ropa en exceso.</li>
                                    <li>Prepara un día antes todo lo que vas a necesitar en la carrera, por ejemplo audífonos para que al otro día no se te olviden por andar con prisas, haz una “playlist” que sabes que te va motivar todo el tiempo.</li>
                                    <li>Recuerda mantenerte hidratado, sobre todo si es una carrera larga, siempre hay stands donde puedes consumir líquidos, pero no tomes agua de más antes de la carrera ya que te podrías sentirte mal.</li>
                                    <li>Descansa bien un día antes, no hay nada peor que estar desvelado ya que vas estar cansado y no vas a rendir igual durante la carrera.</li>
                                    <li>Calienta un poquito antes de la carrera para no comenzar frio, por lo menos diez minutos antes es más que suficiente.</li>
                                </ul>
                            </div>
                            <div id="tabs1-despues">
                                <h3>DESPUES DE LA CARRERA</h3>
                                <ul>
                                    <li>Al momento de llegar a la meta recuerda no parar en seco, para evitar lesiones y una recuperación difícil, comienza con un trote y termina caminando.</li>
                                    <li>Recuerda que es muy importante mantenerte hidratado, aunque no tengas sed al final de la carrera es importante tomar agua a sorbos pequeños para compensar la deshidratación que el cuerpo acaba de pasar.</li>
                                    <li>Si realizas estiramientos al terminar la carrera recuerda hacerlos con precaución para evitar lesiones, no debemos forzar mucho al cuerpo. Intenta realizarlos de manera suave y relajada.</li>
                                    <li>Consume algún tipo de alimento como plátano o barritas con menos de 100 calorías para poder compensar el glucógeno perdido y no tener nuestras reservas en ceros.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>
</div>
<div class="telcel-wrapper">
    <div class="telcel-container"> 
        <div id="sus" class="telcel-sus telcel-section">
        	<div class="telcel-sus-cont">
            	<h2 class="header">INSCRÍBETE AQUÍ</h2>
                <?php /*if( $final_carrera == "finalizada" ){ */?>
                	<div class="no-capacity">
                        <!--<p>El proceso de inscripcion en línea ha finalizado. Aún puedes inscribirte en la ubicación donde se realizará al entrega de kits</p>-->
                    </div>
                <?php /*}*/ if( $proximamente == "si" ){ ?>
                	<div class="no-capacity">
                        <p>Próximamente</p>
                    </div>
                <?php }else{ ?>
					<?php if( $numero < 3000 ){ ?>
                    	<?php if( $verifyUser == 1 ){ ?>
                            <div class="no-capacity">
                                <p>Usted ya se ha inscrito a esta carrera</p>
                            </div>
                            <div class="note-text">
                                <p>Puede cancelar su inscripción a la carrera presionando el siguiente botón:</p>
                                <p><a class="red-btn" href="delete-user.php">Eliminar Inscripción</a></p>
                                <p><strong>NOTA:</strong> Si hay usuarios invitados y niños vinculados a este número de empleado, quedarán automáticamente eliminados al momento de dar de baja su inscripción</p>
                                <p>Usted podrá volver a inscribirse en cualquier momento a la carrera</p>
                            </div>
                        <?php }else{ ?>            
                            <form id="registro" action="registro_empleados.php" method="post">
                                <div class="input-wrap">
                                    <label>CARRERA:</label>
                                    <select name="carrera">
                                        <option value="MERIDA">MERIDA</option>
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
                                    <label>NUMERO DE EMPLEADO:</label>
                                    <input type="text" value="<?php echo $_SESSION['username']; ?>" disabled="disabled" />
                                    <input type="hidden" name="empleado" id="empleado" value="<?php echo $_SESSION['username']; ?>"/>
                                </div>
                                <div class="input-wrap">
                                    <label>¿ERES SINDICALIZADO?</label>
                                    <select name="sindicalizado">
                                        <option value="">SELECCIONA:</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
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
                                    <label>EDAD:</label>
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
                                    <input class="submit-btn" type="submit" value="Inscribirme a la Carrera" />
                                </div>
                                <input type="hidden" name="tipo" id="tipo" value="empleado" />
                                <input type="hidden" name="estatus" id="estatus" value="NA" />
                            </form>
                            <div class="loader-register-container"><img src="../images/ajax-loader.gif" /></div>
                            <div id="respuesta-register"></div>
                    	<?php } ?>
                    <?php }else{ ?>
                    <div class="no-capacity">
                        <p>La carrera ha cubierto su cupo. Te esperamos para la próxima carrera</p>
                    </div>
                    <?php } ?>
                    <div class="links-otros">
                    	<h4>Agregar externos</h4>
                        <a href="invitado.php">Inscribir a un Invitado</a>
						<!--Validar que no se pasen de 120 niños -->
						<?php if (numero_nino < 120) { ?>
							<a href="ninos.php">Inscribir a un Niño</a>
						<?php }else{ ?>
							<div class="no-capacity">
								<p>La carrera ha cubierto su cupo máximo de niños. Te esperamos para la proxima carrera</p>
							</div>
						<?php } ?>
                    </div>
                    <div class="message-email">
                        <p>Si te inscribiste y no te ha llegado el correo de confirmación, no olvides revisar tu bandeja de No Deseados.</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>	
</div>
<div class="telcel-wrapper">
    <div class="telcel-container">        
        <div id="fut" class="telcel-fut telcel-section">
        	<div class="telcel-fut-cont">
            	<h2 class="header">FUTBOL</h2>
                <div class="telcel-fut-logo">
                	<img src="../images/logo-futbol.png" />
                </div>
                <div class="telcel-fut-text">
                	<p><strong>Estimado compañero Telcel:</strong></p>
                    <p>Es importante que recuerdes lo siguiente:</p>
                    <ul>
                    	<li>El capitán será el responsable de recibir información, boletines y representara al equipo ante la liga. </li>
                        <li>Es obligatorio para cada jugador acreditar su identidad con la credencial de empleado.</li>
                        <li><strong><i>Importante llegar 15 minutos antes de la hora de partido.</i></strong></li>
                    </ul>
                    <p>Para más información <a href="mailto:jmillan@playmarketing.mx">jmillan@playmarketing.mx</a>, <a href="mailto:pgutierrez@playmarketing.mx">pgutierrez@playmarketing.mx</a> o con la persona de contacto de tu localidad (RRHH).</p>
                    <ul class="btn-menu-telcel">
                        <li><a href="../files/convocatoria-futbol.pdf" target="_blank">Convocatoria</a></li>
                        <li><a href="../files/reglamento-futbol-2015.pdf" target="_blank">Reglamento</a></li>
                    </ul>
                    <h3>CIUDADES Y/O <strong>SEDES</strong></h3>
                    <ul class="menu-sedes">
                        <li><a href="../fut-df.php" class="fut-link" rel="futbol-2">D.F.</a></li>
                        <li><a href="../fut-hermosillo.php" class="fut-link" rel="futbol-2">Hermosillo</a></li>
                        <li><a href="../fut-merida.php" class="fut-link" rel="futbol-2">Mérida</a></li>
                        <li><a href="../fut-guadalajara.php" class="fut-link" rel="futbol-2">Guadalajara</a></li>
                        <li><a href="../fut-queretaro.php" class="fut-link" rel="futbol-2">Queretaro</a></li>
                        <li><a href="../fut-chihuahua.php?section=sind" class="fut-link" rel="futbol-2">Chihuahua</a></li>
                        <li><a href="../fut-tijuana.php" class="fut-link" rel="futbol-2">Tijuana</a></li>
                        <li><a href="../fut-puebla.php" class="fut-link" rel="futbol-2">Puebla</a></li>
                        <li><a href="../fut-monterrey.php" class="fut-link" rel="futbol-2">Monterrey</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
</div>
<div class="telcel-wrapper">
    <div class="telcel-container">        
        <div id="gal" class="telcel-gal telcel-section">
        	<h2 class="header">Galerías</h2>
            <h3>Carreras 2014</h3>
            <div class="gal-wrapper">
                <div class="gal-column">
                    <div class="gal-column-innner">
                        <h4 class="gal-inner-header">D.F.</h4>
                        <ul>
                            <li><a href="../images/carreras/2014/df/df_2014_01.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_01.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_02.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_02.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_03.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_03.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_04.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_04.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_05.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_05.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_06.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_06.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_07.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_07.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_08.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_08.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_09.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_09.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_10.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_10.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_11.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_11.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_12.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_12.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_13.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_13.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/df/df_2014_14.jpg" rel="gal-df-2014" class="galerias-link"><img src="../images/carreras/2014/df/df_2014_14.jpg" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
                <div class="gal-column">
                    <div class="gal-column-innner">
                        <h4 class="gal-inner-header">Guadalajara</h4>
                        <ul>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_01.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_01.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_02.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_02.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_03.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_03.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_04.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_04.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_05.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_05.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_06.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_06.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_07.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_07.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_08.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_08.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_09.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_09.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_10.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_10.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_11.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_11.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_12.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_12.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_13.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_13.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_14.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_14.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_15.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_15.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_16.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_16.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_17.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_17.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_18.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_18.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_19.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_19.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_20.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_20.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_21.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_21.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2014/gdl/gdl_2014_22.jpg" rel="gal-gdl-2014" class="galerias-link"><img src="../images/carreras/2014/gdl/gdl_2014_22.jpg" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3>Carreras 2015</h3>
            <div class="gal-wrapper">
                <div class="gal-column">
                    <div class="gal-column-innner">

                        <h4 class="gal-inner-header">Chihuahua</h4>
                        <ul>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_01.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_01.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_02.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_02.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_03.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_03.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_04.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_04.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_05.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_05.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_06.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_06.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_07.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_07.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_08.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_08.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_09.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_09.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/chihuahua/chihuahua_2015_10.jpg" rel="gal-chi-2014" class="galerias-link"><img src="../images/carreras/2015/chihuahua/chihuahua_2015_10.jpg" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
                <div class="gal-column">
                    <div class="gal-column-innner">
                        <h4 class="gal-inner-header">Merida</h4>
                        <ul>
                            <li><a href="../images/carreras/2015/merida/merida_2015_01.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_01.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_02.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_02.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_03.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_03.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_04.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_04.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_05.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_05.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_06.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_06.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_07.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_07.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_08.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_08.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_09.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_09.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_10.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_10.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_11.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_11.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_12.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_12.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_13.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_13.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_14.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_14.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_15.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_15.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_16.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_16.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_17.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_17.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_18.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_18.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_19.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_19.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_20.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_20.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/merida/merida_2015_21.jpg" rel="gal-merida-2014" class="galerias-link"><img src="../images/carreras/2015/merida/merida_2015_21.jpg" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
                <div class="gal-column">
                    <div class="gal-column-innner">
                        <h4 class="gal-inner-header">Tijuana</h4>
                        <ul>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_01.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_01.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_02.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_02.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_03.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_03.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_04.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_04.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_05.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_05.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_06.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_06.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_07.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_07.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_08.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_08.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_09.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_09.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_10.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_10.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_11.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_11.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_12.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_12.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_13.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_13.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_14.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_14.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_15.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_15.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_16.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_16.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_17.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_17.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_18.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_18.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_19.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_19.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_20.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_20.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_21.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_21.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_22.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_22.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_23.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_23.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_24.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_24.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_25.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_25.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_26.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_26.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_27.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_27.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_28.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_28.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_29.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_29.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_30.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_30.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_31.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_31.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_32.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_32.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_33.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_33.jpg" alt="" /></a></li>
                            <li><a href="../images/carreras/2015/tijuana/tijuana_2015_34.jpg" rel="gal-tijuana-2015" class="galerias-link"><img src="../images/carreras/2015/tijuana/tijuana_2015_34.jpg" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="telcel-wrapper">
	<div class="telcel-container-full bg-gym">
    	<div id="gym" class="telcel-gym telcel-section">
        	<div class="telcel-gym-cont">
            	<h2 class="header2">GIMNASIOS</h2>
                <h3>información próximamente</h3>
                <!--<p>El Sindicato Telcel se preocupa por sus trabajadores y por ello, todo nuestro personal sindicalizado podrá obtener descuentos y beneficios en las siguientes cadenas de gimnasios.</p>
                <div class="telcel-gym-slider">
                	<div class="slider-wrapper theme-default">
                        <div id="slidergym" class="nivoSlider">
                            <a href="http://www.goldsmexico.com.mx" target="_blank"><img src="../images/logo-golds.jpg" alt="Gols's Gym"></a>
                            <a href="http://www.sportium.com.mx" target="_blank"><img src="../images/logo-sportium.jpg" alt="Sportium Club"></a>
                            <a href="http://www.bongagym.com" target="_blank"><img src="../images/logo-bonga.jpg" alt="Bonga Gym"></a>
                            <a href="http://www.anytimefitness.com.mx" target="_blank"><img src="../images/logo-anytime.jpg" alt="Anytime Fitness"></a>
                            <a href="http://www.energyfitness.com.mx" target="_blank"><img src="../images/logo-energy.jpg" alt="Energy Fitness"></a>
                            <a href="http://www.gofitness.com.mx" target="_blank"><img src="../images/logo-go.jpg" alt="Go Fitness"></a>
                            <a href="http://www.sportsworld.com.mx" target="_blank"><img src="../images/logo-sportsworld.jpg" alt="Sports World"></a>
                            <a href="http://www.bodysystems.com.mx" target="_blank"><img src="../images/logo-bodysystems.jpg" alt="Body Systems"></a>
                            <a href="http://www.snapfitness.com.mx" target="_blank"><img src="../images/logo-snap.jpg" alt="Snap Fitness"></a>
                            <a href="http://www.smartfit.com.mx" target="_blank"><img src="../images/logo-smartfit.jpg" alt="SmartFit"></a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	(function($) {
		$('.countdown').downCount({
			date: '10/25/2015 07:00:00',
			offset: -5
		});
		$('.countdown2').downCount({
			date: '11/08/2015 07:00:00',
			offset: -5
		});
		$('.countdown3').downCount({
			date: '02/07/2016 07:00:00',
			offset: -5
		});
		/*$('#slider').nivoSlider({
			controlNav: false,
			pauseOnHover: false,
			pauseTime: 3000
		});
		$('#slidergym').nivoSlider({
			pauseOnHover: false,
			pauseTime: 4000
		});*/
		$('#tab-container').easytabs();
		$(".rutas").colorbox({
			rel:'rutas',
			width:'80%',
			height:'80%'
		});
		$(".generales-link").colorbox({
			iframe:true,
			width:"50%",
			height:"80%"
		});
		$(".fut-link").colorbox({
			iframe:true,
			width:"70%",
			height:"80%"
		});
		$(".galerias-link").colorbox({});
		$("#slider").easySlider({
			auto: true, 
			continuous: true
		});
	})(jQuery);
</script>

</body>
</html>
