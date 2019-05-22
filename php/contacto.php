<?php

	if (isset($_POST['Enviar'])) {

		$nombre = $_POST["nombre"];
		$correo = $_POST["correo"];
		$telefono = $_POST["telefono"];
		$asunto = $_POST["asunto"];
		$mensaje = $_POST["mensaje"];

		$destinatario = "SoporteIMS@outlook.com";

		$mensaje = "
			Datos del remitente
			Nombre: ".$nombre."
			Correo: ".$correo."
			Telefono: ".$telefono."

			Mensaje/Comentario: ".$mensaje."
		";
		if(mail($destinatario,$asunto,utf8_decode($mensaje))){
			echo "<script type='text/javascript'>
				location.href='../Contacto.html';
			</script>";
		}else{
			echo "<script type='text/javascript'>alert('No se envio');</script>";
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
		<div class="titulopagina">Contacto</div>
		<iframe id="UbicacionMapa" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d465.55849987032025!2d-89.57396706133994!3d21.013952237692923!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1552494062010" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
		
		<form id="formularios"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
			<h2>Tienes alguna duda, contactanos...</h2>
			<label for="">*Nombre:</label><br>
			<input type="text" placeholder="Aqui va tu nombre" id="nombre" name="nombre" required=""><br>
			<label for="">*Correo:</label><br>
			<input type="text" placeholder="Aqui va tu correo" id="correo" name="correo" required=""><br>
			<label for="">*Telefono:</label><br>
			<input type="text" placeholder="Aqui va tu telefono" id="telefono" name="telefono" required=""><br>
			<label for="">*Asunto:</label><br>
			<input type="text" placeholder="Aqui va tu asunto" id="asunto" name="asunto" required=""><br>
			<label for="">*Mensaje:</label><br>
			<textarea placeholder="Aqui va tu mensaje/comentario" id="mensaje" name="mensaje" required=""></textarea><br>
			<button type="submit" name="Enviar">Enviar mensaje</button>
		</form>
		<section id="DatosEmpresa">
			<h2>Conectate con nosotros</h3><br><br>
			<p>
				Para soporte o cualquier pregunta: <br>
				Envianos un correo a SoporteIMS@outlook.com
			</p>
			<br><br>
			<p>
				<h3>Mérida, Yucatán</h3>
				Calle 28 #523 x 19 y 17 Col. Maya
			</p>
			<br><br>
			<p>
				<h3>Nuestras redes sociales</h2> 
				Siguenos en nuestras redes sociales como: <br>
				@InnovativeMedicalSolutions <br>
				<img src="../img/FacebookIcono.png">
				<img src="../img/twitterIcono.png">
				<img src="../img/youtubeIcono.png">
			</p>
		</section>	
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