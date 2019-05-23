<header>
	
		<nav>
			<?php
			session_start(); 	
			if (isset($_SESSION['active'])) {
				echo "<div class='encabezado_sesion'><a href='cerrar_sesion.php'><img src='../img/cerrar-sesion.png' alt=''></a>";
				$fecha = new DateTime('NOW');
				date_default_timezone_set('America/Mexico_City');
    			setlocale(LC_TIME, 'es_MX.UTF-8');
				echo "<label>Merida, Yucatan, ".date('d-m-Y')." | 'Usuario: ".$_SESSION['Usuario']."</label></div>";
			}
			?>
			<a href="nosotros.php"><img src="../img/LogoBlanco.png"></a>	
			<ul>
				<li><a href="index.php">[ Inicio ]</a></li>
				<li><a href="nosotros.php">[ Nosotros ]</a></li>
				<li><a href="productos.php">[ Productos ]</a></li>
				<li><a href="Asociados.php">[ Asociados ]</a></li>
				<li><a href="Contacto.php">[ Contacto ]</a></li>
				
				<a href="cuenta.php"><img src="../img/carrito-de-la-compra.png"></a>
				
				<?php if (!isset($_SESSION['active'])) {?>
				<a href="#openModal"><img src="../img/SesionIcono.png"></a>

				<div id="openModal" class="modalDialog">
					<div>
						<a href="#close" title="Close" class="close">X</a>
						<br>
						<?php 
							include("login.php");
						?>
					</div>
				</div>	
				<?php }?>
				

				
			</ul>
		</nav>
	</header>