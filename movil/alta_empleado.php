<?PHP
    $hostname="localhost";
    $database="imedical_prueba";
    $username="imedical_prueba";
    $password="eC5X_mHjL?sf";

    $conexion=mysqli_connect($hostname,$username,$password,$database);


	$nombre = $_GET ['nombre'];
	$apellido1 = $_GET ['apellido1'];
	$apellido2 = $_GET ['apellido2'];
	$fechanac = $_GET ['fechanac'];
	$correo = $_GET ['correo'];
	$direccion = $_GET ['direccion'];
	$telefono = $_GET ['telefono'];
	$fechacont = $_GET ['fechacont'];
	$usuario = $_GET ['usuario'];
	$contrasenia = md5($_GET['contrasenia']);
	$tusuario = $_GET ['tipousuario'] + 1;


    $conexion->query("INSERT INTO cat_usuarios(Usuario, Contrasenia, idtusuario, estado) VALUES ('$usuario','$contrasenia','$tusuario','Alta');");
    
    $query = "SELECT idUsuario FROM cat_usuarios WHERE Usuario = '$usuario' ORDER BY idUsuario DESC";
    $resultado = $conexion->query($query);
    $fila = $resultado->fetch_assoc();
    $idUsuario = $fila['idUsuario'];
    
    $conexion->query("INSERT INTO cat_empleados(NombresEmp, Apellido1Emp,Apellido2Emp, FechaNacEmp, CorreoEmp, DireccionEmp, TelefonoEmp, FechaContEmp, idUsuario) VALUES ('$nombre','$apellido1','$apellido2','$fechanac','$correo','$direccion','$telefono','$fechacont','$idUsuario');");
    
    mysqli_close();


	
?>