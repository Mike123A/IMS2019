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
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql = "SELECT * FROM cat_tipousuarios WHERE idtusuario = $clave";
			if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
			};
			$fila = $resultado->fetch_assoc();	
    	?>
		<form action="actualizar_tusuario.php" method="POST">
		<h1>Cambios al tipo de usuario: <?php echo $clave; ?></h1>
			<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idtusuario']; ?>" /><br>
			<br>
			<label>Tipo de usuario/Categoria</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="<?php echo $fila['tipousuario'] ?>" /><br>
			 <br>
			<input type="submit" value="Guardar">		

		</form>
	</section>
	
</body>
</html>