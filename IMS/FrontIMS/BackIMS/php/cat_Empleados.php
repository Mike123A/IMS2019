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
		<h1>Catalogo de empleados</h1>
		<a href="alta_empleado.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<table >
			<thead>
				<tr>
					<td>Clave</td>
					<td>Nombres</td>
					<td>Apellido 1</td>
					<td>Apellido 2</td>
					<td>Fecha Nacimiento</td>
					<td>Correo</td>
					<td>Direccion</td>
					<td>Telefono</td>
					<td>Fecha Contratacion</td>
					<td>Usuario</td>
					<td>Contraseña</td>
					<td>Nivel Usuario</td>
					<td colspan="2">Acciones</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_empleados";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idEmpleado']." </td>
    					<td>".$fila['NombresEmp']."</td>
    					<td>".$fila['Apellido1Emp']."</td>
    					<td>".$fila['Apellido2Emp']."</td>
    					<td>".$fila['FechaNacEmp']."</td>
    					<td>".$fila['CorreoEmp']."</td>
    					<td>".$fila['DireccionEmp']."</td>
    					<td>".$fila['TelefonoEmp']."</td>
    					<td>".$fila['FechaContEmp']."</td>
    					<td>".$fila['UsuarioEmp']."</td>
    					<td>".$fila['ContraseniaEmp']."</td>
    					<td>".$fila['idtusuario']."</td>
    					<td><a href='cambios_empleado.php?clave=".$fila['idEmpleado']."'>
							<button class='modificar'>
								<img src='../img/modificar.png' alt=''>
							</button>
							</a>
						</td>
						<td><a href='eliminar_empleado.php?clave=".$fila['idEmpleado']."'>
							<button class='eliminar'>
								<img src='../img/eliminar.png' alt=''>
							</button>
							</a>
						</td>
					</tr>";

				}
			?>
		</table>	
	</section>
	
</body>
</html>
