<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) {}
		else{
			header("Location: index.php");
		}
	}


	if (isset($_POST['Guardar'])) {
		include("conexion.php"); 

		$idProd = $_POST ['producto'];
		$TMov = $_POST ['tmov'];
		$Cantidad = $_POST ['Cantidad'];
		$fecha = date('Y/m/d'); 
		$bandera;

		if ($TMov == 'Salida') {
			$sql = "SELECT * FROM cat_productos WHERE idProducto = $idProd";
			if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
			}
			$fila = $resultado->fetch_assoc();
			if ($Cantidad > $fila['StockProd']) {
    			echo "<script>alert('No puedes registrar una salida con un numero superior a las existencias')</script>";
				$bandera = 1;
			}
		}
		if ($bandera !=1) {
					$query = "INSERT INTO almacen_productos(FechaMov,idProducto, tipo_movimiento, Cantidad) VALUES ('$fecha','$idProd','$TMov','$Cantidad');";
		$resultado = $conexion->query($query);
		if ($resultado) {
			if ($TMov == "Entrada"){
				$query = "UPDATE cat_productos SET StockProd = (StockProd + $Cantidad) WHERE idProducto = $idProd";
				$resultado = $conexion->query($query);
			}else{
				if ($TMov == "Salida"){
				$query = "UPDATE cat_productos SET StockProd = (StockProd - $Cantidad) WHERE idProducto = $idProd";
				$resultado = $conexion->query($query);
				}
			}
			mysqli_close($conexion);

			header("Location: almacen_productos.php");
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
		<h1>Nuevo movimiento de almacen</h1><br>
			<label>Selecciona un producto</label><br>

			<SELECT NAME="producto" SIZE=1 > 
				<?php
					include("conexion.php");

					$sql = "SELECT * FROM cat_productos";
					if(!$resultado = $conexion->query($sql)){
						die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
					}
					while($fila = $resultado->fetch_assoc()){
					echo "<OPTION VALUE='".$fila['idProducto']."'>".$fila['NombreProd']."</OPTION>";
					}
				?>
			</SELECT> <br>
			
			<label>Tipo de movimiento</label><br>
			<SELECT NAME="tmov" SIZE=1 > 
				<OPTION VALUE="Entrada">Entrada</OPTION>";
				<OPTION VALUE="Salida">Salida</OPTION>";
			</SELECT> <br>
			<label>Cantidad</label><br>
			<input type="number" required name="Cantidad" placeholder="Cantidad" pattern="[1-9][0-9]+" min="1"title="Solo numeros positivos, no puede iniciar con un 0"> 
			 <br> 	<br>	
			<a href="almacen_productos.php"><input id="btn_cancelar" type="button" value="Cancelar" name="Cancelar"></a>
			<input id="btn_aceptar" type="submit" value="Guardar" name="Guardar">		
			<br><br><br>	

		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>