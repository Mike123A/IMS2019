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
			
		include("conexion.php"); 

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
	<header>
		<nav>
			<?php
				session_start(); 	
				if (!empty($_SESSION['active'])) {
					include ("../includes/encabezado_sesion.php");	
				}
		 	?>
			<a href="nosotros.html"><img src="../img/LogoBlanco.png"></a>	
			<ul>
				<li><a href="../index.php">[ INICIO ]</a></li>
				<li><a href="nosotros.php">[ NOSOTROS ]</a></li>
				<li><a href="productos.php">[ PRODUCTOS ]</a></li>
				<li><a href="asociados.php">[ ASOCIADOS ]</a></li>
				<li><a href="contacto.php">[ CONTACTO ]</a></li>
				<a href="login.php"><img src="../img/SesionIcono.png"></a>
				<a href="cuenta.php"><img src="../img/carrito-de-la-compra.png"></a>
				<a href="#openModal"><img src="../img/SesionIcono.png"></a>
				<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		<br>
		<?php 

		include ("login.php");	

		 ?>
	</div>
</div>	
			</ul>
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		
		<form id="formularios"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
			<h2>Si aun no te haz registrado, hazlo es sencillo.</h2>
			<label>Nombre(s)</label><br>
			<input type="text" required name="Nombres" placeholder="Aqui va el nombre" value="<?php if(isset($nombre)) {echo $nombre;}?>" pattern="[A-Z a-z]+" title="Solo puedes ingresar letras"/><br>
			<label>Apellido1</label><br>
			<input type="text" name="Apellido1" placeholder="Aqui va un apellido" value="<?php if(isset($apellido1)) {echo $apellido1;}?>" pattern="[A-Za-z]+" title="Solo puedes ingresar letras" /><br>
			<label>Apellido2</label><br>
			<input type="text" name="Apellido2" placeholder="Aqui va el segundo apellido"value="<?php if(isset($apellido2)) {echo $apellido2;}?>" pattern="[A-Za-z]+" /><br>
			<label>Correo</label><br>
			<input type="email" required name="Correo" placeholder="<?php if(isset($correo) && $correo ==''){ echo 'Intente con otro';}else{echo "Aqui va el correo";} ?>"value="<?php if(isset($correo)) {echo $correo;}?>" /><br>
			<label>Direccion</label><br>
			<input type="text" required name="Direccion" placeholder="Aqui va la direccion"value="<?php if(isset($direccion)) {echo $direccion;}?>" /><br>
			<label>Telefono</label><br>
			<input type="tel" required name="Telefono" placeholder="<?php if(isset($telefono) && $telefono ==''){ echo 'Intente con otro';}else{echo 'Aqui va el telefono';}?>" value="<?php if(isset($telefono)) {echo $telefono;}?>"  pattern="[0-9]+" maxlength="10" title="Solo puedes ingresar numeros "/><br>
			<label>RFC</label><br>
			<input type="text" name="RFC" placeholder="<?php if(isset($rfc) && $rfc ==''){ echo 'Intente con otro';}else{echo 'Aqui va el rfc';}?>" value="<?php if(isset($rfc)) {echo $rfc;}?>" /><br>
			<label>Usuario</label><br>
			
			<input type="text" required name="Usuario" placeholder="<?php if(isset($usuario) && $usuario ==''){ echo 'Intente con otro';}else{echo "Aqui va el usuario";} ?>" value="<?php if(isset($usuario)){ echo $usuario;} ?>" maxlength="10" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña"value="<?php if(isset($contraseña)) {echo $contraseña;}?>" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="Una contraseña válida es un conjuto de caracteres, donde cada uno consiste de una letra mayúscula o minúscula, o un dígito. La contraseña debe empezar con una letra y contener al menos un dígito. Debe tener 8-10 caracteres" maxlength="10" minlength="10"/> <br>
				
			<input type="submit" value="Registrarse" name="Guardar">
		</form>
		
		
	</section>
	<footer>
		<section class="contefooter">
			<li><a href=""><img src="../img/FacebookIcono.png">@InnovativeMedicalSolutions</a><br></li>
			<li><a href=""><img src="../img/twitterIcono.png">@InnovativeMedicalSolutions</a><br></li>
			<li><a href=""><img src="../img/youtubeIcono.png">@InnovativeMedicalSolutions</a><br></li>
		</section>
		<section class="contefooter">
			<p>Direccion:<br> Calle 28 <br> Cruzamientos: 19 y 17 <br> Col. Maya</p>
			<p>Telefono:<br> 943 43 00</p>
			<p>SoporteInnovativeMedicalSolutions@outlook.com</p>
		</section>		
	</footer>
</body>
</html>