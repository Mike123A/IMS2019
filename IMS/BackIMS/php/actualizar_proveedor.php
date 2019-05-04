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
		$query = "UPDATE cat_distribuidores SET NombreDis = '".$nombre."' , DescripcionDis = '".$descripcion."' , TelefonoDis = '".$telefono."', PaginaDis = '".$pagina."' WHERE idDistribuidor = ".$clave." ;";

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
		
		$destino = '../../FrontIMS/img/Asociados/';
		$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
		$img_distribuidor = $img_nombre.'.png';
		$src = $destino.$img_distribuidor;

		$query1 = "SELECT ImagenDis FROM cat_distribuidores WHERE idDistribuidor =".$clave.";";
		$resultado1 = $conexion->query($query1);
		$fila = $resultado1->fetch_assoc();

		$query = "UPDATE cat_distribuidores SET NombreDis = '".$nombre."' , DescripcionDis = '".$descripcion."' , TelefonoDis = '".$telefono."', PaginaDis = '".$pagina."', ImagenDis = '".$img_distribuidor."' WHERE idDistribuidor = ".$clave." ;";

		$resultado = $conexion->query($query);
		if ($resultado) {
			unlink("../../FrontIMS/img/Asociados/".$fila['ImagenDis']);
			move_uploaded_file($url_temp,$src);
			header("Location: cat_distribuidores.php");
		}
		else{
			echo "No Insertado";
		}	
	}





	

	// $query = "INSERT INTO cat_distribuidores(NombreDis,DescripcionDis,TelefonoDis,PaginaDis,ImagenDis) VALUES ('$nombre','$descripcion','$telefono','$pagina','$img_distribuidor')";

	// $resultado = $conexion->query($query);
	// if ($resultado) {
	// 	move_uploaded_file($url_temp,$src);
	// 	// echo "Insertado";
	//     header("Location: cat_distribuidores.php");
	// }else{
	// 	echo "No Insertado";
	// }




?>