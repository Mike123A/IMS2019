<?php
/*
* Eliminar un producto del carrito
*/
session_start();
if(!empty($_SESSION["cart"])){
	$cart  = $_SESSION["cart"];
	if(count($cart)==1){ unset($_SESSION["cart"]); }
	else{
		$newcart = array();
		foreach($cart as $c){
			if($c["clave"]!=$_GET["clave"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["cart"] = $newcart;
	}
}
	header("Location:".$_SERVER['HTTP_REFERER']);  
?>

