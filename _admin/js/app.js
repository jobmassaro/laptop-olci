var app = angular.module('olciAdmin',[]);


app.controller('AdminCtrl', ['$scope','$http', function($scope,$http) {
 var baseUrl = 'services/';	

	getUsers();


	function getUsers()
	{
		
		$http.get(baseUrl+'users.php').success(function(data){
			$scope.users = data;
		});

	}



$scope.deleteUser = function(user)
{
	$http.post( baseUrl + 'admindeleteccount.php',{"id":user.id })
	.success(function(data){
		$scope.users.splice(user,1);
	})
}


  $scope.submitForm = function(login)
  {
  	var baseUrl = 'services/';
 	$scope.nameRequired =null;
    // check to make sure the form is completely valid
    if (login) 
    {
      $http.post( baseUrl + 'adminaccount.php',{"username":login.username, "password": login.password , "singleSelect": login.singleSelect})
      	.success(function(data){

      		 console.log(JSON.stringify(data));

      		if(data=="null")
      		{
      			$scope.nameRequired = 'UserName is present!';
      			
      		}else
      		{
      			$scope.users.push(data);
      			getUsers();
      		}
      });
    }
}




}]);


app.controller('AuthCtrl', function($scope, $http){
$scope.autorizzazioni = [
        {model : "SI"},
        {model : "NO"}
    ];
});




var directiveId = 'ngMatch';
app.directive(directiveId, ['$parse', function ($parse) {
 
var directive = {
link: link,
restrict: 'A',
require: '?ngModel'
};
return directive;
 
function link(scope, elem, attrs, ctrl) {
// if ngModel is not defined, we don't need to do anything
if (!ctrl) return;
if (!attrs[directiveId]) return;
 
var firstPassword = $parse(attrs[directiveId]);
 
var validator = function (value) {
var temp = firstPassword(scope),
v = value === temp;
ctrl.$setValidity('match', v);
return value;
}
 
ctrl.$parsers.unshift(validator);
ctrl.$formatters.push(validator);
attrs.$observe(directiveId, function () {
validator(ctrl.$viewValue);
});
 
}
}]);