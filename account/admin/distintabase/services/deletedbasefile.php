<?php

	$data = json_decode(file_get_contents("php://input")); 


	$servername = "localhost";
 	$username = "root";
 	$password = "sabmas01";
 	$dbname = "datagrid";
  
 	
	$mysqli = new mysqli($servername, $username, $password, $dbname);

 	$uid = mysqli_real_escape_string($mysqli, $data->id);

  
  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }


	$id = mysqli_real_escape_string($mysqli, $data->id);
	//var_dump($id);

	$query = "DELETE FROM tbl_olci_lista_distinta_base WHERE id = '" . $id ."'";
	//var_dump($query);
	mysqli_query($mysqli, $query);


	$query = "DROP TABLE tbl_olci_distinta_base_" .$uid;
	mysqli_query($mysqli, $query);

	echo true;

?>



