<?php

	include("conexion.php"); 
	$clave = $_GET['clave'];

	$query1 = "SELECT ImagenDis FROM cat_distribuidores WHERE idDistribuidor =".$clave.";";
	$resultado1 = $conexion->query($query1);
	$fila = $resultado1->fetch_assoc();
	//echo $fila['ImagenDis'];
	$query ="DELETE FROM cat_distribuidores WHERE idDistribuidor=".$clave.";";

	$resultado = $conexion->query($query);
	if ($resultado) {
		unlink("../../FrontIMS/img/Asociados/".$fila['ImagenDis']);

		header("Location: cat_distribuidores.php");

	}else{
		echo "No eliminado";
	}


?>