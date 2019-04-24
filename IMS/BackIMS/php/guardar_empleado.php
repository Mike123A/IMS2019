<?php

	include("conexion.php"); 

	$nombre = $_POST ['Nombres'];
	$apellidos = $_POST ['Apellidos'];
	$fechanac = $_POST ['FechaNac'];
	$correo = $_POST ['Correo'];
	$direccion = $_POST ['Direccion'];
	$telefono = $_POST ['Telefono'];
	$usuario = $_POST ['Usuario'];
	$contraseña = $_POST ['Contraseña'];


	$query = "INSERT INTO cat_empleados(NombresEmp, ApellidosEmp, FechaNacEmp, CorreoEmp, DireccionEmp, TelefonoEmp, UsuarioEmp, ContraseniaEmp) VALUES ('$nombre','$apellidos','$fechanac','$correo','$direccion','$telefono','$usuario','$contraseña')";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_empleados.php");
	}else{
		echo "No Insertado";
	}


?>