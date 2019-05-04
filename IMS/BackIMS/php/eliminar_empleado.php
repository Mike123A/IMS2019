<?php

	include("conexion.php"); 
	$clave = $_GET['clave'];

	
	$query ="DELETE FROM cat_empleados WHERE idEmpleado=".$clave.";";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_empleados.php");
	}else{
		echo "No eliminado";
	}


?>