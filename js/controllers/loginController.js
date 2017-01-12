app.controller("loginController", function($scope, $location, authUsers){
	$scope.saludo = "Hola desde el controlador login";
    $scope.user = { email : "", password : "" };
    authUsers.flash = "";
    //función que llamamos al hacer sumbit al formulario
    $scope.login = function(){
        authUsers.login($scope.user);
    };
    
	$scope.toSignup = function(){
		$location.url("/signup");
	};

	$scope.toRecover = function(){
		$location.url("/recover");
	};
});

