<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<center>
		<table>
			<thead>
				<tr>
					<th colspan="1"><a href="AltaProducto.php"> Nuevo producto</a></th>
					<th colspan="5"> Productos</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Clave</td>
					<td>Producto</td>
					<td>Descripcion</td>
					<td>Precio</td>
					<td>Imagen</td>
					<td colspan="2">Acciones</td>
				</tr>
			<?php
				include("conexion.php");
				$query= "SELECT idProducto,NombreProducto,DescripcionProducto,PrecioProducto,ImagenProducto FROM catalogoproductos";
				$resultado = $conexion->query($query);
				while ($row=$resultado->fetch_assoc()) {
			?>
				<tr>	
					<td><?php echo $row['idProducto']; ?></td>
					<td><?php echo $row['NombreProducto']; ?></td>
					<td><?php echo $row['DescripcionProducto']; ?></td>
					<td><?php echo $row['PrecioProducto']; ?></td>
					<td><?php echo $row['ImagenProducto']; ?></td>
					<td><a href="#">Modificar</a></td>
					<td><a href="#">Eliminar</a></td>
				</tr>
			<?php
				}

			?>
			</tbody>

		</table>
	</center>
</body>
</html>