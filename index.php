<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	
	<header>
		<?php
	session_start(); 	
	if (!empty($_SESSION['active'])) {
		echo "<header class='encabezado_sesion'>
		<a href='cerrar_sesion.php'><img src='img/cerrar-sesion.png' alt=''></a>";

		
		$fecha = new DateTime('NOW');
		date_default_timezone_set('America/Mexico_City');
    	setlocale(LC_TIME, 'es_MX.UTF-8');
		echo "<label for=''>Merida, Yucatan, ".date('d-m-Y')." | 'Usuario: ".$_SESSION['Usuario']."</label></header>";
	}
	?>
		<nav>
			<a href="php/nosotros.php"><img src="img/LogoBlanco.png"></a>	
			<ul>
				<li><a href="index.php">[ INICIO ]</a></li>
				<li><a href="php/nosotros.php">[ NOSOTROS ]</a></li>
				<li><a href="php/productos.php">[ PRODUCTOS ]</a></li>
				<li><a href="php/Asociados.php">[ ASOCIADOS ]</a></li>
				<li><a href="php/Contacto.php">[ CONTACTO ]</a></li>
				<a href="php/sesion.php"><img src="img/SesionIcono.png"></a>
				<a href="php/cuenta.php"><img src="img/carrito-de-la-compra.png"></a>	
			</ul>
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		<div class="carrusel">
			<ul>
				<li>
					<img src="img/Carrousel/imagen1.jpg" alt="" >
				</li>
				<li>
					<img src="img/Carrousel/imagen2.jpg" alt="" >
				</li>
				<li>
					<img src="img/Carrousel/imagen3.jpg" alt="" >
				</li>
			</ul>
		</div>
		<section id="descripcionempresa">
			<article>"Somos una empresa que se preocupa por la calidad de vida de nuestros clientes, por lo que estamos en constante investigacion para ofrecer soluciones innovadores que utilizen metodos no invasaivos"</article>
		</section>

		<section id="descripcionempresa1">
			<img src="img/medio-ambiente.jpg" alt="">
			<section>
				<article>"Nuestra empresa tiene un firme compromiso con el medio ambiente, por lo que utilizamos tecnologias Ecofriendly"</article>
			</section>
		</section>
	</section>
	<footer>
		<section class="contefooter">
			<li><a href=""><img src="img/FacebookIcono.png">@InnovativeMedicalSolutions</a><br></li>
			<li><a href=""><img src="img/twitterIcono.png">@InnovativeMedicalSolutions</a><br></li>
			<li><a href=""><img src="img/youtubeIcono.png">@InnovativeMedicalSolutions</a><br></li>
		</section>
		<section class="contefooter">
			<p>Direccion:<br> Calle 28 <br> Cruzamientos: 19 y 17 <br> Col. Maya</p>
			<p>Telefono:<br> 943 43 00</p>
			<p>SoporteInnovativeMedicalSolutions@outlook.com</p>
		</section>		
	</footer>
</body>
</html>