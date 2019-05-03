<?php

	include("conexion.php"); 
	$clave = $_GET['clave'];

	
	$query ="DELETE FROM cat_distribuidores WHERE idDistribuidor=".$clave.";";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_distribuidores.php");
	}else{
		echo "No eliminado";
	}


?>