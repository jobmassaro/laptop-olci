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




  	$ladata = mysqli_real_escape_string($mysqli, $data->data);
  	
	$layout = mysqli_real_escape_string($mysqli, $data->layout);
	

	$gruppo = mysqli_real_escape_string($mysqli, $data->lines);
	

	$titolo = mysqli_real_escape_string($mysqli, $data->title);
	
	
	

	
																	
	//ottengo il massimo da id_distbase
	$sql ="SELECT MAX(id_distbase) as max FROM tbl_olci_lista_distinta_base"; 
	$r = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array( $r );
	$largestNumber = $row['max'];
	$largestNumber++;

	//var_dump($largestNumber);
	$sql = "INSERT INTO tbl_olci_lista_distinta_base (id_distbase,gruppo, data, titolo, layout ) VALUES(" .$largestNumber .",'" .$gruppo ."','" .$ladata ."','". $titolo . "','" . $layout ."')";
	//var_dump($sql);
	//$r = mysqli_query($mysqli, $sql);

	//ottengo il valore id da inserire nella tabella
	
	mysqli_query($mysqli, $sql);
	$last_id = mysqli_insert_id($mysqli);
	//valore del diegno
	$num = substr($gruppo,0,7);


	 $sql = "CREATE TABLE  IF NOT EXISTS tbl_olci_distinta_base_" . $last_id ." 
                    (
                        id int (3)UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
                        id_distbase int(3)not null,
                        gruppo varchar(50) null,
                        data varchar(50) null,
                        sheet varchar(50) null,
                        titolo varchar(500) null,
                        pos int(3) null,
                        drwno int(5) null,
                        denominazione varchar(150) null,
                        qta int(10) null,
                        materiale varchar(100) null,
                        trattamento varchar(100) null,
                        processing varchar(100) null,
                        welding varchar(100) null,
                        ricambio varchar(100) null,
                        rev varchar(100) null,
                        foglio varchar(5) null,
                        disegno_no varchar(100) null,
                        consegne varchar(100) null

                    );";

                       
                    mysqli_query($mysqli, $sql);


	for($i=1; $i<=50; $i++)
	{
		$sql ="INSERT INTO tbl_olci_distinta_base_". $last_id ."(
								`id_distbase`,
								`gruppo`,
								`data`,
								`titolo`,
								`pos`,
								`drwno`,
								`disegno_no`)
								VALUES(
									". $largestNumber.",'".$gruppo."','" . $ladata ."','". $titolo . "'," . $i ."," .$i .",'". $num . "')";

								 mysqli_query($mysqli, $sql);
			
	}

			
	


?>

