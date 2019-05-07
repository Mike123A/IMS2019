<?php
	include("conexion.php"); 
	// print_r($_FILES);
	// exit;
	$clave = $_POST ['clave'];
	$nombre = $_POST ['Nombres'];
	$descripcion = $_POST ['Descripcion'];
	$telefono = $_POST ['Telefono'];
	$pagina = $_POST ['Pagina'];

	$imagen = $_FILES['Imagen'];
	if ($imagen['name']== "") {
		$query = "UPDATE cat_distribuidores SET NombreProv = '".$nombre."' , DescripcionProv = '".$descripcion."' , TelefonoProv = '".$telefono."', PaginaProv = '".$pagina."' WHERE idDistribuidor = ".$clave.";";

		$resultado = $conexion->query($query);
		if ($resultado) {
			header("Location: cat_distribuidores.php");
		}
		else{
			echo "No Insertado";
		}	
	}else{
		$nombreimagen = $imagen['name'];
		$type = $imagen['type'];
		$url_temp = $imagen['tmp_name'];
		
		$destino = '../../../FrontIMS/img/Asociados/';
		$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
		$img_proveedor = $img_nombre.'.png';
		$src = $destino.$img_proveedor;

		$query1 = "SELECT ImagenProv FROM cat_proveedores WHERE idProveedor =".$clave.";";
		$resultado1 = $conexion->query($query1);
		$fila = $resultado1->fetch_assoc();

		$query = "UPDATE cat_proveedores SET NombreProv = '".$nombre."' , DescripcionProv = '".$descripcion."' , TelefonoProv = '".$telefono."', PaginaProv = '".$pagina."', ImagenProv = '".$img_proveedor."' WHERE idProveedor = ".$clave." ;";

		$resultado = $conexion->query($query);
		if ($resultado) {
			unlink("../../../FrontIMS/img/Asociados/".$fila['ImagenProv']);
			move_uploaded_file($url_temp,$src);
			header("Location: cat_proveedores.php");
		}
		else{
			echo "No Insertado";
		}	
	}

?>