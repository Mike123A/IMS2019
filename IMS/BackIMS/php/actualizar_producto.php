<?php
	include("conexion.php"); 
	// print_r($_FILES);
	// exit;
	$clave = $_POST ['clave'];
	
	$nombre = $_POST ['Nombres'];
	$Alto = $_POST ['Alto'];
	$Ancho = $_POST ['Ancho'];
	$Peso = $_POST ['Peso'];
	$descripcion = $_POST ['Descripcion'];
	$Precio = $_POST ['Precio'];


	$imagen = $_FILES['Imagen'];
	if ($imagen['name']== "") {
		$query = "UPDATE cat_productos SET NombreProd = '".$nombre."' , AltoProd = '".$Alto."' , AnchoProd = '".$Ancho."', PesoProd = '".$Peso."', DescripcionProd = '".$descripcion."' , PrecioProd = '".$Precio."' WHERE idProducto = ".$clave." ;";

		$resultado = $conexion->query($query);
		if ($resultado) {
			header("Location: cat_productos.php");
		}
		else{
			echo "No Insertado";
		}	
	}else{
		$nombreimagen = $imagen['name'];
		$type = $imagen['type'];
		$url_temp = $imagen['tmp_name'];

		$destino = '../../FrontIMS/img/Productos/';
		$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
		$img_producto = $img_nombre.'.png';
		$src = $destino.$img_producto;

		$query1 = "SELECT ImagenProd FROM cat_productos WHERE idProducto =".$clave.";";
		$resultado1 = $conexion->query($query1);
		$fila = $resultado1->fetch_assoc();

		$query = "UPDATE cat_productos SET NombreProd = '".$nombre."' , AltoProd = '".$Alto."' , AnchoProd = '".$Ancho."', PesoProd = '".$Peso."', DescripcionProd = '".$descripcion."' , PrecioProd = '".$Precio."' , ImagenProd = '".$img_producto."' WHERE idProducto = ".$clave." ;";

		$resultado = $conexion->query($query);
		if ($resultado) {
			unlink("../../FrontIMS/img/Productos/".$fila['ImagenProd']);
			move_uploaded_file($url_temp,$src);
			header("Location: cat_productos.php");
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