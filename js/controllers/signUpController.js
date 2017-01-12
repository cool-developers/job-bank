app.controller("signupController", function signupController($scope, $location, signupUsers, Provinces, Towns){
	$scope.saludo = "Hola estas en el registro";
	$scope.signupUser = function(){
		data = "";
		for(elemento in $scope.user ){		
			data += elemento + "=" + $scope.user[elemento]+"&";			
		}
		
			
        signupUsers.newUser(data.substr(0, data.length - 1), "http://127.0.0.1/job-bank/login2/signupuser");
    };

	$scope.toLogin = function(){
		$location.url("/");
	};
	
	Provinces.getProvinces().then(function(Provinces){
		$scope.provinces = Provinces.data;	
	});
	
	$scope.provinceSelected = function(){
		Towns.geTowns($scope.selectedProvince).then(function (Towns){
			$scope.towns = Towns.data;
		});
	};	
	
	

	$scope.habilitado = false;
	$scope.passwd = function (){
		
	if($scope.user.password == $scope.password2 && !registerUserForm.$valid){
	
		$scope.habilitado = true;
	}else{
	
		$scope.habilitado = false;
	}
	};
	
	
	
});
