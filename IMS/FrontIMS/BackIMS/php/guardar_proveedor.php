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
	$img_proveedor = $img_nombre.'.png';
	$src = $destino.$img_proveedor;

	$query = "INSERT INTO cat_proveedores(NombreProv,DescripcionProv,TelefonoProv,PaginaProv,ImagenProv) VALUES ('$nombre','$descripcion','$telefono','$pagina','$img_proveedor')";

	$resultado = $conexion->query($query);
	if ($resultado) {
		move_uploaded_file($url_temp,$src);
		// echo "Insertado";
	    header("Location: cat_proveedores.php");
	}else{
		echo "No Insertado";
	}


?>