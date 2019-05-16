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
			<a href="nosotros.html"><img src="../img/LogoBlanco.png"></a>	
			<ul>
				<li><a href="../index.php">[ INICIO ]</a></li>
				<li><a href="nosotros.php">[ NOSOTROS ]</a></li>
				<li><a href="productos.php">[ PRODUCTOS ]</a></li>
				<li><a href="asociados.php">[ ASOCIADOS ]</a></li>
				<li><a href="contacto.php">[ CONTACTO ]</a></li>
				<a href="sesion.php"><img src="../img/SesionIcono.png"></a>
				<a href="cuenta.php"><img src="../img/carrito-de-la-compra.png"></a>	
			</ul>
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		<div class="titulopagina">Productos</div>
		<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_productos";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				
				while($producto = $resultado->fetch_assoc()){
					

					echo"
					<div id='producto'>
						<h2>
							".$producto['NombreProd']."
						</h2>
						<img src='../img/Productos/".$producto['ImagenProd']."' alt=''>
						<a href='producto-descripcion.php?clave=".$producto['idProducto']."'>
							<button>
								Ver detalles
							</button>
						</a>
					</div>";
				}				
			?>
		
		

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