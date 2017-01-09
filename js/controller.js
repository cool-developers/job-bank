app.controller("loginController", function loginController($scope, $location){
	$scope.saludo = "Hola desde el controlador login";
	$scope.toSignup = function(){
		$location.url("/signup");
	};

	$scope.toRecover = function(){
		$location.url("/recover");
	};
});

app.controller("signupController", function signupController($scope, $location, signupUsers){
	$scope.saludo = "Hola estas en el registro";
	$scope.signupUser = function(){
        signupUsers.newUser($scope.user);
    };
	$scope.toLogin = function(){
		$location.url("/");
	};
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
