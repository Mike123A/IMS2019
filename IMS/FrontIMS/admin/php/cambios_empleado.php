<?php

	if (isset($_POST['Guardar'])) {

		$clave = $_POST ['clave'];
		$claveu = $_POST ['claveu'];

		include("conexion.php"); 
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
		
		$sql1 = "SELECT * FROM cat_empleados ce INNER JOIN cat_usuarios cu ON ce.idUsuario = cu.idUsuario INNER JOIN cat_tipousuarios ctu ON cu.idtusuario = ctu.idtusuario WHERE idEmpleado = $clave";

		if(!$resultado1 = $conexion->query($sql1)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		};
		$fila = $resultado1->fetch_assoc();
		if ($fila['Usuario']!= $usuario) {
			
			$query = ("SELECT * FROM cat_usuarios WHERE usuario='$usuario'"); // inicio de mi consulta 
			$resultado = $conexion->query($query);
   		
   			if(mysqli_num_rows($resultado)>0) { 
   				$bandera = 1;
      			$usuario = "";
    		}
		}
		if ($fila['CorreoEmp']!= $correo) {
	    	$query = ("SELECT * FROM cat_empleados WHERE CorreoEmp='$correo'"); // inicio de mi consulta 
			$resultado = $conexion->query($query);
	    	if(mysqli_num_rows($resultado)>0) { 
				$bandera = 1;
	     		$correo = "";
	   		}
	   	}
   		if($bandera == 0  ){
	   		$query ="UPDATE cat_empleados SET NombresEmp = '".$nombre."', Apellido1Emp=TRIM('$apellido1'),Apellido2Emp='$apellido2', FechaNacEmp='$fechanac', CorreoEmp='$correo',DireccionEmp='$direccion',TelefonoEmp='$telefono',FechaContEmp='$fechacont' WHERE idEmpleado = $clave;";
			$resultado = $conexion->query($query);
			if ($resultado) {
				$query1 = "UPDATE cat_usuarios SET Usuario='$usuario',Contrasenia='$contraseña',idtusuario=$tusuario WHERE idUsuario = $claveu";
				$resultado1 = $conexion->query($query1);
				if ($resultado1) {
					header("Location: cat_empleados.php");
				}
				else{
				echo "No Insertado";
				}
			}else{
				echo "No Insertado";
			}
		}
	}else{
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
		$contraseña = $fila['Contrasenia'];
		$tusuario = $fila['idtusuario'];
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

		<h1>Cambios al registro: <?php echo $clave; ?></h1>
			<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idEmpleado'];?>" /><br>
			<input  type="text" style="display: none" required name="claveu" placeholder="" value=" <?php echo $fila['idUsuario']; ?>" /><br>
			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre" value="<?php if(isset($nombre)) {echo $nombre;}?>" pattern="[A-Z a-z]+"/><br>
			<label>Apellido1</label><br>
			<input type="text" required name="Apellido1" placeholder="Aqui va un apellido" value="<?php if(isset($apellido1)) {echo $apellido1;}?>" pattern="[A-Za-z]+" /><br>
			<label>Apellido2</label><br>
			<input type="text" required name="Apellido2" placeholder="Aqui va el segundo apellido"value="<?php if(isset($apellido2)) {echo $apellido2;}?>" pattern="[A-Za-z]+" /><br>
			<label>Fecha de nacimiento</label><br>
			<input type="date" required name="FechaNac" placeholder=""value="<?php if(isset($fechanac)) {echo $fechanac;}?>" /><br>
			<label>Correo</label><br>
			<input type="email" required name="Correo" placeholder="<?php if(isset($correo) && $correo ==''){ echo 'Intente con otro';}else{echo "Aqui va el usuario";} ?>"value="<?php if(isset($correo)) {echo $correo;}?>" /><br>
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

			<input type="submit" value="Guardar" name="Guardar">		

		</form>
	</section>
	
</body>
</html>