<?php 
	//error_reporting(0); 
	$nombre = $_POST['nombre']; 
	$correo_electronico= $_POST['email']; 
	$telefono = $_POST['telefono']; 
	$mensajetexto=$_POST['mensajetexto']; 
	$header = 'From: ' . $correo_electronico . "\r\n"; 
	$header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
	$header .= "Mime-Version: 1.0 \r\n"; 
	$header .= "Content-Type: text/plain"; 

	$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n"; 
	$mensaje .= "Su e-mail es: " . $correo_electronico . " \r\n"; 
	$mensaje .= "Su mensaje".$mensajetexto . " \r\n"; 
	$mensaje .= "Enviado el " . date('d/m/Y', time()); 

	$para = 'florianatw@gmail.com'; 
	$asunto = 'AKI LO Q KIERAS'; 

	mail($para, $asunto, utf8_decode($mensaje), $header); 

echo 'mensaje enviado correctamente'; 

 ?>