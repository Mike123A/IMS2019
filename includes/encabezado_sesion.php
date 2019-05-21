<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<!-- <link rel="stylesheet" href="../css/estilo.css"> -->
</head>
<body>
	<div class="encabezado_sesion">
		<a href="cerrar_sesion.php"><img src="../img/cerrar-sesion.png" alt=""></a>

		<label for=""><?php 
		$fecha = new DateTime('NOW');
		date_default_timezone_set('America/Mexico_City');
    	setlocale(LC_TIME, 'es_MX.UTF-8');
		echo 'Merida, Yucatan, '.date('d-m-Y').' | '; 
		echo 'Usuario: '.$_SESSION['Usuario']; 
		?></label>
	</div>	
</body>
</html>