<?php

	include("conexion.php"); 
	// print_r($_FILES);
	// exit;

	$nombre = $_POST ['Nombres'];
	$descripcion = $_POST ['Descripcion'];
	$telefono = $_POST ['Telefono'];
	$pagina = $_POST ['Pagina'];

	$imagen = $_FILES['Imagen'];
	$nombreimagen = $imagen['name'];
	$type = $imagen['type'];
	$url_temp = $imagen['tmp_name'];

	$destino = '../../../FrontIMS/img/Asociados/';
	$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
	$img_distribuidor = $img_nombre.'.png';
	$src = $destino.$img_distribuidor;

	$query = "INSERT INTO cat_distribuidores(NombreDis,DescripcionDis,TelefonoDis,PaginaDis,ImagenDis) VALUES ('$nombre','$descripcion','$telefono','$pagina','$img_distribuidor')";

	$resultado = $conexion->query($query);
	if ($resultado) {
		move_uploaded_file($url_temp,$src);
		// echo "Insertado";
	    header("Location: cat_distribuidores.php");
	}else{
		echo "No Insertado";
	}


?>