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
	if(mail($destinatario,$asunto,utf8_decode($mensaje)))
	echo "<script type='text/javascript'>
		location.href='../Contacto.html';
		</script>";
	else
		echo "<script type='text/javascript'>alert('No se envio');</script>";
	
?>
