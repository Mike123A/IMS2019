<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<header>
		<nav>
			<a href="#"><img src="../img/LogoConNombreBlanco.png"></a>	
			<ul>
				<li><a href="../index.html">[ INICIO ]</a></li>
				<li><a href="#">[ CATALOGOS ]</a>
					<ul>
						<li><a href="cat_productos.php">Productos</a></li>
						<li><a href="cat_distribuidores.php">Distribuidores</a></li>
						<li><a href="cat_proveedores.php">Proveedores</a></li>
						<li><a href="cat_clientes.php">Clientes</a></li>
						<li><a href="cat_empleados.php">Empleados</a></li>
					</ul>
				</li>
				<li><a href="#">[ REPORTES]</a>
					<ul>
						<li><a href="#">CATALOGOS 9</a></li>
						<li><a href="#">CATALOGOS 10</a></li>
					</ul>
				</li>
				<li><a href="../index.html">[CERRAR SESION]</a></li>
			</ul>
		</nav>
	</header>
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
			
			$direccionimagen = "../../FrontIMS/img/Productos/".$fila['ImagenProd'];
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
			<label>Imagen actual</label><br>
			<img class="imagenformulario" src="<?php echo $direccionimagen ?>" alt=''>
			<br>
			<input type="file" name="Imagen" value="" /><br>
			
			
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>