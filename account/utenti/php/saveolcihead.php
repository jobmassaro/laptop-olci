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


	$query = "UPDATE tbl_olci_head  SET nome_disegno_tabella ='" . $nome_disegno_tabella ."',progetto ='" . $progetto ."',rev_tabella='" . $rev_tabella ."',creato='" .$creato ."',linea='" .$linea .
"',controllato='" .$controllato ."',ultima_modifica='" .$ultima_modifica ."',numero_disegno_linea='" .$numero_disegno_linea ."',compilatore='". $compilatore."',acronimo_linea='".$acronimo_linea."',plant='" .$plant ."',modello='" .$modello ."', livello='" .$livello .
"' WHERE id=". $id ;
mysqli_query($mysqli, $query);
	
echo true;
				
?>