<?php

	include("conexion.php"); 

	$nombre = $_POST ['NombreProducto'];
	$descripcion = $_POST ['DescripcionProducto'];
	$precio = $_POST ['PrecioProducto'];
	$imagen = $_POST ['ImagenProducto'];

	$query = "INSERT INTO catalogoproductos(NombreProducto,DescripcionProducto,PrecioProducto,ImagenProducto,EstadoProducto) VALUES ('$nombre','$descripcion','$precio','$imagen','Alta')";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: Productos.php");
	}else{
		echo "No Insertado";
	}


?>