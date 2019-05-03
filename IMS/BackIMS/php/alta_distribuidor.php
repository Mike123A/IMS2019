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
			<a href="Nosotros.html"><img src="../img/LogoConNombreBlanco.png"></a>	
			<ul>
				<li><a href="index.html">[ INICIO ]</a></li>
				<li><a href="Nosotros.html">[ CATALOGOS ]</a>
					<ul>
						<li><a href="3">Productos</a></li>
						<li><a href="4">Distribuidores</a></li>
						<li><a href="5">Proveedores</a></li>
						<li><a href="5">Clientes</a></li>
						<li><a href="5">Empleados</a></li>
					</ul>
				</li>
				<li><a href="Nosotros.html">[ REPORTES]</a>
					<ul>
						<li><a href="6">CATALOGOS 9</a></li>
						<li><a href="7">CATALOGOS 10</a></li>
					</ul>
				</li>
				<a href="Sesion.html"><img src="img/SesionIcono.png"></a>
			</ul>
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		<form action="guardar_distribuidor.php" method="POST" enctype="multipart/form-data">
		<h1>Alta de distribuidor</h1>

			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="" /><br>
			<label>Descripcion</label><br>
			<input type="textarea" required name="Descripcion" placeholder="Descripcion"value="" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono"value="" /><br>
			<label>Pagina</label><br>
			<input type="text" required name="Pagina" placeholder="Aqui va la pagina"value="" /><br>
			<label>Imagen</label><br>
			<input type="file" required name="Imagen" value="" /><br>
			
			
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>