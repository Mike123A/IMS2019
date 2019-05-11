<?php

	include("conexion.php"); 

	$nombre = $_POST ['Nombres'];


	$query = "INSERT INTO cat_tipousuarios(tipousuario) VALUES ('$nombre');";
	$resultado = $conexion->query($query);
	if ($resultado) {
		
		header("Location: cat_tusuarios.php");
	}else{
		echo "No Insertado";
	}
	


?>