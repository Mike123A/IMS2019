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
			<?php
				session_start(); 	
				if (!empty($_SESSION['active'])) {
					include ("../includes/encabezado_sesion.php");	
				}
		 	?>
			<a href="nosotros.html"><img src="../img/LogoBlanco.png"></a>	
			<ul>
				<li><a href="../index.php">[ INICIO ]</a></li>
				<li><a href="nosotros.php">[ NOSOTROS ]</a></li>
				<li><a href="productos.php">[ PRODUCTOS ]</a></li>
				<li><a href="asociados.php">[ ASOCIADOS ]</a></li>
				<li><a href="contacto.php">[ CONTACTO ]</a></li>
				<a href="login.php"><img src="../img/SesionIcono.png"></a>
				<a href="cuenta.php"><img src="../img/carrito-de-la-compra.png"></a>	
			</ul>
		</nav>
	</header>
	<section class="ContenedorPrincipal">
		<div class="titulopagina">Distribuidores Oficiales</div>
		
		<a href="https://www.sistembiomedica.com.mx/" target="_blank">
			<div class="asociado">
				<img src="../img/Asociados/sistembiomedica.png" alt="">	
				<article>
					<h3>
						Sistem Biomedica
					</h3>
					<p>	
						Sistem Biomédica empresa iniciada en el año de 1998, con el propósito de ser en el Sureste un proveedor confiable para los Hospitales, Clínicas y consultorios médicos. 
					</p>	
				</article>
			</div>
		</a>
		<a href="https://www.seccionamarilla.com.mx/informacion/equipos-y-materiales-medicos-de-yucatan-sa-de-cv/equipos-y-materiales-medicos-de-yucatan-sa-de-cv/yucatan/merida/centro/3853969" target="_blank">
			<div class="asociado">
			<img src="../img/Asociados/EquiposMaterialesMedicos.png" alt="">	
			<article>
				<h3>
					Equipos y materiales medicos de Yucatan
				</h3>
				<p>	
					Es una empresa que actua como un intermediario entre las empresas productoras y los clientes finales, se dedica a la venta y distribucion de productos medicos.
				</p>	
			</article>
		</div>
		</a>
		<a href="https://www.mundomedico.com.mx/pages/tiendas" target="_blank">
			<div class="asociado">
			<img src="../img/Asociados/MundoMedico.png" alt="">	
			<article>
				<h3>
						Mundo Medico
				</h3>
				<p>	
					Mundo Médico es el principal portal de ventas en línea dedicado a los Médicos, Estudiantes de Medicina y a los Pacientes. 
				</p>	
			</article>
		</div>
		</a>
		<a href="https://www.medicalcenter.com.mx/" target="_blank">
			<div class="asociado">
			<img src="../img/Asociados/MedicalCenter.png" alt="">	
			<article>
				<h3>
					Medical Center
				</h3>
				<p>	
					Es una empresa que tiene precencia en distintos estados del pais, son considerados lideres en tiendas medicas a nivel nacional.
				</p>	
			</article>
		</div>
		<a href="http://www.zonamedicasureste.com/" target="_blank">
			<div class="asociado">
			<img src="../img/Asociados/ZonaMedica.png" alt="">	
			<article>
				<h3>
						Zona Medica
				</h3>
				<p>	
					Son una distribuidora de equipo profesional de la salud, manejando marcas reconocidas a nivel mundial, contando entregas inmediatas y envíos a todo México. 
				</p>	
			</article>
		</div>
		<div class="titulopagina">Proveedores Oficiales</div>
		<a href="http://www.novabio.us/es/" target="_blank">
			<div class="asociado">
			<img src="../img/Asociados/nova.png" alt="">	
			<article>
				<h3>
					Nova Biomedica
				</h3>
				<p>	
					Nova Biomedical desarrolla, fabrica y vende tecnología de avanzada de analizadores de pruebas en sangre basados en técnicas de medición ópticas y electroquímicas. 
				</p>	
			</article>
		</div>
		<a href="http://www.dropsens.com/instrumentos_espectroelectroquimica.html" target="_blank">
			<div class="asociado">
			<img src="../img/Asociados/dropsense.png" alt="">	
			<article>
				<h3>
					Drop Sens
				</h3>
				<p>	
					DropSens es una Empresa Innovadora de Base Tecnológica, localizada en Oviedo (España), especializada en el desarrollo de instrumentos y dispositivos para la Investigación en Electroquímica.
				</p>	
			</article>
		</div>
		<a href="http://www.osasen.com/" target="_blank">
			<div class="asociado">
			<img src="../img/Asociados/osasen.png" alt="">	
			<article>
				<h3>
					Osasen
				</h3>
				<p>	
					Osasen tiene como objetivo el desarrollo de dispositivos y sistemas PoC rápidos y fiables y coste-eficientes basados en tecnología biosensórica.
				</p>	
			</article>
		</div>
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