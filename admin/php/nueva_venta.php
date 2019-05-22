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


	if (isset($_POST['ConfirmarCli'])) {
		$fecha = date('Y/m/d'); 
		$sql1 = "INSERT INTO ventas(FechaVenta, idCliente) VALUES ('$fecha',$idCC)";
		$resultado = $conexion->query($sql1);
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
		
			<label for="">Selecciona al cliente: </label>
			<SELECT NAME="Cliente" SIZE=1  > 
				<?php
					include("conexion.php");

					$sql = "SELECT * FROM cat_clientes";
					if(!$resultado = $conexion->query($sql)){
						die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
					}
					while($fila = $resultado->fetch_assoc()){
					
						if(isset($isc)){
							if ($fila['idCliente'] == $isc){
								echo "<OPTION SELECTED VALUE='".$fila['idCliente']."'>".$fila['NombreCli']." ".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."</OPTION>";
							}else{
								echo "<OPTION VALUE='".$fila['idCliente']."'>".$fila['NombreCli']." ".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."</OPTION>";
							}
						}else{
							echo "<OPTION VALUE='".$fila['idCliente']."'>".$fila['NombreCli']." ".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."</OPTION>";
						}
					}					
				?>
			</SELECT> 
			<input type="submit" name="Ver" value="Ver datos">
			
		</form>
		<br><br>
		<table>
		<thead>
			<tr>
				<td>Clave</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Direccion</td>
				<td>Telefono</td>
				<td>Correo</td>
				<td>RFC</td>
			</tr>
		</thead>	
		<?php
			if (isset($_POST['Ver']) || isset($_POST['ConfirmarCli'])) {
				if (isset($isc)) {
					$isc = $_POST['Cliente'];
				}
				
				$sql1 = "SELECT * FROM cat_clientes WHERE idCliente = $isc";
				if(!$resultado = $conexion->query($sql1)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				$fila = $resultado->fetch_assoc();
				echo"
				<tr>
					<td>".$fila['idCliente']." </td>
    				<td>".$fila['NombreCli']."</td>
    				<td>".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."</td>
   					<td>".$fila['DireccionCli']."</td>
   					<td>".$fila['TelefonoCli']."</td>
   					<td>".$fila['CorreoCli']."</td>
   					<td>".$fila['RFC']."</td>
    			</tr>";
    		}
		?>
		</table>
		<br><br>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
			<input type="submit" name="ConfirmarCli" value="Confirmar cliente">

		</form>
		
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>