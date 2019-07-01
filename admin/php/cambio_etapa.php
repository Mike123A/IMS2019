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

	

	include("conexion.php");

	
	
	if (isset($_POST['Guardar'])) {
		$etapanew = $_POST['estadonew'];
		$clave =  $_POST['clave1'];
		echo $clave;
		echo $etapanew."asdasdad";
		$query13 = "UPDATE ventas SET idestadoVenta = $etapanew WHERE idVenta = $clave";

		$resultado = $conexion->query($query13);

		if ($_POST['reg']==1) 
			header("Location: ventas_linea.php");
		else
			header("Location: ventas.php");

		exit();
		
	}


$clave = $_GET['clave'];
	$nume = $_GET['estado'];
	

	$sql = "SELECT v.idVenta,v.FechaVenta,ci.NombreCli,ci.Apellido1Cli,ci.Apellido2Cli, v.totalVenta, cev.EstadoVenta,v.idestadoVenta FROM ventas v INNER JOIN cat_usuarios cu ON v.idCliente = cu.idUsuario INNER JOIN cat_clientes ci ON cu.idUsuario = ci.idUsuario INNER JOIN cat_estadosventa cev ON v.idestadoVenta = cev.idEstadoVenta WHERE v.idVenta = $clave ";

	if(!$resultado = $conexion->query($sql)){
		die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
	}
	$fila = $resultado->fetch_assoc();

	$query = ("SELECT * FROM cat_estadosventa WHERE idEstadoVenta > ".$nume);
	if(!$resultado = $conexion->query($query)){
		die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
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
		<h1>Canbio de etapa de venta</h1><br>
			
			
			<label>Datos de la venta</label><br><br>
			<label>Clave de la venta: <?php echo $fila['idVenta'] ?></label><br>
			<input style="display: none" type="text" required name="clave1" placeholder="" value=" <?php echo $fila['idVenta'];?>" />

			<label>Cliente: <?php echo $fila['NombreCli']." ".$fila['Apellido1Cli']." ".$fila['Apellido2Cli'] ?></label><br>
			<label>Fecha: <?php echo $fila['FechaVenta'] ?></label><br>
			<label>Etapa actual: <?php echo $fila['EstadoVenta'] ?></label><br><br>	
			<label for="">Selecciona la etapa</label><br>	
			<SELECT NAME="estadonew" SIZE=1 >
			<?php 	while($fila = $resultado->fetch_assoc()){ ?> 
				<OPTION VALUE="<?php echo $fila['idEstadoVenta'] ?>"><?php echo $fila['EstadoVenta'] ?></OPTION>";
			<?php } ?> 
			</SELECT> <br><br>	<br>	
			<?php 	if ($_GET['from'] == 1) {
			
			echo " <a href='ventas_linea.php'><input id='btn_cancelar' type='button' value='Cancelar' name='Regresar'></a><input style='display: none' type='text' required name='reg' placeholder='' value='1' />";
				# code...
			}else{
			echo " <a href='ventas.php'><input id='btn_cancelar' type='button' value='Cancelar' name='Regresar'></a><input style='display: none' type='text' required name='reg' placeholder='' value='2' />";
			} ?>
			<input id="btn_aceptar" type="submit" value="Guardar" name="Guardar">		
			<br><br><br>	

		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>