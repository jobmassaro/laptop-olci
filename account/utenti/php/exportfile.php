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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://ui-grid.info/release/ui-grid.css" type="text/css">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
  </head>
  <body >

<div class="container">
     <ul class="nav nav-pills pull-left">
            <li><a href="../index.php" class="btn btn-info"><i class="icon-th-list icon-white"></i>Back</a></li>
            <li><br /></li>
    </ul>
</div>


<div ng-controller="MainCtrl">

<div class="container">
  <div class="col-md-5 col-md-offset-2">
  <label>Which columns should we export?</label>
  <select ng-model="export_column_type"</select>
    <option value='all'>All</option>
    <option value='visible'>Visible</option>
  </select>
  <label>Which rows should we export?</label>
  <select ng-model="export_row_type"</select>
    <option value='all'>All</option>
    <option value='visible'>Visible</option>
    <option value='selected'>Selected</option>
  </select>
  <label>What format would you like?</label>
  <select ng-model="export_format"</select>
    <option value='csv'>CSV</option>
  </select>
  <button ng-click="export()">Export</button>
  <div class="custom-csv-link-location">
    <label>Your CSV will show below:</label>
    <br />
    <span class="ui-grid-exporter-csv-link">&nbsp</span>
  </div>
</div>

</div>  
  <div ui-grid="gridOptions" ui-grid-selection ui-grid-exporter ui-grid-move-columns class="grid"></div>



</div><!-- end Main -->


    <script src="app.js"></script>
  </body>
</html>