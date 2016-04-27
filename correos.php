<?php

include("connection/web.php");

$sql = mysql_query("SELECT email FROM registros");
$recipients = array();
while($row = mysql_fetch_array($sql)) {
    $recipients[] = $row['email'];
}

   print_r ($recipients);

?>
