<?php

 	$target_dir = "./uploads/";
	

    //$data = json_decode(file_get_contents("php://input")); 


	$num = $_POST['numid'];
	$params = $_POST["numdise"];
	$relazbase = $_POST["relazbase"];
    $layout = $_POST["layout"];

  /*	var_dump($relazbase);

 	var_dump($params);

 	var_dump($num);

    var_dump($layout);
    */
    
	$name = $_POST['name'];
//	print_r($_FILES);
	
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    $uploadTmp = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];




    if(isset($_FILES['UploadFileField']))
    {

        
        $num = $_POST['numid'];
        $params = $_POST["numdise"];
        $relazbase = $_POST["relazbase"];
        $layout = $_POST["layout"];
        $layout_tbl = $_POST["layout"];

    //    var_dump($relazbase);

    //    var_dump($params);

    //    var_dump($num);

    //    var_dump($layout);

        if($layout === 'Mechanic')
        {
            $layout = "DISTINTA_MECCANICA = 'YES'";
        }
        if($layout === 'Fluidic')
        {
            $layout = "DISTINTA_FLUIDICA = 'YES'";
        }
        if($layout === 'Electric')
        {
            $layout = "DISTINTA_ELETTRICA = 'YES'";
        }
        if($layout === 'Layout')
        {
            $layout = "DISTINTA_LAYOUT = 'YES'";
        }
        if($layout === 'Generic')
        {
            $layout = "DISTINTA_GENERALI = 'YES'";
        }
        if($layout === 'Standard')
        {
            $layout = "DISTINTA_STANDARD = 'YES'";
        }
        if($layout === 'Another')
        {
            $layout = "DISTINTA_FREE = 'YES'";
        }




        
        $UploadName = $_FILES['UploadFileField']['name'];
        $UploadTmp = $_FILES['UploadFileField']['tmp_name'];
        $UploadType = $_FILES['UploadFileField']['type'];
        $FileSize = $_FILES['UploadFileField']['size'];
        $UploadName = preg_replace("#[^a-z0-9.]#i", "", $UploadName);


        if(($fileSize > 1250000))
        {
                
            die("Error - File to Big");
            
        }


        if(!$UploadTmp)
        {
            die("No File Selected, Please Upload Again");
        }
        else
        {

            $filename = '';
            move_uploaded_file($UploadTmp, "uploads/$UploadName");

            $connect = mysqli_connect("localhost", "root", "sabmas01", "datagrid");  
            include "PHPExcel/IOFactory.php";
            $objPHPExcel = new PHPExcel();
            
            $html="<table border='1'>";  
            /*$objPHPExcel = PHPExcel_IOFactory::load('sample.xls');  */

            $objPHPExcel = PHPExcel_IOFactory::load('uploads/' . $UploadName);  
            $worksheetNames = $objPHPExcel->getSheetNames($fileName);
            $return = array();

            $sheet = $objPHPExcel->setActiveSheetIndexByName($worksheetNames[0]);
            
            $highestRow = $sheet->getHighestRow();
            var_dump("highestRow => " . $highestRow);

            $highestColumn = $sheet->getHighestColumn();

            $start = 0;
            $tmp = 0;
            $irw[][] ='';
            $idvalue = 0;
            $insert = false;
            $last_id;
            $id_distbase = '';



                for ($row = 1; $row <= $highestRow; $row++) 
                {

                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

                        foreach($rowData[0] as $k=>$v)
                        {
                            $code;
                            $data;
                            $titolo;

                            if($row >= $start)
                            {
                                //echo "Row: ".$row."- Col: ".($k+1)." = ".$v."<br />"; 
                                if($row === 1)
                                {
                                    if($v!=null)
                                    {

                                        if($k==2)
                                        {
                                            //$irw[$row][$k] = $v;  
                                            $code = $v;
                                            //echo $v . '<br />';//Codice       
                                        }
                                            
                                        if($k==5)
                                        {

                                            //$irw[$row][$k] = $v;  
                                            $data = $v;

                                            //echo $v . '<br />';//Data     
                                        }
                                            
                                        
                                    }
                                }

                                if($row === 2)
                                {
                                    if($v!=null)
                                    {
                                        if($k==1)
                                        {
                                            $titolo = $v;
                                            //$irw[$row][$k] = $v;  
                                            //echo $v. '<br />';//Titolo
                                        }
                                    }
                                }
                                if($row === 3)
                                {
                                    if($v!=null)
                                    {
                                        if($k==1){
                                            //$irw[$row][$k] = $v;  
                                            $titolo .= ' ' .$v;
                                            //echo $v. '<br />';//Titolo2
                                        }
                                    }
                                }

                                    

                                if($row >= 6 && $k <=15)
                                {
                                    if($insert == false)
                                    {
                                        //$id_distbase = rand(1, 3);

                                        //$sql ="SELECT MAX(id) as max FROM tbl_olci_lista_distinta_base"; 
                                        
                                        $ddate = date_create('30-12-1899');
                                        date_add($ddate, date_interval_create_from_date_string('' . $data .' days'));


                                        $sql = "UPDATE tbl_olci_lista_distinta_base SET gruppo='".$code."',data='" . date_format($ddate, 'd/m/Y') ."',titolo='". $titolo . "',". $layout. " WHERE disegno_no='". $params ."' AND id=" . $num ." AND id_distbase=" . $relazbase;
                                        mysqli_query($connect, $sql);
                                        /*var_dump($sql);
                                        die();*/
                                        $insert = true;
                                    }

                                    
                                        if ( ( 0 === strpos($v, 'A)')) ||  (0 === strpos($v, 'B)')) || (0 === strpos($v, 'C)')) || (0 === strpos($v, 'D)')) ) 
                                        {
                                            break;
                                            
                                        }else{


                                            $irw[$row][$k] = $v;    
                                            //echo "Row: ".$row."- Col: ".($k)." = ".$v."<br />";   
                                        }
                                    

                                }

                            }

                            //echo $irw[$row][$k];
                            
                            //echo '<br />';
                        }// end for annidato    

                }//end il for

                if(count($irw)>0)
                {
                  $sql = "CREATE TABLE  IF NOT EXISTS tbl_olci_distinta_base_" . $num ."_" .$layout_tbl ." 
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

                    mysqli_query($connect, $sql);

                }


                for($j= 6; $j < count($irw); $j++ )
                {
                    if($irw[$j][1] != null)
                    {



                        


                        //echo $irw[$j][1];
                        //echo '<br />';
                            $sql ="INSERT INTO tbl_olci_distinta_base_". $num ."_" .$layout_tbl ." (
                                    `id_distbase`,
                                    `id_lista`,
                                    `gruppo`,
                                    `data`,
                                    `titolo`,
                                    `drwno`,
                                    `denominazione`,
                                    `qta`,
                                    `materiale`,
                                    `trattamento`,
                                    `processing`,
                                    `welding`,
                                    `ricambio`,
                                    `rev`,
                                    `foglio`,
                                    `disegno_no`,
                                    `consegne`)
                                    VALUES(
                                        ". $relazbase."," .$num .",'".$code."','" . $data ."','". $titolo . "'," .$irw[$j][1] .",'" .$irw[$j][2]."',".$irw[$j][3] .",'" .$irw[$j][4] ."','". $irw[$j][5]."','" .$irw[$j][6] ."','" .$irw[$j][7] ."','" .$irw[$j][8] ."','" . $irw[$j][9] ."','" .$irw[$j][10] ."','" . $irw[$j][11]. "','" .$irw[$j][12]."')";
                //  echo '<br/>';
                //  echo $sql;
                                        mysqli_query($connect, $sql);
                /*
                        $sql = "UPDATE tbl_olci_distinta_base SET drwno=" .$irw[$j][1] .",denominazione='" .$irw[$j][2]."',qta=" .$irw[$j][3] .",materiale='" .$irw[$j][4] ."',trattamento='". $irw[$j][5]."',processing='" .$irw[$j][6] ."',welding='" .$irw[$j][7] ."', ricambio='" .$irw[$j][8] ."',rev='" . $irw[$j][9] ."',foglio=" .$irw[$j][10] ."',disegno_no='" . $irw[$j][11]. "',consegne='" .$irw[$j][12]."'";
                        
                        echo $sql;  */
                    }else{
                        
                        //echo $irw[$j][1];


                        $sql = "INSERT INTO tbl_olci_distinta_base_" .$num ." (gruppo,data, titolo) VALUES('".$code."','" . $data ."','". $titolo . "')";
                        mysqli_query($connect, $sql);
                    }
                    
                }



                    
                   /* var_dump('dentro ' . $UploadType);
                    var_dump($UploadType);
                    die();*/
                }

            }

        // Removes Unwanted Spaces and characters from the files names of the files being uploaded
        
        
        
        // Upload File Size Limit 
        
     
    

header('location: index.php');       

	
