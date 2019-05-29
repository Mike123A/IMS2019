<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['active']){
			// echo "HOLA MUNDO";
		}
		else
			header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<header class="encabezado_sesion">
		<a href="cerrar_sesion.php"><img src="../img/cerrar-sesion.png" alt=""></a>

		<label for=""><?php 
		$fecha = new DateTime('NOW');
		date_default_timezone_set('America/Mexico_City');
    	setlocale(LC_TIME, 'es_MX.UTF-8');
		echo 'Merida, Yucatan, '.date('d-m-Y').' | '; 
		echo 'Usuario: '.$_SESSION['Usuario']; 
		?></label>
	</header>
	<section class="ContenedorPrincipal">
		<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
			<a href="php/ventas_linea.php">
				<div class="MenuIndex">
					<img src="img/iconosmenu/ventas_online.png" alt=""><br>
					<label for="">Ventas Online</label>
				</div>
			</a>
		<?php } ?>
		<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
		<a href="php/ventas.php">
			<div class="MenuIndex">
				<img src="img/iconosmenu/ventas_mostrador.png" alt=""><br>
				<label for="">Ventas mostrador</label>
			</div>
		</a>
		<?php } ?>
		<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) { ?>		
		<a href="php/almacen_productos.php">
			<div class="MenuIndex">
				<img src="img/iconosmenu/almacen.png" alt=""><br>
				<label for="">Almacen</label>
			</div>
		</a>
		<?php } ?>
		<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) { ?>
		<a href="php/cat_productos.php">
			<div class="MenuIndex">
				<img src="img/iconosmenu/productos.png" alt=""><br>
				<label for="">Productos</label>
			</div>
		</a>
		<?php } ?>
		<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
		<a href="php/cat_clientes.php">
			<div class="MenuIndex">
				<img src="img/iconosmenu/clientes.png" alt=""><br>
				<label for="">Clientes</label>
			</div>
		</a>
		<?php } ?>	
		<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 2) { ?>
		<a href="php/cat_empleados.php">
			<div class="MenuIndex">
				<img src="img/iconosmenu/empleados.png" alt=""><br>
				<label for="">Empleados</label>
			</div>
		</a>
		<?php } ?>
		<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 2) { ?>
		<a href="php/cat_tusuarios.php">
			<div class="MenuIndex">
				<img src="img/iconosmenu/tipos_usuarios.png" alt=""><br>
				<label for="">Tipos de usuarios</label>
			</div>
		</a>
		<?php } ?>
		<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
		<a href="php/cat_eventa.php">
			<div class="MenuIndex">
				<img src="img/iconosmenu/etapas_ventas.png" alt=""><br>
				<label for="">Etapas de venta</label>
			</div>
		</a>
		<?php } ?>
		<?php if ($_SESSION['idtusuario'] == 1) { ?>
		<a href="php/reportes.php">
			<div class="MenuIndex">
				<img src="img/iconosmenu/reportes.png" alt=""><br>
				<label for="">Reportes</label>
			</div>
		</a>
		<?php } ?>
		

		

	</section>
	
	
	
</body>
</html>