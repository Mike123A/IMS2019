<?php
	$clave = $_POST ['clave'];

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
	
	$query ="UPDATE cat_empleados SET NombresEmp = '".$nombre."', Apellido1Emp='".$apellido1."',Apellido2Emp='".$apellido2."', FechaNacEmp='".$fechanac."', CorreoEmp='".$correo."',DireccionEmp='".$direccion."',TelefonoEmp='".$telefono."',FechaContEmp='".$fechacont."',UsuarioEmp='".$usuario."',ContraseniaEmp='".$contraseña."',NivelUsuario='".$NUsuario."' WHERE idEmpleado = ".$clave." ;";

	$resultado = $conexion->query($query);
	if ($resultado) {
		header("Location: cat_empleados.php");
	}else{
		echo "No Insertado";
	}


?>