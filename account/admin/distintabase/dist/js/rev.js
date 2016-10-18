var rev = angular.module('revApp',['kendo.directives']);



rev.factory('getInfoService', function($http)
{
    var baseUrl = 'services/';

    return {

        getInfoListDbase: function(id)
        {
          return $http.post(baseUrl + 'getInfoService.php?name='+encodeURIComponent(id));
        }

    };
});






rev.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);


rev.service('fileUpload', ['$http', function ($http) 
{
    this.uploadFileToUrl = function(file, uploadUrl, name, id, id_distbase, disegno_no){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         fd.append('id', id);
         fd.append('id_distbase', id_distbase);
         fd.append('disegno_no', disegno_no);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(){
            location.href = 'index.php';
         })
         .error(function(){
            console.log("Success");
         });
     }
 }]);




rev.controller('RevisioneCtrl', function($scope, $http){
	var baseUrl = 'services/';
  $scope.clkRevisione = function(item){
     $http.post( baseUrl + 'revisione.php',{"id":item.id,"id_distbase": item.id_distbase}).success(function(data){
     		console.log(data);
     })
  }
});



rev.controller('detailCtrl', function($scope,$http,$timeout,fileUpload, getInfoService){
      
      var that = this;


      $scope.showNuovaDistintaBase = false;
      $scope.showImportDistintaBase = false;
      $scope.showFileDistintaBase = false;
      $scope.layoutSelezionato = false;
      $scope.loadDBase = false;
      $scope.caricaFileSelezionato = false;

      
    $scope.$watch('id', function()
    {
        getInfoService.getInfoListDbase($scope.id)
          .success(function(data) {
            that.values = data;
            $scope.id = that.values[0].id;
            $scope.id_distbase = that.values[0].id_distbase;
            $scope.disegno_no = that.values[0].disegno_no;

        });
    });



     $scope.uploadFile = function(item)
    {
        var file = $scope.myFile;
        console.log('file is ' );
        console.dir(file);
        var id = that.values[0].id;
        var id_distbase = that.values[0].id_distbase;
        var disegno_no = that.values[0].disegno_no;
        console.log($scope.layout );
        console.log(id);
        console.log(id_distbase);
        console.log(disegno_no);
        var uploadUrl = "uploadDBase.php";
        var text = $scope.name;
       // fileUpload.uploadFileToUrl(file, uploadUrl, text, id, id_distbase,disegno_no);
    }


  /*  $scope.uploadFile = function(item)
     {
        
        //console.log('dsadasd' +that.values[0].id);
        //console.log(item);
        var file = $scope.myFile;
        //console.log('file is ' );
        //console.dir(file);
        
        var id = that.values[0].id;
        var id_distbase = that.values[0].id_distbase;
        var disegno_no = that.values[0].disegno_no;
        //console.log(id);
        //console.log(id_distbase);
        //console.log(disegno_no);

        var uploadUrl = "uploadDBase.php";
        var text = file.name;
        //console.log(text);
        fileUpload.uploadFileToUrl(file, uploadUrl, text, id, id_distbase,disegno_no);
      } */


      $scope.uploadFiles = function(item, file, errFiles) {
            $scope.f = file;

           
            /*console.log(item);*/
            $scope.errFile = errFiles && errFiles[0];
            if (file) {

                $http.post('uploadDBase.php',{"id":item.id,"id_distbase": item.id_distbase})
                .success(function(data){
                });
               file.upload = Upload.upload({
                    url: 'uploadDBase.php',
                    data: {file: file}
                });

                file.upload.then(function (response) {
                    $timeout(function () {
                        file.result = response.data;
                    });
                }, function (response) {
                    if (response.status > 0)
                        $scope.errorMsg = response.status + ': ' + response.data;
                }, function (evt) {
                    file.progress = Math.min(100, parseInt(100.0 *
                    evt.loaded / evt.total));
                });
              };
        };



  
      activate();

      function activate(){
         $scope.listOptions = {
            dataSource: {
               data: [
                      {id: '1', name: 'Mechanic'},
                      {id: '2', name: 'Fluidic'},
                      {id: '3', name: 'Electric'},
                      {id: '4', name: 'Layout'},
                      {id: '5', name: 'Generic'},
                      {id: '6', name: 'Standard'},
                      {id: '7', name: 'Another'},

                ]
            },
            dataTextField: "name",
            dataValueField: "id",
            optionLabel: "Select ..."
         };

          $scope.listRevision = {
            dataSource: {
               data: [
                      {id: '1', name: 'A'},
                      {id: '2', name: 'B'},
                      {id: '3', name: 'C'},
                      {id: '4', name: 'D'},
                      {id: '5', name: 'E'},
                      {id: '6', name: 'F'},
                      {id: '7', name: 'G'},
                      {id: '8', name: 'J'},
                      {id: '9', name: 'X'},
                      {id: '10', name: 'H'},
                      {id: '11', name: 'I'},
                      {id: '12', name: 'L'},
                      {id: '13', name: 'M'},
                      {id: '14', name: 'N'},
                      {id: '15', name: '0'},
                      {id: '16', name: 'P'},
                      {id: '17', name: 'K'},
                      {id: '18', name: 'Y'},
                      {id: '19', name: 'Q'},
                      {id: '20', name: 'R'},
                      {id: '21', name: 'S'},
                      {id: '22', name: 'T'},
                      {id: '23', name: 'U'},
                      {id: '24', name: 'V'},
                      {id: '25', name: 'Z'},
                      {id: '26', name: 'WW'},

                ]
            },
            dataTextField: "name",
            dataValueField: "id",
            optionLabel: "Select ..."
         };

         
    }


   $scope.listChange = function(e)
   {
      console.log(e.sender.text());
      $scope.listChosen = true;
      $scope.layout = e.sender.text();
      $scope.layoutSelezionato = true;
      $scope.showFileDistintaBase = ! $scope.showFileDistintaBase;
      if (e.sender.text() == "Select a ..")
      {
         $scope.listChosen = false;
         $scope.layoutSelezionato = !$scope.layoutSelezionato;
         $scope.showFileDistintaBase = ! $scope.showFileDistintaBase;
      }
   }

   $scope.loadRevision = function(e)
   {
      console.log(e.sender.text());
    
      if (e.sender.text() == "Select a ..")
      {
         $scope.loadDBase = !loadDBase;
         
      }
   }

   

  

   $scope.toggleImportDBase = function() 
   {
       $scope.showImportDistintaBase = ! $scope.showImportDistintaBase;
   }

   $scope.toggleNuovaDBase = function() 
   {
       $scope.showNuovaDistintaBase = ! $scope.showNuovaDistintaBase;
   }
  

  $scope.createDbase = function(item)
  { 
    console.log(item);

    $('#editFormDbase').slideToggle();
    
  }

  $scope.toggleLoadDbase= function(item)
  {
    $scope.loadDBase = !$scope.loadDBase;
  }



  $scope.creaNuovaDBase = function(item)
  {
    $scope.caricaFileSelezionato = !$scope.caricaFileSelezionato;
  }

  $scope.loadDistintaBase = function(item)
  {
    console.log(item);
    var params = 'views/showdistintabase.php?id=' + item.id + '&id_distbase=' +item.id_distbase+'&layout='+item.layout+'&numdisegno='+ item.disegno_no;
    location.href = params;
    //$scope.caricaFileSelezionato = !$scope.caricaFileSelezionato;

  }


   
});
