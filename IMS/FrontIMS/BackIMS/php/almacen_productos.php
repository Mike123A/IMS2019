<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<h1>Movimientos de almacen</h1>
		<a href="Nuevo_Movimiento.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<table >
			<thead>
				<tr>
					<td>No. Movimiento</td>
					<td>Fecha</td>
					<td>Clave Producto</td>
					<td>Nombre Producto</td>
					<td>Tipo de movimiento</td>
					<td>Cantidad</td>
					<td>Existencias actuales</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql = "SELECT * FROM almacen_productos ap INNER JOIN cat_productos cp ON ap.idProducto = cp.idProducto ORDER BY idMovAlm DESC";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idMovAlm']." </td>
    					<td>".$fila['FechaMov']."</td>
    					<td>".$fila['idProducto']."</td>
    					<td>".$fila['NombreProd']."</td>
    					<td>".$fila['tipo_movimiento']."</td>
    					<td>".$fila['Cantidad']."</td>
    					<td>".$fila['StockProd']."</td>
    				</tr>";
				}
			?>
		</table>	
	</section>
	
</body>
</html>
