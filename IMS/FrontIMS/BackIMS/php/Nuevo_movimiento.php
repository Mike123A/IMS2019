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
		<form action="guardar_mov_almacen.php" method="POST">
		<h1>Nuevo movimiento de almacen</h1><br>
			<label>Selecciona un producto</label><br>

			<SELECT NAME="producto" SIZE=1 > 
				<?php
					include("conexion.php");

					$sql = "SELECT * FROM cat_productos";
					if(!$resultado = $conexion->query($sql)){
						die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
					}
					while($fila = $resultado->fetch_assoc()){
					echo "<OPTION VALUE='".$fila['idProducto']."'>".$fila['NombreProd']."</OPTION>";
					}
				?>
			</SELECT> <br>
			
			<label>Tipo de movimiento</label><br>
			<SELECT NAME="tmov" SIZE=1 > 
				<OPTION VALUE="Entrada">Entrada</OPTION>";
				<OPTION VALUE="Salida">Salida</OPTION>";
			</SELECT> <br>
			<label>Cantidad</label><br>
			<input type="number" required name="Cantidad" placeholder="Cantidad"
			><br><br><br>
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>