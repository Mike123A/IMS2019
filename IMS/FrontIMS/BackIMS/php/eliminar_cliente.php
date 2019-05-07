<?php

	include("conexion.php"); 
	$clave = $_GET['clave'];

	
	$query ="DELETE FROM cat_clientes WHERE idCliente=".$clave.";";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_clientes.php");
	}else{
		echo "No eliminado";
	}


?>