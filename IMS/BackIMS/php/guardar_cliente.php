<?php

	include("conexion.php"); 

	$nombre = $_POST ['Nombres'];
	$correo = $_POST ['Correo'];
	$direccion = $_POST ['Direccion'];
	$telefono = $_POST ['Telefono'];
	$usuario = $_POST ['Usuario'];
	$contraseña = $_POST ['Contraseña'];


	$query = "INSERT INTO cat_clientes(NombreCli, DireccionCli, TelefonoCli, CorreoCli, UsuarioCli, ContraseniaCli) VALUES ('$nombre','$direccion','$telefono','$correo','$usuario','$contraseña')";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_clientes.php");
	}else{
		echo "No Insertado";
	}


?>