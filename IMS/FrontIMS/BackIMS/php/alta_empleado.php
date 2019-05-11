<?php
	include("conexion.php");

	$sql = "SELECT * FROM cat_tipousuarios";
		if(!$resultado = $conexion->query($sql)){
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
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<form action="guardar_empleado.php" method="POST">
			
		<h1>Alta de empleado</h1>

			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="" /><br>
			<label>Apellido1</label><br>
			<input type="text" required name="Apellido1" placeholder="Aqui va un apellido" value="" /><br>
			<label>Apellido2</label><br>
			<input type="text" required name="Apellido2" placeholder="Aqui va el segundo apellido"value="" /><br>
			<label>Fecha de nacimiento</label><br>
			<input type="date" required name="FechaNac" placeholder=""value="" /><br>
			<label>Correo</label><br>
			<input type="text" required name="Correo" placeholder="Aqui va el correo"value="" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion"value="" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono"value="" /><br>
			<label>Fecha de contratacion</label><br>
			<input type="date" required name="FechaCont" placeholder=""value="" /><br>
			<label>Usuario</label><br>
			<input type="text" required name="Usuario" placeholder="Aqui va el usuario"value="" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña"value="" /> <br>
			<label>Tipo de usuario</label><br>
			<SELECT NAME="tipousuario" SIZE=1 > 
				<?php
					while($fila = $resultado->fetch_assoc()){
					echo "<OPTION VALUE='".$fila['idtusuario']."'>".$fila['tipousuario']."</OPTION>";
					}
				?>
			</SELECT> 
			<br><br>
			<input type="submit" value="Guardar" >		

		</form>
	</section>
	
</body>
</html>