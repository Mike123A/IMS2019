<?php

	include("conexion.php"); 
	$clave = $_POST ['clave'];
	$nombre = $_POST ['Nombres'];
	$apellidos = $_POST ['Apellidos'];
	$fechanac = $_POST ['FechaNac'];
	$correo = $_POST ['Correo'];
	$direccion = $_POST ['Direccion'];
	$telefono = $_POST ['Telefono'];
	$usuario = $_POST ['Usuario'];
	$contraseña = $_POST ['Contraseña'];
	
	$query ="UPDATE cat_empleados SET NombresEmp = '".$nombre."', ApellidosEmp='".$apellidos."', FechaNacEmp='".$fechanac."', CorreoEmp='".$correo."',DireccionEmp='".$direccion."',TelefonoEmp='".$telefono."',UsuarioEmp='".$usuario."',ContraseniaEmp='".$contraseña."' WHERE idEmpleado = ".$clave." ;";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_empleados.php");
	}else{
		echo "No Insertado";
	}


?>