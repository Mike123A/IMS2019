<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) {}
		else{
			header("Location: index.php");
		}
	}

	include("conexion.php"); 
	$clave = $_GET['clave'];

	$query1 = "SELECT estado FROM cat_estadosventa WHERE idEstadoVenta =".$clave.";";
	$resultado1 = $conexion->query($query1);
	$fila = $resultado1->fetch_assoc();

	if ($fila['estado'] == 'Alta') {
		$query ="UPDATE cat_estadosventa SET estado = 'Baja' WHERE idEstadoVenta = ".$clave." ;";	
	}else{
		$query ="UPDATE cat_estadosventa SET estado = 'Alta' WHERE idEstadoVenta = ".$clave." ;";	
	}
	
	$resultado = $conexion->query($query);
	if ($resultado) {
		mysqli_close($conexion);

		header("Location: cat_eventa.php");
	}else{
		echo "No eliminado";
	}


?>