<?php

	if (isset($_POST['Guardar'])) {
		
		$nombre = $_POST ['Nombres'];
				
		include("conexion.php"); 

		$query = ("SELECT * FROM cat_tipousuarios WHERE tipousuario='$nombre'"); // inicio de mi consulta 
		$resultado = $conexion->query($query);
   		if(mysqli_num_rows($resultado)>0) { 
   			$bandera = 1;
      		$nombre = "";
    	}
   		if($bandera == 0  ){
   			include("conexion.php"); 

			$nombre = $_POST ['Nombres'];


			$query = "INSERT INTO cat_tipousuarios(tipousuario) VALUES ('$nombre');";
			$resultado = $conexion->query($query);
			if ($resultado) {
		
				header("Location: cat_tusuarios.php");
			}else{
				echo "No Insertado";
			}
	
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
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<h1>Alta de tipo de usuario</h1>
		<br>
		<label>Tipo de usuario/Categoria</label><br>
		<input type="text" required name="Nombres" placeholder="<?php if(isset($nombre) && $nombre ==''){ echo 'Intente con otro';}else{echo "Aqui va el tipo de usuario";} ?>" value="<?php if(isset($nombre)) {echo $nombre;}?>" /><br>
		<br>
		<input type="submit" value="Guardar" name="Guardar">		

		</form>
	</section>
	
</body>
</html>