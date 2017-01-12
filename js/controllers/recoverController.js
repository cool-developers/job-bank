app.controller("recoverController", function recoverController($scope, $location){
	$scope.saludo = "Hola estas en la recuperacion de contraseña";
	$scope.toLogin = function(){
		$location.url("/");
	};
});