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
		<h1>Catalogo de distribuidores</h1>
		<button><a href="alta_empleado.html">Nuevo</a></button>
		<table >
			<thead>
				<tr>
					<td>Clave</td>
					<td>Nombre</td>
					<td>Desripcion</td>
					<td>Telefono</td>
					<td>Imagen</td>
					<td colspan="2">Acciones</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_distribuidores";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idDistribuidor']." </td>
    					<td>".$fila['NombreDis']."</td>
    					<td>".$fila['DescripcionDis']."</td>
    					<td>".$fila['TelefonoDis']."</td>
    					<td>".$fila['ImagenDis'].'</td>
						<td><a href="cambios_empleado.php?clave='.$fila['idDistribuidor'].'">Modificar</a></td>
						<td><a href="eliminar_empleado.php?clave='.$fila['idDistribuidor'].'">Eliminar</a></td>
					</tr>';

				}
			?>
		</table>	
	</section>
	
</body>
</html>
