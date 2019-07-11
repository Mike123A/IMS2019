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
		
		$nombre = $_POST ['Nombres'];
				
		include("conexion.php"); 

		$query = ("SELECT * FROM cat_tipousuarios WHERE tipousuario='$nombre'"); // inicio de mi consulta 
		$resultado = $conexion->query($query);
   		if(mysqli_num_rows($resultado)>0) { 
   			$bandera = 1;
   			$bandera1 = 1;
      		$nombre = "";

    	}
   		if($bandera == 0  ){
   			include("conexion.php"); 

			$nombre = $_POST ['Nombres'];


			$query = "INSERT INTO cat_tipousuarios(tipousuario,estado) VALUES ('$nombre','Alta');";
			$resultado = $conexion->query($query);
			if ($resultado) {
				mysqli_close($conexion);
				
				header("Location: cat_tusuarios.php?alta");
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
		<h1>Alta de tipo de usuario</h1>
		<br>
		<label>Tipo de usuario/Categoria</label><br>
		<input type="text" required name="Nombres" placeholder="<?php if(isset($nombre) && $nombre ==''){ echo 'Intente con otro';}else{echo "Ej. Admin/Produccion/Ventas";} ?>" value="<?php if(isset($nombre)) {echo $nombre;}?>" pattern="[A-Z a-z]+" /><br>
		<br>
		<a href="cat_tusuarios.php"><input id="btn_cancelar" type="button" value="Cancelar" name="Cancelar"></a>
			<input id="btn_aceptar" type="submit" value="Guardar" name="Guardar" >		
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
        text: '¡Ya hay una categoria registrada con este nombre!',        
    }); </script>"; 


}


 ?>
	
	
</body>
</html>