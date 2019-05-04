<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Alta Producto</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<center>
		<form action="GuardarProducto.php" method="POST">
			<div>
				Alta Producto
			</div>
			<br/>	
			<label>Nombre producto:</label>
			<input type="text" required name="NombreProducto" placeholder="Nombre..." value="" /><br/><br/>			
			<label>Descripcion:</label>
			<input type="text" required name="DescripcionProducto" placeholder="Descripcion..." value="" /><br/><br/>		
			<label>Precio:</label>
			<input type="text" required name="PrecioProducto" placeholder="Precio..." value="" /><br/><br/>	
			<label>Imagen:</label>
			<input type="date" required name="ImagenProducto" placeholder="Imagen..." value="" /><br/><br/>
			<input type="submit" value="Guardar">		



		</form>

	</center>


</body>
</html>