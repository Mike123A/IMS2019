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
	<?php 
		include("../includes/footer.php"); 
	?>
</body>
</html>