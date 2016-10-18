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

<!DOCTYPE html>
<html ng-app="olciAdmin">
<head>
	<title>OLCI | <?php echo $_SESSION['category']; ?></title>
	
	<link rel="stylesheet" href="../../dist/css/bootstrap.css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css">
	<link rel="stylesheet" href="../../dist/css/style.css" />
	
	<link rel="stylesheet" href="css/custom.css" />
	<style type="text/css">
		#mfont
		{
			color: black;
		}
	</style>
</head>
<body ng-controller="ListCtrl">
	
	<nav class="navbar ">
		<div class="container">
    	<!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      		<img src="../../images/logo.png" height="80px"/>
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
	</nav>

	<div class="container">
		<div class="col-md-8">
			<form action="uploadfile.php" method="post" enctype="multipart/form-data" name="FileUploadForm" id="FileUploadForm">
		    	<input type="file" name="UploadFileField" id="UploadFileField"/>
		    	<button type="submit" class="file-upload-button" tabindex="-1">Upload File</button>
			</form>
		</div>
		<p></p>
	</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p></p>

<div class="container">
  	<button class="btn btn-info" ng-click="editInfo(detail)" id="edit">ADD New 
	   	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
	</button>
</div>		
	

	<div class="col-md-8 col-md-offset-2">
			<div ng-include src="'common/newfile.html'"></div>
			<div ng-include src="'common/newline.html'"></div>
        	
			<div class="alert alert-default input-group search-box">
				<span class="input-group-btn">
					<input type="text" class="form-control" placeholder="Search file..." ng-model="search_query" style="height:50px;">
				</span>
			</div>
	</div>


		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Name File</th>
						<th>Project</th>
						<th>Line</th>
						<th>Line drawing</th>
						<th>Acronym Line</th>
						<th>Plant</th>
						<th>Model</th>
						<th>Edit</th>
						<th>Clone</th>
						<!--<th>Delete</th>-->


					</tr>
					<tr ng-repeat="detail in head|filter: search_query">
						<td>{{detail.nome_disegno_tabella}}</td>
						<td>{{detail.progetto}}</td>
						<td>{{detail.linea}}</td>
						<td>{{detail.numero_disegno_linea}}</td>
						<td>{{detail.acronimo_linea}}</td>
						<td>{{detail.plant}}</td>
						<td>{{detail.modello}}</td>

						<td>

							
							
							<button class="btn btn-warning" ng-click="editEditFileOlci(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>

							<!--<form method="post" action="listexcel.php">
    							<input type="hidden" name="m" value="{{ detail.id }}">
    							<button class="btn btn-warning" ng-click="editEditFileOlci(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
    							<button class="btn btn-warning" ng-click="editEditFileOlci(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
    							<!--<button class="btn btn-warning" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
							</form> -->
							
						</td>
						<td>
							<button class="btn btn-info" ng-click="cloneFileOlci(detail)" title="Clone"><span class="glyphicon glyphicon-copyright-mark"></span></button>
						</td>
						<!--<td>
							<button class="btn btn-danger" ng-click="deleteFileOlci(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
						</td> -->
					</tr>

			</table>
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
