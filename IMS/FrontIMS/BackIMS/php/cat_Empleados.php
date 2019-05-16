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
		<h1>Catalogo de empleados</h1>
		<a href="alta_empleado.php">
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
					<td>Fecha Nacimiento</td>
					<td>Correo</td>
					<td>Direccion</td>
					<td>Telefono</td>
					<td>Fecha Contratacion</td>
					<td>Usuario</td>
					<td>Tipo Usuario</td>
					<td>Estado</td>
					<td colspan="2">Acciones</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_empleados ce INNER JOIN cat_usuarios cu ON ce.idUsuario = cu.idUsuario INNER JOIN cat_tipousuarios ctu ON cu.idtusuario = ctu.idtusuario ORDER BY idEmpleado DESC";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idEmpleado']." </td>
    					<td>".$fila['NombresEmp']."</td>
    					<td>".$fila['Apellido1Emp']." ".$fila['Apellido2Emp']."</td>
    					<td>".$fila['FechaNacEmp']."</td>
    					<td>".$fila['CorreoEmp']."</td>
    					<td>".$fila['DireccionEmp']."</td>
    					<td>".$fila['TelefonoEmp']."</td>
    					<td>".$fila['FechaContEmp']."</td>
    					<td>".$fila['Usuario']."</td>
    					<td>".$fila['tipousuario']."</td>
    					";
    					if ($fila['estado'] == "Alta") {
						echo "
						<td class='altas'></td>";
					}else{
						echo "
						<td class='bajas'></td>";			
					}
    				echo "
						<td><a href='cambios_empleado.php?clave=".$fila['idEmpleado']."'>
							<button class='modificar'>
								<img src='../img/modificar.png' alt=''>Modificar
							</button>
							</a>
						</td>
						<td>		
							<a href='cambiar_estado_empleado.php?clave=".$fila['idUsuario']."'>
							<button class='eliminar'>
								<img src='../img/refrescar.png' alt=''>Estado
							</button>
							</a>
						</td></tr>";
					

				}
			?>
		</table>	
	</section>
	
</body>
</html>
