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




	$query = "DELETE FROM tbl_olci_head WHERE id = " . $id;
	mysqli_query($mysqli, $query);

	$query = "DELETE FROM tbl_olci_body WHERE id_head = " . $id;
	mysqli_query($mysqli, $query);


	if($id != 1)
	{
		$query = "DROP TABLE tbl_olci_body_" .$id ;
		mysqli_query($mysqli, $query);		
	}
	



	echo true;

?>



