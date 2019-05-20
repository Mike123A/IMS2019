<?php

	if (isset($_POST['Guardar'])) {
		include("conexion.php"); 

		$idProd = $_POST ['producto'];
		$TMov = $_POST ['tmov'];
		$Cantidad = $_POST ['Cantidad'];
		$fecha = date('Y/m/d'); 

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
			<input type="number" required name="Cantidad" placeholder="Cantidad"
			><br><br><br>
			<input type="submit" value="Guardar" name="Guardar">		

		</form>
	</section>
	
</body>
</html>