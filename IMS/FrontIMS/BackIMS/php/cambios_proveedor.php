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
		<form action="actualizar_proveedor.php" method="POST" enctype="multipart/form-data">
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql = "SELECT * FROM cat_proveedores WHERE idProveedor=".$clave.";";

			if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
			$fila = $resultado->fetch_assoc();
			
			$direccionimagen = "../../../FrontIMS/img/Asociados/".$fila['ImagenProv'];
		?>
		<h1>Cambios al proveedor: <?php echo $fila['idProveedor']; ?> </h1>
			<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idProveedor']; ?>" /><br>
			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="<?php echo $fila['NombreProv']; ?>" /><br>
			<label>Descripcion</label><br>
			<input type="textarea" required name="Descripcion" placeholder="Descripcion"value="<?php echo $fila['DescripcionProv']; ?>" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono"value="<?php echo $fila['TelefonoProv']; ?>" /><br>
			<label>Pagina</label><br>
			<input type="text" required name="Pagina" placeholder="Aqui va la pagina"value="<?php echo $fila['PaginaProv']; ?>" /><br>
			<label>Imagen actual</label><br>
			<img class="imagenformulario" src="<?php echo $direccionimagen ?>" alt=''>
			<br>
			<input type="file" name="Imagen" value="" /><br>
			
			
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>