<?php

$dbHost = "Localhost"; // servidor
$dbUser = "root"; // usuario de base de datos
$dbPass = "r00t."; // pass de base de datos de usuario
$dbDatabase = "correyjuegadb"; // nombre de la base de datos
$db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error al conectar con la base de datos.");
mysql_select_db($dbDatabase, $db)or die("No se encontro la base de datos.");

?>
