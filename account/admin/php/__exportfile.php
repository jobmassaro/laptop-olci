<!doctype html>
<html ng-app="app">
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-touch.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/csv.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/pdfmake.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script>
    <script src="http://ui-grid.info/release/ui-grid.js"></script>
    <!-- Latest compiled and minified CSS -->
    <script src="http://ui-grid.info/release/ui-grid.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.core.min.js"></script> 
    <script src="//cdn.jsdelivr.net/alasql/0.2/alasql.min.js"></script> 

    
    <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  
    <link rel="stylesheet" href="http://ui-grid.info/release/ui-grid.css" type="text/css">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <style type="text/css">
      .grid {
            width: 100%;
            
          }
    </style>
  </head>
  <body >

<div class="container">
     <ul class="nav nav-pills pull-left">
            <li><a href="../index.php" class="btn btn-info"><i class="icon-th-list icon-white"></i>Back</a></li>
            <li><br /></li>
    </ul>
</div>


<div ng-controller="MainCtrl">

 <div ui-grid="gridOptions" ui-grid-selection ui-grid-exporter class="grid"></div>


</div><!-- end Main -->


    <script src="app.js"></script>
  </body>
</html>
