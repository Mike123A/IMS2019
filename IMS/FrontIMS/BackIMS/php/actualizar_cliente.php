<?php
	
	$clave = $_POST ['clave'];
	$claveu = $_POST ['claveu'];

	include("conexion.php"); 

	$nombre = $_POST ['Nombres'];
	$apellido1 = $_POST ['Apellido1'];
	$apellido2 = $_POST ['Apellido2'];
	$direccion = $_POST ['Direccion'];	
	$telefono = $_POST ['Telefono'];
	$correo = $_POST ['Correo'];
	$rfc = $_POST ['RFC'];
	$usuario = $_POST ['Usuario'];
	$contraseña = $_POST ['Contraseña'];

	
	$query = "UPDATE cat_clientes SET NombreCli = '".$nombre."', Apellido1Cli='".$apellido1."', Apellido2Cli='".$apellido2."', DireccionCli='".$direccion."',TelefonoCli='".$telefono."',CorreoCli='".$correo."',RFC='".$rfc."' WHERE idCliente = ".$clave." ;";
	$resultado = $conexion->query($query);
	if ($resultado) {
		$query1 = "UPDATE cat_usuarios SET Usuario='$usuario',Contrasenia='$contraseña' WHERE idUsuario = $claveu ;";
		$resultado1 = $conexion->query($query1);
		if ($resultado1) {
		
			header("Location: cat_clientes.php");
		}
		else{
		echo "No Insertado";
		}
	}else{
		echo "No Insertado";
	}


?>