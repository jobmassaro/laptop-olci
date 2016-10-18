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
	$query = "SELECT * FROM tbl_olci_head  where id =" . $id;
	$result = mysqli_query($mysqli, $query);
	$result = mysqli_query($mysqli, $query);

	if(mysqli_num_rows($result) != 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$arr[] = $row;
		}	
	}


//echo $json_info = json_encode($arr);
	
$fp = fopen('data_head.json', 'w+');
fwrite($fp, json_encode($arr));
fclose($fp);


  	
	$query = "SELECT * FROM tbl_olci_body  where id_head =" . $id;

  // $myFile = "data.json";
	/*
	$id = mysqli_real_escape_string($mysqli, $data->id);
	$nome_disegno_tabella = mysqli_real_escape_string($mysqli, $data->nome_disegno_tabella);
	$progetto = mysqli_real_escape_string($mysqli, $data->progetto);
	$rev_tabella = mysqli_real_escape_string($mysqli, $data->rev_tabella);
	$creato = mysqli_real_escape_string($mysqli, $data->creato);
	$linea = mysqli_real_escape_string($mysqli, $data->linea);
	$controllato = mysqli_real_escape_string($mysqli, $data->controllato);
	$ultima_modifica = mysqli_real_escape_string($mysqli, $data->ultima_modifica);
	$numero_disegno_linea = mysqli_real_escape_string($mysqli, $data->numero_disegno_linea);
	$compilatore = mysqli_real_escape_string($mysqli, $data->compilatore);
	$acronimo_linea = mysqli_real_escape_string($mysqli, $data->acronimo_linea);
	$plant = mysqli_real_escape_string($mysqli, $data->plant);
	$modello = mysqli_real_escape_string($mysqli, $data->modello);
	$livello = mysqli_real_escape_string($mysqli, $data->livello);
*/

	
/**/
$result = mysqli_query($mysqli, $query);

if(mysqli_num_rows($result) != 0) 
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$arr[] = $row;

			}	
		}


//echo $json_info = json_encode($arr);
	
$fp = fopen('data_body.json', 'w+');
fwrite($fp, json_encode($arr));
fclose($fp);


echo true;



	