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
		<h1>Catalogo de clientes</h1>
		<a href="alta_cliente.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<table >
			<thead>
				<tr>
					<td>Clave</td>
					<td>Nombres</td>
					<td>Apellidos</td>
					<td>Direccion</td>
					<td>Telefono</td>
					<td>Correo</td>
					<td>RFC</td>
					<td>Usuario</td>
					<td>Estado</td>
					<td colspan="2">Acciones</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_clientes cc INNER JOIN cat_usuarios cu ON cc.idUsuario = cu.idUsuario ORDER BY idCliente DESC";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				mysqli_close($conexion);
				
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idCliente']." </td>
    					<td>".$fila['NombreCli']."</td>
    					<td>".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."</td>
    					<td>".$fila['DireccionCli']."</td>
    					<td>".$fila['TelefonoCli']."</td>
    					<td>".$fila['CorreoCli']."</td>
    					<td>".$fila['RFC']."</td>
    					<td>".$fila['Usuario']."</td>
    					<td>".$fila['estado']."</td>
  
						<td><a href='cambios_cliente.php?clave=".$fila['idCliente']."'>
							<button class='modificar'>
								<img src='../img/modificar.png' alt=''>Modificar
							</button>
							</a>
						</td>
						<td>		
							<a href='cambiar_estado_cliente.php?clave=".$fila['idUsuario']."'>
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
