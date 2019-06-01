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

		$clave = $_GET['clave'];
		
		include("conexion.php");
		$sql = "SELECT * FROM cat_empleados ce INNER JOIN cat_usuarios cu ON ce.idUsuario = cu.idUsuario INNER JOIN cat_tipousuarios ctu ON cu.idtusuario = ctu.idtusuario WHERE idEmpleado = $clave";

		if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		};
		$fila = $resultado->fetch_assoc();
		$nombre = $fila['NombresEmp'];
		$apellido1 = $fila['Apellido1Emp'];
		$apellido2 = $fila['Apellido2Emp'];
		$fechanac = $fila['FechaNacEmp'];
		$correo = $fila['CorreoEmp'];
		$correoold = $fila['CorreoEmp'];
		$direccion = $fila['DireccionEmp'];
		$telefono = $fila['TelefonoEmp'];
		$fechacont = $fila['FechaContEmp'];
		$usuario = $fila['Usuario'];
		$contrase単a = $fila['Contrasenia'];
		$tusuario = $fila['idtusuario'];
		
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
<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idEmpleado'];?>" /><input  type="text" style="display: none" required name="claveu" placeholder="" value=" <?php echo $fila['idUsuario']; ?>" />
		<h1>Detalles del registro: <?php echo $clave; ?></h1>
		<br><br>
			<div style="/*-webkit-column-count:3*/-moz-column-count:2;column-count:2">

			<label>Nombre: <?php if(isset($nombre)) {echo $nombre;}?></label><br><br>
			<label>Primer pellido: <?php if(isset($apellido1)) {echo $apellido1;}?></label><br><br>
			<label>Segundo apellido: <?php if(isset($apellido1)) {echo $apellido2;}?></label><br><br>
			<label>Fecha de nacimiento: <?php if(isset($fechanac)) {echo $fechanac;}?></label><br><br>
			<label>Correo: <?php if(isset($correo)) {echo $correo;}?></label><br><br>
			<label>Direccion: <?php if(isset($direccion)) {echo $direccion;}?></label><br><br>
			<label>Telefono: <?php if(isset($telefono)) {echo $telefono;}?> </label><br><br>
			<label>Fecha de contratacion: <?php if(isset($fechacont)) {echo $fechacont;}?></label><br><br>
			<label>Usuario: <?php if(isset($usuario)){ echo $usuario;} ?></label><br><br>
			<label>Tipo de usuario: <?php 
					include("conexion.php");

					$sql = "SELECT * FROM cat_tipousuarios where idtusuario = $tusuario";
					if(!$resultado = $conexion->query($sql)){
						die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
					}
					$fila = $resultado->fetch_assoc();
					echo $fila['tipousuario'];
					
			?></label><br>
			<!-- <SELECT NAME="tipousuario" SIZE=1  >  -->
				

					
				
			<br><br>
			</div>
<br> 	<br>	
			<a href="cat_empleados.php"><input id="btn_cancelar" type="button" value="Regresar" name="Cancelar"></a>
			<br><br><br>	

		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>