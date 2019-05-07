<?php

	include("conexion.php"); 
	$clave = $_GET['clave'];

	$query1 = "SELECT ImagenProv FROM cat_proveedores WHERE idProveedor =".$clave.";";
	$resultado1 = $conexion->query($query1);
	$fila = $resultado1->fetch_assoc();
	//echo $fila['ImagenDis'];
	$query ="DELETE FROM cat_proveedores WHERE idProveedor=".$clave.";";

	$resultado = $conexion->query($query);
	if ($resultado) {
		unlink("../../../FrontIMS/img/Asociados/".$fila['ImagenProv']);

		header("Location: cat_proveedores.php");

	}else{
		echo "No eliminado";
	}


?>