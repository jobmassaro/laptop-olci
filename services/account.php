<?php
session_start();

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

$name = mysqli_real_escape_string($mysqli, $data->name);
$password = mysqli_real_escape_string($mysqli, sha1($data->password));


$sql = "SELECT * FROM account WHERE name='" . $name ."' AND password ='" . $password ."'";


$result = mysqli_query($mysqli, $sql);



$arr = array();

	if(mysqli_num_rows($result) != 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			if($row['id'])
				$_SESSION['id'] = $row['id'];
			if($row['token'])
				$_SESSION['token'] = $row['token'];
			if($row['category'])
				$_SESSION['category'] = $row['category'];
			if($row['name'])
				$_SESSION['name'] = $row['name'];

			$arr[] = $row;

		}
	}



//$_SESSION['token']  = $arr['token'];
mysqli_free_result($result);
echo $json_info = json_encode($arr);
  