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
		<form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
		<h1>Alta de producto</h1>

			<label>Nombre</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="" /><br>
			<label>Alto en centimetros</label><br>
			<input type="text" required name="Alto" placeholder="Aqui va el alto"value="" /><br>
			<label>Ancho en centimetros</label><br>
			<input type="text" required name="Ancho" placeholder="Aqui va el ancho"value="" /><br>
			<label>Peso en gramos</label><br>
			<input type="text" required name="Peso" placeholder="Aqui va el peso"value="" /><br>
			<label>Descripcion</label><br>
			<input type="textarea" required name="Descripcion" placeholder="Descripcion"value="" /><br>
			<label>Precio</label><br>
			<input type="text" required name="Precio" placeholder="Aqui va el precio"value="" /><br>
			
			<label>Imagen</label><br>
			<input type="file" required name="Imagen" value="" accept="image/*" /><br>
			
			<br>
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>