<?php

	if (isset($_POST['Guardar'])) {
  
		
		$nombre = $_POST ['Nombres'];
		$apellido1 = $_POST ['Apellido1'];
		$apellido2 = $_POST ['Apellido2'];
		$direccion = $_POST ['Direccion'];	
		$telefono = $_POST ['Telefono'];
		$correo = $_POST ['Correo'];
		$rfc = $_POST ['RFC'];
		$usuario = $_POST ['Usuario'];
		$contraseña =  $_POST ['Contraseña'];
		$contraseña1 =  $_POST ['Contraseña1'];
			
		include("conexion.php"); 

		if ($contraseña != $contraseña1) {
			$bandera = 1;
      		$contraseña = "";
      		$contraseña1 = "";
		}

		$query = ("SELECT * FROM cat_usuarios WHERE usuario='$usuario'");
		$resultado = $conexion->query($query);
   		if(mysqli_num_rows($resultado)>0) { 
   			$bandera = 1;
      		$usuario = "";
    	}
    	$query = ("SELECT * FROM cat_clientes WHERE CorreoCli='$correo'"); 
		$resultado = $conexion->query($query);
    	if(mysqli_num_rows($resultado)>0) { 
			$bandera = 1;
     		$correo = "";
   		}
   		$query = ("SELECT * FROM cat_clientes WHERE TelefonoCli='$telefono'"); 
		$resultado = $conexion->query($query);
    	if(mysqli_num_rows($resultado)>0) { 
			$bandera = 1;
     		$telefono = "";
   		}
   		$query = ("SELECT * FROM cat_clientes WHERE RFC='$rfc'"); 
		$resultado = $conexion->query($query);
    	if(mysqli_num_rows($resultado)>0) { 
			$bandera = 1;
     		$rfc = "";
   		}

   		if($bandera == 0  ){
   			$contraseña =  md5($_POST ['Contraseña']);
   			$query = "INSERT INTO cat_usuarios(Usuario, Contrasenia, idtusuario, estado) VALUES ('$usuario','$contraseña','$tusuario','Alta');";
			$resultado = $conexion->query($query);
			if ($resultado) {
				$query = "SELECT idUsuario FROM cat_usuarios WHERE Usuario = '$usuario'";
				$resultado = $conexion->query($query);
				$fila = $resultado->fetch_assoc();
				$idUsuario = $fila['idUsuario'];
				$query = "INSERT INTO cat_clientes(NombreCli, Apellido1Cli, Apellido2Cli, DireccionCli, TelefonoCli, CorreoCli, RFC, idUsuario) VALUES ('$nombre','$apellido1','$apellido2','$direccion','$telefono','$correo','$rfc',$idUsuario);";
				$resultado = $conexion->query($query);
				mysqli_close($conexion);
				
				header("Location: ../index.php");
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
	<?php 
		include("../includes/menu.php"); 
	?>
	<section class="ContenedorPrincipal">
		
		<form id="formularios1" class="formularios"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
			
			<h2>Si aun no te haz registrado, hazlo es sencillo.</h2>
			<div style="/*-webkit-column-count:3*/-moz-column-count:2;column-count:2">
			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Ej. Juan Antonio" value="<?php if(isset($nombre)) {echo $nombre;}?>" pattern="[A-Z a-z]+" title="Solo puedes ingresar letras"/><br>
			<label>Primer apellido</label><br>
			<input type="text" name="Apellido1" placeholder="Ej. Torres" value="<?php if(isset($apellido1)) {echo $apellido1;}?>" pattern="[A-Za-z]+" title="Solo puedes ingresar letras" /><br>
			<label>Segundo apellido</label><br>
			<input type="text" name="Apellido2" placeholder="Ej. Martinez"value="<?php if(isset($apellido2)) {echo $apellido2;}?>" pattern="[A-Za-z]+" /><br>
			<label>Correo</label><br>
			<input type="email" required name="Correo" placeholder="<?php if(isset($correo) && $correo ==''){ echo 'Intente con otro';}else{echo "Ej. JuanAnt@ejemplo.com";} ?>"value="<?php if(isset($correo)) {echo $correo;}?>" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Ej. Calle 3 #800 6 y 10 San Antonio"value="<?php if(isset($direccion)) {echo $direccion;}?>" /><br><br>
			<label>Telefono</label><br>
			<input type="tel" required name="Telefono" placeholder="<?php if(isset($telefono) && $telefono ==''){ echo 'Intente con otro';}else{echo 'Ej. 9991 47 47 47';}?>" value="<?php if(isset($telefono)) {echo $telefono;}?>"  pattern="[0-9]+" maxlength="10" title="Solo puedes ingresar numeros "/><br>
			<label>RFC</label><br>
			<input type="text" name="RFC" placeholder="<?php if(isset($rfc) && $rfc ==''){ echo 'Intente con otro';}else{echo 'Ej. VECJ880326 XXX';}?>" value="<?php if(isset($rfc)) {echo $rfc;}?>" /><br>
			<label>Usuario</label><br>
			
			<input autocomplete="off" type="text" required name="Usuario" placeholder="<?php if(isset($usuario) && $usuario ==''){ echo 'Ej. UsuarioVic';}else{echo "Aqui va el usuario";} ?>" value="<?php if(isset($usuario)){ echo $usuario;} ?>" maxlength="10" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="<?php if(isset($contraseña) && $contraseña ==''){ echo 'No coinciden';}else{echo "Ej. Vic1478AHs";} ?>"value="<?php if(isset($contraseña)) {echo $contraseña;}?>" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="Una contraseña válida es un conjuto de caracteres, donde cada uno consiste de una letra mayúscula o minúscula, o un dígito. La contraseña debe empezar con una letra y contener al menos un dígito. Debe tener 8-10 caracteres" maxlength="10" minlength="10"/> <br>
			<label>Confirmar contraseña</label><br>
			<input type="password" required name="Contraseña1" placeholder="<?php if(isset($contraseña1) && $contraseña1 ==''){ echo 'No coinciden';}else{echo "Ej. Vic1478AHs";} ?>"value="<?php if(isset($contraseña)) {echo $contraseña;}?>" value="<?php if(isset($contraseña)) {echo $contraseña;}?>" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="Una contraseña válida es un conjuto de caracteres, donde cada uno consiste de una letra mayúscula o minúscula, o un dígito. La contraseña debe empezar con una letra y contener al menos un dígito. Debe tener 8-10 caracteres" maxlength="10" minlength="10"/> <br>
			</div>
			<input id="btn_aceptar"type="submit" value="Registrarse" name="Guardar">
			<a href="index.php"><input id="btn_cancelar" type="button" value="Cancelar" name="Cancelar"></a>
			
		</form>
		<br><br>
		<br><br>
		<br><br>

		
	</section>
	<?php 
		include("../includes/footer.php"); 
	?>
</body>
</html>