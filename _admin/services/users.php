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


  $sql = "SELECT * FROM account";
  $result = mysqli_query($mysqli, $sql);



$arr = array();

	if(mysqli_num_rows($result) != 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$arr[] = $row;

		}
	}



mysqli_free_result($result);
echo $json_info = json_encode($arr);
  