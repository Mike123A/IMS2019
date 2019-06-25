<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1) {}
		else{
			header("Location: index.php");
		}
	}

	if (isset($_POST['masvendido'])) {
		$fecha1 = $_POST ['finicio'];
		$fecha2 = $_POST ['ffin'];
		include("conexion.php");

		$sql = "SELECT * FROM ( SELECT SUM(dv.Cantidad) AS Cantidad,cp.NombreProd,cp.idProducto FROM detalle_venta dv INNER JOIN cat_productos cp ON dv.idProducto = cp.idProducto INNER JOIN ventas v ON dv.idVenta = v.idVenta WHERE v.FechaVenta BETWEEN '$fecha1' AND '$fecha2' GROUP BY dv.idProducto) C WHERE Cantidad = ( SELECT MAX(Cantidad) FROM ( SELECT SUM(dv.Cantidad) AS Cantidad,cp.NombreProd FROM detalle_venta dv INNER JOIN cat_productos cp ON dv.idProducto = cp.idProducto INNER JOIN ventas v ON dv.idVenta = v.idVenta WHERE v.FechaVenta BETWEEN '$fecha1' AND '$fecha2' GROUP BY dv.idProducto ) A )";
		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		}
				
		$prodmasvend = $resultado->fetch_assoc();
		mysqli_close($conexion);

	}

	if (isset($_POST['menosvendido'])) {
		$fecha1 = $_POST ['finicio'];
		$fecha2 = $_POST ['ffin'];
		include("conexion.php");
		$sql = "SELECT * FROM ( SELECT SUM(dv.Cantidad) AS Cantidad,cp.NombreProd,cp.idProducto FROM detalle_venta dv INNER JOIN cat_productos cp ON dv.idProducto = cp.idProducto INNER JOIN ventas v ON dv.idVenta = v.idVenta WHERE v.FechaVenta BETWEEN '$fecha1' AND '$fecha2' GROUP BY dv.idProducto) C WHERE Cantidad = ( SELECT MIN(Cantidad) FROM ( SELECT SUM(dv.Cantidad) AS Cantidad,cp.NombreProd FROM detalle_venta dv INNER JOIN cat_productos cp ON dv.idProducto = cp.idProducto INNER JOIN ventas v ON dv.idVenta = v.idVenta WHERE v.FechaVenta BETWEEN '$fecha1' AND '$fecha2' GROUP BY dv.idProducto ) A )";
		//echo $sql;

		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		}
		
		$prodmenosvend = $resultado->fetch_assoc();
		mysqli_close($conexion);

	}

	if (isset($_POST['mejorvendedor'])) {
		$fecha1 = $_POST ['finicio'];
		$fecha2 = $_POST ['ffin'];
		include("conexion.php");
		$sql = "SELECT COUNT(v.idVenta) AS Cantidad, ce.NombresEmp, ce.Apellido1Emp, ce.Apellido2Emp FROM ventas v INNER JOIN cat_empleados ce ON v.idEmpleado = ce.idEmpleado WHERE v.FechaVenta BETWEEN '$fecha1' AND '$fecha2' GROUP BY v.idEmpleado ORDER BY Cantidad DESC LIMIT 1";

		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		}
		
		$mejorvendedor = $resultado->fetch_assoc();
		mysqli_close($conexion);

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
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formrep">
			<label for="">Producto mas vendido</label>
			<br><br><br>
			<label for="">Fecha inicio </label><input class="fecha_rep" required type="date" name="finicio" value="<?php if (isset($fecha1)) echo $fecha1?>">
			<label for="">Fecha limite </label><input class="fecha_rep" required type="date" name="ffin" value="<?php if (isset($fecha2)) echo $fecha2?>">
			<br><br>
			<button id="btn-resp" type="submit" name="masvendido">Buscar</button>
			<br><br>
			<?php if (isset($prodmasvend)) {
			echo "<label for=''>
			El producto mas vendido en este rango de fechas es: ".$prodmasvend['NombreProd']."
			</label><br><br>";
			
			}?>
			
		</form>	
		<hr>	
		<hr>	

		<br><br>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formrep">
			<label for="">Producto menos vendido</label>
			<br><br><br>
			<label for="">Fecha inicio </label><input class="fecha_rep" required type="date" name="finicio" value="<?php if (isset($fecha1)) echo $fecha1?>">
			<label for="">Fecha limite </label><input class="fecha_rep" required type="date" name="ffin" value="<?php if (isset($fecha2)) echo $fecha2?>">
			<br>
			<br>
			<button id="btn-resp" type="submit" name="menosvendido">Buscar</button>
			<br><br>
			<?php if (isset($prodmenosvend)) {
			echo "<label for=''>
			El producto menos vendido en este rango de fechas es: ".$prodmenosvend['NombreProd']."
			</label><br><br>";
			
			}?>
			
		</form>
		<hr>	
		<hr>	

		<br><br>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formrep">
			<label for="">Mejor vendedor</label>
			<br><br><br>
			<label for="">Fecha inicio </label><input class="fecha_rep" required type="date" name="finicio" value="<?php if (isset($fecha1)) echo $fecha1?>">
			<label for="">Fecha limite </label><input class="fecha_rep" required type="date" name="ffin" value="<?php if (isset($fecha2)) echo $fecha2?>">
			<br>
			<br>
			<button id="btn-resp" type="submit" name="mejorvendedor">Buscar</button>
			<br><br>
			<?php if (isset($mejorvendedor)) {
			echo "<label for=''>
			El vendedor que ha concretado mas ventas en este rango de fechas es: ".$mejorvendedor['NombresEmp']." ".$mejorvendedor['Apellido1Emp']." ".$mejorvendedor['Apellido2Emp']."
			</label><br><br>";
			}?>
			
		</form>
			<hr>	
		<hr>	
		<br><br>
		<form action="../pdf/ventasm.php" method="POST" class="formrep" target="_blank">
			<label for="">Ventas mostrador</label>
			<br><br><br>
			<label for="">Fecha inicio </label><input class="fecha_rep" required type="date" name="finicio" value="<?php if (isset($fecha1)) echo $fecha1?>">
			<label for="">Fecha limite </label><input class="fecha_rep" required type="date" name="ffin" value="<?php if (isset($fecha2)) echo $fecha2?>">
			<br>
			<br>
				<button type="submit" id="btn-resp">
						Buscar
				</button>
			</a>
			<br><br>

		</form>
			<hr>	
		<hr>	
		<br><br>
		<form action="../pdf/ventaslinea.php" method="POST" class="formrep" target="_blank">
			<label for="">Ventas en linea</label>
			<br><br><br>
			<label for="">Fecha inicio </label><input class="fecha_rep" class="fecha_rep" required type="date" name="finicio" value="<?php if (isset($fecha1)) echo $fecha1?>">
			<label for="">Fecha limite </label><input class="fecha_rep" class="fecha_rep" required type="date" name="ffin" value="<?php if (isset($fecha2)) echo $fecha2?>">
			<br>
			<br>
				<button type="submit" id="btn-resp">
						Buscar
				</button>
			</a>
		<br><br>
		</form>
			<hr>	
		<hr>	
		<br><br>
		<form action="../pdf/productos.php" method="POST" class="formrep" target="_blank">
			<label for="">Lista de productos</label>
			<br><br><br>
				<button type="submit" id="btn-resp">
						Generar
				</button>
			</a>
		<br><br>
		</form>
			<hr>	
		<hr>	
		<br><br>
		<form action="../pdf/clientes.php" method="POST" class="formrep" target="_blank">
			<label for="">Lista de clientes</label>
			<br><br><br>
				<button type="submit" id="btn-resp">
						Generar
				</button>
			</a>
		<br><br>
		</form>
		<hr><hr>
		<br><br>
		
		<form class="formrep" action="#">
			<label for="">¿Necesita un respaldo de la base de datos?</label>
			<button id="btn-resp"><a href="crear_respaldo_bd.php">Crear respaldo</a></button>
			
		</form>
			
		
		<br><br>
		<hr>	<hr>	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</section>
	<?php include ("../includes/footer.php") ?>
	
</body>
</html>