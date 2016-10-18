<?php

	

	if(isset($_FILES['UploadFileField']))
	{

		// Creates the Variables needed to upload the file
		
		$UploadName = $_FILES['UploadFileField']['name'];
		$UploadTmp = $_FILES['UploadFileField']['tmp_name'];
		$UploadType = $_FILES['UploadFileField']['type'];
		$FileSize = $_FILES['UploadFileField']['size'];
		

		

		// Removes Unwanted Spaces and characters from the files names of the files being uploaded
		
		$UploadName = preg_replace("#[^a-z0-9.]#i", "", $UploadName);
		
		// Upload File Size Limit 
		
		if(($FileSize > 1250000)){
			
			die("Error - File to Big");
			
		}

		
		// Checks a File has been Selected and Uploads them into a Directory on your Server

		if(!$UploadTmp){
			die("No File Selected, Please Upload Again");
		}else{

			
			move_uploaded_file($UploadTmp, "uploads/$UploadName");
			


			$connect = mysqli_connect("localhost", "root", "sabmas01", "datagrid");  
 			include ("PHPExcel/IOFactory.php");


 			$html="<table border='1'>";  
 			/*$objPHPExcel = PHPExcel_IOFactory::load('sample.xls');  */

 			$objPHPExcel = PHPExcel_IOFactory::load('uploads/' . $UploadName);  
 			$worksheetNames = $objPHPExcel->getSheetNames($fileName);

 			$return = array();


 			$sheet = $objPHPExcel->setActiveSheetIndexByName($worksheetNames[1]);

			$highestRow = $sheet->getHighestRow();
			//var_dump("highestRow => " . $highestRow);
			
			$highestColumn = $sheet->getHighestColumn();
			//var_dump("highestColumn => " . $highestColumn);
			
		
			/*$sql = "TRUNCATE TABLE tbl_olci_head;";
			mysqli_query($connect, $sql);

			$sql = "TRUNCATE TABLE tbl_olci_body;";
			mysqli_query($connect, $sql);
			
			var_dump('expression');*/

			/*inizio del file excel  TESTATA file EXCEL */
			$start = 0;
			$tmp = 0;
			$irw[][] ='';
			$idvalue = 0;


			for ($row = 1; $row <= $highestRow; $row++) 
			{

 			   	//  Read a row of data into an array
    			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

    			foreach($rowData[0] as $k=>$v)
    			{
    				if($row >= $start)
    				{

    					
    					if($row != $tmp)
    					{
    						$tmp = $row;

    						if($row == 8)
    						{
    							

    							$sql = "INSERT INTO tbl_olci_head (id,nome_disegno_tabella," . 
    								"progetto,rev_tabella,creato,linea,controllato,ultima_modifica, numero_disegno_linea , compilatore, acronimo_linea, plant," .
    								" modello) VALUES (null,'". $UploadName  . "','".$irw[1][11] ."','".$irw[1][19] ."','".$irw[1][22] ."','".$irw[2][11] ."','".$irw[2][19] ."','".$irw[2][22] ."','".$irw[3][11] ."','".$irw[3][19] ."','".$irw[4][11] ."','".$irw[5][11] ."','".$irw[6][11] ."')";
									mysqli_query($connect, $sql);

    								$idvalue = mysqli_insert_id($connect);

    								

    							break;

							}
							
    							
    					}
    					else
    					{
    						//$irw[$k+1] = $v;
    							switch ( ($k+1) ) 
    							{
							    	case 11:
							    	if(count($v) > 0)
							    	{
							    		$irw[$row][$k+1] = $v;	
							    		//echo "i equals =>". $row ." => " . $irw[$row][$k+1] .'<br />';
							    		//echo "Row: ".$row."- Col: ".($k+1)." = ".$v."<br />";	
							    	}
							    	break;
							    case 19:

							    	if(count($v) > 0)
							    	{
							    		$irw[$row][$k+1] = $v;		
							    		//echo "i equals =>". $row ." => " . $irw[$row][$k+1] .'<br />';
							    		//echo "Row: ".$row."- Col: ".($k+1)." = ".$v."<br />";	
							    	}
							    	break;
							    case 22:
							    	if(count($v) > 0)
							    	{
							    		$irw[$row][$k+1] = $v;	
							    		//echo "i equals =>". $row ." => " . $irw[$row][$k+1] .'<br />';
							    		//echo "Row: ".$row."- Col: ".($k+1)." = ".$v."<br />";	
							    	}
							    	break;
								}
    						
    					}
	    					
    				}
    			}
        			
			}



			/*inizio del file excel */
			$start = 9;
			$tmp = 9;
			$irw[] ='';
			$cnt = 1;


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



			$result = mysqli_query($connect, $sql);

			

			for ($row = 0; $row <= $highestRow; $row++) 
			{

				$cnt;
 			   	//  Read a row of data into an array
    			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    			foreach($rowData[0] as $k=>$v)
    			{


    				if($row >= $start)
    				{

    					if($row != $tmp)
    					{
    						//echo "++++++++ Linea Nuova +++++++++<br />";

						
    						$sql = "INSERT INTO tbl_olci_body_" . $idvalue ." (id, id_head,prog,p0,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," ."TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE) VALUES (null,".$idvalue.",'".$cnt."','".$irw[2]."','".$irw[3]."','".$irw[4]."'" .
    							",'".$irw[5]."','".$irw[6]."','".$irw[7]."','".$irw[8]."','".$irw[9]."','".$irw[10]."','".$irw[11]."','".$irw[12]."','".$irw[13]."','".$irw[14]."','".$irw[15]."','".$irw[16]."','".$irw[17]."','".$irw[18]."','".$irw[19]."','".$irw[20]."','".$irw[21]."','".$irw[22]."','". $irw[23] ."')";  
           					//mysqli_query($connect, $sql);  

    						/*$sql = "UPDATE tbl_olci_body SET  id_head ='" .$idvalue ."', prog ='" .$cnt ."' p0 ='" .$irw[2] ."', p1='" .$irw[3]."', p2 ='" .$irw[4]. "', p3 ='" .$irw[4]."'" .
    							",p4 = '".$irw[5]. "', p5 = '". $irw[6] ."',p6 = '" .$irw[7] ."', STAZIONE = '" .$irw[9] ."', CODICE_STRUTTURA ='" .$irw[10].
    							"', DISEGNO_FORNITORE = '". $irw[11] ."', DISEGNO_CLIENTE ='" . $irw[12] ."', FILE_ORIGINALE = '". $irw[13] .
    							"', TOTALE_FOGLI = '" . $irw[14] ."', FOGLI_RICEVUTI = '" .  $irw[15] ."', DESCRIZIONE_ITALIANO = '" .  $irw[16] .
    							"', DESCRIZIONE_INGLESE = '". $irw[17] ."', DESCRIZIONE_LINGUA_LOCALE = '" . $irw[18] . "', File_di_Stampa_Rev ='" . $irw[19]. 
    							"', File_Originale_Rev = '" . $irw[20] ."', FORNITORE = '" . $irw[21] ."', Data = '".  $irw[22] ."', NOTE ='". $irw[23]."';";*/

    							mysqli_query($connect, $sql);

    							$cnt++;

    							

/*

    						 ,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," .
    							"TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE )"
								." SELECT * FROM ( SELECT ('".$irw[1]."','".$irw[2]."','".$irw[3]."'" .
    							",'".$irw[4]."','".$irw[5]."','".$irw[6]."','".$irw[7]."','".$irw[9]."','".$irw[10]."','".$irw[11]."','".$irw[12]."','".$irw[13] ."','".$irw[14]."','".$irw[15]."','".$irw[16]."','".$irw[17]."','".$irw[18]."','".$irw[19]."','".$irw[20]."','".$irw[21]."'".",'".$irw[22]."','". $irw[23] ."') AS tmp "
								." WHERE NOT EXISTS ( SELECT id FROM tbl_olci WHERE id = " . $idvalue . ") LIMIT 1;";
*/

						//	echo $sql . '<br />';		
							
/*

    						$sql = "INSERT INTO tbl_olci(id,prog,p1,p2,p3,p4,p5,p6,STAZIONE,CODICE_STRUTTURA,DISEGNO_FORNITORE,DISEGNO_CLIENTE,FILE_ORIGINALE," ."TOTALE_FOGLI,FOGLI_RICEVUTI,DESCRIZIONE_ITALIANO,DESCRIZIONE_INGLESE,DESCRIZIONE_LINGUA_LOCALE," .
    							"File_di_Stampa_Rev,File_Originale_Rev,FORNITORE,Data,NOTE) VALUES (null,'".$irw[1]."','".$irw[2]."','".$irw[3]."'" .
    							",'".$irw[4]."','".$irw[5]."','".$irw[6]."','".$irw[7]."','".$irw[9]."','".$irw[10]."','".$irw[11]."','".$irw[12]."','".$irw[13]."','".$irw[14]."','".$irw[15]."','".$irw[16]."','".$irw[17]."','".$irw[18]."','".$irw[19]."','".$irw[20]."','".$irw[21]."','".$irw[22]."','". $irw[23] ."')";  
           					//mysqli_query($connect, $sql);  

           					//var_dump($sql);
    						//echo "Row: ".$row."- Col: ".($k+1)." = ".$v."<br />";	*/
    						$tmp = $row;

    					

    					/*	if($cnt < 22)
    						{
    								

								var_dump('idvalue => ' .$idvalue);
	    						var_dump('p0 => ' .$irw[2]);
	    						var_dump('p1 =>' . $irw[3]);
	    						var_dump('p2 =>' . $irw[4]);
	    						var_dump('p3 =>' . $irw[5]);
	    						var_dump('p4 =>' . $irw[6]);
	    						var_dump('p5 =>' . $irw[7]);
	    						var_dump('p6 =>' . $irw[8]);
	    						var_dump('station =>' . $irw[9]);
	    						var_dump('CODICE_STRUTTURA =>' . $irw[10]);
	    						var_dump('DISEGNO_FORNITORE =>' . $irw[11]);
	    						var_dump('DISEGNO_CLIENTE =>' . $irw[12]);
	    						var_dump('FILE_ORIGINALE =>' . $irw[13]);
								var_dump('TOTALE_FOGLI =>' . $irw[14]);
								var_dump('FOGLI_RICEVUTI =>' . $irw[15]);
								var_dump('DESCRIZIONE_ITALIANO =>' . $irw[16]);
								var_dump('DESCRIZIONE_INGLESE =>' . $irw[17]);
								var_dump('DESCRIZIONE_LINGUA_LOCALE =>' . $irw[18]);
								var_dump('File_di_Stampa_Rev =>' . $irw[19]);
								var_dump('File_Originale_Rev =>' . $irw[20]);
								var_dump('FORNITORE =>' . $irw[21]);
								var_dump('Data =>' . $irw[22]);
								var_dump('Note =>' . $irw[23]);
								

	    						
	    						echo '<br />';
	    						
    						}*/


    						
    					}
    						
    					else
    					{
    						$irw[$k+1] = $v;
    						
    						//var_dump($irw[$k+1]);
    						//echo '<br />';

    						//echo "Row: ".$row."- Col: ".($k+1)." = ".$v."<br />";	
    					}
	    					
    				}
    			}
        			
			}

			

		}
	}
	header('Location: index.php');
?>