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
		
		$nombre = $_POST ['Nombres'];
				
		include("conexion.php"); 

		$query = ("SELECT * FROM cat_estadosventa WHERE EstadoVenta='$nombre'"); // inicio de mi consulta 
		$resultado = $conexion->query($query);
   		if(mysqli_num_rows($resultado)>0) { 
   			$bandera = 1;
   			$bandera1 = 1;
      		$nombre = "";

    	}
   		if($bandera == 0  ){
   			include("conexion.php"); 

			$nombre = $_POST ['Nombres'];


			$query = "INSERT INTO cat_estadosventa(EstadoVenta,estado) VALUES ('$nombre','Alta');";
			$resultado = $conexion->query($query);
			if ($resultado) {
				mysqli_close($conexion);
				
				header("Location: cat_eventa.php?alta");
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
	<?php include ("../includes/encabezado_sesion.php") ?>
	
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<h1>Alta de etapa de venta</h1>
		<br>
		<label>Etapa de venta</label><br>
		<input type="text" required name="Nombres" placeholder="<?php if(isset($nombre) && $nombre ==''){ echo 'Intente con otro';}else{echo "Ej. Produccion/Empaque/Mantenimiento";} ?>" value="<?php if(isset($nombre)) {echo $nombre;}?>" pattern="[A-Z a-z]+" /><br>
		<br>
		<a href="cat_eventa.php"><input id="btn_cancelar" type="button" value="Cancelar" name="Cancelar"></a>
			<input id="btn_aceptar" type="submit" value="Guardar" name="Guardar">		
			<br><br><br>
		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	<script src="../js/sweetalert2.all.min.js"></script>
      
     <?php 
	if (isset($bandera1)) {
    echo "<script type='text/javascript'> Swal.fire({        
        type: 'error',
        title: 'Error',
        text: '¡Ya hay una etapa de venta registrada con este nombre!',        
    }); </script>"; 

}
?>

	
	
</body>
</html>