<?php 
session_start();

$total= $_SESSION['total'];
$id = $_SESSION['idUsuario'];
// echo $id;
include "conexion.php";
$fecha = date('Y/m/d'); 
// echo $fecha;
// if(empty($_POST)){
	$query = "INSERT INTO ventas(FechaVenta,idCliente,idEmpleado,totalVenta,idestadoVenta) VALUES ('$fecha','$id',0,$total,1);";
	$resultado = $conexion->query($query);
	if($resultado){

		$cart_id = $conexion->insert_id;
		foreach($_SESSION["cart"] as $c){
			$query = "INSERT INTO detalle_venta(idVenta,idProducto,Cantidad,Precio) VALUES ('$cart_id','$c[clave]','$c[cantidad]',$c[precio]);";
			$resultado = $conexion->query($query);
			if($resultado){
				unset($_SESSION["cart"]);
				print "<script>	window.location='productos.php';</script>";
			}
		}
	
}

?>