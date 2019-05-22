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

	if (isset($_POST['Guardar'])) {
  
		$nombre = $_POST ['Nombres'];
		$apellido1 = $_POST ['Apellido1'];
		$apellido2 = $_POST ['Apellido2'];
		$fechanac = $_POST ['FechaNac'];
		$correo = $_POST ['Correo'];
		$direccion = $_POST ['Direccion'];
		$telefono = $_POST ['Telefono'];
		$fechacont = $_POST ['FechaCont'];
		$usuario = $_POST ['Usuario'];
		$contraseña = $_POST ['Contraseña'];
		$tusuario = $_POST ['tipousuario'];
			
		include("conexion.php"); 

		$query = ("SELECT * FROM cat_usuarios WHERE usuario='$usuario'"); // inicio de mi consulta 
		$resultado = $conexion->query($query);
   		if(mysqli_num_rows($resultado)>0) { 
   			$bandera = 1;
      		$usuario = "";
    	}
    	$query = ("SELECT * FROM cat_empleados WHERE CorreoEmp='$correo'"); // inicio de mi consulta 
		$resultado = $conexion->query($query);
    	if(mysqli_num_rows($resultado)>0) { 
			$bandera = 1;
     		$correo = "";
   		}
   		if($bandera == 0  ){
   			$query = "INSERT INTO cat_usuarios(Usuario, Contrasenia, idtusuario, estado) VALUES ('$usuario','$contraseña','$tusuario','Alta');";
			$resultado = $conexion->query($query);
			if ($resultado) {
				$query = "SELECT idUsuario FROM cat_usuarios WHERE Usuario = '$usuario'";
				$resultado = $conexion->query($query);
				$fila = $resultado->fetch_assoc();
				$idUsuario = $fila['idUsuario'];
				$query = "INSERT INTO cat_empleados(NombresEmp, Apellido1Emp,Apellido2Emp, FechaNacEmp, CorreoEmp, DireccionEmp, TelefonoEmp, FechaContEmp, idUsuario) VALUES ('$nombre','$apellido1','$apellido2','$fechanac','$correo','$direccion','$telefono','$fechacont','$idUsuario');";
				$resultado = $conexion->query($query);
				mysqli_close($conexion);
				
				header("Location: cat_empleados.php");
			}else{
				echo "No Insertado";
			}
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
	
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<h1>Alta de empleado</h1>
			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre" value="<?php if(isset($nombre)) {echo $nombre;}?>" pattern="[A-Z a-z]+"/><br>
			<label>Apellido1</label><br>
			<input type="text" required name="Apellido1" placeholder="Aqui va un apellido" value="<?php if(isset($apellido1)) {echo $apellido1;}?>" pattern="[A-Za-z]+" /><br>
			<label>Apellido2</label><br>
			<input type="text" required name="Apellido2" placeholder="Aqui va el segundo apellido"value="<?php if(isset($apellido2)) {echo $apellido2;}?>" pattern="[A-Za-z]+" /><br>
			<label>Fecha de nacimiento</label><br>
			<input type="date" required name="FechaNac" placeholder=""value="<?php if(isset($fechanac)) {echo $fechanac;}?>" /><br>
			<label>Correo</label><br>
			<input type="email" required name="Correo" placeholder="<?php if(isset($correo) && $correo ==''){ echo 'Intente con otro';}else{echo "Aqui va el usuario";} ?>" value="<?php if(isset($correo)) {echo $correo;}?>" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion"value="<?php if(isset($direccion)) {echo $direccion;}?>" /><br>
			<label>Telefono</label><br>
			<input type="tel" required name="Telefono" placeholder="Aqui va el telefono"value="<?php if(isset($telefono)) {echo $telefono;}?>"  pattern="[0-9]+" maxlength="10" /><br>
			<label>Fecha de contratacion</label><br>
			<input type="date" required name="FechaCont" placeholder=""value="<?php if(isset($fechacont)) {echo $fechacont;}?>" /><br>
			<label>Usuario</label><br>
			
			<input type="text" required name="Usuario" placeholder="<?php if(isset($usuario) && $usuario ==''){ echo 'Intente con otro';}else{echo "Aqui va el usuario";} ?>" value="<?php if(isset($usuario)){ echo $usuario;} ?>" maxlength="10" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña"value="<?php if(isset($contraseña)) {echo $contraseña;}?>" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="Una contraseña válida es un conjuto de caracteres, donde cada uno consiste de una letra mayúscula o minúscula, o un dígito. La contraseña debe empezar con una letra y contener al menos un dígito. Debe tener 8-10 caracteres" maxlength="10" minlength="10"/> <br>
			<label>Tipo de usuario</label><br>
			<SELECT NAME="tipousuario" SIZE=1  > 
				<?php
					include("conexion.php");

					$sql = "SELECT * FROM cat_tipousuarios";
					if(!$resultado = $conexion->query($sql)){
						die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
					}
					while($fila = $resultado->fetch_assoc()){
					echo "<OPTION VALUE='".$fila['idtusuario']."'>".$fila['tipousuario']."</OPTION>";
						if(isset($tipousuario)){
							if ($fila['idtusuario'] == $tipousuario){
								echo "<OPTION SELECTED VALUE='".$fila['idtusuario']."'>".$fila['tipousuario']."</OPTION>";
							}
						}
					}

					
				?>
			</SELECT> 
			<br><br>
			<input type="submit" value="Guardar" name="Guardar" >		

		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
	
</body>
</html>