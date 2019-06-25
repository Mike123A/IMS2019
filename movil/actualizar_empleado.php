<?PHP
    $hostname="localhost";
    $database="imedical_prueba";
    $username="imedical_prueba";
    $password="eC5X_mHjL?sf";

    $conexion=mysqli_connect($hostname,$username,$password,$database);

	$clave = $_GET ['clave'];

	$nombre = $_GET ['nombre'];
	$apellido1 = $_GET ['apellido1'];
	$apellido2 = $_GET ['apellido2'];
	$fechanac = $_GET ['fechanac'];
	$correo = $_GET ['correo'];
	$direccion = $_GET ['direccion'];
	$telefono = $_GET ['telefono'];
	$fechacont = $_GET ['fechacont'];
	$usuario = $_GET ['usuario'];
	$contraseña = md5($_GET['contrasenia']);
	$tusuario = $_GET ['tipousuario'];


if ($contraseña != "") {
   				$contraseña =  md5($_POST ['Contraseña']);
   				$query ="UPDATE cat_empleados SET NombresEmp = '".$nombre."', Apellido1Emp=TRIM('$apellido1'),Apellido2Emp='$apellido2', FechaNacEmp='$fechanac', CorreoEmp='$correo',DireccionEmp='$direccion',TelefonoEmp='$telefono',FechaContEmp='$fechacont' WHERE idEmpleado = $clave;";
				$resultado = $conexion->query($query);
				if ($resultado) {
					$query1 = "UPDATE cat_usuarios SET Usuario='$usuario',Contrasenia='$contraseña',idtusuario=$tusuario WHERE idUsuario = $claveu";
					$resultado1 = $conexion->query($query1);
					if ($resultado1) {
						mysqli_close($conexion);
					
						header("Location: cat_empleados.php");
					}
					else{
					echo "No Insertado";
					}
				}else{
					echo "No Insertado";
				}

	   		}else{
	   			$query ="UPDATE cat_empleados SET NombresEmp = '".$nombre."', Apellido1Emp=TRIM('$apellido1'),Apellido2Emp='$apellido2', FechaNacEmp='$fechanac', CorreoEmp='$correo',DireccionEmp='$direccion',TelefonoEmp='$telefono',FechaContEmp='$fechacont' WHERE idEmpleado = $clave;";
				$resultado = $conexion->query($query);
				if ($resultado) {
					$query1 = "UPDATE cat_usuarios SET Usuario='$usuario',idtusuario=$tusuario WHERE idUsuario = $claveu";
					$resultado1 = $conexion->query($query1);
					if ($resultado1) {
						mysqli_close($conexion);
					
						header("Location: cat_empleados.php");
					}
					else{
					echo "No Insertado";
					}
				}else{
					echo "No Insertado";
				}


	   		}

	mysqli_close($conexion);
	
?>