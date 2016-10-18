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


$sql = "create table tbl_olci_body_" .$lastId 
." 
(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	id_head int(3) not null,
	prog varchar(100) null,
	p0 varchar(6) null,
	p1 varchar(6) null,
	p2 varchar(6) null,
	p3 varchar(6) null,
	p4 varchar(6) null,
	p5 varchar(6) null,
	p6 varchar(6) null,
	STAZIONE varchar(100) null,
	CODICE_STRUTTURA varchar(100) null,
	DISEGNO_FORNITORE varchar(100) null,
	DISEGNO_CLIENTE varchar(100) null,
	FILE_ORIGINALE varchar(100) null,
	TOTALE_FOGLI varchar(100) null,
	FOGLI_RICEVUTI varchar(100) null,
	DESCRIZIONE_ITALIANO varchar(100) null,
	DESCRIZIONE_INGLESE varchar(100) null,
	DESCRIZIONE_LINGUA_LOCALE varchar(100) null,
	File_di_Stampa_Rev varchar(100) null,
	File_Originale_Rev varchar(100) null,
	FORNITORE varchar(100) null,
	Data varchar(100) null,
	NOTE  varchar(100) null

);";



$result = mysqli_query($mysqli, $sql);

$sql = "INSERT INTO tbl_olci_body_" .$lastId ."(id_head,prog,p0,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," ."TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE) ".
							"SELECT  " . $lastId .",prog,p0,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," ."TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE FROM tbl_olci_body_" . $id ." WHERE id_head= ". $id;

$result = mysqli_query($mysqli, $sql);

/*$sql = "UPDATE tbl_olci_body_" . $id ." SET id_head= '" .$lastId ."' WHERE id =" .$id;
$result = mysqli_query($mysqli, $sql);
*/









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

