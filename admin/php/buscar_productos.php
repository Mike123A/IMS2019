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
	<?php 

	$busqueda = strtolower($_REQUEST['busqueda']);
	if (empty($busqueda)) {
		header("Location: cat_productos.php");
	}


	 ?>
	<section class="ContenedorPrincipal">
		<h1>Catalogo de productos</h1>
		<a href="alta_producto.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<form action="buscar_productos.php" method="GET" class="form_buscador">
			<input type="text" name="busqueda" placeholder="" value="<?php if(isset($busqueda)) echo $busqueda ?>">
			<button id="btn_busqueda" type="submit" name="buscar"><img src="../img/lupa.png" alt=""></button>
		</form>
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
				$sql_numr = mysqli_query($conexion,"SELECT COUNT(*) as total FROM cat_productos WHERE (
					idProducto LIKE '%$busqueda%' OR 
					NombreProd LIKE '%$busqueda%' OR 
					DescripcionProd LIKE '%$busqueda%' OR 
					PrecioProd LIKE '%$busqueda%');");
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

				$sql = "SELECT * FROM cat_productos WHERE (
					idProducto LIKE '%$busqueda%' OR 
					NombreProd LIKE '%$busqueda%' OR 
					DescripcionProd LIKE '%$busqueda%' OR 
					PrecioProd LIKE '%$busqueda%') ORDER BY idProducto ASC LIMIT $desde,$porpagina";

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