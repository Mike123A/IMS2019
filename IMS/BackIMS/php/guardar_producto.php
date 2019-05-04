<?php

	include("conexion.php"); 
	// print_r($_FILES);
	// exit;

	$nombre = $_POST ['Nombres'];
	$Alto = $_POST ['Alto'];
	$Ancho = $_POST ['Ancho'];
	$Peso = $_POST ['Peso'];
	$descripcion = $_POST ['Descripcion'];


	$imagen = $_FILES['Imagen'];
	$nombreimagen = $imagen['name'];
	$type = $imagen['type'];
	$url_temp = $imagen['tmp_name'];

	$destino = '../../FrontIMS/img/Productos/';
	$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
	$img_producto = $img_nombre.'.png';
	$src = $destino.$img_producto;

	$query = "INSERT INTO cat_productos(NombreProd,AltoProd,AnchoProd,PesoProd,DescripcionProd,ImagenProd) VALUES ('$nombre','$Alto','$Ancho','$Peso','$descripcion','$img_producto')";

	$resultado = $conexion->query($query);
	if ($resultado) {
		move_uploaded_file($url_temp,$src);
		// echo "Insertado";
	    header("Location: cat_productos.php");
	}else{
		echo "No Insertado";
	}


?>