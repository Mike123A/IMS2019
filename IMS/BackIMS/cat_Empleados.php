<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<header>
		<nav>
			<a href="Nosotros.html"><img src="img/LogoConNombreBlanco.png"></a>	
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
		<table>
			<tr>
				<td>Clave</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Fecha Nacimiento</td>
				<td>Correo</td>
				<td>Direccion</td>
				<td>Telefono</td>
				<td>Usuario</td>
				<td>Contraseña</td>
				<td colspan="2">Acciones</td>
			</tr>
			<?php
				include("php/conexion.php");

				$sql = "SELECT * FROM cat_empleados";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idEmpleado']." </td>
    					<td>".$fila['NombresEmp']."</td>
    					<td>".$fila['ApellidosEmp']."</td>
    					<td>".$fila['FechaNacEmp']."</td>
    					<td>".$fila['CorreoEmp']."</td>
    					<td>".$fila['DireccionEmp']."</td>
    					<td>".$fila['TelefonoEmp']."</td>
    					<td>".$fila['UsuarioEmp']."</td>
    					<td>".$fila['ContraseniaEmp'].'</td>
						<td><a href="#">Modificar</a></td>
						<td><a href="#">Eliminar</a></td>
					</tr>';
				}
			?>
		</table>	
	</section>
	
</body>
</html>
