<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) {}
		else{
			header("Location: index.php");
		}
	}


	include("conexion.php"); 
	$clave = $_GET['clave'];

	$query1 = "SELECT estado FROM cat_productos WHERE idProducto =".$clave.";";
	$resultado1 = $conexion->query($query1);
	$fila = $resultado1->fetch_assoc();

	if ($fila['estado'] == 'Alta') {
		$query ="UPDATE cat_productos SET estado = 'Baja' WHERE idProducto = ".$clave." ;";	
	}else{
		$query ="UPDATE cat_productos SET estado = 'Alta' WHERE idProducto = ".$clave." ;";	
	}

	$resultado = $conexion->query($query);
	if ($resultado) {
		mysqli_close($conexion);
		header("Location: cat_productos.php?baja");
	}else{
		echo "No eliminado";
	}

?>