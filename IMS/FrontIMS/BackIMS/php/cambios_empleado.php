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
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql = "SELECT * FROM cat_empleados ce INNER JOIN cat_usuarios cu ON ce.idUsuario = cu.idUsuario INNER JOIN cat_tipousuarios ctu ON cu.idtusuario = ctu.idtusuario WHERE idEmpleado = $clave";

			if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
			};
			$fila = $resultado->fetch_assoc();	
			$idEmpleado = $fila['idEmpleado'];
			$idUsuario = $fila['idUsuario'];
    		$NombresEmp = $fila['NombresEmp'];
    		$Apellido1Emp = $fila['Apellido1Emp'];
    		$Apellido2Emp = $fila['Apellido2Emp'];
    		$FechaNacEmp = $fila['FechaNacEmp'];
    		$CorreoEmp = $fila['CorreoEmp'];
    		$DireccionEmp = $fila['DireccionEmp'];
    		$TelefonoEmp = $fila['TelefonoEmp'];
    		$FechaContEmp = $fila['FechaContEmp'];
    		$Usuario = $fila['Usuario'];
    		$Contrasenia = $fila['Contrasenia'];
    		$tipousuario = $fila['tipousuario'];
    	?>
		<form action="actualizar_empleado.php" method="POST">

		<h1>Cambios al registro: <?php echo $clave; ?></h1>
			<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $idEmpleado;?>" /><br>
			<input  type="text" style="display: none" required name="claveu" placeholder="" value=" <?php echo$idUsuario; ?>" /><br>
			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="" value="<?php echo $NombresEmp; ?>" /><br>
			<label>Apellido 1</label><br>
			<input type="text" required name="Apellido1" placeholder="Aqui van los apellidos" value="<?php echo $Apellido1Emp; ?>" /><br>
			<label>Apellido 2</label><br>
			<input type="text" required name="Apellido2" placeholder="Aqui van los apellidos" value="<?php echo $Apellido2Emp; ?>" /><br>

			<label>Fecha de nacimiento</label><br>
			<input type="date" required name="FechaNac" placeholder="" value="<?php echo $FechaNacEmp; ?>" /><br>
			<label>Correo</label><br>
			<input type="email" required name="Correo" placeholder="Aqui va el correo"value="<?php echo $CorreoEmp; ?>" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion" value="<?php echo $DireccionEmp; ?>" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono" value="<?php echo $TelefonoEmp; ?>" /><br>
			<label>Fecha de contratacion</label><br>
			<input type="date" required name="FechaCont" placeholder="" value="<?php echo $FechaContEmp; ?>" /><br>
			<label>Usuario</label><br>
			<input type="text" required name="Usuario" placeholder="Aqui va el usuario" value="<?php echo $Usuario; ?>" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña" value="<?php echo $Contrasenia; ?>" /><br>
			<label>Tipo de usuario</label><br>
			<SELECT NAME="tipousuario"><br>
				<?php
					
				include("conexion.php");

				$sql1 = "SELECT * FROM cat_tipousuarios";
				if(!$resultado1 = $conexion->query($sql1)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}

					while($fila1 = $resultado1->fetch_assoc()){
					
						if ($fila1['idtusuario'] == $fila['idtusuario']  ) {
							echo "<OPTION SELECTED VALUE='".$fila1['idtusuario']."'>".$fila1['tipousuario']."</OPTION>";
						}else{
							echo "<OPTION VALUE='".$fila1['idtusuario']."'>".$fila1['tipousuario']."</OPTION>";
						}
					}
				?>
			</SELECT> 
			<br><br>

			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>