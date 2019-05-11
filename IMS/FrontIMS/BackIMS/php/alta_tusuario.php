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
		<form action="guardar_tusuario.php" method="POST">
		<h1>Alta de tipo de usuario</h1>
<br>
			<label>Tipo de usuario/Categoria</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="" /><br>
			 <br>
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>