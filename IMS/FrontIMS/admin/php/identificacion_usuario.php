<?php
	if(isset($_POST["enviar"])) {

 

		include("php/conexion.php");

 

			$loginNombre = $_POST["usuario"];

			$loginPassword = $_POST["password"];

 

			$consulta = "SELECT * FROM cat_usuarios WHERE Usuario='$loginNombre' AND Contrasenia='$loginPassword'";

 

			if($resultado = $mysqli->query($consulta)) {

				while($row = $resultado->fetch_array()) {

 

					$userok = $row["usuario"];

					$passok = $row["password"];

				}

				$resultado->close();

			}


			$mysqli->close();

			if($loginNombre == $userok && $loginPassword == $passok) {

				session_start();

				$_SESSION["logueado"] = TRUE;

				header("Location: php/cat_productos.php");

 

			}

			else {

				Header("Location: ../index.php?error=login");

			}
		} else {

			header("Location: ../index.php");

		}

 

 ?>