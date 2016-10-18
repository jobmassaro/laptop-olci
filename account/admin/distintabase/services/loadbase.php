

<?php
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
  $uid = $_POST['m']; 
  $layouty = $_POST['l']; 

}
  





try {
  //open the database
  //$db //= new PDO('sqlite:cars.sqlite'); //will create the file in current directory. Current directory must be writable
  $db = new PDO('mysql:host=localhost;dbname=datagrid', 'root', 'sabmas01');  
  //create the database if does not exist
 /* $db->exec("CREATE TABLE IF NOT EXISTS tbl_olci_body (id INTEGER PRIMARY KEY,head_id TEXT, prog TEXT, p1 TEXT, p2 TEXT, p3 TEXT,p4 TEXT, p5 TEXT, p6 TEXT, stazione TEXT,CODICE_STRUTTURA TEXT,DISEGNO_FORNITORE TEXT,DISEGNO_CLIENTE TEXT,FILE_ORIGINALE TEXT,TOTALE_FOGLI,FOGLI_RICEVUTI TEXT,DESCRIZIONE_ITALIANO TEXT,DESCRIZIONE_INGLESE TEXT,DESCRIZIONE_LINGUA_LOCALE TEXT,File_di_Stampa_Rev TEXT,File_Originale_Rev TEXT,FORNITORE TEXT,Data TEXT,NOTE TEXT)");
  
  
  $sql = "DROP TABLE tbl_olci_body";
  $select = $db->prepare($sql);
  $select->execute();



  //select all data from the table
  $sql = "CREATE TABLE tbl_olci_body AS SELECT * FROM tbl_olci_body_".$uid ." WHERE id_head =" .$uid . " ORDER BY id ASC ";

  $select = $db->prepare($sql);
  $select->execute();
  */

  //$sql ="SELECT * FROM tbl_olci_distinta_base_" .$uid ." WHERE id_distbase=" . $uid;
  $sql ="SELECT * FROM tbl_olci_distinta_base_" .$uid ."_" .$layouty ;
  $select = $db->prepare($sql);
  $select->execute();

  $out = array(
    'olci' => $select->fetchAll(PDO::FETCH_ASSOC)
  );
  echo $json_info = json_encode($out);
  
  // close the database connection
  $db = NULL;
}
catch (PDOException $e) {
  print 'Exception : ' . $e->getMessage();
}
?>