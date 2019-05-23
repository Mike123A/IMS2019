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
		<h1>Ventas asdasd</h1>
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

				$sql = "SELECT * FROM ventas v INNER JOIN cat_usuarios cu ON v.idCliente = cu.idUsuario INNER JOIN cat_clientes ci ON cu.idUsuario = ci.idUsuario";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				mysqli_close($conexion);
				
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idVenta']." </td>
    					<td>".$fila['FechaVenta ']."</td>
    					<td>".$fila['idCliente']." ".$fila['Apellido2Emp']."</td>
    					<td>".$fila['idEmpleado']."</td>
    					<td>".$fila['totalVenta']."</td>
    					";
    					if ($fila['estado'] == "Alta") {
						echo "
						<td class='altas'></td>";
					}else{
						echo "
						<td class='bajas'></td>";			
					}
    				echo "
						<td><a href='cambios_empleado.php?clave=".$fila['idVenta']."'>
							<button class='modificar'>
								<img src='../img/modificar.png' alt=''>Modificar
							</button>
							</a>
						</td>
						<td>		
							<a href='cambiar_estado_empleado.php?clave=".$fila['idVenta']."'>
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