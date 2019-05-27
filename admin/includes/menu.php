<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<!-- <link rel="stylesheet" href="../css/estilo.css"> -->
</head>
<body>
	<header>

		<nav>
			<a href="index.php"><img src="../img/LogoConNombreBlanco.png"></a>
			<ul>
				<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
				<li><a href="#">[VENTAS]</a>
					<ul>
						<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
						<li><a href="ventas_linea.php">Venta en linea</a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
						<li><a href="ventas.php">Venta mostrador</a></li>
						<?php }?>
					</ul>

				</li>
				<?php } ?>

				<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) { ?>
				<li><a href="almacen_productos.php">[ALMACEN]</a></li>
				<?php } ?>
				<li><a href="#">[CATALOGOS]</a>
					<ul>
						<?php if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) { ?>
						<li><a href="cat_productos.php">Productos</a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
						<li><a href="cat_clientes.php">Clientes</a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 2) { ?>
						<li><a href="cat_empleados.php">Empleados</a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 2) { ?>
						<li><a href="cat_tusuarios.php">Tipos Usuarios </a></li>
						<?php }if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) { ?>
						<li><a href="cat_eventa.php">Etapas de venta </a></li>
						<?php } ?>

					</ul>
				</li>
				<?php if ($_SESSION['idtusuario'] == 1 ) { ?>
				<li><a href="#">[REPORTES]</a>
					<ul>
						<li><a href="#">Usuarios</a></li>
						<li><a href="#">Empleados</a></li>
						<li><a href="#">Clientes</a></li>
						<li><a href="#">Ventas</a></li>
						<li><a href="#">Productos</a></li>
						<li><a href="Respaldo.php">Respaldo BD</a></li>
					</ul>
				</li>
				<?php } ?>
				<!-- <li><a href="cerrar_sesion.php">ADMIN1478 |Cerrar Sesion</a></li> -->
			</ul>
		</nav>
	</header>	
</body>
</html>