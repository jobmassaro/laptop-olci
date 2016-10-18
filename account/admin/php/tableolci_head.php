<?php

$data = json_decode(file_get_contents("php://input")); 

$host='localhost'; // Host Name.
$db_user= 'root'; //User Name
$db_password= 'sabmas01';
$db= 'datagrid'; // Database 

$mysqli = mysqli_connect($host, $db_user, $db_password, $db) or die();

$id_head = mysqli_real_escape_string($mysqli, $data->id_head);

// mysqli query to fetch all data from database
$query = "SELECT * from tbl_olci_head WHERE id =" . $id_head;
$result = mysqli_query($mysqli, $query);

$arr = array();
	if(mysqli_num_rows($result) != 0) 
	{
		while($row = mysqli_fetch_assoc($result)) {
			$arr[] = $row;
		}
	}
mysqli_free_result($result);

echo $json_info = json_encode($arr);

?>