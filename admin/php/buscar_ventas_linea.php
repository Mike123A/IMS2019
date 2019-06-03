<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) {}
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
		header("Location: ventas_linea.php");
	}

	 ?>
	<section class="ContenedorPrincipal">
		<h1>Ventas desde pagina de clientes</h1>
		<br><br>
		<form action="buscar_ventas_linea.php" method="GET" class="form_buscador">
			<input type="text" name="busqueda" placeholder="" value="<?php if(isset($busqueda)) echo $busqueda ?>">
			<button id="btn_busqueda" type="submit" name="buscar"><img src="../img/lupa.png" alt=""></button>
		</form>
		<table >
			<thead>
				<tr>
					<td>Clave</td>
					<td>Fecha</td>
					<td>Cliente</td>
					<td>Total</td>
					<td>Etapa de venta</td>
					<td colspan="2">Acciones</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql_numr = mysqli_query($conexion,"SELECT COUNT(*) as total FROM ventas v INNER JOIN cat_usuarios cu ON v.idCliente = cu.idUsuario INNER JOIN cat_clientes ci ON cu.idUsuario = ci.idUsuario INNER JOIN cat_estadosventa cev ON v.idestadoVenta = cev.idEstadoVenta WHERE (
					idVenta LIKE '%$busqueda%' OR 
					NombreCli LIKE '%$busqueda%' OR 
					Apellido1Cli LIKE '%$busqueda%' OR 
					Apellido2Cli LIKE '%$busqueda%' OR 
					FechaVenta LIKE '%$busqueda%' OR 
					totalVenta LIKE '%$busqueda%' OR 
					EstadoVenta LIKE '%$busqueda%') AND v.idEmpleado = 0;");

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
				

				$sql = "SELECT v.idVenta,v.FechaVenta,ci.NombreCli,ci.Apellido1Cli,ci.Apellido2Cli, v.totalVenta, cev.EstadoVenta,v.idestadoVenta FROM ventas v INNER JOIN cat_usuarios cu ON v.idCliente = cu.idUsuario INNER JOIN cat_clientes ci ON cu.idUsuario = ci.idUsuario INNER JOIN cat_estadosventa cev ON v.idestadoVenta = cev.idEstadoVenta WHERE (
					idVenta LIKE '%$busqueda%' OR 
					NombreCli LIKE '%$busqueda%' OR 
					Apellido1Cli LIKE '%$busqueda%' OR 
					Apellido2Cli LIKE '%$busqueda%' OR 
					FechaVenta LIKE '%$busqueda%' OR 
					totalVenta LIKE '%$busqueda%' OR 
					EstadoVenta LIKE '%$busqueda%') AND v.idEmpleado = 0 ORDER BY idVenta ASC LIMIT $desde,$porpagina;";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				mysqli_close($conexion);
				
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idVenta']." </td>
    					<td>".$fila['FechaVenta']."</td>
    					<td>".$fila['NombreCli']." ".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."</td>
    					<td>$".$fila['totalVenta']."</td>
    					<td>".$fila['EstadoVenta']."</td>";
    					
    				echo "
						<td><a href='../pdf/factura.php?clave=".$fila['idVenta']."' target='_blank'>
							<button class='modificar'>
								<img src='../img/archivo.png' alt=''>Ver detalles
							</button>
							</a>
						</td>	<td><a href='cambiar_estado_venta.php?clave=".$fila['idVenta']."&estado=".$fila['idestadoVenta']."'>
							<button class='etapa'>
								<img src='../img/aumentar.png' alt=''>Etapa
							</button>
							</a>
						</td>
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