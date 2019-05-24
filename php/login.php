<?php

	// session_start();
	$alert = '';

	if (!empty($_SESSION['active'])) {
		// header("Location: php/index.php");
	}else{
		if (!empty($_POST['Ingresar'])) {
			include("conexion.php"); 

			$Usuario = $_POST['Usuario'];
			$Contrasenia = $_POST['Contrasenia'];
			// $Contrasenia = md5($_POST['Contrasenia']);

			$query = ("SELECT * FROM cat_usuarios WHERE Usuario='$Usuario' AND Contrasenia='$Contrasenia'");
			$resultado = $conexion->query($query);

		   	if(mysqli_num_rows($resultado)>0) { 
		   		$data = mysqli_fetch_array($resultado);
		   		$_SESSION['active'] = true;
		   		$_SESSION['idUsuario'] = $data['idUsuario'];
		   		$_SESSION['Usuario'] = $data['Usuario'];
		   		$_SESSION['idtusuario'] = $data['idtusuario'];

		   		if ($_SESSION['idtusuario']==0) {
					 header("Location:".$_SERVER['HTTP_REFERER']);  
		   		}else{
					header("Location: ../admin/php/index.php");

		   		}
		    }else{
				$alert = 'El usuario o clave es incorrecto';
				session_destroy();
				header("Location: index.php#openModal");
		    }
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body >
	
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="login">
			<h2 class="encabezado-login">Iniciar Sesion</h2><br>
			<img src="../img/logotipo.png" alt=""><br>

			<!-- <label>Usuario</label><br> -->
			<input type="text" required name="Usuario" placeholder="Usuario"value="" autocomplete="off"/><br>
			<!-- <label>Contraseña</label><br> -->
			<input type="password" required name="Contrasenia" placeholder="Contraseña" autocomplete="off"/><br>
			<input id="btn_ingresar"type="submit" name="Ingresar" value="Ingresar"><br>
			<p>No tienes una cuenta <a href="registro-cliente.php"> Click aqui</a></p>	
			<!-- <input type="button" name="" value="Registrarse"> -->
			<?php if (isset($alert)) { echo $alert;}  ?>
		</form>
		
	
	
</body>
</html>