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

		$nombre = $_POST ['Nombres'];
		$Alto = $_POST ['Alto'];
		$Ancho = $_POST ['Ancho'];
		$Peso = $_POST ['Peso'];
		$Precio = $_POST ['Precio'];
		$Stock = $_POST ['Stock'];
		$Descripcion = $_POST ['Descripcion'];

		$bandera=0;

		$imagen = $_FILES['Imagen'];
		$nombreimagen = $imagen['name'];
		$type = $imagen['type'];
		$url_temp = $imagen['tmp_name'];

		$query = ("SELECT * FROM cat_productos WHERE nombreProd='$nombre'"); // inicio de mi consulta 
		$resultado = $conexion->query($query);
   		if(mysqli_num_rows($resultado)>0) { 
   			$bandera = 1;
      		$nombre = "";
    	}
    	if($bandera == 0  ){
			

			$destino = '../../../FrontIMS/img/Productos/';
			$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
			$img_producto = $img_nombre.'.png';
			$src = $destino.$img_producto;

			$query = "INSERT INTO cat_productos(NombreProd,AltoProd,AnchoProd,PesoProd,DescripcionProd,PrecioProd,StockProd,ImagenProd,estado) VALUES ('$nombre','$Alto','$Ancho','$Peso','$Descripcion','$Precio','$Stock','$img_producto','Alta')";

			$resultado = $conexion->query($query);
			if ($resultado) {
				move_uploaded_file($url_temp,$src);
				mysqli_close($conexion);
				
	    		header("Location: cat_productos.php");
			}else{
				echo "No Insertado";
			}
		}
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
		<h1>Alta de producto</h1>

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
			<input type="text" required name="Stock" placeholder="Stock" value="<?php if(isset($Stock)) {echo $Stock;}?>" pattern="[0-9]+" maxlength="10" /><br/>
			<label>Imagen</label><br>
			<input type="file" src="<?php if(isset($url_temp)) {echo $url_temp;}?> ?>" required name="Imagen"  accept="image/*" /><br>
			
			<br>
			<input type="submit" value="Guardar" name="Guardar">		

		</form>
	</section>
	
</body>
</html>