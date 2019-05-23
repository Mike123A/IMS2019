<?php 
session_start();
$id = $_SESSION['idUsuario'];
// echo $id;
include "conexion.php";
$fecha = date('Y/m/d'); 
// echo $fecha;
// if(empty($_POST)){
	echo "1";
	$query = "INSERT INTO ventas(FechaVenta,idCliente,idEmpleado,totalVenta) VALUES ('$fecha','$id',0,654);";
	$resultado = $conexion->query($query);
	if($resultado){
	echo "2";

		$cart_id = $conexion->insert_id;
		foreach($_SESSION["cart"] as $c){
			$query = "INSERT INTO detalle_venta(idVenta,idProducto,Cantidad,Precio) VALUES ('$cart_id','$c[clave]','$c[cantidad]',45);";
			$resultado = $conexion->query($query);
			if($resultado){
				echo "3";

				unset($_SESSION["cart"]);
				print "<script>	window.location='productos.php';</script>";
			}
		}
	}
// }

?>