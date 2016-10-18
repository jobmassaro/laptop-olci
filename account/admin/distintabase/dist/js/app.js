var app = angular.module('dbase',["ngMaterial","ngMessages","ngTouch", "angucomplete-alt",'ngAnimate', 'ngFileUpload','ui.grid', 'ui.grid.selection', 'ui.grid.exporter', 'ui.grid.moveColumns','ui.bootstrap','dialogs']);


app.directive('fileModel', ['$parse', function ($parse) {
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


app.service('fileUpload', ['$http', function ($http) {
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





app.controller('uploadCtrl', function($scope,fileUpload, $window){

    $scope.uploadFile = function(item)
    {
        var file = $scope.myFile;
        console.log('file is ' );
        console.dir(file);
        var id = item.id;
        var id_distbase = item.id_distbase;
        var disegno_no = item.disegno_no;
        var uploadUrl = "uploadDBase.php";
        var text = $scope.name;
        fileUpload.uploadFileToUrl(file, uploadUrl, text, id, id_distbase,disegno_no);
    }



});





app.controller('DbateCtrl', function($scope,$http, $window,$dialogs,$mdDialog,  Upload, $timeout){


      $scope.status = '  ';
      $scope.customFullscreen = false;
      $scope.numerodisegnoselezionato = false;
	

	$scope.myDate = new Date();

  	$scope.minDate = new Date(
      $scope.myDate.getFullYear(),
      $scope.myDate.getMonth() - 2,
      $scope.myDate.getDate());

  	$scope.maxDate = new Date(
      $scope.myDate.getFullYear(),
      $scope.myDate.getMonth() + 2,
      $scope.myDate.getDate());

      $scope.clkRevisione = function(){
        console.log('revisione');
      }





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

    

      $scope.rowClass = function(item, value,idvalue, index){
         if(index == 0)
         {

          /*  console.log('idvalue ' + idvalue);
            console.log('num dis' + item.disegno_no );
            console.log('value' + value); */
            var numero = item.disegno_no ;
            var id = item.id;
            var vidvalue = idvalue;
            var valore = value;
            
            if(numero.localeCompare(value) &&  id == vidvalue)
            { 
             return 'value1';
            }
            else
            {
              $scope.numerodisegnoselezionato = false;
            }
            
         }
        return '';
    };






  	

	var baseUrl = 'services/';


  	$http.post(baseUrl+'listdbase.php').success(function(data){
			$scope.lines =data;
  	});
  	

	function getHead()
	{

		$http.post(baseUrl+'listfile.php').success(function(data){
			$scope.head = data;
		});
	}



	
    	$http.post(baseUrl+'listdbase.php').success(function(data){
      $scope.distintaBase = data;

		 
		});


     
    $scope.editDbase = function(ev){
      $window.location.href = 'detailsDbase.php?m='+ev.id+"-"+ev.id_distbase;
    }
      
      function DialogController($scope, $mdDialog) {
    $scope.hide = function() {
      $mdDialog.hide();
    };

    $scope.cancel = function() {
      $mdDialog.cancel();
    };

    $scope.answer = function(answer) {
      $mdDialog.hide(answer);
    };
  }
    
    $scope.nuovaDBase = function(item)
    {

    	console.log(item);

    	var baseUrl = '../common/';
    	
    	var valdbase='';

    	var laData = moment(item.data).format('DD-MM-YYYY');

    		

    	$http.post(baseUrl+'nuovaDBase.php',{"data":laData,"layout": item.layout, "lines": item.lines, "title": item.title})
    		.success(function(data){
    			location.reload(); 
    	});
   	
    	
    }



	$scope.createDbase = function(item)
	{	
		console.log(item);

		$('#editFormDbase').slideToggle();
		
	}

	$scope.import = function(item)
	{
      console.log(item);

		/* $http.post('uploadDBase.php',{"numdis":item}).success(function(data){
			if (data)
		 	{ */
		 		$('#editDistintaBase').slideToggle();
			/*}
			});*/

		
		
	}

	$scope.deleteDbase = function(item)
	{
			console.log(item);
			var dlg = null;
			//dlg = $dialogs.error('Are you sure?');
			dlg = $dialogs.confirm('Please Confirm','Is this awesome or what?');
        	dlg.result.then(function(btn){
            console.log(btn);
         	 $http.post(baseUrl+ 'deletedbasefile.php',{"id":item}).success(function(data){
			if (data)
		 	{
         $window.location.href ='index.php';
		 		//console.log(data);
		 		//location.reload(); 
			}
			});
     });

	  
	}

  $scope.showPrerenderedDialog = function(ev) {
    $mdDialog.show({
      controller: DialogController,
      contentElement: '#myDialog',
      parent: angular.element(document.body),
      targetEvent: ev,
      clickOutsideToClose: true
    });
  };

   function DialogController($scope, $mdDialog) {
    $scope.hide = function() {
      $mdDialog.hide();
    };

    $scope.cancel = function() {
      $mdDialog.cancel();
    };

    $scope.answer = function(answer) {
      $mdDialog.hide(answer);
    };
  }


});


app.$inject = ['$scope'];


app.controller('nuovaDistintaBaseCtrl', function($scope, $http){
  $scope.nuovaDBase = function(item){
      console.log(item);

      var baseUrl = 'services/';
      
      var valdbase='';

      var laData = moment(item.data).format('DD-MM-YYYY');

      console.log(laData) ;

      $http.post(baseUrl+'creazioneDbase.php',{"title": item.title,  "disegno_no": item.disegno_no,"data":laData,"layout": item.layout })
        .success(function(data){
          //location.reload(); 
          console.log(data);
      });
    
      
  }

});



