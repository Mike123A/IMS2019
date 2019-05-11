<?php
	
	$clave = $_POST ['clave'];

	include("conexion.php"); 

	$nombre = $_POST ['Nombres'];

	
	$query = "UPDATE cat_tipousuarios SET tipousuario= '$nombre' WHERE idtusuario = ".$clave." ;";
	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_tusuarios.php");
	}else{
		echo "No Insertado";
	}


?>