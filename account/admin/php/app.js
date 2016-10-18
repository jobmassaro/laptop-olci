var app = angular.module('app', ['ngAnimate', 'ngTouch', 'ui.grid', 'ui.grid.selection', 'ui.grid.exporter', 'ui.grid.moveColumns']);

app.controller('MainCtrl', ['$scope', '$http', function ($scope, $http) {
  var nomefile = '';
  $scope.gridOptions = {
    columnDefs: [
      { field: 'p0', name: '0' ,visible: true},
      { field: 'p1', name: '1',visible: true },
      { field: 'p2', name: '2',visible: true },
      { field: 'p3', name: '3',visible: true },
      { field: 'p4', name: '4',visible: true },
      { field: 'p5', name: '5',visible: true },
      { field: 'p6', name: '6',visible: true },
      { field: 'STAZIONE', name: 'STATION',visible: true },
      { field: 'CODICE_STRUTTURA', name: 'STRUCTURE CODE',visible: true },
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
    enableSelectAll: true,
    onRegisterApi: function(gridApi){ 
      $scope.gridApi = gridApi;
    }
  };
  
  //$http.get('https://cdn.rawgit.com/angular-ui/ui-grid.info/gh-pages/data/100.json')
  $http.get('tableolci_body.php')
    .success(function(data) {
     $scope.gridOptions.data = data;
      getNameFile();

    });
    

      function getNameFile()
      {
        var id_head = $scope.gridOptions.data[0].id_head;
        $http.post('tableolci_head.php',{"id_head": id_head }).success(function(data){
        nomefile= data[0].nome_disegno_tabella;
        
    });
    }

  
    
  $scope.export = function(){
    if ($scope.export_format == 'csv') {
      var myElement = angular.element(document.querySelectorAll(".custom-csv-link-location"));
      $scope.gridOptions.exporterCsvFilename = nomefile+".xls";
      $scope.gridApi.exporter.csvExport( $scope.export_row_type, $scope.export_column_type, myElement );
    } else if ($scope.export_format == 'excel') {
      alasql('SELECT * INTO XLSX("test.xls",{headers:true}) FROM ?',[$scope.export_column_type]);
    };
  };
}])


