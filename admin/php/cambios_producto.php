<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) {}
		else{
			header("Location: index.php");
		}
	}

	if (isset($_POST['Guardar'])) {
		include("conexion.php"); 

		$clave = $_POST ['clave'];
		
		$nombre = $_POST ['Nombres'];
		$Alto = $_POST ['Alto'];
		$Ancho = $_POST ['Ancho'];
		$Peso = $_POST ['Peso'];
		$Descripcion = $_POST ['Descripcion'];
		$Precio = $_POST ['Precio'];

		$sql1 = "SELECT * FROM cat_productos WHERE idProducto = $clave";
		if(!$resultado1 = $conexion->query($sql1)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		};
		$fila = $resultado1->fetch_assoc();
		if ($fila['NombreProd']!= $nombre) {
			
			$query = ("SELECT * FROM cat_productos WHERE NombreProd='$nombre'"); // inicio de mi consulta 
			$resultado = $conexion->query($query);
			$direccionimagen = "../..//img/Productos/".$fila['ImagenProd'];
   			
   			if(mysqli_num_rows($resultado)>0) { 
   				$bandera = 1;
      			$nombre = "";
    		}
		}
    	if($bandera == 0){

			$imagen = $_FILES['Imagen'];
			if ($imagen['name']== "") {
				$query = "UPDATE cat_productos SET NombreProd = '".$nombre."' , AltoProd = '".$Alto."' , AnchoProd = '".$Ancho."', PesoProd = '".$Peso."', DescripcionProd = '".$Descripcion."' , PrecioProd = '".$Precio."' WHERE idProducto = ".$clave." ;";

				$resultado = $conexion->query($query);
				if ($resultado) {
					mysqli_close($conexion);

					header("Location: cat_productos.php");
				}
				else{
					echo "No Insertado";
				}	
			}else{
				$nombreimagen = $imagen['name'];
				$type = $imagen['type'];
				$url_temp = $imagen['tmp_name'];

				$destino = '../../img/Productos/';
				$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
				$img_producto = $img_nombre.'.png';
				$src = $destino.$img_producto;

				$query1 = "SELECT ImagenProd FROM cat_productos WHERE idProducto =".$clave.";";
				$resultado1 = $conexion->query($query1);
				$fila = $resultado1->fetch_assoc();

				$query = "UPDATE cat_productos SET NombreProd = '".$nombre."' , AltoProd = '".$Alto."' , AnchoProd = '".$Ancho."', PesoProd = '".$Peso."', DescripcionProd = '".$Descripcion."' , PrecioProd = '".$Precio."' , StockProd = '".$Stock."',ImagenProd = '".$img_producto."' WHERE idProducto = ".$clave." ;";

				$resultado = $conexion->query($query);
				if ($resultado) {
					mysqli_close($conexion);
					
					unlink("../../img/Productos/".$fila['ImagenProd']);
					move_uploaded_file($url_temp,$src);
					header("Location: cat_productos.php");
				}
				else{
					echo "No Insertado";
				}
			}	
		}
	}else{
		$clave = $_GET['clave'];
		include("conexion.php");
		$sql = "SELECT * FROM cat_productos WHERE idProducto=".$clave.";";

		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		}
		$fila = $resultado->fetch_assoc();
			
		$direccionimagen = "../../img/Productos/".$fila['ImagenProd'];

		$nombre = $fila['NombreProd'];
		$Alto = $fila['AltoProd'];
		$Ancho = $fila['AnchoProd'];
		$Peso = $fila['PesoProd'];
		$Descripcion = $fila['DescripcionProd'];
		$Precio = $fila['PrecioProd'];
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php include ("../includes/encabezado_sesion.php") ?>
	
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
		
		<h1>Cambios al producto: <?php echo $fila['idProducto']; ?> </h1>
		<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idProducto']; ?>" /><br>
			<label>Nombre</label><br>
			<input type="text" required name="Nombres" placeholder="<?php if(isset($nombre) && $nombre ==''){ echo 'Intente con otro';}else{echo "Aqui va el nombre";} ?>" value="<?php if(isset($nombre)) {echo $nombre;}?>" maxlength="50" /><br>
			<label>Alto en centimetros</label><br>
			<input type="text" required name="Alto" placeholder="Aqui va el alto" value="<?php if(isset($Alto)) {echo $Alto;}?>" pattern="[0-9]+" maxlength="5"/><br>
			<label>Ancho en centimetros</label><br>
			<input type="text" required name="Ancho" placeholder="Aqui va el ancho" value="<?php if(isset($Ancho)) {echo $Ancho;}?>" pattern="[0-9]+" maxlength="5" /><br>
			<label>Peso en gramos</label><br>
			<input type="text" required name="Peso" placeholder="Aqui va el peso" value="<?php if(isset($Peso)) {echo $Peso;}?>" pattern="[0-9]+" maxlength="5"/><br>
			<label>Descripcion</label><br>
			<input type="textarea" required name="Descripcion" placeholder="Descripcion" value="<?php if(isset($Descripcion)) {echo $Descripcion;}?>" maxlength="300"/><br>
			<label>Precio</label><br>
			<input type="text" required name="Precio" placeholder="Aqui va el precio" value="<?php if(isset($Precio)) {echo $Precio;}?>" /><br>
			<label>Stock</label><br>
			
			
			<label>Imagen actual</label><br>
			<img class="imagenformulario" src="<?php echo $direccionimagen ?>" alt=''>
			<br>
			<input type="file" name="Imagen" value="" /><br>
			
			<input type="submit" value="Guardar" name="Guardar">		

		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>