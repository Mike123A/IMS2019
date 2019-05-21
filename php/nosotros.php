<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php
	session_start(); 	
	if (!empty($_SESSION['active'])) {
		include ("../includes/encabezado_sesion.php");	
	}
 ?>
	<header>
		<nav>
			<a href="nosotros.html"><img src="../img/LogoBlanco.png"></a>	
			<ul>
				<li><a href="../index.php">[ INICIO ]</a></li>
				<li><a href="nosotros.php">[ NOSOTROS ]</a></li>
				<li><a href="productos.php">[ PRODUCTOS ]</a></li>
				<li><a href="asociados.php">[ ASOCIADOS ]</a></li>
				<li><a href="contacto.php">[ CONTACTO ]</a></li>
				<a href="login.php"><img src="../img/SesionIcono.png"></a>
				<a href="cuenta.php"><img src="../img/carrito-de-la-compra.png"></a>	
			</ul>
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		<div class="titulopagina">Nosotros</div>
		<img class="ImagenesNosotros" src="../img/Nosotros1.jpg" alt="">

		<article class="articlenosotros">
			¿Que es Innovative Medical Solutions?
			<p>
				Innovative Medical Solutions es una empresa yucateca que se caracteriza por su seriedad y responsabilidad con la sociedad, nos regimos por las leyes nacionales y pertenecemos a la industria productora de soluciones tecnológicas para el monitoreo y control de la salud.
				<br><br>
				Nuestro equipo de trabajo está en constante investigación de las tecnologías emergentes para incorporarlas en los productos que se desarrollan en la organización, además utiliza los negocios electrónicos para agilizar y automatizar los procesos de ventas y las tecnologías para aplicar las campañas publicitarias.
			</p>
		</article>
		<article class="articlenosotros articlenosotros1" >
			Mision
			<p>"Somos una empresa dedicada al desarrollo de dispositivos medicos con estándares de calidad, incluyendo las tecnologías de información y comunicación para una eficaz y eficiente solución de las necesidades de hardware y software actuales para el sector de la salud".
			</p>
		</article>
		<article class="articlenosotros articlenosotros1">
			Vision
			<p>"Ser la empresa líder a nivel nacional en el desarrollo y venta de dispositivos médicos para el control y monitoreo de la salud, destacando la calidad de nuestros productos y la trasparencia de nuestra empresa".
			</p>
		</article>			
		<article class="articlenosotros" >
			Valores
			<p style="/*-webkit-column-count:3*/-moz-column-count:3;column-count:3">
				Transparencia <br> <br>
				Puntualidad <br> <br>
				Integridad <br> <br>
				Confianza <br> <br>
				Honestidad <br> <br>
				Respeto <br> <br>
				Responsabilidad social <br> <br>
				Compromiso <br> <br>
				Adaptabilidad <br> <br>
			</ul>
			</p>
			
		</article> 
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