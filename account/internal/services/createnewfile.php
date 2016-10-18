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


$sql = "INSERT INTO tbl_olci_head (nome_disegno_tabella," . 
    								"progetto,rev_tabella,creato,linea,controllato,ultima_modifica, numero_disegno_linea , compilatore, acronimo_linea, plant," .
    								" modello) VALUES ('". $nome_disegno_tabella  . "','".$progetto ."','".$rev_tabella ."','".$creato ."','".$linea ."','".$controllato ."','".$ultima_modifica ."','".$numero_disegno_linea ."','".$compilatore ."','".$acronimo_linea ."','".$plant ."','".$modello ."')";



mysqli_query($mysqli, $sql);

$idvalue = mysqli_insert_id($mysqli);



$sql = "create table tbl_olci_body_" .$idvalue 
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








			/* Valori di default */

			$p0 = '0';
			$p1 = '0';
			$p2 = '0';
			$p3 = '0';
			$p4 = '0';
			$p5 = '0';
			$p6 = '0';
			$stazione = '000-00-0';

			$CODICE_STRUTTURA = $acronimo_linea;
			$DISEGNO_FORNITORE ='';


      		$tmp_ndisegno;

      		if (preg_match('/./',$numero_disegno_linea))
      		{
          		$tmp_ndisegno = explode(".", $numero_disegno_linea);        
          	}

			$DISEGNO_CLIENTE = $tmp_ndisegno[1];

			$FILE_ORIGINALE = '';
			$TOTALE_FOGLI = '';
			$FOGLI_RICEVUTI ='';
			$DESCRIZIONE_ITALIANO = '';
			$DESCRIZIONE_INGLESE = '';
			$DESCRIZIONE_LINGUA_LOCALE = 'N/A';
			$File_di_Stampa_Rev = '0';
			$File_Originale_Rev = '';
			$FORNITORE = '';
			$Data = '';
			$NOTE = '';





			$sql = "INSERT INTO tbl_olci_body_" . $idvalue ." (id, id_head,prog,p0,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," ."TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE) VALUES (null,".$idvalue.",'".$cnt."','".$p0."','".$p1."','".$p2."'" .
    							",'".$p3."','".$p4."','".$p5."','".$p6."','".$stazione."','".$CODICE_STRUTTURA ."','".$DISEGNO_FORNITORE ."','".$DISEGNO_CLIENTE."','".$FILE_ORIGINALE."','".$TOTALE_FOGLI."','".$FOGLI_RICEVUTI."','".$DESCRIZIONE_ITALIANO[16]."','".$DESCRIZIONE_INGLESE[17]."','".$DESCRIZIONE_LINGUA_LOCALE."','".$File_di_Stampa_Rev."','".$File_Originale_Rev."','".$FORNITORE."','".$Data."','". $NOTE ."')";  
           					//mysqli_query($connect, $sql);  

    						/*$sql = "UPDATE tbl_olci_body SET  id_head ='" .$idvalue ."', prog ='" .$cnt ."' p0 ='" .$irw[2] ."', p1='" .$irw[3]."', p2 ='" .$irw[4]. "', p3 ='" .$irw[4]."'" .
    							",p4 = '".$irw[5]. "', p5 = '". $irw[6] ."',p6 = '" .$irw[7] ."', STAZIONE = '" .$irw[9] ."', CODICE_STRUTTURA ='" .$irw[10].
    							"', DISEGNO_FORNITORE = '". $irw[11] ."', DISEGNO_CLIENTE ='" . $irw[12] ."', FILE_ORIGINALE = '". $irw[13] .
    							"', TOTALE_FOGLI = '" . $irw[14] ."', FOGLI_RICEVUTI = '" .  $irw[15] ."', DESCRIZIONE_ITALIANO = '" .  $irw[16] .
    							"', DESCRIZIONE_INGLESE = '". $irw[17] ."', DESCRIZIONE_LINGUA_LOCALE = '" . $irw[18] . "', File_di_Stampa_Rev ='" . $irw[19]. 
    							"', File_Originale_Rev = '" . $irw[20] ."', FORNITORE = '" . $irw[21] ."', Data = '".  $irw[22] ."', NOTE ='". $irw[23]."';";*/

    							mysqli_query($mysqli, $sql);






  $sql = "DROP TABLE tbl_olci_body";
  mysqli_query($mysqli, $sql);



  //select all data from the table
 $sql = "CREATE TABLE tbl_olci_body AS SELECT * FROM tbl_olci_body_".$idvalue ." WHERE id_head =" .$idvalue . " ORDER BY id ASC ";
 mysqli_query($mysqli, $sql);
  

  $sql ="SELECT * FROM idvalue  WHERE id_head =" .$uid . " ORDER BY id ASC ";
mysqli_query($mysqli, $sql);

    							//	$idvalue = mysqli_insert_id($connect);

echo true;