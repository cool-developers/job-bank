app.controller("signupController", function signupController($scope, $location, signupUsers, Provinces, Towns){
	$scope.saludo = "Hola estas en el registro";
	$scope.signupUser = function(){			
        signupUsers.newUser(convertToData($scope.user), "http://127.0.0.1/job-bank/login/signupEnterprise");        
    };

	$scope.toLogin = function(){
		$location.url("/");
	};
	
	Provinces.getProvinces().then(function(Provinces){
		$scope.provinces = Provinces.data;	
	});
	
	$scope.provinceSelected = function(){
		Towns.getTowns($scope.selectedProvince).then(function (Towns){
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
	
	

	
	$scope.emailc = true;
	$scope.emailc = function (){
	console.log($scope.user);
	if($scope.user.email ===""){
	
		alert ("algo");
	}else{
		
			if($scope.habilitado = true ){
			alert ("");
			}else{
			alert("no es valido");
			}
		}
	};
	
	
	

	
});

/*
app.directive('pwCheck', function () {
	return {
	  require: 'ngModel',
	  link: function (scope, elem, attrs, ctrl) {
	    var firstPassword = '#' + attrs.pwCheck;
	    
	    var password = document.getElementById(attrs.pwCheck);	    
	    
	    elem.append(firstPassword).on('keyup', function () {
	      scope.$apply(function () {
	      	console.log(elem.val() === document.getElementById(attrs.pwCheck).value);
	        var v = elem.val() === document.getElementById(attrs.pwCheck).value;
	        ctrl.$setValidity('pwmatch', v);
	      });
	    });
	  }
	};
    
});

*/