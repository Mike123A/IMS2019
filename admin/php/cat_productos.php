<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) {}
		else{
			header("Location: index.php");
		}
	}

 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php include ("../includes/encabezado_sesion.php") ?>
	
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<h1>Catalogo de productos</h1>
		<a href="alta_producto.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<table >
			<thead>
				<tr>
					<td>Clave</td>
					<td>Nombre</td>
					<td>Alto</td>
					<td>Ancho</td>
					<td>Peso</td>
					<td>Descripcion</td>
					<td>Precio</td>
					<td>Stock</td>
					<td>Imagen</td>
					<td>Estado</td>
					<td colspan="2">Acciones</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_productos ORDER BY idProducto DESC";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				mysqli_close($conexion);
				
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idProducto']." </td>
    					<td>".$fila['NombreProd']."</td>
    					<td>".$fila['AltoProd']."cm</td>
    					<td>".$fila['AnchoProd']."cm</td>
    					<td>".$fila['PesoProd']."gr</td>
    					<td>".$fila['DescripcionProd']."</td>
    					<td>$".$fila['PrecioProd']."</td>
    					<td>".$fila['StockProd']."</td>

    					<td> <img src='../../img/Productos/".$fila['ImagenProd']."'alt=''></td>
    					<td>".$fila['estado']."</td>
    				
						<td><a href='cambios_producto.php?clave=".$fila['idProducto']."'>
							<button class='modificar'>
								<img src='../img/modificar.png' alt=''>
							</button>
							</a>
						</td>
						<td>		
							<a href='cambiar_estado_Producto.php?clave=".$fila['idProducto']."'>
							<button class='eliminar'>
								<img src='../img/refrescar.png' alt=''> Estado
							</button>
							</a>
						</td></tr>";
				}
			?>
		</table>	
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>
