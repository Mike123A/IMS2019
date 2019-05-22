<?php 
	session_start();
	include "conexion.php";

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
		// include("../includes/menu.php");

	?>
	<section class="ContenedorPrincipal">
	<h2>Articulos en el carrito</h2>
	<hr />
	<?php 
		$products = $conexion->query("select * from cat_productos");
		if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
	?>
	<div id="productocarrito">
		<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/

		foreach($_SESSION["cart"] as $c):
		$idbus = $c['clave'];
		$query = "SELECT * FROM cat_productos WHERE idProducto= $idbus";

		$products = $conexion->query($query);
		$r = $products->fetch_object();
		?>  
			<img src="../img/Productos/<?php echo $r->ImagenProd;?>" alt="">
			<article>
			<h2>Producto: <?php echo $r->NombreProd;?></h2>
			Descripcion:
			<p><?php echo $r->DescripcionProd;?></p><br><br>
			</article>
			<article class="datosp">
				<h3>Precio unitario:</h3>
				<h2><?php  echo $r->PrecioProd; ?></h2>
				<h3>Cantidad:</h3>
				<h2><?php  echo $c["cantidad"]; ?></h2>
				<h3>Precio acumulado:</h3>
				<h3><?php echo $c["cantidad"]*$r->PrecioProd;?></h3>
			</article>
	<?php
	$found = false;
	foreach ($_SESSION["cart"] as $c) { if($idbus==$r->idProducto){ $found=true; break; }}
	?>
		<!-- <a href="php/delfromcart.php?id=<?php echo $c["product_id"];?>" class="btn btn-danger">Eliminar</a> -->
	
<?php endforeach; ?>
		<div class="total">
			Total: $7000
		</div>
	</section>
	<?php 
		// include("../includes/footer.php"); 
	?>
	<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>
</body>
</html>