<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] > 0){
			// echo "HOLA MUNDO";
		}
		else
			header("Location: ../index.php");
	};

	include("php/conexion.php");


	$id=$_SESSION['idtusuario'];
	$sql = "SELECT * FROM cat_tipousuarios WHERE idtusuario = $id";

	if(!$resultado = $conexion->query($sql)){
		die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
	}
	mysqli_close($conexion);
				
	$fila = $resultado->fetch_assoc();

	$tipo = $fila['tipousuario'];
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
		<a href="php/cerrar_sesion.php"><img src="../img/cerrar-sesion.png" alt=""></a>

		<label for=""><?php 
		$fecha = new DateTime('NOW');
		date_default_timezone_set('America/Mexico_City');
    	setlocale(LC_TIME, 'es_MX.UTF-8');
		echo 'Merida, Yucatan, '.date('d-m-Y').' | '; 
		echo 'Usuario: '.$_SESSION['Usuario']; 






		?></label>
	</header>
	<header>

		<nav>
			<a href="index.php"><img src="img/LogoConNombreBlanco.png"></a>
			<ul>
				<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
				<li><a href="#">[VENTAS]</a>
					<ul>
						<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
						<li><a href="php/ventas_linea.php">Venta en linea</a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
						<li><a href="php/ventas.php">Venta mostrador</a></li>
						<?php }?>
					</ul>

				</li>
				<?php } ?>

				<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) { ?>
				<li><a href="php/almacen_productos.php">[ALMACEN]</a></li>
				<?php } ?>
				<li><a href="#">[CATALOGOS]</a>
					<ul>
						<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) { ?>
						<li><a href="php/cat_productos.php">Productos</a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
						<li><a href="php/cat_clientes.php">Clientes</a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 2) { ?>
						<li><a href="php/cat_empleados.php">Empleados</a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 2) { ?>
						<li><a href="php/cat_tusuarios.php">Tipos Usuarios </a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
						<li><a href="php/cat_eventa.php">Etapas de venta </a></li>
						<?php } ?>

					</ul>
				</li>
				<?php if ($_SESSION['idtusuario'] == 1 ) { ?>
				<li><a href="php/reportes.php">[REPORTES]</a></li>
				<?php } ?>
				<a href="php/actualizar_perfil.php"><img src="../img/SesionIcono.png"></a>
			</ul>
		</nav>
	</header>	
	

	<section class="ContenedorPrincipal">

	<article id="leyenda">
		<header>Bienvenido!!!</header>

		Haz iniciado sesion como un empleado de Innovative Medical Solutions, segun tienes un perfil de acceso de tipo "<?php echo $tipo; ?>" y segun este son los permisos que tienes, en la parte inferior podras accesar de manera directa a las actividades.
		 <br>
		<header>Accesos directos:</header><br>

	</article>




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