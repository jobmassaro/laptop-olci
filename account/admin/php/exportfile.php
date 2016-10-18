<!doctype html>
<html ng-app="app">
  <head>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="http://ui-grid.info/release/ui-grid.css" type="text/css">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    

  </head>

  <body>



<div ng-controller="MainCtrl">

  <div  class="container">
     <ul class="nav nav-pills pull-left">
            <li><a href="../index.php" class="btn btn-info"><i class="icon-th-list icon-white"></i>Back</a></li>
            <li><br /></li>
    </ul>


    <br><br><br>
    <label>Which columns should we export?</label>
      <select ng-model="export_column_type" >
        <option value='all'>All</option>
        <option value='visible'>Visible</option>
      </select>
  <br>
      <label>Which rows should we export?</label>
      <select ng-model="export_row_type"</select>
        <option value='all'>All</option>
        <option value='visible'>Visible</option>
        <option value='selected'>Selected</option>
      </select>
  <br>

      <label>What format would you like?</label>
      <select ng-model="export_format"</select>
        <option value='csv'>EXCEL</option>
      </select>
  <br>
    
    <button ng-click="export()" class="btn btn-default">Export</button>
    <div class="custom-csv-link-location">
      <span class="ui-grid-exporter-csv-link">&nbsp</span>
  </div>
  </div>
  <div ui-grid="gridOptions" ui-grid-selection ui-grid-exporter ui-grid-move-columns class="grid"></div>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-touch.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/csv.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/pdfmake.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script>
    <script src="http://ui-grid.info/release/ui-grid.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.core.min.js"></script> 
    <script src="//cdn.jsdelivr.net/alasql/0.2/alasql.min.js"></script> 

    <script src="app.js"></script>
  </body>
</html>
