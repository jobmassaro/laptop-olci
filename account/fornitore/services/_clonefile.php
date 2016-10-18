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


  $sql = "INSERT INTO tbl_olci_head (nome_disegno_tabella," . 
    								" progetto,rev_tabella,creato,linea,controllato,ultima_modifica, numero_disegno_linea , compilatore," .
    								" acronimo_linea, plant, modello )" .
						" SELECT nome_disegno_tabella," . 
    								" progetto,rev_tabella,creato,linea,controllato,ultima_modifica, numero_disegno_linea , compilatore," .
    								" acronimo_linea, plant, modello FROM tbl_olci_head WHERE id =" . $id;



$result = mysqli_query($mysqli, $sql);







$lastId = $mysqli->insert_id;
var_dump($lastId);


$sql = "SELECT max(id) as val FROM tbl_olci_body ";
$result = mysqli_query($mysqli, $sql); 
if(mysqli_num_rows($result) != 0) 
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				$lastId_body = $row['val'];
			}	
		}




$sql = "INSERT INTO tbl_olci_body (id_head,prog,p0,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," ."TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE) ".
							"SELECT  id_head,prog,p0,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," ."TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE FROM tbl_olci_body WHERE id_head= ". $id;
$result = mysqli_query($mysqli, $sql);


$sql = "UPDATE tbl_olci_body SET id_head= '" .$lastId ."' WHERE id >" .$lastId_body;
$result = mysqli_query($mysqli, $sql);







//$lastId = $mysqli->insert_id;
$sql = "UPDATE tbl_olci_head SET nome_disegno_tabella= '" .$nome_disegno_tabella ."_clone" ."', progetto='" .$progetto ."_clone" ."' WHERE id=" .$lastId;
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

