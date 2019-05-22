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
		<div class="carrusel">
			<ul>
				<li>
					<img src="../img/Carrousel/imagen1.jpg" alt="" >
				</li>
				<li>
					<img src="../img/Carrousel/imagen2.jpg" alt="" >
				</li>
				<li>
					<img src="../img/Carrousel/imagen3.jpg" alt="" >
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
	<?php 
		include("../includes/footer.php"); 
	?>
</body>
</html>