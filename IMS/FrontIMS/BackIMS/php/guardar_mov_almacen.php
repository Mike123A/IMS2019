<?php

	include("conexion.php"); 

	$idProd = $_POST ['producto'];
	$TMov = $_POST ['tmov'];
	$Cantidad = $_POST ['Cantidad'];
	$fecha = date('Y/m/d'); 

	$query = "INSERT INTO almacen_productos(FechaMov,idProducto, tipo_movimiento, Cantidad) VALUES ('$fecha','$idProd','$TMov','$Cantidad');";
	$resultado = $conexion->query($query);
	if ($resultado) {
		if ($TMov == "Entrada"){
			$query = "UPDATE cat_productos SET StockProd = (StockProd + $Cantidad) WHERE idProducto = $idProd";
			$resultado = $conexion->query($query);
		}else{
			if ($TMov == "Salida"){
			$query = "UPDATE cat_productos SET StockProd = (StockProd - $Cantidad) WHERE idProducto = $idProd";
			$resultado = $conexion->query($query);
		}
		}
		header("Location: almacen_productos.php");
	}else{
		echo "No Insertado";
	}
	


?>