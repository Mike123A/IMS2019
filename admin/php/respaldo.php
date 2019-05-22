<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1) {}
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
	<h1>Necesita un respaldo de la base de datos?</h1>
	<br><br>
	<button id="btn-resp"><a href="crear_respaldo_bd.php">Crear respaldo</a></button>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</section>
	<?php include ("../includes/footer.php") ?>
	
</body>
</html>
