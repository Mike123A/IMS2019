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
		<button id="btn_busqueda" type="submit" name="buscar"><img src="../img/Lupa.png" alt=""></button>
		<br>
	</form>
	<?php if (isset($_POST['buscar'])) { 
	$variable = $_POST['variable'];
		?>
	<br><br><br>
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
			</thead>
			
			<?php
				include("conexion.php");
				$sql = "SELECT * FROM cat_productos WHERE NombreProd like '%$variable%' ORDER BY idProducto ASC";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				
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
			?>
		</table>		
	<?php }?>

<br><br><br><br>







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
				<h3>Descripcion:</h3>
				<h4><?php echo $r->DescripcionProd;?></h4>
			</article>
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
			<br>	<div id="paypal-button-container"></div>
		</div>
		
	

	<?php else:?>
	<p class="alert alert-warning">Sin articulos.</p>
<?php endif;?>
</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>