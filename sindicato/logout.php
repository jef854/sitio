<?php
//Reanudamos la sesion
session_start();
//Destruimos la sesion
session_destroy();
//Redireccionamos a index.php (al inicio de sesion)
header("Location: http://www.correyjuega.telcel.com");
?>
