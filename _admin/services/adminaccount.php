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


$username = mysqli_real_escape_string($mysqli, $data->username);
$password = mysqli_real_escape_string($mysqli, sha1($data->password));
$category = mysqli_real_escape_string($mysqli, $data->singleSelect);
$token = uniqid();



if($category=='admin')
	$role= 1;
if($category=='customer')
	$role= 2;
if($category=='supplier')
	$role= 3;
if($category=='internal')
	$role= 4;


$arr[]=null;
$sql = "SELECT name FROM account WHERE name = '" . $username ."'";
$result = mysqli_query($mysqli, $sql);

	if(mysqli_num_rows($result) == 0) 
	{
		$sql = "INSERT INTO account(id, name, password, role, category, token) VALUES (null,'". $username ."', '". $password . "', '". $role . "','". $category ."', '". $token ."') "	;
		$result = mysqli_query($mysqli, $sql);

		if(mysqli_num_rows($result) != 0) 
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$arr[] = $row;

			}	
		}

		mysqli_free_result($result);
		echo $json_info = json_encode($arr);


	}else
	{


		mysqli_free_result($result);
		echo $json_info = json_encode(null);


	}

	


