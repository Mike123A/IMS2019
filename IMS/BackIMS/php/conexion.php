<?php  
	$conexion = new mysqli("localhost","root","","prueba_ims");
	if ($conexion) {
		// echo "SI";
	}
	else{
		echo "NO";
	}
?>