<!DOCTYPE html>
<html lang="en">
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
				<td>Producto</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Imagen</td>
				<td>Clave</td>
				<td>Producto</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Imagen</td>
				<td colspan="2">Acciones</td>
			</tr>
			<?php
				include("php/conexion.php");
				$query= "SELECT idEmpleado,NombresEmp,ApellidosEmp,FechaNacEmp,CorreoEmp,DireccionEmp,TelefonoEmp,UsuarioEmp,ContraseñaEmp FROM cat_empleados";
				$resultado = $conexion->query($query);
				while ($row = mysql_fetch_array($result)){  
			?>
				<tr>	
					<td><?php echo $row['idEmpleado']; ?></td>
					<td><?php echo $row['NombresEmp']; ?></td>
					<td><?php echo $row['ApellidosEmp']; ?></td>
					<td><?php echo $row['FechaNacEmp']; ?></td>
					<td><?php echo $row['CorreoEmp']; ?></td>
					<td><?php echo $row['DireccionEmp']; ?></td>
					<td><?php echo $row['TelefonoEmp']; ?></td>
					<td><?php echo $row['CorreoEmp']; ?></td>
					<td><?php echo $row['UsuarioEmp']; ?></td>
					<td><?php echo $row['ContraseñaEmp']; ?></td>
					<td><a href="#">Modificar</a></td>
					<td><a href="#">Eliminar</a></td>
				</tr>
			<?php
				}
			?>
		</table>
		<table>
  			<tr>
			    <th>Firstname</th>
			    <th>Lastname</th>
			    <th>Age</th>
			</tr>
			<tr>
			    <td>Jill</td>
			    <td>Smith</td>
			    <td>50</td>
			</tr>
			<tr>
			    <td>Eve</td>
			    <td>Jackson</td>
			    <td>94</td>
			</tr>
			<tr>
			    <td>Eve</td>
			    <td>Jackson</td>
			    <td>94</td>
			</tr>
			<tr>
			    <td>Eve</td>
			    <td>Jackson</td>
			    <td>94</td>
			</tr>
			<tr>
			    <td>Eve</td>
			    <td>Jackson</td>
			    <td>94</td>
			</tr>
			<tr>
			    <td>Eve</td>
			    <td>Jackson</td>
			    <td>94</td>
			</tr>
			<tr>
			    <td>Eve</td>
			    <td>Jackson</td>
			    <td>94</td>
			</tr>
			<tr>
			    <td>Eve</td>
			    <td>Jackson</td>
			    <td>94</td>
			</tr>
		</table> 			
	</section>
	
</body>
</html>