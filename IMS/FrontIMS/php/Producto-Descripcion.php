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
			<a href="Nosotros.html"><img src="../img/LogoBlanco.png"></a>	
			<ul>
				<li><a href="index.html">[ INICIO ]</a></li>
				<li><a href="Nosotros.html">[ NOSOTROS ]</a></li>
				<li><a href="Productos.php">[ PRODUCTOS ]</a></li>
				<li><a href="php/Asociados.php">[ ASOCIADOS ]</a></li>
				<li><a href="Contacto.html">[ CONTACTO ]</a></li>
				<a href="Sesion.html"><img src="img/SesionIcono.png"></a>
				<a href="Cuenta.html"><img src="img/carrito-de-la-compra.png"></a>	
			</ul>
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		<?php
			$clave = $_GET['clave'];
			include("conexion.php");
			$sql = "SELECT * FROM cat_productos WHERE idProducto=".$clave.";";

			if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
			$fila = $resultado->fetch_assoc();
			
			$direccionimagen = "../../FrontIMS/img/Productos/".$fila['ImagenProd'];
		?>
		<div id="productodesc">
			<h2>
				PRODUCTO
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
			<div class="BotonesDescProd">
				<label for="">Cuantos desea:</label> <br>
				<input type="number" value="1"><br>
				<button>
						Agregar a carrito
				</button>
				<br>
				<a href="Productos.php">
					<button>
						Seguir Comprando
					</button>
				</a>
			</div>
			
		</div>
		

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