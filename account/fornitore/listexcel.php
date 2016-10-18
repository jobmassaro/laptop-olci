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
  $uid = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING);
  
 // var_dump($uid);

  if(isset($uid))
  {?>
      
  <?php 
  }
}

?>
<!DOCTYPE html>
<html ng-app="olciAdmin">
<head>
  <title>OLCI | <?php echo $_SESSION['category']; ?></title>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <!--[if lt IE 9]>
    <script src='http://html5shim.googlecode.com/svn/trunk/html5.js' type='text/javascript'></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <link href="http://cloud5.bdinfosys.com/datagrid/ui/theme/bmsapp/assets/css/ie8.css" media="screen" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <link href="ui/theme/bmsapp/assets/css/bootstrap.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="ui/theme/bmsapp/assets/css/bootstrap-responsive.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="ui/theme/bmsapp/assets/css/font-awesome.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="ui/theme/bmsapp/assets/css/bootstrap-datatable.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="ui/theme/bmsapp/assets/css/style.css" media="all" rel="stylesheet" type="text/css"/>
    <!--<link rel="stylesheet" media="screen" href="apps/bundles/datasheet/jquery.handsontable.css">-->
    <link href="dist/handsontable.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" media="screen" href="apps/bundles/datasheet/jquery.handsontable.bootstrap.css">
    <link rel="stylesheet" media="screen" href="apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.contextMenu.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css">


    <script src="ui/theme/bmsapp/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="ui/theme/bmsapp/assets/js/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="ui/theme/bmsapp/assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="ui/theme/bmsapp/assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="ui/theme/bmsapp/assets/js/modernizr.min.js" type="text/javascript"></script>
    <script src="ui/theme/bmsapp/assets/js/retina.js" type="text/javascript"></script>
    <script src="ui/theme/bmsapp/assets/js/application.js" type="text/javascript"></script>

    <!--<script src="apps/bundles/datasheet/dist/jquery.handsontable.full.js" type="text/javascript"></script>-->
    <script src="dist/handsontable.full.js" type="text/javascript"></script> 

    <script src="apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.contextMenu.js" type="text/javascript"></script>
   <script src="apps/bundles/datasheet/lib/jQuery-contextMenu/jquery.ui.position.js" type="text/javascript"></script>
    <style type="text/css">
    #mfont
    {
      color: white;
    }
  </style>
  </head>
  <body>
     <div class="container">
    <div class="header clearfix">

        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="">
                <img src="../../images/loghi.png" class="btn btn-info" style="width:35%;">
            </li>
          </ul>
        </nav>
        <nav>
          <ul class="nav nav-pills pull-left">
            <li><img src="../../images/logo.png" style="width:45%;"><a href="index.php" class="btn btn-info"><i class="icon-th-list icon-white"></i>Back</a></li>
            <li><br /></li>
          </ul>
        </nav>
        




        
      </div>



 <div class="row" ng-controller="OlciHeadCtrl" >    
  <div class="panel panel-default" ng-repeat="h in data" style="border:1px solid grey;">
    <?php //echo $uid; ?>
    <!--  <p ng-if="h.id_head=<?php echo $uid; ?>">
          {{h.id}}
      </p> -->
    <p></p>
<div class="col-md-4">
    <form class="form-horizontal" id="progetto">
    <div class="form-group" >
        <label for="progetto" class="control-label col-xs-4" >PROJECT:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="progetto" placeholder="project" ng-model="h.progetto">
        </div>
    </div>
    <div class="form-group">
        <label for="linea" class="control-label col-xs-4" >LINE:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="linea" placeholder="line" ng-model="h.linea">
        </div>
    </div>
    <div class="form-group">
        <label for="numdisegno" class="control-label col-xs-4" >LINE DRAWING:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="numdisegno" placeholder="line drawing number " ng-model="h.numero_disegno_linea">
        </div>
    </div>
    <div class="form-group">
        <label for="acronimo" class="control-label col-xs-4">ACRONYM LINE :</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="acronimo" placeholder="acronym line" ng-model="h.acronimo_linea">
        </div>
    </div>
     <div class="form-group">
        <label for="plat" class="control-label col-xs-4">PLANT:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="plat" placeholder="plant" ng-model="h.plant">
        </div>
    </div>
     <div class="form-group">
        <label for="modello" class="control-label col-xs-4">MODEL:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="modello" placeholder="model" ng-model="h.modello">
        </div>
    </div>
    
</form>
</div>
 
 <div class="col-md-3">
  <form class="form-horizontal" id="progetto">
    <div class="form-group" >
        <label for="revtabella" class="control-label col-xs-4" >REV TABLE:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="revtabella" placeholder="rev.table" ng-model="h.rev_tabella">
        </div>
    </div>
    <div class="form-group">
        <label for="checked" class="control-label col-xs-4" >CHECKED:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="checked" placeholder="checked" ng-model="h.controllato">
        </div>
    </div>
    <div class="form-group">
        <label for="created" class="control-label col-xs-4" >CREATED:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="created" placeholder="created" ng-model="h.creato">
        </div>
    </div>
    <div class="form-group">
        <label for="lastmod" class="control-label col-xs-4">LAST MODIFICATION:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="lastmod" placeholder="last. modification" ng-model="h.ultima_modifica">
        </div>
    </div>
     <div class="form-group">
        <label for="writer" class="control-label col-xs-4">WRITER:</label>
        <div class="col-xs-6">
            <input type="text" class="form-control hfield" id="writer" placeholder="writer" ng-model="h.compilatore">
        </div>
    </div>
     <div class="form-group">
      <p></p>
       <label for="writer" class="control-label col-xs-4"></label>
        <button class="btn btn-success" type="button" ng-click="saveInfo(h)">SAVE
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
         </button>
        </button>
     </div>
</form>
</div>
    
  </div>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr />
  <div class="col-md-2"></div>
  
    

            <p>
              <button name="load" class="btn btn-warning"><i class="icon-edit icon-white"></i>Load</button>
              <button name="save" class="btn btn-primary"><i class="icon-ok icon-white"></i>Save Data</button>
              <a href="php/exportfile.php" class="btn btn-info"  id="mfont"><i class="icon-th-list icon-white"></i>Export as a file</a>
              <!--<button id="export-file"  class="btn btn-info"><i class="icon-th-list icon-white"></i>Export as a file</button>-->
              <a href="index.php" class="btn btn-info" ><i class="icon-th-list icon-white" id="mfont"></i>Back</a>
            </p>

            <div id="exampleConsole" class="console">Click "Load" to load data from server</div>

          
        
        <div class="col-md-2"></div>
          <div class="col-md-8" id="example1"></div>

          <p>
          </p>


       
          
      
          <script>
          
          var t = <?php echo $uid; ?>;
          var livello = 0;
          var
            $container = $("#example1"),
            $console = $("#exampleConsole"),
            $parent = $container.parent(),
            autosaveNotification,
            hot;

          hot =  $container.handsontable({
            contextMenu: true,
            rowHeaders: true,
            //colHeaders: ['L0','L1', 'L2','L3','L4','L5','L6','STAZIONE','STRUCTURE CODE','SUPPLIER DRAWING','CUSTOMER DRAWING','ORIGIN FILE','TOTAL SHEET','SHEETS RECEIVED','ITALIAN DESCRIPTION','ENGLISH DESCRIPTION','LOCAL DESCRIPTION','PRINT FILE','ORIG.FILE.REV','SUPPLIER','DATE','NOTE'],
            colHeaders:['0','1','2','3','4','5','6','STAZIONE','STRUCTURE CODE','SUPPLIER DRAWING','CUSTOMER DRAWING','ORIGIN FILE','TOTAL SHEET','SHEETS RECEIVED','ITALIAN DESCRIPTION','ENGLISH DESCRIPTION','LOCAL DESCRIPTION','PRINT FILE','ORIG.FILE.REV','SUPPLIER','DATE','NOTE'],
            columns: [
              {
                //l0
                type:'autocomplete',
                source:['0','1','2','3','4','5','6'],
                strict:false
              },
               {
                //l1
                  type:'autocomplete',
                  source:['0','1','2','3','4','5','6'],
                  strict:false
                },
               {
                //L2
                 type:'autocomplete',
                source:['0','1','2','3','4','5','6'],
                strict:false
            
              },
               {
                //L3
                type:'autocomplete',
                source:['0','1','2','3','4','5','6'],
                strict:false

              },
              {
                //L4
                type:'autocomplete',
                source:['0','1','2','3','4','5','6'],
                strict:false

              },
              {
                 //L5
                type:'autocomplete',
                source:['0','1','2','3','4','5','6'],
                strict:false

              },
              {
               
                //L6
                type:'autocomplete',
                source:['0','1','2','3','4','5','6'],
                strict:false

                
              },
              {

                //STATION
                 type:'autocomplete',
                  source: function () 
                  {
                   
                  console.log('livello => ' + livello) ;

                  if(livello == '0')
                      return ["000-000-0"] 
                  if(livello == '1')
                     return ["000-010-0"] 

                },
                 
            },
            

            {
                //structure code
                type: 'autocomplete',
                source: ['BMW', 'Chrysler', 'Nissan', 'Suzuki', 'Toyota', 'Volvo'],
                strict: false
            },
            {
              //SUPPLIER DRAWING 
            },
            {
              //CUSTOMER DRAWING
            },
            {
              //ORIGIN FILE
            },
            {
              //TOTAL SHEET
            },
            {
              //SHEETS RECEIVED
            },
            {
              //ITALIAN DESCRIPTION
            },
            {
              //ENGLISH DESCRIPTION
            },
            {
              //LOCAL DESCRIPTION
            },
            {
              //PRINT FILE
            },
            {
              //ORIG.FILE.REV
            },
            {
              //SUPPLIER",
            },
            {
              //"DATE"
              type: 'date',
              dateFormat: 'DD/MM/YYYY',
              correctFormat: true,
              defaultDate: '01/01/2016'
            },
            {
              //"NOTE"
            }
              
            ],
            m: t,
            onChange: function (change, source) {
              var data;
            
              if (source === 'loadData' || !$parent.find('input[name=autosave]').is(':checked')) 
              {
                  return;
              }


              data = change[0];

              // transform sorted row to original row
              data[0] = hot.sortIndex[data[0]] ? hot.sortIndex[data[0]][0] : data[0];

              clearTimeout(autosaveNotification);
              $.ajax({
                url: 'php/saveolci.php',
                dataType: 'json',
                type: 'POST',
                data: ({ changes: change}), // contains changed cells' data
                success: function () {
                  $console.text('Autosaved (' + change.length + ' cell' + (change.length > 1 ? 's' : '') + ')');

                  autosaveNotification = setTimeout(function () {
                    $console.text('Changes will be autosaved');
                  }, 1000);
                }
              });
             } //change

          });
          var handsontable = $container.data('handsontable');
         


          $parent.find('button[name=load]').click(function () {

            $.ajax({
              url: 'php/loadolci.php',
              data : ({ m: t}), 
              dataType: 'json',
              type: 'POST',
              success: function (res) {

                var data = [], row;

                for (var i = 0, ilen = res.olci.length; i < ilen; i++) {
                  row = [];
                 // row[0] = res.olci[i].p0;
                  row[0] = res.olci[i].p0;
                  row[1] = res.olci[i].p1;
                  row[2] = res.olci[i].p2;
                  row[3] = res.olci[i].p3;
                  row[4] = res.olci[i].p4;
                  row[5] = res.olci[i].p5;
                  row[6] = res.olci[i].p6;
                  row[7] = res.olci[i].STAZIONE;
                  row[8] = res.olci[i].CODICE_STRUTTURA;
                  row[9] = res.olci[i].DISEGNO_FORNITORE;
                  row[10] = res.olci[i].DISEGNO_CLIENTE;
                  row[11] = res.olci[i].FILE_ORIGINALE;
                  row[12] = res.olci[i].TOTALE_FOGLI;
                  row[13] = res.olci[i].FOGLI_RICEVUTI;
                  row[14] = res.olci[i].DESCRIZIONE_ITALIANO;
                  row[15] = res.olci[i].DESCRIZIONE_INGLESE;
                  row[16] = res.olci[i].DESCRIZIONE_LINGUA_LOCALE;
                  row[17] = res.olci[i].File_di_Stampa_Rev;
                  row[18] = res.olci[i].File_Originale_Rev;
                  row[19] = res.olci[i].FORNITORE;
                  row[20] = res.olci[i].Data;
                  row[21] = res.olci[i].NOTE;
                  row[22] = res.olci[i].id_head;
                  

                  //data[res.olci[i].id - 1] = row;
                  data[res.olci[i].id -1] = row;
                }

                $console.text('Data loaded');
                console.log(res);
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
              url: 'php/saveolci.php',
              data: {
                data: handsontable.getData()
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

          $parent.find('button[name=reset]').click(function () {
            $.ajax({
              url: 'php/reset.php',
              success: function () {
                $parent.find('button[name=load]').click();
              },
              error: function () {
                $console.text('Data reset failed');
              }
            });
          });

          $parent.find('input[name=autosave]').click(function () {
            if ($(this).is(':checked')) {
              $console.text('Changes will be autosaved');
            }
            else {
              $console.text('Changes will not be autosaved');
            }
          });






          </script>
        </div>
      </div>
    </div>
  </div>

        <div class="footer-text">
        </div>
      </div>

    </div>

  </div>
</div>






<script src="js/jquery.min.js"></script>        
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
<script src="js/libs/angucomplete-alt.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
  