(function(){

	var app = angular.module('olciApp',[]);


	app.controller('LoginCtrl', function($scope,$http){
		
		var baseUrl = 'services/';

		$scope.login = function(login)
		{

			 $scope.formInfo = {};
			 $scope.nameRequired =null;
			 $scope.passwordRequired =null;

			 console.log(typeof(login));

			 if(typeof(login)=='undefined')
			 {
			 	$scope.nameRequired = 'Name Required';
			 	$scope.passwordRequired = 'Password Required';
			 }
			 else if(login)
			 {
			 	//console.log('dasdasd');

				$http.post( baseUrl + 'account.php',{"name":login.name, "password": login.password})
							.success(function(data)
							{

								

							if(!isNaN(data))
							{
								
								 $scope.nameRequired = 'Name is not correct';
								 $scope.passwordRequired = 'Password is not correct';

				      		
							}else if(data[0].id != null)
							{
									var choose = '';
									
				      			 
				      				 	choose = parseInt(data[0].role);
				      				 	//console.log('choose'+choose);
										switch(choose ) 
										{
										    case 1:
										        location.href = 'account/admin/index.php';
										        break;
										    case 2:
										        location.href = 'account/utenti/index.php';
										        break;
										    case 3:
										        location.href = 'account/fornitore/index.php';
										        break;
										    case 4:
										    	location.href = 'account/internal/index.php';
										        break;
									
										  /*  default:
										         location.href = 'index.html';*/
										}
							}
							

							}).error(function(data){
								console.log('dsda'+data);
							});	





			 }//else

							
		}
	});

})();