<?php 
session_start();

if (isset($_SESSION['cliente'])) {
	$total= $_SESSION['total'];
	$ide = $_SESSION['idUsuario'];
	$idc = $_SESSION['cliente'];
	// echo $id;
	include "conexion.php";
	$fecha = date('Y/m/d'); 
	// echo $fecha;
	// if(empty($_POST)){
	$query = "INSERT INTO ventas(FechaVenta,idCliente,idEmpleado,totalVenta,idestadoVenta) VALUES ('$fecha','$idc','$ide',$total,1);";
	$resultado = $conexion->query($query);
	if($resultado){
		$cart_id = $conexion->insert_id;
		foreach($_SESSION["cart"] as $c){
			$query = "INSERT INTO detalle_venta(idVenta,idProducto,Cantidad,Precio) VALUES ('$cart_id','$c[clave]','$c[cantidad]',$c[precio]);";
			$resultado = $conexion->query($query);
		}
		foreach($_SESSION["cart"] as $c){
			$query = "UPDATE cat_productos SET StockProd = (StockProd-$c[cantidad]) WHERE idProducto = $c[clave] ";
			$resultado = $conexion->query($query);
			if($resultado){
				unset($_SESSION["cart"]);
				unset($_SESSION["cliente"]);
				print "<script>	window.open('../pdf/factura.php?clave=$cart_id');</script>";
				print "<script>	window.location='ventas.php?nuevo';</script>";
			}
		}
		
	}
	
}else{
	print "<script>alert('Debes seleccionar a un cliente.');</script>";
	print "<script>	window.location='nueva_venta.php';</script>";

}



?>