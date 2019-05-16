<?php

	include("conexion.php"); 
	$clave = $_GET['clave'];

	$query1 = "SELECT estado FROM cat_usuarios WHERE idUsuario =".$clave.";";
	$resultado1 = $conexion->query($query1);
	$fila = $resultado1->fetch_assoc();

	if ($fila['estado'] == 'Alta') {
		$query ="UPDATE cat_usuarios SET estado = 'Baja' WHERE idUsuario = ".$clave." ;";	
	}else{
		$query ="UPDATE cat_usuarios SET estado = 'Alta' WHERE idUsuario = ".$clave." ;";	
	}

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_empleados.php");
	}else{
		echo "No eliminado";
	}


?>