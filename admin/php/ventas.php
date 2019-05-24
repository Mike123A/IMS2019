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
		<h1>Ventas mostrador</h1><br><br>
		<a href="nueva_venta.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<table >
			<thead>
				<tr>
					<td>Clave</td>
					<td>Fecha</td>
					<td>Cliente</td>
					<td>Empleado</td>
					<td>Total</td>
					<td>Estado</td>
					<td colspan="2">Acciones</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql = "SELECT v.idVenta,v.FechaVenta,ci.NombreCli,ci.Apellido1Cli,ci.Apellido2Cli, ce.NombresEmp,ce.Apellido1Emp,ce.Apellido2Emp, v.totalVenta, cev.EstadoVenta,v.idestadoVenta FROM ventas v INNER JOIN cat_usuarios cu ON v.idCliente = cu.idUsuario INNER JOIN cat_clientes ci ON cu.idUsuario = ci.idUsuario INNER JOIN cat_empleados ce ON v.idEmpleado = ce.idEmpleado INNER JOIN cat_estadosventa cev ON v.idestadoVenta = cev.idEstadoVenta ORDER BY idVenta Desc;";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				mysqli_close($conexion);
				
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idVenta']." </td>
    					<td>".$fila['FechaVenta']."</td>
    					<td>".$fila['NombreCli']." ".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."</td>
    					<td>".$fila['NombresEmp']." ".$fila['Apellido1Emp']." ".$fila['Apellido2Emp']."</td>
    					<td>$".$fila['totalVenta']."</td>
    					<td>".$fila['EstadoVenta']."</td>";
    					
    				echo "
						<td><a href='#'>
							<button class='modificar'>
								<img src='../img/modificar.png' alt=''>Ver detalles
							</button>
							</a>
						</td>
						<td>		
							<a href='cambiar_estado_venta.php?clave=".$fila['idVenta']."&estado=".$fila['idestadoVenta']."''>
							<button class='eliminar'>
								<img src='../img/refrescar.png' alt=''>Estado
							</button>
							</a>
						</td></tr>";
				}
			?>
		</table>	

	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>