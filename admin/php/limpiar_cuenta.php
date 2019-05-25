<?php 
	session_start();
	if (isset($_SESSION["cart"])) {
		unset($_SESSION["cart"]);
	}
	if (isset($_SESSION["cliente"])) {
		unset($_SESSION["cliente"]);
	}
	print "<script>	window.location='ventas.php';</script>";
 ?>