<?php

	session_start();

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



	$titolo = mysqli_real_escape_string($mysqli, $data->title);
	$disegno_no = mysqli_real_escape_string($mysqli, $data->disegno_no);
	$ladata = mysqli_real_escape_string($mysqli, $data->data);
  	$layout = mysqli_real_escape_string($mysqli, $data->layout);
	

	
	
  	
	
/*
	var_dump($_SESSION['id']);
	var_dump($ladata);
	var_dump($layout);
	var_dump($gruppo);
	var_dump($titolo);
*/
	
	$sql = '';

	if($layout == 'meccanica')
		$sql ="INSERT INTO tbl_olci_lista_distinta_base (id_distbase,disegno_no, data, titolo, distinta_meccanica ) values (" . $_SESSION['id'] .", '".$disegno_no."','". $ladata ."','". $titolo ."','YES')"; 
	if($layout == 'fluidica')
		$sql ="INSERT INTO tbl_olci_lista_distinta_base (id_distbase,disegno_no, data, titolo, distinta_fluidica )  values (" . $_SESSION['id'] .", '".$disegno_no."','". $ladata ."','". $titolo ."','YES')"; 
	if($layout == 'elettrica')
		$sql ="INSERT INTO tbl_olci_lista_distinta_base (id_distbase,disegno_no, data, titolo, distinta_elettrica ) values   (" . $_SESSION['id'] .", '".$disegno_no."','". $ladata ."','". $titolo ."','YES')"; 
	if($layout == 'layout')
		$sql ="INSERT INTO tbl_olci_lista_distinta_base (id_distbase,disegno_no, data, titolo, distinta_layout )  values (" . $_SESSION['id'] .", '".$disegno_no."','". $ladata ."','". $titolo ."','YES')"; 
	if($layout == 'generica')
		$sql ="INSERT INTO tbl_olci_lista_distinta_base (id_distbase,disegno_no, data, titolo, distinta_generica ) values (" . $_SESSION['id'] .", '".$disegno_no."','". $ladata ."','". $titolo ."','YES')"; 
	if($layout == 'standard')
		$sql ="INSERT INTO tbl_olci_lista_distinta_base (id_distbase,disegno_no, data, titolo, distinta_standard )  values (" . $_SESSION['id'] .", '".$disegno_no."','". $ladata ."','". $titolo ."','YES')"; 
	if($layout == 'another')
		$sql ="INSERT INTO tbl_olci_lista_distinta_base (id_distbase,disegno_no, data, titolo, distinta_free )  values (" . $_SESSION['id'] .", '".$disegno_no."','". $ladata ."','". $titolo ."','YES')"; 


	
	//$result = mysqli_query($mysqli, $sql);



	if ($mysqli->query($sql) === TRUE) 
	{
 	   	$last_id = $mysqli->insert_id;
    	echo "New record created successfully. Last inserted ID is: " . $last_id;
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}



	 $sql = "CREATE TABLE  IF NOT EXISTS tbl_olci_distinta_base_" . $last_id ." 
                    (
                        id int (3)UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
                        id_lista int(3)not null,
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
								`id_lista`,
								`data`,
								`titolo`,
								`pos`,
								`drwno`,
								`disegno_no`)
								VALUES(
									". $_SESSION['id']."," .$last_id .",'" . $ladata ."','". $titolo . "'," . $i ."," .$i .",'". $disegno_no . "')";

								 mysqli_query($mysqli, $sql);
			
		}












































	
/*
	
																		
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

