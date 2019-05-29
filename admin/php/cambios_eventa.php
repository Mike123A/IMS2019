<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) {}
		else{
			header("Location: index.php");
		}
	}



	if (isset($_POST['Guardar'])) {
		$clave = $_POST ['clave'];
		
		$nombre = $_POST ['Nombres'];
				
		include("conexion.php"); 
		
		$sql1 = "SELECT * FROM cat_estadosventa WHERE idEstadoVenta = $clave";

		if(!$resultado1 = $conexion->query($sql1)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		};
		$fila = $resultado1->fetch_assoc();
		if ($fila['EstadoVenta']!= $nombre) {
	   		$query = ("SELECT * FROM cat_estadosventa WHERE EstadoVenta='$nombre'"); 
			$resultado = $conexion->query($query);
	    	if(mysqli_num_rows($resultado)>0) { 
				$bandera = 1;
	     		$nombre = "";
	     	}
   		}
   		if($bandera == 0  ){
			$query = "UPDATE cat_estadosventa SET EstadoVenta= '$nombre' WHERE idEstadoVenta = ".$clave." ;";
			$resultado = $conexion->query($query);
			if ($resultado) {
				mysqli_close($conexion);
				
				header("Location: cat_eventa.php");
			}else{
				echo "No Insertado";
			}
	
   		}
	}else{

		$clave = $_GET['clave'];
		include("conexion.php");
		$sql = "SELECT * FROM cat_estadosventa WHERE idEstadoVenta = $clave";
		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		};
		$fila = $resultado->fetch_assoc();	
		$nombre = $fila ['EstadoVenta'];

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
		<h1>Cambios a la etapa de venta: <?php echo $clave; ?></h1>
			<input style="display: none" type="text" required name="clave"  value=" <?php echo $fila['idEstadoVenta']; ?>" /><br>
			<br>
			<label>Tipo de usuario/Categoria</label><br>
			<input type="text" required name="Nombres" placeholder="<?php if(isset($nombre) && $nombre ==''){ echo 'Intente con otro';}else{echo 'Aqui va el tipo';}?>" value="<?php if(isset($nombre)) {echo $nombre;}?>" /><br>
			 <br> 	<br>	
			<a href="cat_eventa.php"><input id="btn_cancelar" type="button" value="Cancelar" name="Cancelar"></a>
			<input id="btn_aceptar" type="submit" value="Guardar" name="Guardar">		
			<br><br><br>
		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>