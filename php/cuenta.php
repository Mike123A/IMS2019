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
	<?php 
		$productos = $conexion->query("SELECT * FROM cat_productos");
			if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
	?>
		<div id="productocarrito">
			<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
foreach($_SESSION["cart"] as $c):
$products = $con->query("select * from product where id=$c[product_id]");
$r = $products->fetch_object();
	?>
	
			<img src="../img/Productos/<?php echo $r->ImagenProd; ?>" alt="">
			<article>
				<h2><?php echo $r->NombreProd;?></h2>
				Descripcion:
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non aut unde praesentium culpa, minus totam earum dignissimos quia consequuntur laborum. Similique illum libero voluptas est vel inventore consectetur officia distinctio.</p><br><br>
			</article>
			<article class="datosp">
				Precio unitario: 
				<h3>$3,500</h3>
			</article>
			<hr />
		</div>
	<?php
	 foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id){ $found=true; break; }}
	?>
		<div class="total">
			Total: $7000
		</div>
	</section>
	<?php 
		include("../includes/footer.php"); 
	?>
</body>
</html>