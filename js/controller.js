app.controller("loginController", function loginController($scope, $location){
	$scope.saludo = "Hola desde el controlador login";
	$scope.toSignup = function(){
		$location.url("/signup");
	}

	$scope.toRecover = function(){
		$location.url("/recover");
	}
});

app.controller("signupController", function signupController($scope, $location){
	$scope.saludo = "Hola estas en el registro";
	$scope.toLogin = function(){
		$location.url("/");
	}
});

app.controller("recoverController", function recoverController($scope, $location){
	$scope.saludo = "Hola estas en la recuperacion de contraseña";
	$scope.toLogin = function(){
		$location.url("/");
	}
});
 

 