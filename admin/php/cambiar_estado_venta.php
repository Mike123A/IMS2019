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
	// echo $clave;
	// echo $nume;
	$query = ("SELECT * FROM cat_estadosventa"); // inicio de mi consulta 
	$resultado = $conexion->query($query);
	$numero = mysqli_num_rows($resultado);
	// echo 'Número de total de registros: ' . $numero;
	// echo 'Número de total de registros: ' . $nume;
	if ($nume < $numero) {
		$query ="UPDATE ventas SET idestadoVenta = idestadoVenta+1 WHERE idVenta = ".$clave." ;";
		$resultado = $conexion->query($query);
		if ($resultado) {
			mysqli_close($conexion);

			header("Location: ventas_linea.php");
		}else{
			echo "No eliminado";
		}
	}else{
		print "<script>alert('Esta venta ya esta en la estapa final.');</script>";
		print "<script>window.location='ventas_linea.php';</script>";


	}
	//


?>