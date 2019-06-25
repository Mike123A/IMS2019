<?php
include('functions.php'); 
if ($resultset = getSQLResultSet("SELECT * FROM cat_tipousuarios")) {
	
    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
    	echo json_encode($row);
		
    	
    	}
    	
   }
   
?>
