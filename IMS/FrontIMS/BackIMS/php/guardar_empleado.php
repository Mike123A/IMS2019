<?php

	include("conexion.php"); 

	$nombre = $_POST ['Nombres'];
	$apellido1 = $_POST ['Apellido1'];
	$apellido2 = $_POST ['Apellido2'];
	$fechanac = $_POST ['FechaNac'];
	$correo = $_POST ['Correo'];
	$direccion = $_POST ['Direccion'];
	$telefono = $_POST ['Telefono'];
	$fechacont = $_POST ['FechaCont'];
	$usuario = $_POST ['Usuario'];
	$contraseña = $_POST ['Contraseña'];
	$NUsuario = $_POST ['NUsuario'];



	$query = "INSERT INTO cat_empleados(NombresEmp, Apellido1Emp,Apellido2Emp, FechaNacEmp, CorreoEmp, DireccionEmp, TelefonoEmp, FechaContEmp, UsuarioEmp, ContraseniaEmp,NivelUsuario) VALUES ('$nombre','$apellido1','$apellido2','$fechanac','$correo','$direccion','$telefono','$fechacont','$usuario','$contraseña','$NUsuario')";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_empleados.php");
	}else{
		echo "No Insertado";
	}


?>