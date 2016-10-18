var app = angular.module('app', ['ngAnimate', 'ngTouch', 'ui.grid', 'ui.grid.selection', 'ui.grid.exporter', 'ui.grid.moveColumns']);

app.controller('MainCtrl', ['$scope', '$http', function ($scope, $http) {
  $scope.gridOptions = {
    columnDefs: [
      { field: 'p0', name: '0' },
      { field: 'p1', name: '1' },
      { field: 'p2', name: '2' },
      { field: 'p3', name: '3' },
      { field: 'p4', name: '4' },
      { field: 'p5', name: '5' },
      { field: 'p6', name: '6' },
      { field: 'STAZIONE', name: 'STATION' },
      { field: 'CODICE_STRUTTURA', name: 'STRUCTURE CODE' },
      { field: 'DISEGNO_FORNITORE', name:'SUPPLIER DRAWING', visible: true },
      { field: 'DISEGNO_CLIENTE', name:'CUSTOMER DRAWING', visible: true },
      { field: 'FILE_ORIGINALE', name: 'ORIGIN FILE', visible: true },
      { field: 'TOTALE_FOGLI', name:'TOTAL SHEET', visible: true },
      { field: 'FOGLI_RICEVUTI', name:'SHEETS RECEIVED', visible: true },
      { field: 'DESCRIZIONE_ITALIANO', name: 'ITALIAN DESCRIPTION',visible: true },
      { field: 'DESCRIZIONE_INGLESE',name:'ENGLISH DESCRIPTION', visible: true },
      { field: 'LOCAL DESCRIPTION', name:'LOCAL DESCRIPTION', visible: true },
      { field: 'File_di_Stampa_Rev', name: 'PRINT FILE',visible: true },
      { field: 'File_Originale_Rev', name:'ORIG.FILE.REV', visible: true },
      { field: 'FORNITORE',name:'SUPPLIER', visible: true },
      { field: 'Data', name:'DATE', visible: true },
      { field: 'NOTE', name:'NOTE',visible: true }, 

    ],
    exporterLinkLabel: 'get your csv here',
    exporterPdfDefaultStyle: {fontSize: 9},
    exporterPdfTableStyle: {margin: [1, 5, 5, 5,5,5,5,5,5,5,5,5,5,5,15]},
    exporterPdfTableHeaderStyle: {fontSize: 10, bold: true, italics: true, color: 'red'},
    exporterPdfOrientation: 'portrait',
    exporterPdfPageSize: 'LETTER',
    exporterPdfMaxGridWidth: 800,
    exporterHeaderFilter: function( displayName ) { 
      if( displayName === 'Name' ) { 
        return 'Person Name'; 
      } else { 
        return displayName;
      } 
    },
    exporterFieldCallback: function( grid, row, col, input ) {
      if( col.name == 'gender' ){
        switch( input ){
          case 1:
            return 'female';
            break;
          case 2:
            return 'male';
            break;
          default:
            return 'unknown';
            break;
        }
      } else {
        return input;
      }
    },
    onRegisterApi: function(gridApi){ 
      $scope.gridApi = gridApi;
    }
  };
  
  //$http.get('https://cdn.rawgit.com/angular-ui/ui-grid.info/gh-pages/data/100.json')
  $http.get('tableolci_body.php')
    .success(function(data) {
     $scope.gridOptions.data = data;


    });
    
  
    
  $scope.export = function(){
    if ($scope.export_format == 'csv') {
      var myElement = angular.element(document.querySelectorAll(".custom-csv-link-location"));
      $scope.gridApi.exporter.csvExport( $scope.export_row_type, $scope.export_column_type, myElement );
    } else if ($scope.export_format == 'pdf') {
      $scope.gridApi.exporter.pdfExport( $scope.export_row_type, $scope.export_column_type );
    };
  };
}])

.filter('mapGender', function() {
  return function( input ) {
    switch( input ){
      case 1:
        return 'female';
        break;
      case 2:
        return 'male';
        break;
      default:
        return 'unknown';
        break;
    }
  };
});
