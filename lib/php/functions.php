<?php 
//Obtener formatos de fechas
function get_mes($numMes) {
	switch ($numMes){
		case "01": return "Enero";
		case "02": return "Febrero";
		case "03": return "Marzo";
		case "04": return "Abril";
		case "05": return "Mayo";
		case "06": return "Junio";
		case "07": return "Julio";
		case "08": return "Agosto";
		case "09": return "Septiembre";
		case "10": return "Octubre";
		case "11": return "Noviembre";
		case "12": return "Diciembre";
		default: return "--";
	}
}
function getNumMes($numMes) {
	switch ($numMes){
		case "Ene": return "01";
		case "Feb": return "02";
		case "Mar": return "03";
		case "Abr": return "04";
		case "May": return "05";
		case "Jun": return "06";
		case "Jul": return "07";
		case "Ago": return "08";
		case "Sep": return "09";
		case "Oct": return "10";
		case "Nov": return "11";
		case "Dic": return "12";
		default: return "--";
	}
}

function get_fecha($fecha) {
	ereg("([0-9]{2,2})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha); 
	if (get_mes($mifecha[2]) == "--") return "--";
    $lafecha=$mifecha[3].".".get_mes($mifecha[2]).".".$mifecha[1]; 
    return $lafecha; 
}

function get_hora($fecha) {
	ereg("([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2})", $fecha, $hora); 
    $lahora=$hora[2].":".$hora[3]; 
    return $lahora; 
}

function get_fecha_hora($arg){
	$fecha = $arg;
	ereg("([0-9]{2,2})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2})", $fecha, $mifecha); 
    $fechahora=$mifecha[3].".".get_mes($mifecha[2]).".".$mifecha[1]." ".$mifecha[4].":".$mifecha[5]; 
	if(get_mes($mifecha[2]) == "Err") return "--";
	return $fechahora; 
}
?>