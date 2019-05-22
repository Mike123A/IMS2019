<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
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

	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>