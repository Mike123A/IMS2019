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
				if (empty($_SESSION['active'])) {
					include ('../includes/encabezado_sesion.php');	
				}
		 	?>
			<a href="nosotros.html"><img src="../img/LogoBlanco.png"></a>	
			<ul>
				<li><a href="../index.php">[ INICIO ]</a></li>
				<li><a href="nosotros.php">[ NOSOTROS ]</a></li>
				<li><a href="productos.php">[ PRODUCTOS ]</a></li>
				<li><a href="asociados.php">[ ASOCIADOS ]</a></li>
				<li><a href="contacto.php">[ CONTACTO ]</a></li>
				<a href="#openModal"><img src="../img/SesionIcono.png"></a>
				
				<a href="cuenta.php"><img src="../img/carrito-de-la-compra.png"></a>
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
		<h2>Articulos en el carrito</h2>
		<hr />
		<div id="productocarrito">
			<img src="../img/Productos/img_69b91182aa3d942e5bda962cab3f926e.png" alt="">
			<article>
				<h2>PRODUCTO</h2>
				Descripcion:
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non aut unde praesentium culpa, minus totam earum dignissimos quia consequuntur laborum. Similique illum libero voluptas est vel inventore consectetur officia distinctio.</p><br><br>
			</article>
			<article class="datosp">
				Precio unitario: 
				<h3>$3,500</h3>
			</article>
			<hr />
		</div>
		<div id="productocarrito">
			<img src="../img/Productos/img_69b91182aa3d942e5bda962cab3f926e.png" alt="">
			<article>
				<h2>PRODUCTO</h2>
				Descripcion:
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non aut unde praesentium culpa, minus totam earum dignissimos quia consequuntur laborum. Similique illum libero voluptas est vel inventore consectetur officia distinctio.</p><br><br>
			</article>
			<article class="datosp">
				Precio unitario: 
				<h3>$3,500</h3>
			</article>
			<hr />
		</div>
		<div class="total">
			Total: $7000
		</div>
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