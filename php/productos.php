<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php 
		include("../includes/menu.php"); 
	?>
	<section class="ContenedorPrincipal">
		<form action="productos_busqueda.php" method="GET" class="form_buscador">
			<input type="text" name="busqueda" placeholder="Glucheck">
			<button id="btn_busqueda" type="submit" name="buscar"><img src="../img/lupa.png" alt=""></button>
		</form>
		<div class="titulopagina">Productos</div>
		<?php
				include("conexion.php");
				$sql_numr = mysqli_query($conexion,"SELECT COUNT(*) as total FROM cat_productos WHERE estado = 'Alta';");
				$total_registros = mysqli_fetch_array($sql_numr);
				$totalregistros = $total_registros['total'];

				$porpagina = 2;

				if (empty($_GET['pagina'])) {
					$pagina = 1;
				}else{
					$pagina = $_GET['pagina'];
				}

				$desde = ($pagina - 1) * $porpagina;
				$totalpagina = ceil($totalregistros / $porpagina);

				$sql = "SELECT * FROM cat_productos WHERE estado = 'Alta' LIMIT $desde,$porpagina";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				
				while($producto = $resultado->fetch_assoc()){
					

					echo"
					<div id='producto'>
						<h2>
							".$producto['NombreProd']."
						</h2>
						<img src='../img/Productos/".$producto['ImagenProd']."' alt=''>
						<a href='producto-descripcion.php?clave=".$producto['idProducto']."'>
							<button>
								Ver detalles
							</button>
						</a>
					</div>";
				}				
			?>
			<?php if ($totalregistros !=0) { ?>
		<div class="paginador">
			<ul>
				<?php 	
					if ($pagina != 1) {
				 ?>
				<li><a href="?pagina=<?php 	echo 1 ?>">|<</a></li>
				<li><a href="?pagina=<?php 	echo $pagina-1 ?>"><</a></li>
				<?php 	
					}
				 ?>
				<?php 	
					for ($i	=1; $i < $totalpagina+1 ; $i++) { 
						if ($i == $pagina) 
							echo "<li class='paginaseleccionada'>".$i."</li>";
						else
							echo "<li><a href='?pagina=".$i."'>".$i."</a></li>";
					}

				 ?>

				<?php 	
					if ($pagina != $totalpagina) {
				 ?>

				<li><a href="?pagina=<?php 	echo $pagina+1 ?>">></a></li>
				<li><a href="?pagina=<?php 	echo $totalpagina ?>">>|</a></li>
				<?php 	
					}
				 ?>
			</ul>
		</div>
	<?php } ?>	
		
		

	</section>
	<?php 
		include("../includes/footer.php"); 
	?>
</body>
</html>