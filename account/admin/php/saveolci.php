<?php
/**
 * This is an example code that shows how you can save Handsontable data on server using PHP with PDO (SQLite).
 * This code is not intended to be maximally efficient nor safe. It is for demonstrational purposes only.
 * Changes and more examples in different languages are welcome.
 *
 * Copyright 2012, Marcin Warpechowski
 * Licensed under the MIT license.
 * http://warpech.github.com/jquery-handsontable/
 */





try {

$servername = "localhost";
  $username = "root";
  $password = "sabmas01";
  $dbname = "datagrid";
  
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  
  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }


 




function getval($mysqli, $sql) {
    $result = $mysqli->query($sql);
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}


  //open the database
  //$db = new PDO('sqlite:cars.sqlite'); //will create the file in current directory. Current directory must be writable
   $db = new PDO('mysql:host=localhost;dbname=datagrid', 'root', 'sabmas01');  
  //create the database if does not exist
  $db->exec("CREATE TABLE IF NOT EXISTS tbl_ocis (id INTEGER PRIMARY KEY, prog TEXT, p1 TEXT, p2 TEXT, p3 TEXT,p4 TEXT,p5 TEXT,p6 TEXT, stazione TEXT)");

   $colMap = array(

    0 => 'p0',
    1 => 'p1',
    2 => 'p2',
    3 => 'p3',
    4 => 'p4',
    5 => 'p5',
    6 => 'p6',
    7 => 'stazione',
    8 => 'CODICE_STRUTTURA',
    9 => 'DISEGNO_FORNITORE',
    10 => 'DISEGNO_CLIENTE',
    11 => 'FILE_ORIGINALE',
    12 => 'TOTALE_FOGLI',
    13 => 'FOGLI_RICEVUTI',
    14 => 'DESCRIZIONE_ITALIANO',
    15 => 'DESCRIZIONE_INGLESE',
    16 => 'DESCRIZIONE_LINGUA_LOCALE',
    17 => 'File_di_Stampa_Rev',
    18 => 'File_Originale_Rev',
    19 => 'FORNITORE',
    20 => 'Data',
    21 => 'Note',
    22 => 'DISTINTA_MECCANICA',
    23 => 'DISTINTA_FLUIDICA',
    24 => 'DISTINTA_ELETTRICA',
    25 => 'DISTINTA_LAYOUT',
    26 => 'DISTINTA_GENERALI',
    27 => 'DISTINTA_STANDARD',
    28 => 'DISTINTA_FREE'

);



    $val1 = 0;

  
  if ($_POST['changes']) 
  {
   
    foreach ($_POST['changes'] as $change) {
      $rowId  = $change[0]+1 ;
      $colId  = $change[1];
      $newVal = $change[3];
      
      if (!isset($colMap[$colId])) {
        echo "\n spadam";
        continue;
      }
      $select = $db->prepare('SELECT id FROM tbl_olci_body WHERE id=? LIMIT 1');
      $select->execute(array(
        $rowId
      ));
      
      if ($row = $select->fetch()) {
        $query = $db->prepare('UPDATE tbl_olci_body SET `' . $colMap[$colId] . '` = :newVal WHERE id = :id');
      } else {
        $query = $db->prepare('INSERT INTO tbl_olci_body (id, `' . $colMap[$colId] . '`) VALUES(:id, :newVal)');
      }
      $query->bindValue(':id', $rowId, PDO::PARAM_INT);
      $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
      $query->execute();
    }
  } elseif (isset($_POST['data'])) 
  {
    

    //var_dump($_POST['data']);


    //$select = $db->prepare('DELETE FROM tbl_olci_body');
    //$select->execute();


    
    for ($r = 0, $rlen = count($_POST['data']); $r < $rlen; $r++) {
      //$rowId = $r + 1;
      $rowId = $r+1;
      for ($c = 0, $clen = count($_POST['data'][$r]); $c < $clen; $c++) {
        if (!isset($colMap[$c])) {
          continue;
        }
        
        
        $newVal = $_POST['data'][$r][$c];


       // var_dump( $_POST['data'][$r][$c]);
       // var_dump('rowID' . $rowId );
        
        $select = $db->prepare('SELECT id FROM tbl_olci_body WHERE id=? LIMIT 1');

        //var_dump('prima' .$val1);
        if($val1==0)
        {
          $sql = "SELECT id_head FROM tbl_olci_body WHERE id=" .$rowId ." LIMIT 1";
          $val1 = getval($mysqli,$sql); 
          //var_dump('i' .$val1);
          
        }

        $select->execute(array($rowId));

        
        if ($row = $select->fetch()) 
        {
           $query = $db->prepare('UPDATE tbl_olci_body SET `' . $colMap[$c] . '` = :newVal WHERE id = :id');
         // var_dump('DENTRO update =>id '. $rowId .'\n colonna =>' . $colMap[$c] . 'valore => ' .$newVal);
          
            

        } else {
          
          $query = $db->prepare('INSERT INTO tbl_olci_body (id,id_head, `' . $colMap[$c] . '`) VALUES(:id,:id_head, :newVal)');
         // var_dump('insert');
          
          $query->bindValue(':id_head', $val1, PDO::PARAM_INT);

          
          
        }
        $query->bindValue(':id', $rowId, PDO::PARAM_INT);
        $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);

       /* $q = 'INSERT INTO tbl_olci_body (id, `' . $colMap[$c] . '`) VALUES(' .$rowId .','. $newVal . ')';
        var_dump($q);*/


        //var_dump('update =>id '. $rowId .'\n newVal' . $newVal);
        $query->execute();

      }
    }
      //  die();
        
        $sql= "SELECT id_head FROM tbl_olci_body WHERE id =" .$rowId;
        //var_dump($sql);
        $stmt = $db->query($sql); 
        $row =$stmt->fetchObject();



        //var_dump($row->id_head);
        

         $sql = "DROP TABLE tbl_olci_body_". $row->id_head;
         $select = $db->prepare($sql);
         $select->execute();



        //select all data from the table
        $sql = "CREATE TABLE tbl_olci_body_". $row->id_head." AS SELECT * FROM tbl_olci_body WHERE id_head =" .$row->id_head . " ORDER BY id ASC ";
        $select = $db->prepare($sql);
        $select->execute();


  }
  $out = array(
    'result' => 'ok'
  );
  echo json_encode($out);
  
  // close the database connection
  $db = NULL;
}
catch (PDOException $e) {
  print 'Exception : ' . $e->getMessage();
}
?>
