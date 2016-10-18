

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
        $_SESSION['token']  = $row[0];          
        $_SESSION['category'] = $row[1];          
    }
    
    
    mysqli_free_result($result);

?>

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['m']) 
{
  $distinta;
  $id_distbase;
  $id;
  $numero_disegno;

  $parm = array();

  $uid = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING);

  list($mid, $tbl) = explode("-", $uid);
  $_SESSION['present'] = $mid; 

  $mysqli = new mysqli($servername, $username, $password, $dbname);
  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }

   
    
  $sql = "SELECT * FROM tbl_olci_lista_distinta_base WHERE id=" . $mid .' AND id_distbase=' . $tbl;
//  var_dump($sql);

  $result = mysqli_query($mysqli, $sql);

 if (mysqli_num_rows($result) > 0) 
 {
   
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
      $distinta = $row['gruppo'];
      $id_distbase = $row['id_distbase'];
      $id = $row['id'];
      $numero_disegno = $row['disegno_no'];
      $titolo = $row['titolo'];

    /*  var_dump($distinta);
      var_dump($id_distbase);
      var_dump($id);
      die();  */
    }
  } 
  else 
  {
    $distinta = 0;
  }
}
 

?>

<!DOCTYPE html>
<html ng-app="revApp">
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


    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.16.0/bower_components/handsontable/dist/handsontable.full.min.css">

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



    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.silver.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.silver.mobile.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.dataviz.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.dataviz.default.min.css" rel="stylesheet" type="text/css" />

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
  </style>

</head>
<body >
  
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
  
 
<a href="index.php?id=<?php  echo $_SESSION['fromDbase']; ?>" class="btn btn-default btn-lg">BACK</a>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p ng-init="id='<?php echo $id; ?>'">&nbsp;</p>
<!--<div class="container" >
  
  <p></p>
 <!-- <div ng-controller="DbateCtrl">
    <h2><p> There are : <kbd>{{ employees.length }}</kbd> Items </p></h2>
    <table class="table table-hover">
      <tbody ng-repeat="c in employees">
          <tr>
            <td><button name="load" class="btn btn-default btn-lg" ng-click="editDbase(c.id)"><i class="icon-edit icon-white"></i><b>{{ c.gruppo }}</b></button></a></td>
            <td><button type="button" class="btn btn-default btn-lg" ng-click="import()"><b>IMPORT</b></button></td>
            <td><button class="btn btn-info btn-lg"><i class="icon-edit icon-white"></i><b>CLONE</b></button></a></td>
            <td><button class="btn btn-danger btn-lg" ng-click="deleteDbase('<?php echo $distinta; ?>')"><i class="icon-edit icon-white"></i><b>DELETE</b></button></a></td>
            <td><button class="btn btn-warning btn-lg" ng-click=""></i><b>to EXCEL</b></button></tr>
      </tbody>
    </table>
  </div> -->

  <div class="" ng-controller="detailCtrl" style="margin-left: 40px;" >
      <div class="col-md-12">
          <div class="col-md-12" style="background-color:#c6d9f1;">
              <div class="col-md-12">
                  <h3>Customer Drawing :<b><?php echo $numero_disegno; ?></b>
                    <p style="color: grey; font-size:0.8em;text-align: center;""><?php echo $titolo; ?></p>
                    <p ng-if="layoutSelezionato" style="background: #fff;">Selected: <b>{{ layout }}</b></p>
                  </h3>
                  <hr />
              </div>
              <div class="col-md-12">
                  <button type="button" class="btn btn-primary btn-lg" ng-click="toggleNuovaDBase()">{{showNuovaDistintaBase ? "Close" : "CREATE NEW"}}</button>
                  <div ng-if="showNuovaDistintaBase" ng-include src="'views/nuovadistintabase.php'"></div>   
                  <button type="button" class="btn btn-primary btn-lg" ng-click="toggleLoadDbase()">{{loadDBase ? "Close" : "LOAD"}} </button>
                  <div ng-if="loadDBase" ng-include src="'views/loadistintaBase.php'"></div>   
                  <button type="button" class="btn btn-primary btn-lg" ng-click="toggleImportDBase()">{{showImportDistintaBase ? "Close" : "IMPORT"}}</button>
                  <div ng-if="showImportDistintaBase" ng-include src="'views/importdistintabase.php'"></div>   
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
              </div>
        </div><!-- chiude  col-md-6 -->
   <!--     <div class="col-md-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <div class="form-group">
                    <h2>Legend</h2>
                  </div>
                <div class="form-group" ng-class="{'has-error':!userForm.pwd2.$valid}">
                  <label class="control-label" for="signupPasswordagain">A) EMISSIONE DISEGNO / DRAWING ISSUE (16/03/2015 O.L.C.I. ENG.)</label>
                </div>
             <!-- <div class="form-group" ng-class="{ 'has-error' : userForm.password.$invalid && !userForm.password.$pristine }">
                <label class="control-label" for="signupPassword">B) ANNULLA E SOSTITUISCE PART. 9009-9010, MODIFICATO PART 9008, AGGIUNTA POS.028 e MODIFICATA Q.TA POS.024  /DELETE AND REPLACES DET. 9009-9010,MODIFIED DET. 9008, ADDED POS.028, MODIFIED Q.TY POS.024 (26/03/2015 O.L.C.I. Eng.)</label>
              </div>
              <div class="form-group" ng-class="{'has-error':!userForm.pwd2.$valid}">
                <label class="control-label" for="signupPasswordagain">C) ANNULLA E SOSTITUISCE PART. 9008, NUOVO PART 9011 , MODIFICATA POS.026 /DELETE AND REPLACES DET. 9008,NEW PART.9011,MODIFIED POS.026,  (03/04/2015 O.L.C.I. Eng.)</label>
              </div>
               <div class="form-group" ng-class="{ 'has-error' : userForm.password.$invalid && !userForm.password.$pristine }">
                <label class="control-label" for="signupPassword">D) MODIF. POS 01; VARIATA QUANTITà POS.22-24 - MOD. DETAIL POS.01; MOD QUANTITY DETAIL POS.22-24 (27/04/2015)</label>
              </div>-
              </div>
          </div>->
        </div>
      </div>
        <div ng-if="caricaFileSelezionato" ng-include src="'views/showdistintabase.php'"></div>
    </div>    
  </div>
 


  




  
<!--<button name="save" class="btn btn-default">SAVE</button> -->
 <!-- <div ng-controller="RevisioneCtrl">
    <button name="revisione" class="btn btn-default" ng-click="clkRevisione('<?php echo $_SESSION['present']; ?>')">REVISION</button>
  </div> -->
 
  </div>

<!-- <button name="load" class="btn btn-default btn-lg"><i class="icon-edit icon-white" hidden></i></button> 
  <div ng-include src="'../common/newdistintabase.html'"></div>
  <div ng-include src="'../common/createDbase.html'"></div>
</div>
-->


      
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js"></script>

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
<script src="dist/js/kendo.all.min.js"></script>
<script src="dist/js/angular-kendo.js"></script>
<script src="dist/js/app.js"></script>
<script src="dist/js/rev.js"></script>




</body>
</html>
