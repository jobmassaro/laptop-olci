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
  //open the database
  //$db = new PDO('sqlite:cars.sqlite'); //will create the file in current directory. Current directory must be writable
   $db = new PDO('mysql:host=localhost;dbname=datagrid', 'root', 'sabmas01');  
  //create the database if does not exist
  $db->exec("CREATE TABLE IF NOT EXISTS tbl_ocis (id INTEGER PRIMARY KEY, prog TEXT, p1 TEXT, p2 TEXT, p3 TEXT, p4 TEXT,p5 TEXT, p6 TEXT, stazione TEXT )");
 
  
  $colMap = array(
  	0 => 'id',
    2 => 'prog',
    3 => 'p1',
    4 => 'p2',
    5 => 'p3',
    6 => 'p4',
    7 => 'p5',
    8 => 'p6',
    9 => 'stazione',
  );

  
  if ($_POST['changes']) {

  

  

    foreach ($_POST['changes'] as $change) {

      $rowId  = $change[0]+1;
      $colId  = $change[1];
      $newVal = $change[3]; //prende il valore
      


      if (!isset($colMap[$colId])) {
      	var_dump('rowid :' .$rowId);
      	var_dump('colMap[colId] :' .$colMap[$colId]);
      	var_dump('colId :' .$colId);
      	var_dump('newVal :' .$newVal);
      	
      //  echo "\n spadam";
      //  continue;
      }

      $select = $db->prepare('SELECT id FROM tbl_ocis WHERE id=? LIMIT 1');
      $query = 'SELECT id FROM tbl_ocis WHERE id= '. $rowId . ' LIMIT 1';
      $select->execute(array($rowId));
      
      if ($row = $select->fetch()) {

        $query = $db->prepare('UPDATE tbl_ocis SET `' . $colId . '` = :newVal WHERE id = :id');
      	var_dump($query);
      } else {
        $query = $db->prepare('INSERT INTO tbl_ocis (id, `' . $colId . '`) VALUES(:id, :newVal)');
      }
      $query->bindValue(':id', $rowId, PDO::PARAM_INT);
      $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
      $query->execute();


    }
   } elseif (isset($_POST['data']) && $_POST['data']) {

  	var_dump('expression');
  	die();
    $select = $db->prepare('DELETE FROM tbl_ocis');
    $select->execute();
    
    for ($r = 0, $rlen = count($_POST['data']); $r < $rlen; $r++) {
      $rowId = $r + 1;
      for ($c = 0, $clen = count($_POST['data'][$r]); $c < $clen; $c++) {
        if (!isset($colMap[$c])) {
          continue;
        }
        
        $newVal = $_POST['data'][$r][$c];
        var_dump($newVal);
        
        $select = $db->prepare('SELECT id FROM tbl_ocis WHERE id=? LIMIT 1');
        $select->execute(array(
          $rowId
        ));
        
        if ($row = $select->fetch()) {
          $query = $db->prepare('UPDATE tbl_ocis SET `' . $colMap[$c] . '` = :newVal WHERE id = :id');
        } else {
          $query = $db->prepare('INSERT INTO tbl_ocis (id, `' . $colMap[$c] . '`) VALUES(:id, :newVal)');
        }
        $query->bindValue(':id', $rowId, PDO::PARAM_INT);
        $query->bindValue(':newVal', $newVal, PDO::PARAM_STR);
        $query->execute();
      }
    }
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
