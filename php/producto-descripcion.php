<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

	<?php 
		include("../includes/menu.php"); 
	?>
	
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql = "SELECT * FROM cat_productos WHERE idProducto=".$clave.";";

			if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
			$fila = $resultado->fetch_assoc();
			
			$direccionimagen = "../img/Productos/".$fila['ImagenProd'];
		?>
	<section class="ContenedorPrincipal">
		<div id="productodesc">
			<h2>
				<?php echo $fila['NombreProd']; ?>
			</h2>
			<img class="imagenformulario" src="<?php echo $direccionimagen ?>" alt=''>
			<article>
				<h3>Dimensiones:</h3>
				<p>Alto <?php echo $fila['AltoProd']; ?> cm, Ancho <?php echo $fila['AnchoProd']; ?>cm</p><br>
				<h3>Peso:</h3>
				<p><?php echo $fila['PesoProd']; ?>gr</p><br>
				<h3>Descripcion:</h3>
				<p><?php echo $fila['DescripcionProd']; ?></p><br>
			</article>
			<form action="agregar_carrito.php" method="post" class="BotonesDescProd">
				<input style="display: none" type="number" required name="clave" placeholder="" value="<?php echo $fila['idProducto']; ?>" /><br>
				
				<label for="">Cuantos desea:</label> <br>
				<input type="number" value="1"name="cantidad"><br>
				<button type="submit" name="agregar" >Agregar al carrito</button>
				<br>
				<a href="productos.php">
					<button>
						Seguir Comprando
					</button>
				</a>
			</form>
			
		</div>
		

	</section>
	<?php 
		include("../includes/footer.php"); 
	?>
</body>
</html>