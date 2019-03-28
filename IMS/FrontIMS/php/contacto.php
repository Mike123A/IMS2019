<?php
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$asunto = $_POST["asunto"];
	$mensaje = $_POST["mensaje"];

	$destinatario = "SoporteIMS@outlook.com";

	$mensaje = "
		Datos del remitente
		Nombre: ".$nombre."
		Correo: ".$correo."
		Telefono: ".$telefono."

		Mensaje/Comentario: ".$mensaje."
	";
	mail($destinatario,$asunto,utf8_decode($mensaje));
	echo "<script type='text/javascript'>alert('Tu mensaje ha sido enviado exitosamente');</script>";
	echo "<script type='text/javascript'>window.location.href='http://bluuweb.cl/plantilla-1/index.html';</script>";

	header("location: ../Contacto.html");

?>
