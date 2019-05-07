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
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql="SELECT * FROM cat_clientes WHERE idCliente=".$clave.";";
			if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
			};
			$fila = $resultado->fetch_assoc();	
    	?>
		<form action="actualizar_cliente.php" method="POST">

		<h1>Cambios al registro: <?php echo $clave; ?></h1>

			<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idCliente']; ?>" /><br>

			<label>Nombre o razon social</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="<?php echo $fila['NombreCli']; ?>" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion"value="<?php echo $fila['DireccionCli']; ?>" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono"value="<?php echo $fila['TelefonoCli']; ?>" /><br>
			<label>Correo</label><br>
			<input type="text" required name="Correo" placeholder="Aqui va el correo"value="<?php echo $fila['CorreoCli']; ?>" /><br>
			<label>Usuario</label><br>
			<input type="text" required name="Usuario" placeholder="Aqui va el usuario"value="<?php echo $fila['UsuarioCli']; ?>" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña"value="<?php echo $fila['ContraseniaCli']; ?>" /> <br><br><br>
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>