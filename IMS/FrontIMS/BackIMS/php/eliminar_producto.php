<?php

	include("conexion.php"); 
	$clave = $_GET['clave'];

	$query1 = "SELECT ImagenProd FROM cat_productos WHERE idProducto =".$clave.";";
	$resultado1 = $conexion->query($query1);
	$fila = $resultado1->fetch_assoc();
	//echo $fila['ImagenDis'];
	$query ="DELETE FROM cat_productos WHERE idProducto=".$clave.";";

	$resultado = $conexion->query($query);
	if ($resultado) {
		unlink("../../FrontIMS/img/Productos/".$fila['ImagenProd']);

		header("Location: cat_productos.php");

	}else{
		echo "No eliminado";
	}


?>