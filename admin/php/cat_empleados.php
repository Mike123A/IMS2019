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
		<h1>Catalogo de empleados</h1>
		<a href="alta_empleado.php">
			<button class="agregar">
				<img src="../img/agregar.png" alt="">Nuevo
			</button>
		</a>
		<form action="buscar_empleado.php" method="GET" class="form_buscador">
			<input type="text" name="busqueda" placeholder="">
			<button id="btn_busqueda" type="submit" name="buscar"><img src="../img/lupa.png" alt=""></button>
		</form>
		<table >
			<thead>
				<tr>
					<td>Clave</td>
					<td>Nombres</td>
					<td>Apellidos</td>
					
					<td>Correo</td>
					<td>Direccion</td>
					<td>Telefono</td>
					<td>Usuario</td>
					<td>Tipo Usuario</td>
					<td>Estado</td>
					<td colspan="3">Acciones</td>
				</tr>
			</thead>
			
			<?php
				include("conexion.php");
				$sql_numr = mysqli_query($conexion,"SELECT COUNT(*) as total FROM cat_empleados ce INNER JOIN cat_usuarios cu ON ce.idUsuario = cu.idUsuario INNER JOIN cat_tipousuarios ctu ON cu.idtusuario = ctu.idtusuario;");
				$total_registros = mysqli_fetch_array($sql_numr);
				$totalregistros = $total_registros['total'];

				$porpagina = 5;

				if (empty($_GET['pagina'])) {
					$pagina = 1;
				}else{
					$pagina = $_GET['pagina'];
				}

				$desde = ($pagina - 1) * $porpagina;
				$totalpagina = ceil($totalregistros / $porpagina);

				$sql = "SELECT * FROM cat_empleados ce INNER JOIN cat_usuarios cu ON ce.idUsuario = cu.idUsuario INNER JOIN cat_tipousuarios ctu ON cu.idtusuario = ctu.idtusuario ORDER BY idEmpleado ASC LIMIT $desde,$porpagina";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				mysqli_close($conexion);
				
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idEmpleado']." </td>
    					<td>".$fila['NombresEmp']."</td>
    					<td>".$fila['Apellido1Emp']." ".$fila['Apellido2Emp']."</td>
    					
    					<td>".$fila['CorreoEmp']."</td>
    					<td>".$fila['DireccionEmp']."</td>
    					<td>".$fila['TelefonoEmp']."</td>
    					<td>".$fila['Usuario']."</td>
    					<td>".$fila['tipousuario']."</td>
    					<td>".$fila['estado']."</td>
    					<td><a href='detallesemp.php?clave=".$fila['idEmpleado']."'>
							<button class='modificar' title='Ver detalles de registro'>
								<img src='../img/archivo.png' alt=''>
							</button>
							</a>
						</td>
						<td><a href='cambios_empleado.php?clave=".$fila['idEmpleado']."'>
							<button class='modificar' >
								<img src='../img/modificar.png' alt=''>
							</button>
							</a>
						<td>";
						if ($fila['estado'] == 'Baja') {
							echo "<a href='cambiar_estado_empleado.php?clave=".$fila['idUsuario']."'>
							<button class='activar'>
								<img src='../img/activado.png' alt=''>
							</button>
							</a>
						</td></tr>";
						}
						if ($fila['estado'] == 'Alta') {
							echo "<a href='cambiar_estado_empleado.php?clave=".$fila['idUsuario']."'>
							<button class='eliminar'>
								<img src='../img/eliminar.png' alt=''>
							</button>
							</a>
						</td></tr>";
						}
				}
			?>
		</table>	
		<?php if ($totalregistros !=0) { ?>
		<div class="paginador">
			<ul>
				<?php 	
					if ($pagina != 1) {
				 ?>
				<li><a href="?pagina=<?php 	echo 1 ?>">|<</a></li>
				<li><a href="?pagina=<?php 	echo $pagina-1 ?>"><</a></li>
				<?php 	
					}
				 ?>
				<?php 	
					for ($i	=1; $i < $totalpagina+1 ; $i++) { 
						if ($i == $pagina) 
							echo "<li class='paginaseleccionada'>".$i."</li>";
						else
							echo "<li><a href='?pagina=".$i."'>".$i."</a></li>";
					}

				 ?>

				<?php 	
					if ($pagina != $totalpagina) {
				 ?>

				<li><a href="?pagina=<?php 	echo $pagina+1 ?>">></a></li>
				<li><a href="?pagina=<?php 	echo $totalpagina ?>">>|</a></li>
				<?php 	
					}
				 ?>
			</div>
	<?php } ?>
	</section>
	<?php include ("../includes/footer.php") ?>
	
</body>
</html>
