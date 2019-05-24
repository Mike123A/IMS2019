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




	// if (isset($_POST['CHECAR'])) {
	// 	echo $_POST['browsers.data-value'];
	// 	exit;
 //   	}

     // 				include("conexion.php");

					// $sql = "SELECT * FROM cat_productos WHERE estado = 'Alta'";

					// if(!$resultado = $conexion->query($sql)){
					// 	die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
					// }
					// while($fila = $resultado->fetch_assoc()){
					// 	echo "<option data-value=".$fila['idProducto']." value=".$fila['NombreProd']."></option>";
					// }
     			 
?>	
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
			<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
			    <input id="buscar" name="buscar" type="search" placeholder="Buscar aquí..." autofocus >
			    <input type="submit" name="buscador" class="boton peque aceptar" value="buscar">
			</form>
		</form>
		<label for="show">
		  	<span>[Mostrar]</span>
		</label>
		<input type="radio" id="show" name="group">

		<label for="hide">
			  <span>[Ocultar]</span>
		</label>
		<input type="radio" id="hide" name="group">

		<div id="content">
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
				</tr>
			</thead>
			
			<?php
				include("conexion.php");

				$sql = "SELECT * FROM cat_productos  WHERE estado = 'Alta'";

				if(!$resultado = $conexion->query($sql)){
					die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
				}
				mysqli_close($conexion);
				
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

    					<td> <img src='../../img/Productos/".$fila['ImagenProd']."'alt=''></td>";
    				echo "
    					<td>
    					<form action='agregar_carrito.php' method='post' class='BotonesDescProd'>
							<input style='display: none' type='number' required name='clave' placeholder='' value='".$fila['idProducto']."'/><br>
							<label for=''>Cuantos desea:</label> <br>
							<input type='number' value='1'name='cantidad'><br>
							<button type='submit' name='agregar' >Agregar</button>
							<br>
						</form>
    					</td>
						</tr>";
				}
			?>
		</table>	



		</div>
			

		
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>