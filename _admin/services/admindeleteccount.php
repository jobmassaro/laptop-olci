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
  	$sql =" DELETE FROM account WHERE id=".$id;
  	$result = mysqli_query($mysqli, $sql);

  	return true;