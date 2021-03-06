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
				<li><a href="Productos.html">[ PRODUCTOS ]</a></li>
				<li><a href="php/Asociados.html">[ ASOCIADOS ]</a></li>
				<li><a href="Contacto.html">[ CONTACTO ]</a></li>
				<a href="Sesion.html"><img src="img/SesionIcono.png"></a>
				<a href="Cuenta.html"><img src="img/carrito-de-la-compra.png"></a>	
			</ul>
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		<div class="titulopagina">Distribuidores Oficiales</div>
		<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_distribuidores";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				
				while($distribuidor = $resultado->fetch_assoc()){
					

					echo"
					<a href='".$distribuidor['PaginaDis']."' target='_blank'>
						<div class='asociado'>
							<img src='../img/Asociados/".$distribuidor['ImagenDis']."' alt=''>	
							<article>
								<h3>
									".$distribuidor['NombreDis']."
								</h3>
								<p>	
									".$distribuidor['DescripcionDis']."
								</p>	
							</article>
						</div>
					</a>";
				}				
			?>

		
		<div class="titulopagina">Proveedores Oficiales</div>
		<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_proveedores";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				
				while($proveedor = $resultado->fetch_assoc()){
					

					echo"
					<a href='".$proveedor['PaginaProv']."' target='_blank'>
						<div class='asociado'>
							<img src='../img/Asociados/".$proveedor['ImagenProv']."' alt=''>	
							<article>
								<h3>
									".$proveedor['NombreProv']."
								</h3>
								<p>	
									".$proveedor['DescripcionProv']."
								</p>	
							</article>
						</div>
					</a>";
				}				
			?>
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