<?php



$data = json_decode(file_get_contents("php://input")); 


	$servername = "localhost";
 	$username = "root";
 	$password = "sabmas01";
 	$dbname = "datagrid";
  
 	$mysqli = new mysqli($servername, $username, $password, $dbname);
  
  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }


	$id = mysqli_real_escape_string($mysqli, $data->id);

	$query = "truncate table tbl_olci_head";
	mysqli_query($mysqli, $query);
	
	$query = "truncate table tbl_olci_body";
	mysqli_query($mysqli, $query);
	
	echo true;

?>




