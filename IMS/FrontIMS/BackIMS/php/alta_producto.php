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
		<form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
		<h1>Alta de producto</h1>

			<label>Nombre</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="" /><br>
			<label>Alto en centimetros</label><br>
			<input type="text" required name="Alto" placeholder="Aqui va el alto"value="" /><br>
			<label>Ancho en centimetros</label><br>
			<input type="text" required name="Ancho" placeholder="Aqui va el ancho"value="" /><br>
			<label>Peso en gramos</label><br>
			<input type="text" required name="Peso" placeholder="Aqui va el peso"value="" /><br>
			<label>Descripcion</label><br>
			<input type="textarea" required name="Descripcion" placeholder="Descripcion"value="" /><br>
			<label>Precio</label><br>
			<input type="text" required name="Precio" placeholder="Aqui va el precio"value="" /><br>
			<label>Stock</label><br>
			<input type="text" required name="Stock" placeholder="Stock" value="" /><br/>
			<label>Imagen</label><br>
			<input type="file" required name="Imagen" value="" accept="image/*" /><br>
			
			<br>
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>