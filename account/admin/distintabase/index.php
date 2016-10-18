<?php

	session_start();
	if(!$_SESSION['token'])
	{
		header('location: ../../index.html');
	}
		
	$servername = "localhost";
 	$username = "root";
 	$password = "sabmas01";
 	$dbname = "datagrid";
  
 	$mysqli = new mysqli($servername, $username, $password, $dbname);
  
  	if ($mysqli->connect_errno) {
    	  echo "Connessione fallita: ". $mysqli->connect_error . ".";
      	exit();
  	}

  	$sql = "SELECT token, category FROM account WHERE token='" .$_SESSION['token'] ."' AND category='" . $_SESSION['category']. "'LIMIT 1";
  	$result = mysqli_query($mysqli, $sql);

  	$row=mysqli_fetch_row($result);
  	if($_SESSION['token'] == $row[0] && $_SESSION['category'] == $row[1] )
  	{
  			$_SESSION['token']	= $row[0];		  		
  			$_SESSION['category']	= $row[1];		  		
  	}
		
    
    mysqli_free_result($result);

?>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
	$parm = array();


	$uid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
  

	list($mid, $tbl) = explode("-", $uid);
	 

  $numdisegno= '';
  $numerodisegno = '';

    $mysqli = new mysqli($servername, $username, $password, $dbname);
    if ($mysqli->connect_errno) {
        echo "Connessione fallita: ". $mysqli->connect_error . ".";
        exit();
    }


    $layout='';
    $gruppo='';

    if(count($tbl)>0 && count($mid)>0 )//&&  $_SESSION['mid'] != $mid )
     {
         
          $_SESSION['back'] = $tbl; 

          $sql = "SELECT layout,disegno_no, gruppo FROM tbl_olci_lista_distinta_base WHERE id_distbase=" . $tbl ." AND layout=" .$mid; 
          $result = $mysqli->query($sql);

         
          if ($result->num_rows > 0) 
          {
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
                $layout= $row["layout"];
                $numerodisegno = $row["disegno_no"];
                $gruppo= $row["gruppo"];
               
              }
          }
          else {
            $layout= 0;
          }
         
          
          if ($layout ==0 && $gruppo == 0) 
          {
              if($_SESSION['back'] === null && count($_SESSION['back']) ==0 )
                $_SESSION['back'] = $tbl; 
            //Ho usato layout come variabile di unione tra MASTER e details 
            
            $sql = "INSERT INTO tbl_olci_lista_distinta_base(id_distbase, disegno_no, titolo, layout, distinta_meccanica,distinta_fluidica,distinta_elettrica,distinta_layout,distinta_generali,distinta_standard,distinta_free) 
            SELECT id_head, disegno_cliente, descrizione_inglese,". $mid .",distinta_meccanica,distinta_fluidica,distinta_elettrica,distinta_layout,distinta_generali,distinta_standard,distinta_free FROM tbl_olci_body_".$tbl ." WHERE id = " . $mid;

            $result = mysqli_query($mysqli, $sql);
            

          }
          if($layout !=0 && $gruppo == 0 )
          {
              if($_SESSION['back'] === null && count($_SESSION['back']) ==0 )
                $_SESSION['back'] = $tbl; 





            $sql = "DELETE FROM tbl_olci_lista_distinta_base WHERE id_distbase=" . $tbl ." AND layout=" .$mid; 
            $result = $mysqli->query($sql);


            /**/

             $sql = "INSERT INTO tbl_olci_lista_distinta_base(id_distbase, disegno_no, titolo,layout, distinta_meccanica,distinta_fluidica,distinta_elettrica,distinta_layout,distinta_generali,distinta_standard,distinta_free) 
            SELECT id_head, disegno_cliente, descrizione_inglese,". $mid .",distinta_meccanica,distinta_fluidica,distinta_elettrica,distinta_layout,distinta_generali,distinta_standard,distinta_free FROM tbl_olci_body_".$tbl ." WHERE id = " . $mid;

            $result = mysqli_query($mysqli, $sql);

          }
    }
    
   

    if(count($numdisegno) > 0)
    {
      $distinta; 
      $id;

      $num = substr($numdisegno,0,7);
      if($num != 0)
          $sql = "SELECT * FROM tbl_olci_lista_distinta_base WHERE gruppo LIKE '". $num . "%" ."'";
      else
          $sql = "SELECT * FROM tbl_olci_lista_distinta_base" ; 
        
       $result = mysqli_query($mysqli, $sql);
      
       if (mysqli_num_rows($result) > 0) 
       {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) 
          {
            $distinta = $row['gruppo'];
            $id = $row['id'];
          }
        } 
        else 
        {
          $distinta = 0;
        }
      }
    

if($_SESSION['back'] === null && count($_SESSION['back']) ==0 )
                $_SESSION['back'] = $tbl; 
 
  	
}



?>
<!DOCTYPE html>
<html ng-app="dbase">
<head>
	
	<title>OLCI | <?php echo $_SESSION['category']; ?></title>
	
	<link rel="stylesheet" href="../../../dist/css/bootstrap.css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css">
	<link rel="stylesheet" href="../../../dist/css/style.css" />
	
	<meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <!--[if lt IE 9]>
    <script src='http://html5shim.googlecode.com/svn/trunk/html5.js' type='text/javascript'></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <link href="http://cloud5.bdinfosys.com/datagrid/ui/theme/bmsapp/assets/css/ie8.css" media="screen" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <!--<link href="ui/theme/bmsapp/assets/css/bootstrap-responsive.css" media="all" rel="stylesheet" type="text/css"/>-->
    <!-- <link href="ui/theme/bmsapp/assets/css/bootstrap-datatable.css" media="all" rel="stylesheet" type="text/css"/>-->
    <!--<link rel="stylesheet" media="screen" href="apps/bundles/datasheet/jquery.handsontable.css">-->
    <link href="../dist/handsontable.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" media="screen" href="../apps/bundles/datasheet/jquery.handsontable.bootstrap.css">


    <!--<link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.16.0/bower_components/handsontable/dist/handsontable.full.min.css">-->

    <link rel="stylesheet" media="screen" href="../apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.contextMenu.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css">


    <script src="../ui/theme/bmsapp/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../ui/theme/bmsapp/assets/js/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="../ui/theme/bmsapp/assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="../ui/theme/bmsapp/assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../ui/theme/bmsapp/assets/js/modernizr.min.js" type="text/javascript"></script>
    <script src="../ui/theme/bmsapp/assets/js/retina.js" type="text/javascript"></script>
    <script src="../ui/theme/bmsapp/assets/js/application.js" type="text/javascript"></script>


    <!--<script src="apps/bundles/datasheet/dist/jquery.handsontable.full.js" type="text/javascript"></script>-->
    <script src="../dist/handsontable.full.js" type="text/javascript"></script> 

    <script src="../apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.contextMenu.js" type="text/javascript"></script>
   	<script src="../apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.ui.position.js" type="text/javascript"></script>

	<link rel="stylesheet" href="../css/custom.css" />
	<style type="text/css">
	.navbar
	{
		margin-top: -25px;
	}
	.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
	#mfont
	{
		color: white;
	}

	.file {
  visibility: hidden;
  position: absolute;
}
.grid {
  width: 500px;
  height: 250px;
}
.myGrid {
    width: 500px;
    height: 250px;
  }

  .dialogdemoBasicUsage #popupContainer {
  position: relative; }

.dialogdemoBasicUsage .footer {
  width: 100%;
  text-align: center;
  margin-left: 20px; }

.dialogdemoBasicUsage .footer, .dialogdemoBasicUsage .footer > code {
  font-size: 0.8em;
  margin-top: 50px; }

.dialogdemoBasicUsage button {
  width: 200px; }

.dialogdemoBasicUsage div#status {
  color: #c60008; }

.dialogdemoBasicUsage .dialog-demo-prerendered md-checkbox {
  margin-bottom: 0; }


.value1{
    background:#ff00aa;
}

.value2{
    background:#fa55ff;
}
/*
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be foundin the LICENSE file at http://material.angularjs.org/HEAD/license.
*/
	</style>

</head>
<body>
	 <div class="navbar navbar-inverse" style="padding-top:-44px;">
		
    	<!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<img src="../../../images/logo.png" height="53px"/>
    	</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      		<ul class="nav navbar-nav navbar-right">
      			<li><a href="#" id="mfont">Hello<b> <?php echo $_SESSION['name']; ?></b></a></li>
        		<li class="dropdown">
          			<a href="logout.php" id="mfont">Logout <span class="caret"></span></a>
        		</li>
    		</ul>
    	</div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</div>
<div class="col-md-3">  
  <a href="../listexcel.php?m=<?php echo $_SESSION['back'];  ?>" class="btn btn-default btn-lg">BACK</a>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>


<div>
  <p></p>
  <div ng-controller="DbateCtrl" ng-init="idvalue='<?php echo $layout ?>'">
    <div ng-init="value='<?php echo $numerodisegno; ?>'">
    
    
       <?php 
        if($distinta=== 0) { ?>
            <h2><p> There are no list(s) </p></h2>
            <table class="table table-hover"> 
                <tbody>
                    <tr>
                      <th scope="row"><?php echo $numdisegno; ?></th>
                      <td><button type="button" class="btn btn-primary btn-lg" ng-click="createDbase('<?php echo $numdisegno; ?>')">CREATE</button></td>
                      <td><button type="button" class="btn btn-default btn-lg" ng-click="import('<?php echo $numdisegno; ?>')"><b>IMPORT</b></button></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>

          
        	
       <?php 
    	} else { ?>
        <div>
        <h2><p> There are : <kbd>{{ distintaBase.length }}</kbd> Items </p></h2>
     <button type="button" class="btn btn-primary btn-lg" ng-click="createDbase()">CREATE</button>
     <?php echo $_SESSION['fromDbase']= $uid; ?>

     <table class="table table-hover">
        <thead>
          <tr>
           <!-- <th>Rev</th> -->
           <!-- <th>Complete</th> -->
            <th>Customer Drawing</th>
            <th>Description</th>
            <th>Mec.</th>
            <th>Flu.</th>
            <th>Pow.</th>
            <th>Lay.</th>
            <th>Gen.</th>
            <th>Std.</th>
            <th>Another.</th>
            <th>Clone</th>
            <th>Delete</th>
           <!-- <th>Export</th>-->
          </tr>
        </thead>
       <tbody  ng-repeat="c in distintaBase | orderBy:'disegno_no'" >
         <!-- <tr ng-init="myVar = '../common/newdistintabase.html'">-->

      <tr>
              <!--<td>{{c.revisione }}</td> -->
              
             <!-- <td ng-if="c.distinta_base_completata=='false'">
                <img src="../images/red.png" height="15" width="15"/>
              </td>
              <td ng-if="c.distinta_base_completata=='true'">
                <img src="../images/yellow.png" height="15" width="15"/>
              </td> -->

              <td ng-class='rowClass(c, value ,idvalue, $index)'><b><button ng-click="editDbase(c)">{{ c.disegno_no }}</button></b></td>
              <td ng-if="c.titolo">{{ c.titolo }}</td>
              <td ng-if="!c.titolo"><b>Not present</b></td>

              <td ng-if="c.DISTINTA_MECCANICA == null ">
                 <img src="../images/red.png" height="15" width="15"/></td>
              </td>
               <td ng-if="c.DISTINTA_MECCANICA == 'NO' ">
                 <img src="../images/white.png" height="15" width="15"/></td>
              </td>
              <td ng-if="c.DISTINTA_MECCANICA == 'YES' ">
                <img src="../images/yellow.png" height="15" width="15"/>
              </td>



               <td ng-if="c.DISTINTA_FLUIDICA == null ">
                <img src="../images/red.png" height="15" width="15"/></td>
              </td>
               <td ng-if="c.DISTINTA_FLUIDICA == 'NO' ">
                 <img src="../images/white.png" height="15" width="15"/></td>
              </td>
              <td ng-if="c.DISTINTA_FLUIDICA == 'YES' ">
                <img src="../images/yellow.png" height="15" width="15"/>
              </td>

              <td ng-if="c.DISTINTA_ELETTRICA == null ">
                <img src="../images/red.png" height="15" width="15"/>
               </td>
               <td ng-if="c.DISTINTA_ELETTRICA == 'NO' ">
                 <img src="../images/white.png" height="15" width="15"/></td>
              </td>
              <td ng-if="c.DISTINTA_ELETTRICA == 'YES' ">
                <img src="../images/yellow.png" height="15" width="15"/>
              </td>
             
              <td ng-if="c.DISTINTA_LAYOUT == null ">
                <img src="../images/red.png" height="15" width="15"/>
               </td>
                <td ng-if="c.DISTINTA_LAYOUT == 'NO' ">
                 <img src="../images/white.png" height="15" width="15"/></td>
              </td>
              <td ng-if="c.DISTINTA_LAYOUT == 'YES' ">
                <img src="../images/yellow.png" height="15" width="15"/>
              </td>

              <td ng-if="c.DISTINTA_GENERALI == null ">
                <img src="../images/red.png" height="15" width="15"/>
               </td>
                <td ng-if="c.DISTINTA_GENERALI == 'NO' ">
                 <img src="../images/white.png" height="15" width="15"/></td>
              </td>
              <td ng-if="c.DISTINTA_GENERALI == 'YES' ">
                <img src="../images/yellow.png" height="15" width="15"/>
              </td>

               <td ng-if="c.DISTINTA_STANDARD == null ">
                <img src="../images/red.png" height="15" width="15"/>
               </td>
               <td ng-if="c.DISTINTA_STANDARD == 'NO' ">
                 <img src="../images/white.png" height="15" width="15"/></td>
              </td>
              <td ng-if="c.DISTINTA_STANDARD == 'YES' ">
                <img src="../images/yellow.png" height="15" width="15"/>
              </td>

              <td ng-if="c.DISTINTA_FREE == null ">
                <img src="../images/red.png" height="15" width="15"/>
               </td>
               <td ng-if="c.DISTINTA_FREE == 'NO' ">
                 <img src="../images/white.png" height="15" width="15"/></td>
              </td>
              <td ng-if="c.DISTINTA_FREE == 'YES' ">
                <img src="../images/yellow.png" height="15" width="15"/>
              </td>

             
            <!--  <td ng-if="c.distinta_base_completata=='false'">
                  <input type="checkbox" ng-model="c.enabled">
              </td> -->
              <!--<td><button class="btn btn-default"  ng-click="import(c)"><b>IMPORT</b></button></td>-->
              <!-- <div ng-include="'../common/createDbase.php'"></div> -->
              <!--<td><p ng-include src="'../common/newdistintabase.html'"></p></td> -->
              <td><button class="btn btn-info"><i class="icon-edit icon-white"></i><b>CLONE</b></button></td>
              <td><button class="btn btn-danger" ng-click="deleteDbase(c.id)"><i class="icon-edit icon-white"></i><b>DELETE</b></button></td>
            <!--  <td><button class="btn btn-warning" ng-click=""></i><b>to EXCEL</b></button></td> -->
          </tr>

        </tbody>
      
      </table>

      </div>
    <!--  <div class="container">
          <h2>Import file(s)</h2>
          <table>
            <tr ng-repeat="c in distintaBase" ng-include src="c.enabled && 'common/newdistintabase.html'">
       
            </tr>
      
          </table>
      </div> -->
    <!-- <button name="load" class="btn btn-default btn-lg"><i class="icon-edit icon-white" hidden></i></button> -->
    	
      <!--<div ng-include src="'../common/createDbase.php'"></div>-->
    </div>
 <?php
  }
?>
</div>
<!-- <div ng-include src="'../common/newdistintabase.html'"></div> -->
<div ng-include src="'../common/createDbase.php'"></div>   















<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js"></script>
<script src="https://angular-file-upload.appspot.com/js/ng-file-upload.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-animate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-aria.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-messages.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.6.0.js" type="text/javascript"></script>
<script src="http://m-e-conroy.github.io/angular-dialog-service/javascripts/dialogs.min.js" type="text/javascript"></script>
<!--<script src="ang/lib/angular/angular.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-touch.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
<script src="http://ui-grid.info/docs/grunt-scripts/csv.js"></script>
<script src="http://ui-grid.info/docs/grunt-scripts/pdfmake.js"></script>
<script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script>
<script src="http://ui-grid.info/release/ui-grid.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.6/angular-touch.min.js"></script>
<script src="../js/libs/angucomplete-alt.min.js"></script>
<script src="dist/js/app.js"></script>
</body>
</html>
  