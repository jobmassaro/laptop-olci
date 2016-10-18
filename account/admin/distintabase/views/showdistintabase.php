

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
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['id']) 
{
	$id = $_GET['id'];
	$id_distbase = $_GET['id_distbase'];
	$layout = $_GET['layout'];
	$numdisegno = $_GET['numdisegno'];

	

	if($layout == 1 )
	{
		$layout = 'Mechanic';
	}

	if($layout == 2 )
	{
		$layout = 'Fluidic';
		
	}

	if($layout == 3 )
	{
		
		$layout = 'Electric';

	}

	if($layout == 4 )
	{
		$layout = 'Layout';
		
	}

	if($layout == 5 )
	{
		$layout = 'Generic';
	
	}

	if($layout == 6 )
	{
		$layout = 'Standard';	
	}

	if($layout == 7 )
	{
		$layout = 'Another';	
	}

	$sql = "SELECT MAX(rev) as revision FROM tbl_olci_distinta_base_". $id ."_" .$layout;

	
	$result = mysqli_query($mysqli, $sql);

 	if (mysqli_num_rows($result) > 0) 
 	{
   
    	// output data of each row
    	while($row = mysqli_fetch_assoc($result)) 
    	{
      		$lastrevision = $row['revision'];
      	
    	}
  	} 

}
?>
<!DOCTYPE html>
<html ng-app="swdDase">
<head>


  
  <title>OLCI | <?php echo $_SESSION['category']; ?></title>
  
  <link rel="stylesheet" href="../../../../dist/css/bootstrap.css" />
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css">
  <link rel="stylesheet" href="../../../../dist/css/style.css" />
  
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
    <link href="../../dist/handsontable.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" media="screen" href="../../apps/bundles/datasheet/jquery.handsontable.bootstrap.css">


    <link type="text/css" rel="stylesheet" href="http://docs.handsontable.com/0.16.0/bower_components/handsontable/dist/handsontable.full.min.css">

    <link rel="stylesheet" media="screen" href="../../apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.contextMenu.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css">


    <script src="../../ui/theme/bmsapp/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../../ui/theme/bmsapp/assets/js/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="../../ui/theme/bmsapp/assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="../../ui/theme/bmsapp/assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../../ui/theme/bmsapp/assets/js/modernizr.min.js" type="text/javascript"></script>
    <script src="../../ui/theme/bmsapp/assets/js/retina.js" type="text/javascript"></script>
    <script src="../../ui/theme/bmsapp/assets/js/application.js" type="text/javascript"></script>


    <!--<script src="apps/bundles/datasheet/dist/jquery.handsontable.full.js" type="text/javascript"></script>-->
    <script src="../../dist/handsontable.full.js" type="text/javascript"></script> 

    <script src="../../apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.contextMenu.js" type="text/javascript"></script>
    <script src="../../apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.ui.position.js" type="text/javascript"></script>



    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.silver.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.silver.mobile.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.dataviz.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.kendostatic.com/2014.1.318/styles/kendo.dataviz.default.min.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="../../css/custom.css" />
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
<body ng-controller="SWCtrl">
  
  <div class="navbar navbar-inverse" style="padding-top:-44px;">
    
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img src="../../../../images/logo.png" height="53px"/>
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
  

<a href="../detailsDbase.php?m=<?php  echo $id ."-" .$id_distbase; ?>" class="btn btn-default btn-lg">BACK</a>

<div class="col-md-12">
	<div class="row">
			<div class="col-md-6">
				<h2>Drawing: <b><?php echo $numdisegno; ?></b></h2>
				<p>List Base:<b style="font-size: 1.9em; color: blue;"> <?php echo $layout; ?></b>  ---  Last Revision:<b style="font-size: 1.9em; color: blue;"> <?php echo $lastrevision ;  ?></b></p>
				<button name="save" class="btn btn-default btn-lg">SAVE</button>
				<button class="btn btn-primary btn-lg">NEW REVISION</button>

			</div>

	     	<div class="col-md-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                	<button class="btn btn-default" ng-click="addLegenda()"><i class="glyphicon glyphicon-plus"></i></button>
                	<div ng-if="showAddLegenda" ng-include src="'addLegenda.php'"></div> 
                  	<button class="btn btn-danger" ng-click="deleteLegenda()"><i class="glyphicon glyphicon-remove"></i></button>	
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
              </div>-->
              </div>
          </div>
        </div>
</div>



<div id="example1" class="hot handsontable"></div> 
<button name="load" type="" id="test"></button>  
	<script type="text/javascript">
        	 var t = <?php echo $id; ?>;
        	
        	 var ly =  <?php echo json_encode($layout, JSON_HEX_TAG); ?>
 			
        	 console.log('eccolo' +ly);
                  
                  document.addEventListener("DOMContentLoaded", function() {

                  function getData() {

                    $.ajax({

                        url: 'loadbase.php',
                        data: 	{ m: t, l: ly },
                        dataType: 'json',
                        type: 'POST',
                         success: function (res) {

                                var data = [], row;

                                for (var i = 0, ilen = res.olci.length; i < ilen; i++) {
                                  row = [];
                                  row[0] = res.olci[i].id;
                                  row[1] = res.olci[i].pos;
                                  row[2] = res.olci[i].drwno;
                                  row[3] = res.olci[i].denominazione;
                                  row[4] = res.olci[i].qta;
                                  row[5] = res.olci[i].materiale;
                                  row[6] = res.olci[i].trattamento;
                                  row[7] = res.olci[i].processing;
                                  row[8] = res.olci[i].welding;
                                  row[9] = res.olci[i].ricambio;
                                  row[10] = res.olci[i].rev;
                                  row[11] = res.olci[i].foglio;
                                  row[12] = res.olci[i].disegno_no;
                                  row[13] = res.olci[i].consegne;
                                  //data[res.olci[i].id - 1] = row;
                                  data[res.olci[i].id -1] = row;
                                }
                                 handsontable.loadData(data);
                                autosaveNotification = setTimeout(function () {
                          }, 1000);
                        }
                      });
                  }
                  
                  // Instead of creating a new Handsontable instance
                  // with the container element passed as an argument,
                  // you can simply call .handsontable method on a jQuery DOM object.
                   var $container = $("#example1"),
                       $console = $("#exampleConsole"),
                       $parent = $container.parent(),
                       hot;
                  
                  hot = $container.handsontable({
                    contextMenu: true,
                    rowHeaders: true,
                    stretchH: 'all',
                  //  data: getData(),
                    colHeaders:['POS','DRW','OBJECT','Q.TA','MATERIAL','TRAETMENT','PROCESSING','WELDING','SPAREPART','REV','SHEET NO','DRAWING NO','DELIVERY'],
                    minSpareRows: 1,
                    contextMenu: true,
                    columns: [
                      { 
                        //POS
                      },
                      {
                        //DRW
                      },
                      {
                        //OBJECT
                      },
                      {
                        //Q.TA
                      },
                      {
                        //MATERIAL
                      },
                      {
                        //TRAETMENT
                      },
                      {
                        //PROCESSING
                      },
                      {
                        //WELDING
                      },
                      {
                        //SPAREPART
                        type: 'dropdown',
                        source: ['YES','NO']
                      },
                      {
                        //REV
                      },
                      {
                        //SHEET NO
                      },
                      {
                        //DRAWING
                      },
                      {
                        //DELIVERY
                      }
                      ],

                    /* afterChange: function (change, source) {
                      if (source === 'loadData') {
                        return; //don't save this change
                      }
                      if (!autosave.checked) {
                        return;
                      }
                      clearTimeout(autosaveNotification);
                      ajax('scripts/json/save.json', 'GET', JSON.stringify({data: change}), function (data) {
                        exampleConsole.innerText  = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
                        autosaveNotification = setTimeout(function() {
                          exampleConsole.innerText ='Changes will be autosaved';
                        }, 1000);
                      });
                    } */
                  });
                          var handsontable = $container.data('handsontable');
                          
                          $parent.find('button[name=load]').click(function () {

                            $.ajax({
                              url: '../services/loadbase.php',
                                data: 	{ m: t, l: ly },
                               /*data : ({ m: t}), */
                              dataType: 'json',
                              type: 'POST',
                              success: function (res) {

                                 var data = [], row;

                                for (var i = 0, ilen = res.olci.length; i < ilen; i++) {
                                  row = [];
                                 // row[0] = res.olci[i].p0;
                                  row[0] = res.olci[i].pos;
                                  row[1] = res.olci[i].drwno;
                                  row[2] = res.olci[i].denominazione;
                                  row[3] = res.olci[i].qta;
                                  row[4] = res.olci[i].materiale;
                                  row[5] = res.olci[i].trattamento;
                                  row[6] = res.olci[i].processing;
                                  row[7] = res.olci[i].welding;
                                  row[8] = res.olci[i].ricambio;
                                  row[9] = res.olci[i].rev;
                                  row[10] = res.olci[i].foglio;
                                  row[11] = res.olci[i].disegno_no;
                                  row[12] = res.olci[i].consegne;
                                  data[res.olci[i].id -1] = row;
                                }

                                $console.text('Data loaded');
                                toastr.success('Load!')
                                handsontable.loadData(data);
                              }
                            });
                          }).click(); // execute immediately


                             $parent.find('button[name=save]').click(function () {
                            



                            $.ajax({
                              type: "POST",
                              dataType: 'json',
                              cache: false,
                              url: '../services/savedbase.php',
                              data: {
                                data: handsontable.getData(),
                                m: t, 
                                l: ly ,
                                
                              }, // returns all cells' data
                              success: function (res) {

                                if (res.result === 'ok') {
                                  $console.text('Data saved');
                                }
                                else {
                                  $console.text('Save error');
                                }
                              },
                              error: function () {
                                $console.text('Save error');
                              }
                            });
                          });

                 // });
                  
                  // This way, you can access Handsontable api methods by passing their names as an argument, e.g.:
                  var hotInstance = $("#example1").handsontable('getInstance');
                  
                  function bindDumpButton() {
                      if (typeof Handsontable === "undefined") {
                        return;
                      }
                  
                      Handsontable.Dom.addEvent(document.body, 'click', function (e) {
                  
                        var element = e.target || e.srcElement;
                  
                        if (element.nodeName == "BUTTON" && element.name == 'dump') {
                          var name = element.getAttribute('data-dump');
                          var instance = element.getAttribute('data-instance');
                          var hot = window[instance];
                          console.log('data of ' + name, hot.getData());
                        }
                      });
                    }
                  bindDumpButton();

                });


  </script>



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
<script src="../../js/libs/angucomplete-alt.min.js"></script>
<script src="../dist/js/kendo.all.min.js"></script>
<script src="../dist/js/angular-kendo.js"></script>
<script src="../dist/js/angular-kendo.js"></script>
<script src="../dist/js/showdbase.js"></script>
