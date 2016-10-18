<?php

$host='localhost'; // Host Name.
$db_user= 'root'; //User Name
$db_password= 'sabmas01';
$db= 'datagrid'; // Database 

$con = mysqli_connect($host, $db_user, $db_password, $db) or die();


// mysqli query to fetch all data from database
$query = "SELECT * from tbl_olci_head ORDER BY nome_disegno_tabella ASC";
$result = mysqli_query($con, $query);

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