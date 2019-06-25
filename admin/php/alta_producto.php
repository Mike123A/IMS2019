<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 4) {}
		else{
			header("Location: index.php");
		}
	}

	if (isset($_POST['Guardar'])) {
		include("conexion.php"); 

		$nombre = $_POST ['Nombres'];
		$Alto = $_POST ['Alto'];
		$Ancho = $_POST ['Ancho'];
		$Peso = $_POST ['Peso'];
		$Precio = $_POST ['Precio'];
		
		$Descripcion = $_POST ['Descripcion'];

		$bandera=0;
				
		$imagen = $_FILES['Imagen'];
		$nombreimagen = $imagen['name'];
		$type = $imagen['type'];
		$url_temp = $imagen['tmp_name'];

		$destino = '../../img/Productos/';
		$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
		$img_producto = $img_nombre.'.png';
		$src = $destino.$img_producto;

		$query = ("SELECT * FROM cat_productos WHERE nombreProd='$nombre'"); // inicio de mi consulta 
		$resultado = $conexion->query($query);
   		if(mysqli_num_rows($resultado)>0) { 
   			$bandera = 1;
      		$nombre = "";
      		echo "<script>alert('Ya ha sido registrado un producto con este nombre')</script>";

    	}
    	if($bandera == 0  ){

			

			$query = "INSERT INTO cat_productos(NombreProd,AltoProd,AnchoProd,PesoProd,DescripcionProd,PrecioProd,ImagenProd,estado) VALUES ('$nombre','$Alto','$Ancho','$Peso','$Descripcion','$Precio','$img_producto','Alta')";

			$resultado = $conexion->query($query);
			if ($resultado) {
				move_uploaded_file($url_temp,$src);
				mysqli_close($conexion);
	    		header("Location: cat_productos.php");
			}else{
				echo "No Insertado";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IMS</title>
	<link rel="stylesheet" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script> 

	<script type="text/javascript" src="../js/functions.js"></script>
</head>
<body>
	<?php include ("../includes/encabezado_sesion.php") ?>
	
	<?php include ("../includes/menu.php") ?>
	
	<section class="ContenedorPrincipal">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
		<h1>Alta de producto</h1>
		<br><br>
			<div style="/*-webkit-column-count:3*/-moz-column-count:2;column-count:2">
			<label>Nombre</label><br>
			<input type="text" required name="Nombres" placeholder="<?php if(isset($nombre) && $nombre ==''){ echo 'Intente con otro';}else{echo "Ej. Glucheck";} ?>" value="<?php if(isset($nombre)) {echo $nombre;}?>" maxlength="50" /><br>
			<label>Alto en centimetros</label><br>
			<input type="text" required name="Alto" placeholder="Ej. 10 cm" value="<?php if(isset($Alto)) {echo $Alto;}?>" pattern="[0-9]+" maxlength="5"/><br>
			<label>Ancho en centimetros</label><br>
			<input type="text" required name="Ancho" placeholder="Ej. 5cm" value="<?php if(isset($Ancho)) {echo $Ancho;}?>" pattern="[0-9]+" maxlength="5" /><br>
			<label>Peso en gramos</label><br>
			<input type="text" required name="Peso" placeholder="Ej. 300gr" value="<?php if(isset($Peso)) {echo $Peso;}?>" pattern="[0-9]+" maxlength="5"/><br>
			<label>Descripcion</label><br>
			<input type="textarea" required name="Descripcion" placeholder="Ej. Es un producto a travez del cual se puede medir la glucosa de una manera amigable para el paciente" value="<?php if(isset($Descripcion)) {echo $Descripcion;}?>" maxlength="300"/><br>
			<label>Precio</label><br>
			<input type="text" pattern="^[1-9][0-9]+" title="Solo numeros positivos, no puede iniciar con un 0"required name="Precio" placeholder="Ej. $450.00" value="<?php if(isset($Precio)) {echo $Precio;}?>" /><br>
			<div class="photo">
				<label for="Imagen">Imagen</label>
			        <div class="prevPhoto">
			        <span class="delPhoto notBlock">X</span>
			        <label for="Imagen"></label>
			        </div>
			        <div class="upimg">
			        <input type="file" name="Imagen" id="Imagen">
			        </div>
			        <div id="form_alert"></div>
			</div>
<br> 	<br>	
			
		</div>
			<br> 	<br>	
			<a href="cat_productos.php"><input id="btn_cancelar" type="button" value="Cancelar" name="Cancelar"></a>
			<input id="btn_aceptar" type="submit" value="Guardar" name="Guardar">		
			<br><br><br>		

		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	
</body>
</html>