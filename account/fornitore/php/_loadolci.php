<?php
/**
 * This is an example code that shows how you can load Handsontable data from server using PHP with PDO (SQLite).
 * This code is not intended to be maximally efficient nor safe. It is for demonstrational purposes only.
 * Changes and more examples in different languages are welcome.
 *
 * Copyright 2012, Marcin Warpechowski
 * Licensed under the MIT license.
 * http://warpech.github.com/jquery-handsontable/
 */
try {
  //open the database
  //$db //= new PDO('sqlite:cars.sqlite'); //will create the file in current directory. Current directory must be writable
  $db = new PDO('mysql:host=localhost;dbname=datagrid', 'root', 'sabmas01');  
  //create the database if does not exist
  //$db->exec("CREATE TABLE IF NOT EXISTS tbl_ocis (id INTEGER PRIMARY KEY, prog TEXT, p1 TEXT, p2 TEXT, p3 TEXT, p4 TEXT,p5 TEXT, p6 TEXT, stazione TEXT )"); 
  
  //select all data from the table
  $select = $db->prepare('SELECT * FROM tbl_ocis ORDER BY id ASC LIMIT 100');
  $select->execute();
  
  $out = array(
    'data' => $select->fetchAll(PDO::FETCH_ASSOC)
  );

  //$out = array(array('2012', '10', '11', '12','13', '15','16', 'STAaaaZIONE'));
  
  echo json_encode($out);
  
  // close the database connection
  //$db = NULL;
}
catch (PDOException $e) {
  print 'Exception : ' . $e->getMessage();
}
?>