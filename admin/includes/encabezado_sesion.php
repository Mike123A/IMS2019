<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<!-- <link rel="stylesheet" href="../css/estilo.css"> -->
</head>
<body>
	<header class="encabezado_sesion">
		<a href="cerrar_sesion.php"><img src="../img/cerrar-sesion.png" alt=""></a>

		<label for=""><?php 
		echo 'Merida, Yucatan, '.date('d/F/Y').' | '; 
		echo 'Usuario: '.$_SESSION['Usuario']; 
		?></label>
	</header>	
</body>
</html>