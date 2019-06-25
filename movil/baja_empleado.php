<?PHP
    $hostname="localhost";
    $database="imedical_prueba";
    $username="imedical_prueba";
    $password="eC5X_mHjL?sf";

    $conexion=mysqli_connect($hostname,$username,$password,$database);

	$clave = $_GET ['clave'];

	$query = "SELECT idUsuario FROM cat_empleados WHERE idEmpleado = '$clave' ORDER BY idUsuario DESC";
	$resultado = $conexion->query($query);
	$fila = $resultado->fetch_assoc();
	$idUsuario = $fila['idUsuario'];

	$query1 = "UPDATE cat_usuarios SET estado = 'Baja' WHERE idUsuario = $idUsuario;";


	$resultado1 = $conexion->query($query1);

	mysqli_close($conexion);
	
?>