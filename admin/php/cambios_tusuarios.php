<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 2) {}
		else{
			header("Location: index.php");
		}
	}



	if (isset($_POST['Guardar'])) {
		$clave = $_POST ['clave'];
		
		$nombre = $_POST ['Nombres'];
				
		include("conexion.php"); 
		
		$sql1 = "SELECT * FROM cat_tipousuarios WHERE idtusuario = $clave";

		if(!$resultado1 = $conexion->query($sql1)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		};
		$fila = $resultado1->fetch_assoc();
		if ($fila['tipousuario']!= $nombre) {
	   		$query = ("SELECT * FROM cat_tipousuarios WHERE tipousuario='$nombre'"); 
			$resultado = $conexion->query($query);
	    	if(mysqli_num_rows($resultado)>0) { 
				$bandera = 1;
	     		$nombre = "";
	     	}
   		}
   		if($bandera == 0  ){
			$query = "UPDATE cat_tipousuarios SET tipousuario= '$nombre' WHERE idtusuario = ".$clave." ;";
			$resultado = $conexion->query($query);
			if ($resultado) {
				mysqli_close($conexion);
				
				header("Location: cat_tusuarios.php");
			}else{
				echo "No Insertado";
			}
	
   		}
	}else{

		$clave = $_GET['clave'];
		include("conexion.php");
		$sql = "SELECT * FROM cat_tipousuarios WHERE idtusuario = $clave";
		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		};
		$fila = $resultado->fetch_assoc();	
		$nombre = $fila ['tipousuario'];

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
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<h1>Cambios al tipo de usuario: <?php echo $clave; ?></h1>
			<input style="display: none" type="text" required name="clave"  value=" <?php echo $fila['idtusuario']; ?>" /><br>
			<br>
			<label>Tipo de usuario/Categoria</label><br>
			<input type="text" required name="Nombres" placeholder="<?php if(isset($nombre) && $nombre ==''){ echo 'Intente con otro';}else{echo 'Aqui va el tipo';}?>" value="<?php if(isset($nombre)) {echo $nombre;}?>" /><br>
			 <br>
			<input type="submit" value="Guardar" name="Guardar">		

		</form>
	</section>
	
</body>
</html>