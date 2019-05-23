<?php
	session_start(); 	
	if (empty($_SESSION['active'])) {
		header("Location: ../");
	}else{
		if ($_SESSION['idtusuario'] == 1 || $_SESSION['idtusuario'] == 3) {}
		else{
			header("Location: index.php");
		}
	}

	include("conexion.php"); 
	$clave = $_GET['clave'];
	$nume = $_GET['estado'];
	// $sql = "SELECT * FROM avisos";
	// $result = mysqli_query($sql);
	// $numero = mysqli_num_rows($result);
	// echo 'Número de total de registros: ' . $numero;
	// echo 'Número de total de registros: ' . $nume;

	// $query ="UPDATE ventas SET idestadoVenta = idestadoVenta+1 WHERE idVenta = ".$clave." ;";
	// $resultado = $conexion->query($query);
	// if ($resultado) {
	// 	mysqli_close($conexion);

	// 	header("Location: ventas.php");
	// }else{
	// 	echo "No eliminado";
	// }


?>