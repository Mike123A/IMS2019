<?php
/*
* Agrega el producto a la variable de sesion de productos.
*/
session_start();
if (!empty($_POST['agregar'])) {
	if(isset($_POST["clave"]) && isset($_POST["cantidad"])){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["cart"])){
			$_SESSION["cart"]=array( array("clave"=>$_POST["clave"],"cantidad"=> $_POST["cantidad"]));
		}else{
			// apartie del segundo producto:
			$cart = $_SESSION["cart"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($cart as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["clave"]==$_POST["clave"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
				array_push($cart, array("clave"=>$_POST["clave"],"cantidad"=> $_POST["cantidad"]));
				$_SESSION["cart"] = $cart;
			}
		}
		print "<script>window.location='../products.php';</script>";
	}
}

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
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql = "SELECT * FROM cat_productos WHERE idProducto=".$clave.";";

			if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
			$fila = $resultado->fetch_assoc();
			
			$direccionimagen = "../img/Productos/".$fila['ImagenProd'];
		?>
		<div id="productodesc">
			<h2>
				<?php echo $fila['NombreProd']; ?>
			</h2>
			<img class="imagenformulario" src="<?php echo $direccionimagen ?>" alt=''>
			<article>
				<h3>Dimensiones:</h3>
				<p>Alto <?php echo $fila['AltoProd']; ?> cm, Ancho <?php echo $fila['AnchoProd']; ?>cm</p><br>
				<h3>Peso:</h3>
				<p><?php echo $fila['PesoProd']; ?>gr</p><br>
				<h3>Descripcion:</h3>
				<p><?php echo $fila['DescripcionProd']; ?></p><br>
			</article>
			<form class="BotonesDescProd" method="POST" action="agregar_carrito.php">
				<label for="">Cuantos desea:</label> <br>
				<input style="display: none" type="text" required name="clave" placeholder="" value=" <?php echo $fila['idProducto']; ?>" /><br>
				<input type="number" name="cantidad"><br>
				<button type="submit" name="agregar" >Agregar al carrito</button>
				<br>
				<a href="productos.php">
					<button>
						Seguir Comprando
					</button>
				</a>
			</form>
			
		</div>
		

	</section>
	<?php 
		include("../includes/footer.php"); 
	?>
</body>
</html>