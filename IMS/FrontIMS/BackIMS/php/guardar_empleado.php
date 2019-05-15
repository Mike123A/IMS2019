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
	$tusuario = $_POST ['tipousuario'];
	
	

	$query = "INSERT INTO cat_usuarios(Usuario, Contrasenia, idtusuario, estado) VALUES ('$usuario','$contraseña','$tusuario','Alta');";
	$resultado = $conexion->query($query);
	if ($resultado) {
		$query = "SELECT idUsuario FROM cat_usuarios WHERE Usuario = '$usuario'";
		$resultado = $conexion->query($query);
		$fila = $resultado->fetch_assoc();
		$idUsuario = $fila['idUsuario'];
		$query = "INSERT INTO cat_empleados(NombresEmp, Apellido1Emp,Apellido2Emp, FechaNacEmp, CorreoEmp, DireccionEmp, TelefonoEmp, FechaContEmp, idUsuario) VALUES ('$nombre','$apellido1','$apellido2','$fechanac','$correo','$direccion','$telefono','$fechacont','$idUsuario');";
		$resultado = $conexion->query($query);
		header("Location: cat_empleados.php");
	}else{
		echo "No Insertado";
	}
	

?>