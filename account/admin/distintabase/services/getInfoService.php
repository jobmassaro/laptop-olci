<?php

header('Content-type: application/json');
$host='localhost'; // Host Name.
$db_user= 'root'; //User Name
$db_password= 'sabmas01';
$db= 'datagrid'; // Database 

$con = mysqli_connect($host, $db_user, $db_password, $db) or die();

if (isset($_GET['name']) ) 
{
	$sql = "SELECT * from tbl_olci_lista_distinta_base WHERE id='" . $_GET['name'] ."'";
	$result = mysqli_query($con, $sql);

	$arr = array();
	if(mysqli_num_rows($result) != 0) 
	{
		while($row = mysqli_fetch_assoc($result)) {
			$arr[] = $row;
		}
	}
	mysqli_free_result($result);

echo $json_info = json_encode($arr);
}else
{
	echo json_encode(false);
}

// mysqli query to fetch all data from database
/*$query = "SELECT * from tbl_olci_lista_distinta_base";


