<?php

	include("conexion.php"); 

	$nombre = $_POST ['Nombres'];
	$apellido1 = $_POST ['Apellido1'];
	$apellido2 = $_POST ['Apellido2'];
	$direccion = $_POST ['Direccion'];	
	$telefono = $_POST ['Telefono'];
	$correo = $_POST ['Correo'];
	$rfc = $_POST ['rfc'];
	$usuario = $_POST ['Usuario'];
	$contraseña = $_POST ['Contraseña'];


	$query = "INSERT INTO cat_usuarios(Usuario, Contrasenia, idtusuario, estado) VALUES ('$usuario','$contraseña',0,'Alta');";
	$resultado = $conexion->query($query);
	if ($resultado) {
		$query = "SELECT idUsuario FROM cat_usuarios WHERE Usuario = '$usuario'";
		$resultado = $conexion->query($query);
		$fila = $resultado->fetch_assoc();
		$idUsuario = $fila['idUsuario'];
		$query = "INSERT INTO cat_clientes(NombreCli, Apellido1Cli, Apellido2Cli, DireccionCli, TelefonoCli, CorreoCli, RFC, idUsuario) VALUES ('$nombre','$apellido1','$apellido2','$direccion','$telefono','$correo','$rfc',$idUsuario);";
		$resultado = $conexion->query($query);
		header("Location: cat_clientes.php");
	}else{
		echo "No Insertado";
	}
	


?>