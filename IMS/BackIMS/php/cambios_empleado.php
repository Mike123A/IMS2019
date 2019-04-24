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
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql="SELECT * FROM cat_empleados WHERE idEmpleado=".$clave.";";
			if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
			};
			$fila = $resultado->fetch_assoc();	
    	?>
		<form action="actualizar_empleado.php" method="POST">

		<h1>Cambios al registro: <?php echo $clave; ?></h1>
			<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idEmpleado']; ?>" /><br>
			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="" value=" <?php echo $fila['NombresEmp']; ?>" /><br>
			<label>Apellido(s)</label><br>
			<input type="text" required name="Apellidos" placeholder="Aqui van los apellidos" value=" <?php echo $fila['ApellidosEmp']; ?>" /><br>
			<label>Fecha de nacimiento</label><br>
			<input type="date" required name="FechaNac" placeholder="" value="<?php echo $fila['FechaNacEmp']; ?>" /><br>
			<label>Correo</label><br>
			<input type="email" required name="Correo" placeholder="Aqui va el correo"value=" <?php echo $fila['CorreoEmp']; ?>" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion" value=" <?php echo $fila['DireccionEmp']; ?>" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono" value=" <?php echo $fila['TelefonoEmp']; ?>" /><br>
			<label>Usuario</label><br>
			<input type="text" required name="Usuario" placeholder="Aqui va el usuario" value=" <?php echo $fila['UsuarioEmp']; ?>" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña" value=" <?php echo $fila['ContraseniaEmp']; ?>" /><br><br><br>
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>