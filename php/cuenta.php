<?php 
	// session_start();
	include "conexion.php";
	$total = 0;

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
				<?php $total = $total + ($c["cantidad"]*$r->PrecioProd); ?>
			</article>
	<?php
	$found = false;
	foreach ($_SESSION["cart"] as $c) { if($idbus==$r->idProducto){ $found=true; break; }}
	?>
		<a href="eliminar_carrito.php?clave=<?php echo $c["clave"];?>">Eliminar</a>
	<hr /><br>	
<?php endforeach; ?>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<style>
   
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
           width: 100%;
        }
    }
   
    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
           width: 250px;
            display: inline-block;
        }
    }
   
</style>

		<div class="total">
			<?php if (isset($total)) {
				echo "Total:".$total;
			} ?>
		</div>
		<div id="paypal-button-container"></div>
	</section>
	<?php 
		include("../includes/footer.php"); 
	?>
	<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>

 
 
<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size:  'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },
 
        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
 
        client: {
            sandbox:    'AY1Y4wOofLSFUt7f8WHjTeZrN2f3PUsIK1k9PJdNelXLwLATRuqR4SUp_KymwxYpsyYPAGbFEwoxLxyW',
            production: 'AUZ5SjsTb6BGsBOCyAdmed_9t_v-U6kQIbVIfsA1kWmPCnB06GYiCRiExLsfDMycl_vm4U3630E65EVL'
        },
 
        // Wait for the PayPal button to be clicked
 
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $total; ?>', currency: 'MXN' },
                        }
                    ]
                }
            });
        },
 
        // Wait for the payment to be authorized by the customer
 
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                window.location="procesar_venta.php";
            });
        }
   
    }, '#paypal-button-container');
 
</script>
</body>
</html>