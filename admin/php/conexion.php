<?php  
	$conexion = new mysqli("localhost","root","","bd_ims");
	if ($conexion) {
		// echo "SI";
	}
	else{
		echo "NO";
	}
?>