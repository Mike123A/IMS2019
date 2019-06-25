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

				$sql = "SELECT * FROM cat_productos";

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
		
		

	</section>
	<?php 
		include("../includes/footer.php"); 
	?>
</body>
</html>