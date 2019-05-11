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
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql="SELECT * FROM cat_clientes cc INNER JOIN cat_usuarios cu ON cc.idUsuario = cu.idUsuario WHERE idCliente=".$clave.";";
			if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
			};
			$fila = $resultado->fetch_assoc();	
    	?>
		<form action="actualizar_cliente.php" method="POST">

		<h1>Cambios al registro: <?php echo $clave; ?></h1>

			<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idCliente']; ?>" /><br>
			<input  type="text" style="display: none" required name="claveu" placeholder="" value=" <?php echo $fila['idUsuario']; ?>" /><br>

			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre"value="<?php echo $fila['NombreCli'];?>" /><br>
			<label>Apellido1</label><br>
			<input type="text" required name="Apellido1" placeholder="Aqui va un apellido" value="<?php echo $fila['Apellido1Cli'];?>" /><br>
			<label>Apellido2</label><br>
			<input type="text" required name="Apellido2" placeholder="Aqui va el segundo apellido"
			value="<?php echo $fila['Apellido2Cli'];?>"><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion" value="<?php echo $fila['DireccionCli'];?>" /><br>
			<label>Telefono</label><br>
			<input type="text" required name="Telefono" placeholder="Aqui va el telefono" value="<?php echo $fila['TelefonoCli'];?>" /><br>
			<label>Correo</label><br>
			<input type="text" required name="Correo" placeholder="Aqui va el correo" value="<?php echo $fila['CorreoCli'];?>" /><br>
			<label>RFC</label><br>
			<input type="text" name="RFC" placeholder="Aqui va el rfc" value="<?php echo $fila['RFC'];?>" /><br>
			<label>Usuario</label><br>
			<input type="text" required name="Usuario" placeholder="Aqui va el usuario" value="<?php echo $fila['Usuario'];?>" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña" value="<?php echo $fila['Contrasenia'];?>" /> <br><br><br>
			<input type="submit" value="Guardar">	

			
		</form>
	</section>
	
</body>
</html>