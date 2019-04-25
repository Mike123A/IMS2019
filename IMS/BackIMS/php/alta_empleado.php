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
		<form action="guardar_empleado.php" method="POST">
		<h1>Alta de empleado</h1>

			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="" /><br>
			<label>Apellido(s)</label><br>
			<input type="text" required name="Apellidos" placeholder="Aqui van los apellidos"value="" /><br>
			<label>Fecha de nacimiento</label><br>
			<input type="date" required name="FechaNac" placeholder=""value="" /><br>
			<label>Correo</label><br>
			<input type="text" required name="Correo" placeholder="Aqui va el correo"value="" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion"value="" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono"value="" /><br>
			<label>Usuario</label><br>
			<input type="text" required name="Usuario" placeholder="Aqui va el usuario"value="" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña"value="" /> <br><br><br>
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>