<?php
/*
* Agrega el producto a la variable de sesion de productos.
*/
session_start();
	if (empty($_SESSION['active'])) {
		header("Location: productos.php#openModal");
		exit;
	}

if(!empty($_POST)){
	if(isset($_POST["clave"]) && isset($_POST["cantidad"])){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["cart"])){
			$_SESSION["cart"]=array( array("clave"=>$_POST["clave"],"cantidad"=> $_POST["cantidad"],"precio"=> $_POST["precio"]));
		}else{
			// apartie del segundo producto:
			$cart = $_SESSION["cart"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($cart as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["clave"]==$_POST["clave"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Este producto ya esta en el carrito.');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
				array_push($cart, array("clave"=>$_POST["clave"],"cantidad"=> $_POST["cantidad"],"precio"=> $_POST["precio"]));
				$_SESSION["cart"] = $cart;
			}
		}
		header("Location:".$_SERVER['HTTP_REFERER']);  

	}
}

?>