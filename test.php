<?php

include("connection/web.php");
include("sindicato/mail.php");

$sql = mysql_query("SELECT email FROM registros WHERE carrera = 'DF'");
$recipients = array();
while($row = mysql_fetch_array($sql)) {
    $recipients[] = $row['email'];
}

$correos = implode(', ', $recipients);

echo $correos;

?>