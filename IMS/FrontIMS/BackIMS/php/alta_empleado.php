<?php
	include("conexion.php");

	$sql = "SELECT * FROM cat_tipousuarios";
		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
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
		<form action="guardar_empleado.php" method="POST">
			
		<h1>Alta de empleado</h1>

			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="" /><br>
			<label>Apellido1</label><br>
			<input type="text" required name="Apellido1" placeholder="Aqui va un apellido" value="" /><br>
			<label>Apellido2</label><br>
			<input type="text" required name="Apellido2" placeholder="Aqui va el segundo apellido"value="" /><br>
			<label>Fecha de nacimiento</label><br>
			<input type="date" required name="FechaNac" placeholder=""value="" /><br>
			<label>Correo</label><br>
			<input type="text" required name="Correo" placeholder="Aqui va el correo"value="" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion"value="" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono"value="" /><br>
			<label>Fecha de contratacion</label><br>
			<input type="date" required name="FechaCont" placeholder=""value="" /><br>
			<label>Usuario</label><br>
			<input type="text" required name="Usuario" placeholder="Aqui va el usuario"value="" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña"value="" /> <br>
			<label>Tipo de usuario</label><br>
			<SELECT NAME="tipousuario" SIZE=1 > 
				<?php
					while($fila = $resultado->fetch_assoc()){
					echo "<OPTION VALUE='".$fila['idtusuario']."'>".$fila['tipousuario']."</OPTION>";
					}
				?>
			</SELECT> 
			<br><br>
			<input type="submit" value="Guardar" >		

		</form>
	</section>
	
</body>
</html>