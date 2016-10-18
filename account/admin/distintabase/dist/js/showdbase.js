(function(){

	var app = angular.module('swdDase',[]);


	app.controller('SWCtrl', function($scope){

		$scope.showAddLegenda = false;

		$scope.addLegenda = function()
		{
			
			$scope.showAddLegenda = !$scope.showAddLegenda;

		}


		$scope.deleteLegenda = function(item)
		{
			console.log("DELETE");
		}


	});



})();