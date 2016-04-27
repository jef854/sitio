<?php

ob_start();

include("../connection/web.php");

mysql_select_db($dbDatabase, $db);
$query_registros = "SELECT * FROM ninos";
$registros = mysql_query($query_registros, $db) or die(mysql_error());
$row_registros = mysql_fetch_assoc($registros);
$totalRows_registros = mysql_num_rows($registros);
$Cont=1;

//Grabado de archivo
$File="t3lc3l-r3g1str0s-n1n0s.xls";
$fichero=fopen($File, "w");
fputs($fichero, "\tID_EMPLEADO\tCARRERA\tDISTANCIA\tNOMBRE\tAPELLIDO_PATERNO\tAPELLIDO_MATERNO\tFECHA_NACIMIENTO\tEDAD\tSEXO\tTALLA\tFECHA\t\n");

do {
	fputs($fichero, $Cont."\t".$row_registros['id_empleado']."\t".$row_registros['carrera']."\t".$row_registros['distancia']."\t".$row_registros['nombre']."\t".$row_registros['apellido_paterno']."\t".$row_registros['apellido_materno']."\t".$row_registros['nacimiento']."\t".$row_registros['edad']."\t".$row_registros['sexo']."\t".$row_registros['talla']."\t".$row_registros['fecha']."\t\n");
	$Cont++;
} while ($row_registros = mysql_fetch_assoc($registros));

	header('Location: t3lc3l-r3g1str0s-n1n0s.xls?Now='.date("YmdHis"));
?>