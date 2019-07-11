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
		$Imagen = $_POST ['img11'];
		echo $_POST ['img11'];
		include("conexion.php"); 

		$clave = $_POST ['clave'];
		
		$nombre = $_POST ['Nombres'];
		$Alto = $_POST ['Alto'];
		$Ancho = $_POST ['Ancho'];
		$Peso = $_POST ['Peso'];
		$Descripcion = $_POST ['Descripcion'];
		$Precio = $_POST ['Precio'];

		$sql1 = "SELECT * FROM cat_productos WHERE idProducto = $clave";
		if(!$resultado1 = $conexion->query($sql1)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		};
		$fila = $resultado1->fetch_assoc();
		if ($fila['NombreProd']!= $nombre) {
			
			$query = ("SELECT * FROM cat_productos WHERE NombreProd='$nombre'"); // inicio de mi consulta 
			$resultado = $conexion->query($query);
			$direccionimagen = "../..//img/Productos/".$fila['ImagenProd'];
   			
   			if(mysqli_num_rows($resultado)>0) { 
   				$bandera = 1;
   				$bandera1 = 1;
      			$nombre = "";

    		}
		}
    	if($bandera == 0){

			$imagen = $_FILES['Imagen'];
			if ($imagen['name']== "") {
				$query = "UPDATE cat_productos SET NombreProd = '".$nombre."' , AltoProd = '".$Alto."' , AnchoProd = '".$Ancho."', PesoProd = '".$Peso."', DescripcionProd = '".$Descripcion."' , PrecioProd = '".$Precio."' WHERE idProducto = ".$clave." ;";

				$resultado = $conexion->query($query);
				if ($resultado) {
					mysqli_close($conexion);
					header("Location: cat_productos.php?act");

				}
				else{
					echo "No Insertado";
				}	
			}else{
				$nombreimagen = $imagen['name'];
				$type = $imagen['type'];
				$url_temp = $imagen['tmp_name'];

				$destino = '../../img/Productos/';
				$img_nombre = 'img_'.md5(date('d-m-Y H:m:s'));
				$img_producto = $img_nombre.'.png';
				$src = $destino.$img_producto;

				$query1 = "SELECT ImagenProd FROM cat_productos WHERE idProducto =".$clave.";";
				$resultado1 = $conexion->query($query1);
				$fila = $resultado1->fetch_assoc();

				$query = "UPDATE cat_productos SET NombreProd = '".$nombre."' , AltoProd = '".$Alto."' , AnchoProd = '".$Ancho."', PesoProd = '".$Peso."', DescripcionProd = '".$Descripcion."' , PrecioProd = '".$Precio."',ImagenProd = '".$img_producto."' WHERE idProducto = ".$clave." ;";

				$resultado = $conexion->query($query);
				if ($resultado) {
					mysqli_close($conexion);
					
					unlink("../../img/Productos/".$fila['ImagenProd']);
					move_uploaded_file($url_temp,$src);
					header("Location: cat_productos.php?act");
				}
				else{
					echo "No Insertado";
				}
			}	
		}
	}else{
		$clave = $_GET['clave'];
		include("conexion.php");
		$sql = "SELECT * FROM cat_productos WHERE idProducto=".$clave.";";

		if(!$resultado = $conexion->query($sql)){
			die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
		}
		$fila = $resultado->fetch_assoc();
		$classremove = '';
		$Imagen = '<img id="img" src="../../img/Productos/'.$fila['ImagenProd'].'" alt="">';

		// $direccionimagen = "../../img/Productos/".$fila['ImagenProd'];

		$nombre = $fila['NombreProd'];
		$Alto = $fila['AltoProd'];
		$Ancho = $fila['AnchoProd'];
		$Peso = $fila['PesoProd'];
		$Descripcion = $fila['DescripcionProd'];
		$Precio = $fila['PrecioProd'];
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
	<script src="../js/sweetalert2.all.min.js"></script>
      
     <?php 
	if (isset($bandera1)) {
    echo "<script type='text/javascript'> Swal.fire({        
        type: 'error',
        title: 'Error',
        text: '¡Ya hay un producto registrado con este nombre!',        
    }); </script>"; 


}


 ?>
	<?php include ("../includes/encabezado_sesion.php") ?>
	
	<?php include ("../includes/menu.php") ?>
	<section class="ContenedorPrincipal">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
		
		<h1>Cambios al producto: <?php echo $fila['idProducto']; ?> </h1>
		<br><br>
			<div style="/*-webkit-column-count:3*/-moz-column-count:2;column-count:2">
		<input style="display: none" type="text" required name="clave" placeholder="" value="<?php echo $fila['idProducto'];?>" />
		



		<br>
			<label>Nombre</label><br>
			<input type="text" required name="Nombres" placeholder="<?php if(isset($nombre) && $nombre ==''){ echo 'Intente con otro';}else{echo "Aqui va el nombre";} ?>" value="<?php if(isset($nombre)) {echo $nombre;}?>" maxlength="50" /><br>
			<label>Alto en centimetros</label><br>
			<input type="text" required name="Alto" placeholder="Aqui va el alto" value="<?php if(isset($Alto)) {echo $Alto;}?>" pattern="[0-9]+" maxlength="5"/><br>
			<label>Ancho en centimetros</label><br>
			<input type="text" required name="Ancho" placeholder="Aqui va el ancho" value="<?php if(isset($Ancho)) {echo $Ancho;}?>" pattern="[0-9]+" maxlength="5" /><br>
			<label>Peso en gramos</label><br>
			<input type="text" required name="Peso" placeholder="Aqui va el peso" value="<?php if(isset($Peso)) {echo $Peso;}?>" pattern="[0-9]+" maxlength="5"/><br>
			<label>Descripcion</label><br>
			<input type="textarea" required name="Descripcion" placeholder="Descripcion" value="<?php if(isset($Descripcion)) {echo $Descripcion;}?>" maxlength="300"/><br><br>
			<label>Precio</label><br>
			<input type="text" pattern="^[1-9][0-9]+" title="Solo numeros positivos, no puede iniciar con un 0"required name="Precio" placeholder="Aqui va el precio" value="<?php if(isset($Precio)) {echo $Precio;}?>" /><br>

			<input style="display: none" type="text" name="img11" placeholder="" value="<?php $Imagen; ?>" >
			
			<br>
			<div class="photo">
				<label for="Imagen">Imagen</label>
			        <div class="prevPhoto">
			        <label for="Imagen"></label>
			        <?php echo $Imagen; ?>
			        </div>
			        <div class="upimg">
			        <input type="file" name="Imagen" id="Imagen" >
			        </div>
			        <div id="form_alert"></div>
			</div>
			<br><br><br>
			</div><br> 	<br>	
			<a href="cat_productos.php"><input id="btn_cancelar" type="button" value="Cancelar" name="Cancelar"></a>
			<input id="btn_aceptar" type="submit" value="Guardar" name="Guardar">		
			<br><br><br><br>
		</form>
	</section>
	<?php include ("../includes/footer.php") ?>
	
	
</body>
</html>