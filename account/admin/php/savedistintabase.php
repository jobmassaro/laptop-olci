<?php

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


 if ($_POST['changes']) 
 {
 		foreach ($_POST['changes'] as $change) 
 		{
 			$linea  =  $change[0];
      		$lista  =  $change[1];
      		$tabella = $change[2];
      		$valore =  $change[3];
      		$newv =  $change[4];


      		
 		}
 			$linea++;
 				//echo $linea;
 				/*var_dump($linea);
      			var_dump($lista);
      			var_dump($tabella); 	  	
      			var_dump($valore); */

      		

			if($valore==='YES')      				  	
			{
				//distinta_meccanica
				if($lista ==='22')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET distinta_meccanica = 'YES' WHERE prog ='" . $linea ."'";
		      		//var_dump($sql);
		      		mysqli_query($mysqli, $sql);
	      		}


	      		//DISTINTA_FLUIDICA
	      		if($lista ==='23')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET distinta_fluidica = 'YES' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}

	      		//DISTINTA_ELETTRICA
	      		if($lista ==='24')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_ELETTRICA = 'YES' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}
	      		//DISTINTA_LAYOUT
	      		if($lista ==='25')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_LAYOUT = 'YES' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}

	      		//DISTINTA_GENERALI
	      		if($lista ==='26')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_GENERALI = 'YES' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}

	      		//DISTINTA_STANDARD
	      		if($lista ==='27')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_STANDARD = 'YES' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}

	      		//DISTINTA_FREE
	      		if($lista ==='28')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_FREE = 'YES' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}

			}

			if($valore ==="NO")
			{
				var_dump($valore);

				if($lista ==='22')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET distinta_meccanica = 'NO' WHERE prog ='" . $linea ."'";
		      		var_dump($sql);
		      		mysqli_query($mysqli, $sql);
	      		}
	      		if($lista ==='23')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET distinta_fluidica = 'NO' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}
	      		if($lista ==='24')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_ELETTRICA = 'NO' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}
	      		if($lista ==='25')
	      		{
	      			$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_LAYOUT = 'NO' WHERE prog ='" . $linea ."'";
	      			var_dump($sql);
		      		mysqli_query($mysqli, $sql);
	      		}
	      		if($lista ==='26')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_GENERALI = 'NO' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}
	      		if($lista ==='27')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_STANDARD = 'NO' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}
	      		if($lista ==='28')
	      		{
		      		$sql = "UPDATE tbl_olci_body_".$tabella ." SET DISTINTA_FREE = 'NO' WHERE prog ='" . $linea ."'";
		      		mysqli_query($mysqli, $sql);
	      		}
			}

      		
      		



      		//echo 'ok';
      


 }



}catch (PDOException $e) {
  print 'Exception : ' . $e->getMessage();
}