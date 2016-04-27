<?php

include("connection/web.php");
 
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}
// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
 
$fp = fsockopen('ssl://www.paypal.com', 443, $errno, $errstr, 30);
 
 
if (!$fp) {
	// HTTP ERROR
} else {
	fputs ($fp, $header . $req);
	while (!feof($fp)) {
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0) {		 
			// PAYMENT VALIDATED & VERIFIED!
			
			$idCompra = $_POST["item_number"];
			
			mysql_query("UPDATE registros SET status = 'Pagado' WHERE paypal = '$idCompra'");
					
			$to	= 'bvazquez75@hotmail.com';
			$subject = 'Paypal | Haz recibido un pago';
			$message = 'Se ha realizado un pago a nombre de '.$_POST["first_name"].' '.$_POST["last_name"].'';			
			$headers = 'From:contacto@correyjuega.com' . "\r\n";			 
			mail($to, $subject, $message, $headers);
			
		}
		 
		else if (strcmp ($res, "INVALID") == 0) {		 
			// PAYMENT INVALID & INVESTIGATE MANUALY!
			
			$to = 'bvazquez75@hotmail.com';
			$subject = 'Paypal | Pago Inválido';
			$message = '
			 
			Administrador,
			 
			Un pago se ha hecho, pero está marcado como no válido. 
			Por favor, compruebe el pago manualmente y contacte con el comprador.
			 
			Email del comprador: '.$_POST["payer_email"].'
			';
			
			$headers = 'From:noreply@correyjuega.com' . "\r\n";
			 
			mail($to, $subject, $message, $headers);
		 
		}
	}
	fclose ($fp);
}

?>
