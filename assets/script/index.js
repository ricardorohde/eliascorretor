app.controller('IndexController', function($scope) {
	$scope.clickLink = function (link){
		window.location.href = link;  	
	};
});