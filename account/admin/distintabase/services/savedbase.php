<?php
session_start();
//try {

	$servername = "localhost";
  	$username = "root";
  	$password = "sabmas01";
  	$dbname = "datagrid";
  
  	$mysqli = new mysqli($servername, $username, $password, $dbname);
  
  	if ($mysqli->connect_errno) {
    	  echo "Connessione fallita: ". $mysqli->connect_error . ".";
      	exit();
  	}


$colMap = array(

    0 => 'pos',
    1 => 'drwno',
    2 => 'denominazione',
    3 => 'qta',
    4 => 'materiale',
    5 => 'trattamento',
    6 => 'processing',
    7 => 'welding',
    8 => 'ricambio',
    9 => 'rev',
    10 => 'foglio',
    11 => 'disegno_no',
    12 => 'consegne',
    13 => 'id'
 );



  	 if (isset($_POST['data']))
  	 {

  	 	$id = $_POST['m'];
  	 	$layout = $_POST['l'];


  	 	$tabella = $_SESSION['present'];
  	 	$num_record = count($_POST['data']);


  	 	 for ($r = 0, $rlen = $num_record; $r < $rlen; $r++) 
  	 	 {

	     	 //$rowId = $r + 1;
	      	$rowId = $r+1;
	      	//var_dump('row' . $rowId);
	      	//var_dump('num_tot_colonne ' . count($_POST['data'][$r]) );


	      	for ($c = 0, $clen = count($_POST['data'][$r]); $c <= $clen; $c++) 
	      	{
	      		/*var_dump('secondo for');
	      			die();*/
	        	if (!isset($colMap[$c])) 
	        	{
	          		continue;
	        	}
				$newVal = $_POST['data'][$r][$c];
				
				$sql = 'UPDATE tbl_olci_distinta_base_' .$id ."_" .$layout  .' SET ' . $colMap[$c] . ' = "' . $newVal .'" WHERE id ='. $rowId;
				var_dump($sql);
				die();
	        	$result = mysqli_query($mysqli, $sql);
	        	//var_dump($sql . '  valore' . $c .'= '. $colMap[$c]);
	        	
	        }
	    }
	}

        /*
		        $newVal = $_POST['data'][$r][$c];

		        //var_dump('nuovo valore' .  $newVal);
		        $sql = 'UPDATE tbl_olci_distinta_base_' . $tabella .' SET ' . $colMap[$c] . ' = "' . $newVal .'" WHERE id ='. $rowId;


		        // $query = $db->prepare('UPDATE tbl_olci_distinta_base_' . $tabella .' SET `' . $colMap[$c] . '` = :newVal WHERE id = :id');
	          		var_dump($sql);



	     		
	       // var_dump('rowID' . $rowId );
	        
	       /* $select = $db->prepare('SELECT id FROM tbl_olci_body WHERE id=? LIMIT 1');

	        //var_dump('prima' .$val1);
	        if($val1==0)
	        {
	          $sql = "SELECT id_head FROM tbl_olci_body WHERE id=" .$rowId ." LIMIT 1";
	          $val1 = getval($mysqli,$sql); 
	          //var_dump('i' .$val1);
	          
	        }

	        $select->execute(array($rowId));

	        */

	        /*
	        if ($row = $select->fetch()) 
	        {
	           $query = $db->prepare('UPDATE tbl_olci_distinta_base_' . $tabella .' SET `' . $colMap[$c] . '` = :newVal WHERE id = :id');
	          var_dump('DENTRO update =>id '. $rowId .'\n colonna =>' . $colMap[$c] . 'valore => ' .$newVal);
	          
	            

	        } else {
	          
	          $query = $db->prepare('INSERT INTO tbl_olci_distinta_base_' . $tabella .' (id,id_head, `' . $colMap[$c] . '`) VALUES(:id,:id_head, :newVal)');
	          var_dump('insert');
	          
	          $query->bindValue(':id_head', $val1, PDO::PARAM_INT);

	          
	          
	        }
	        var_dump($query);
	        die();
	        $query->bindValue(':id', $rowId, PDO::PARAM_INT);
	        $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
	        $_SESSION['present'] = '';

	       /* $q = 'INSERT INTO tbl_olci_body (id, `' . $colMap[$c] . '`) VALUES(' .$rowId .','. $newVal . ')';
	        var_dump($q);*/


	        //var_dump('update =>id '. $rowId .'\n newVal' . $newVal);
	      //  $query->execute();

	 /*     }
	    }
  	 } // end if  
























}catch (PDOException $e) {
  print 'Exception : ' . $e->getMessage();
}

?>