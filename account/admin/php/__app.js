var app = angular.module('app', ['ngAnimate', 'ngTouch', 'ui.grid', 'ui.grid.selection', 'ui.grid.exporter','ui.grid.resizeColumns']);

app.controller('MainCtrl', ['$scope', '$http', function ($scope, $http) {
	var nomefile = '';
  $scope.gridOptions = {
  	 enableColumnResizing: false,
     columnDefs: [
      { field: 'p0', name: '0', visible: true },
      { field: 'p1', name: '1' , visible: true},
      { field: 'p2', name: '2' , visible: true},
      { field: 'p3', name: '3' , visible: true},
      { field: 'p4', name: '4', visible: true },
      { field: 'p5', name: '5' , visible: true},
      { field: 'p6', name: '6', visible: true },
      { field: 'STAZIONE', name: 'STATION', visible: true },
      { field: 'CODICE_STRUTTURA', name: 'STRUCTURE CODE', visible: true },
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
    enableGridMenu: true,
    enableSelectAll: true,
    gridMenuCustomItems: [
        {
            title: "Export Excel",
            action: function($event){
				alasql('SELECT * INTO XLSX("' +nomefile +'.xls",{headers:true}) FROM ?',[$scope.gridOptions.data]);
            },
            icon: "glyphicon glyphicon-qrcode"
        },
       ],

    
   /* exporterPdfDefaultStyle: {fontSize: 9},
    exporterPdfTableStyle: {margin: [20, 20, 20, 20]},
    exporterPdfTableHeaderStyle: {fontSize: 10, bold: true, italics: true, color: 'red'},
    exporterPdfHeader: { text: "My Header", style: 'headerStyle' },
    exporterPdfFooter: function ( currentPage, pageCount ) {
      return { text: currentPage.toString() + ' of ' + pageCount.toString(), style: 'footerStyle' };
    },
    exporterPdfCustomFormatter: function ( docDefinition ) {
      docDefinition.styles.headerStyle = { fontSize: 22, bold: true };
      docDefinition.styles.footerStyle = { fontSize: 10, bold: true };
      return docDefinition;
    },
    exporterPdfOrientation: 'portrait',
    exporterPdfPageSize: 'LETTER',
    exporterPdfMaxGridWidth: 500,
    exporterCsvLinkElement: angular.element(document.querySelectorAll(".custom-csv-link-location")),
    onRegisterApi: function(gridApi){
      $scope.gridApi = gridApi;
    }*/
  };

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
			exporterCsvFilename:nomefile+'.xls';
		});
    }


}]);