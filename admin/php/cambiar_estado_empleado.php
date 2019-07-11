<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 2) {}
		else{
			header("Location: index.php");
		}
	}

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
		mysqli_close($conexion);

		header("Location: cat_empleados.php?baja");
	}else{
		echo "No eliminado";
	}


?>