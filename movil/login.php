<?PHP
$hostname="localhost";
$database="imedical_bd_ims";
$username="imedical_root";
$password="&aFPdS21t-oz";
$json=array();
	if(isset($_GET["user"]) && isset($_GET["pass"])){
		$user=$_GET['user'];
		$pass=md5($_GET['pass']);
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		$consulta="SELECT * FROM cat_usuarios WHERE Usuario = '{$user}' AND Contrasenia = '{$pass}'";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){
		
			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}



		else{
			$results["user"]='';
			$results["pwd"]='';
			$results["names"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{
		   	$results["user"]='';
			$results["pwd"]='';
			$results["names"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>