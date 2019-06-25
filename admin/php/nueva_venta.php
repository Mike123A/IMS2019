<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) {}
		else{
			header("Location: index.php");
		}
	}

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
	<?php include ("../includes/encabezado_sesion.php") ?>

	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<label for="">Buscar producto:</label>
		<input type="text" name="variable">
		<button id="btn_busqueda" type="submit" name="buscar"><img src="../img/lupa.png" alt=""></button>
		<br>
	</form>
	<?php if (isset($_POST['buscar'])) { 
	$variable = $_POST['variable'];
		include("conexion.php");
		$sql = "SELECT * FROM cat_productos WHERE NombreProd like '%$variable%' ORDER BY idProducto ASC";

		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		}
		if(mysqli_num_rows($resultado)>0){
			echo "
			<table>
				<thead>
					<tr>
						<td>Clave</td>
						<td>Nombre</td>
						<td>Alto</td>
						<td>Ancho</td>
						<td>Peso</td>
						<td>Descripcion</td>
						<td>Precio</td>
						<td>Stock</td>
						<td>Imagen</td>
						<td></td>
					</tr>
				</thead>";
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idProducto']." </td>
    					<td>".$fila['NombreProd']."</td>
    					<td>".$fila['AltoProd']."cm</td>
    					<td>".$fila['AnchoProd']."cm</td>
    					<td>".$fila['PesoProd']."gr</td>
    					<td>".$fila['DescripcionProd']."</td>
    					<td>$".$fila['PrecioProd']."</td>
    					<td>".$fila['StockProd']."</td>

    					<td> <img src='../../img/Productos/".$fila['ImagenProd']."'alt=''></td>
    					<td>
    						<form id='agreg_cuenta' action='agregar_carrito.php' method='post'>
							<input style='display: none' type='number' required name='clave' placeholder='' value=".$fila['idProducto']." /><br>
							<input style='display: none' type='number' required name='precio' placeholder='' value=".$fila['PrecioProd']." /><br>
				
							<label for=''>Cuantos desea:</label> <br>
							<input type='number' value='1' name='cantidad'>
							<button id='btn_agregar' type='submit' name='agregar' >Agregar</button>
							</form>
						</td>
    					
					</tr>";
				}

		}else
			print "<script>alert('No se encontraron coincidencias, intenta con otro');</script>";


		?>
		</table>		
	<?php } ?>

<br><br>


	<h2>Articulos en la cuenta</h2>
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
			<h2>Producto: <?php echo $r->NombreProd;?></h2>

			<img src="../../img/Productos/<?php echo $r->ImagenProd;?>" alt="">
			
			<article class="datosp">
				<h3>Precio unitario:</h3>
				<h4><?php  echo $r->PrecioProd; ?></h34>
			</article>
			<article class="datosp">
				<h3>Cantidad:</h3>
				<h4><?php  echo $c["cantidad"]; ?></h4>
			</article>
			<article class="datosp">
				<h3>Total:</h3>
				<h2><?php echo $c["cantidad"]*$r->PrecioProd;?></h2>
				<?php $total = $total + ($c["cantidad"]*$r->PrecioProd);
				$_SESSION["total"]= $total; ?>
			</article>
	<?php
	$found = false;
	foreach ($_SESSION["cart"] as $c) { if($idbus==$r->idProducto){ $found=true; break; }}
	?>
		<button id="btn_quitar"><a href="eliminar_carrito.php?clave=<?php echo $c["clave"];?>">Remover</a></button>
	<hr /><br><?php endforeach; ?>
	</div>

		<div class="total">

			<?php if (isset($total)) {
				echo "Total:".$total;
			} ?>
			<br>	<!-- <div id="paypal-button-container"></div> -->
		</div>
		
	

	<?php else:?>
	<p class="alert alert-warning">Sin articulos.</p>
<?php endif;?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<label for="">Buscar cliente:</label>
		<input type="text" name="variable">
		<button id="btn_busqueda" type="submit" name="buscar_c"><img src="../img/lupa.png" alt=""></button>
		<br>
	</form>
		<br>

	<?php if (isset($_POST['buscar_c'])) { 
	$variable = $_POST['variable'];
		include("conexion.php");
		$sql = "SELECT * FROM cat_clientes WHERE NombreCli like '%$variable%' ORDER BY idCliente ASC";

		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		}
		if(mysqli_num_rows($resultado)>0){
			echo "
			<table>
				<thead>
					<tr>
						<td>Clave</td>
						<td>Nombres</td>
						<td>Apellidos</td>
						<td>Direccion</td>
						<td>Telefono</td>
						<td>Correo</td>
						<td>RFC</td>
						<td></td>
					</tr>
				</thead>";
				while($fila = $resultado->fetch_assoc()){
					echo"
					<tr>
						<td>".$fila['idCliente']." </td>
    					<td>".$fila['NombreCli']."</td>
    					<td>".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."</td>
    					<td>".$fila['DireccionCli']."</td>
    					<td>".$fila['TelefonoCli']."</td>
    					<td>".$fila['CorreoCli']."</td>
    					<td>".$fila['RFC']."</td>
    					<td id='td_ac'>
							<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."'method='POST'>

							<input style='display: none' type='number' required name='cliente' placeholder='' value='".$fila['idUsuario']."' /><br>
				
							<button id='btn_agregar' type='submit' name='seleccionarc' >Seleccionar</button>
							</form>
						</td>
    					
					</tr>";
				}
			echo "</table>";
		}else
			echo "<label>No se encontraron coincidencias puedes intentar con otro o registrar un nuevo cliente <a href='alta_cliente.php'>Click aqui.</a></label><br><br><br><br>";


		?>
			
	<?php } 

		if (isset($_POST['seleccionarc'])) 
			$_SESSION["cliente"]= $_POST['cliente'];
		if (isset($_SESSION["cliente"])) {
			include("conexion.php");
			$idbuscl = $_SESSION["cliente"];

			$sql = "SELECT * FROM cat_clientes WHERE idUsuario = $idbuscl";
		
			if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		}
		
		echo "
		<table>
			<thead>
				<tr>
					<td>Clave</td>
					<td>Nombres</td>
					<td>Apellidos</td>
					<td>Direccion</td>
					<td>Telefono</td>
					<td>Correo</td>
					<td>RFC</td>
				</tr>
			</thead>";
			while($fila = $resultado->fetch_assoc()){
				echo"
				<tr>
					<td>".$fila['idCliente']." </td>
    				<td>".$fila['NombreCli']."</td>
    				<td>".$fila['Apellido1Cli']." ".$fila['Apellido2Cli']."cm</td>
    				<td>".$fila['DireccionCli']."</td>
    				<td>".$fila['TelefonoCli']."</td>
    				<td>".$fila['CorreoCli']."</td>
    				<td>".$fila['RFC']."</td>				
				</tr>";
				}
		}
	 ?></table>
	 <div class="total">

			<?php if (isset($total)) echo "Total a pagar: ".$total; ?>
			<br>
			<div id="paypal-button-container"></div>
			<br>

			<button id="btn_agregar"><a href="procesar_venta.php">Procesar venta</a></button>
			<button id="btn_quitar"><a href="limpiar_cuenta.php">Cancelar venta</a></button>
	</div>

</section>
	<?php include ("../includes/footer.php") ?>
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