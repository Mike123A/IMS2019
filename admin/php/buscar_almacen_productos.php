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
	<?php $busqueda = strtolower($_REQUEST['busqueda']);
	if (empty($busqueda)) {
		header("Location: almacen_productos.php");
	}

	 ?>
	<section class="ContenedorPrincipal">
		<h1>Movimientos de almacen</h1>
		<a href="nuevo_movimiento.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<form action="buscar_almacen_productos.php" method="GET" class="form_buscador">
			<input type="text" name="busqueda" placeholder="" value="<?php if(isset($busqueda)) echo $busqueda ?>">
			<button id="btn_busqueda" type="submit" name="buscar"><img src="../img/lupa.png" alt=""></button>
		</form>
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

				$sql_numr = mysqli_query($conexion,"SELECT COUNT(*) as total FROM almacen_productos ap INNER JOIN cat_productos cp ON ap.idProducto = cp.idProducto WHERE (
					idMovAlm LIKE '%$busqueda%' OR 
					FechaMov LIKE '%$busqueda%' OR 
					ap.idProducto LIKE '%$busqueda%' OR 
					NombreProd LIKE '%$busqueda%' OR 
					tipo_movimiento LIKE '%$busqueda%' OR 
					Cantidad LIKE '%$busqueda%' OR 
					StockProd LIKE '%$busqueda%');");

				$total_registros = mysqli_fetch_array($sql_numr);
				$totalregistros = $total_registros['total'];

				$porpagina = 5;

				if (empty($_GET['pagina'])) {
					$pagina = 1;
				}else{
					$pagina = $_GET['pagina'];
				}

				$desde = ($pagina - 1) * $porpagina;

				$totalpagina = ceil($totalregistros / $porpagina);
				


				$sql = "SELECT * FROM almacen_productos ap INNER JOIN cat_productos cp ON ap.idProducto = cp.idProducto WHERE (
					idMovAlm LIKE '%$busqueda%' OR 
					FechaMov LIKE '%$busqueda%' OR 
					ap.idProducto LIKE '%$busqueda%' OR 
					NombreProd LIKE '%$busqueda%' OR 
					tipo_movimiento LIKE '%$busqueda%' OR 
					Cantidad LIKE '%$busqueda%' OR 
					StockProd LIKE '%$busqueda%') ORDER BY idMovAlm ASC LIMIT $desde,$porpagina";
				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				mysqli_close($conexion);
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
		<?php if ($totalregistros !=0) { ?>
		<div class="paginador">
			<ul>
				<?php 	
					if ($pagina != 1) {
				 ?>
				<li><a href="?pagina=<?php 	echo 1 ?>&busqueda=<?php echo $busqueda ?>">|<</a></li>
				<li><a href="?pagina=<?php 	echo $pagina-1 ?>&busqueda=<?php echo $busqueda ?>"><</a></li>
				<?php 	
					}
				 ?>
				<?php 	
					for ($i	=1; $i < $totalpagina+1 ; $i++) { 
						if ($i == $pagina) 
							echo "<li class='paginaseleccionada'>".$i."</li>";
						else
							echo "<li><a href='?pagina=".$i."&busqueda=".$busqueda."'>".$i."</a></li>";
					}

				 ?>

				<?php 	
					if ($pagina != $totalpagina) {
				 ?>

				<li><a href="?pagina=<?php 	echo $pagina+1 ?>&busqueda=<?php echo $busqueda ?>">></a></li>
				<li><a href="?pagina=<?php 	echo $totalpagina ?>&busqueda=<?php echo $busqueda ?>">>|</a></li>
				<?php 	
					}
				 ?>
			</ul>
		</div>
	<?php } ?>
	</section>
	<?php include ("../includes/footer.php") ?>

	
</body>
</html>
