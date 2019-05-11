<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<form action="actualizar_producto.php" method="POST" enctype="multipart/form-data">
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql = "SELECT * FROM cat_productos WHERE idProducto=".$clave.";";

			if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
			$fila = $resultado->fetch_assoc();
			
			$direccionimagen = "../../../FrontIMS/img/Productos/".$fila['ImagenProd'];
		?>
		<h1>Cambios al producto: <?php echo $fila['idProducto']; ?> </h1>
		<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idProducto']; ?>" /><br>
			<label>Nombre</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="<?php echo $fila['NombreProd']; ?>" /><br>
			<label>Alto en centimetros</label><br>
			<input type="text" required name="Alto" placeholder="Aqui va el alto"value="<?php echo $fila['AltoProd']; ?>" /><br>
			<label>Ancho en centimetros</label><br>
			<input type="text" required name="Ancho" placeholder="Aqui va el ancho"value="<?php echo $fila['AnchoProd']; ?>" /><br>
			<label>Peso en gramos</label><br>
			<input type="text" required name="Peso" placeholder="Aqui va el peso"value="<?php echo $fila['PesoProd']; ?>" /><br>
			<label>Descripcion</label><br>
			<input type="textarea" required name="Descripcion" placeholder="Descripcion"value="<?php echo $fila['DescripcionProd']; ?>" /><br>
			<label>Precio</label><br>
			<input type="text" required name="Precio" placeholder="Aqui va el precio"value="<?php echo $fila['PrecioProd']; ?>" /><br>
			<label>Stock</label><br>	
			<input type="text" required name="Stock" placeholder="Stock" value="<?php echo $fila['StockProd']; ?>"  /><br/>
			<label>Imagen actual</label><br>
			<img class="imagenformulario" src="<?php echo $direccionimagen ?>" alt=''>
			<br>
			<input type="file" name="Imagen" value="" /><br>
			
			
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>