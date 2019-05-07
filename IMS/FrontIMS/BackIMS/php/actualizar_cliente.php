<?php

	include("conexion.php"); 
	$clave = $_POST ['clave'];
	$nombre = $_POST ['Nombres'];
	$correo = $_POST ['Correo'];
	$direccion = $_POST ['Direccion'];
	$telefono = $_POST ['Telefono'];
	$usuario = $_POST ['Usuario'];
	$contraseña = $_POST ['Contraseña'];
	
	$query ="UPDATE cat_clientes SET NombreCli = '".$nombre."', DireccionCli='".$direccion."', TelefonoCli='".$telefono."', CorreoCli='".$correo."',UsuarioCli='".$usuario."',ContraseniaCli='".$contraseña."' WHERE idCliente = ".$clave." ;";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_clientes.php");
	}else{
		echo "No Insertado";
	}


?>