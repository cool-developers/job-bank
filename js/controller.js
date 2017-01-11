/**app.controller("loginController", function loginController($scope, $location){
	$scope.saludo = "Hola desde el controlador login";
	$scope.toSignup = function(){
		$location.url("/signup");
	};

	$scope.toRecover = function(){
		$location.url("/recover");
	};
});

*/



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


app.controller("signupController", function signupController($scope, $location, signupUsers, Provinces, Towns){
	$scope.saludo = "Hola estas en el registro";
	$scope.signupUser = function(){
        signupUsers.newUser($scope.user);
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
		
	$scope.user.password1 = '';
	$scope.password2 = '';
	$scope.habilitado = true;
	$scope.passwd = function (){
	if($scope.user.password1 == $scope.password2){
		
		$scope.habilitado = false;
	}else{
	
		$scope.habilitado = true;
	};

	};
	

	/*
	$http.get('http://127.0.0.1/job-bank/Location/getProvinces').success(function(Provinces){
		console.log(Provinces);
		$scope.provinces = Provinces;			  
	});	
   
	$http.get('http://127.0.0.1/job-bank/Location/getTowns').success(function(Towns){
	console.log(Towns);
	$scope.towns = Towns;			  
	});	
	 */
 	

});


app.controller("recoverController", function recoverController($scope, $location){
	$scope.saludo = "Hola estas en la recuperacion de contraseña";
	$scope.toLogin = function(){
		$location.url("/");
	};
});

//esto simplemente es para lanzar un mensaje si el login falla
app.factory("mensajesFlash", function($rootScope){
    return {
        show_success : function(message){
            $rootScope.flash_success = message;
        },
        show_error : function(message){
            $rootScope.flash_error = message;
        },
        show : function(message){
            $rootScope.flash = message;
        },
        clear : function(){
            $rootScope.flash_success = "";
            $rootScope.flash_error = "";
        }
    };
});
 

//factoria para registrar usuarios a la que le inyectamos la otra factoria
//mensajesFlash para poder hacer uso de sus funciones
app.factory("signupUsers", function($http, mensajesFlash){	
    return {
        newUser : function(user){        	
            return $http({
                url: 'http://127.0.0.1/job-bank/login2/signupuser',
                method: "POST",
                data : "email="+user.email+"&password="+user.password,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                    if(data.respuesta == "success"){
                        mensajesFlash.clear();
                        mensajesFlash.show_success("El registro se ha procesado correctamente.");
                    }else if(data.respuesta == "exists"){
                        mensajesFlash.clear();
                        mensajesFlash.show_error("El email introducido ya existe en la bd.");
                    }else if(data.respuesta == "error_form"){
                        mensajesFlash.show_error("Ha ocurrido algún error al realizar el registro!.");
                    }
                }).error(function(){
                    mensajesFlash.show_error("Ha ocurrido algún error al realizar el registro!.");
                });
        }
    };
});


app.factory("Provinces",function($http){
	return {
		getProvinces : function(){			
			return  $http.get('http://127.0.0.1/job-bank/Location/getProvinces');			
			}
	};
});

app.factory("Towns",function($http){
	return {
		geTowns : function(idProvince){			
			return $http({
                url: 'http://127.0.0.1/job-bank/Location/getTowns',
                method: "POST",
                data : "idProvince="+idProvince,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
           });
        }       
    };
});


//factoria para loguear y desloguear usuarios en angularjs
app.factory("authUsers", function($http, $location,  mensajesFlash){
    return {
        //retornamos la función login de la factoria authUsers para loguearnos correctamente
        login : function(user){
            return $http({
                url: 'http://127.0.0.1/job-bank/login2/loginuser',
                method: "POST",
                data : "email="+user.email+"&password="+user.password,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){             	
                    mensajesFlash.clear();                  
                    $location.path("/offerList");
                }else if(data.respuesta == "incomplete_form"){
                    mensajesFlash.show("Debes introducir bien los datos del formulario");
                }else if(data.respuesta == "failed"){
                    mensajesFlash.show("El email o el password introducidos son incorrectos, inténtalo de nuevo.");
                }
            }).error(function(){
                $location.path("/");
            });
        }
       
    };
});

app.controller("offerListController", function($http, $scope, getProvinces){

});

