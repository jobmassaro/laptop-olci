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
  $linea = mysqli_real_escape_string($mysqli, $data->linea);
  $numero_disegno_linea = mysqli_real_escape_string($mysqli, $data->numero_disegno_linea);
  $acronimo_linea = mysqli_real_escape_string($mysqli, $data->acronimo_linea);
  $plant = mysqli_real_escape_string($mysqli, $data->plant);
  
  $modello = mysqli_real_escape_string($mysqli, $data->modello);
  $rev_tabella = mysqli_real_escape_string($mysqli, $data->rev_tabella);
  $controllato = mysqli_real_escape_string($mysqli, $data->controllato);

  $creato = mysqli_real_escape_string($mysqli, $data->creato);
  $ultima_modifica = mysqli_real_escape_string($mysqli, $data->ultima_modifica);
  $compilatore = mysqli_real_escape_string($mysqli, $data->compilatore);


			$sql = "TRUNCATE TABLE tbl_olci_head;";
			mysqli_query($mysqli, $sql);

			$sql = "TRUNCATE TABLE tbl_olci_body;";
			mysqli_query($mysqli, $sql);

      
      $tmp_ndisegno;

      if (preg_match('/./',$numero_disegno_linea))
      {
          $tmp_ndisegno = explode(".", $numero_disegno_linea);        
          
         
      }

     






    							$sql = "INSERT INTO tbl_olci_head (id,nome_disegno_tabella," . 
    								"progetto,rev_tabella,creato,linea,controllato,ultima_modifica, numero_disegno_linea , compilatore, acronimo_linea, plant," .
    								" modello) VALUES (null,'". $nome_disegno_tabella  . "','". $progetto ."','".$rev_tabella ."','".$creato ."','".$linea ."','".$controllato .
    								"','".$ultima_modifica ."','".$numero_disegno_linea ."','".$compilatore ."','".$acronimo_linea ."','".$plant ."','".$modello ."')";
									mysqli_query($mysqli , $sql);

    								$idvalue = mysqli_insert_id($mysqli );

    								for($cnt = 0; $cnt <=10; $cnt++)
    								{
    									$sql = "INSERT INTO tbl_olci_body (id, id_head,prog,p0,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," ."TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE) VALUES (null,".$idvalue.",'".$cnt."','','','','','','','','000-000-0','SCA','','". $tmp_ndisegno[1] ."','','','','','','','','','','','')";  
										mysqli_query($mysqli, $sql);
    								}

								    									
           					//mysqli_query($connect, $sql);  





  echo true;