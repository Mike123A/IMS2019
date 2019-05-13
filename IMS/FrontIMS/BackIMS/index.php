<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body >
	<div id="fondo">
		<?php
			if(isset($_GET["error"])) {

			echo "<p class='error'>Usuario y / o Contrasea erroneos. Intentelo de nuevo.</p>";
			}

 

		?>
		<form action="php/identificacion_usuario.php" class="login">
			<h2>Iniciar Sesion</h2><br>
			<img src="img/logotipo.png" alt=""><br>
			<label>Usuario</label><br>
			<input type="text" required name="Usuario" placeholder="Aqui va el usuario"value="" /><br>
			<label>Contraseña</label><br>
			<input type="password" required name="Contraseña" placeholder="Aqui va la contraseña" /><br><br>
			<input type="submit" value="Ingresar">
		</form>
		
	</div>
	
</body>
</html>