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
		<h1>Catalogo de distribuidores</h1>
		<a href="alta_distribuidor.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<table >
			<thead>
				<tr>
					<td>Clave</td>
					<td>Nombre</td>
					<td>Desripcion</td>
					<td>Telefono</td>
					<td>Pagina/Link</td>
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
    					<td>".$fila['PaginaDis']."</td>
    					<td> <img src='../../FrontIMS/img/Asociados/".$fila['ImagenDis']."'alt=''></td>
    					<td><a href='cambios_distribuidor.php?clave=".$fila['idDistribuidor']."'>
							<button class='modificar'>
								<img src='../img/modificar.png' alt=''>Modificar
							</button>
							</a>
						</td>
						<td><a href='eliminar_distribuidor.php?clave=".$fila['idDistribuidor']."'>
							<button class='eliminar'>
								<img src='../img/eliminar.png' alt=''>Eliminar
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
