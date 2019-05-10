<?php
	$clave = $_POST ['clave'];
	$claveu = $_POST ['claveu'];

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
	
	$query ="UPDATE cat_empleados SET NombresEmp = '".$nombre."', Apellido1Emp=TRIM('$apellido1'),Apellido2Emp='$apellido2', FechaNacEmp='$fechanac', CorreoEmp='$correo',DireccionEmp='$direccion',TelefonoEmp='$telefono',FechaContEmp='$fechacont' WHERE idEmpleado = $clave;";
	$resultado = $conexion->query($query);
	if ($resultado) {
		$query1 = "UPDATE cat_usuarios SET Usuario='$usuario',Contrasenia='$contraseña',idtusuario=$tusuario WHERE idUsuario = $claveu";
		$resultado1 = $conexion->query($query1);
		if ($resultado1) {
		
			header("Location: cat_empleados.php");
		}
		else{
		echo "No Insertado";
		}
	}else{
		echo "No Insertado";
	}


?>