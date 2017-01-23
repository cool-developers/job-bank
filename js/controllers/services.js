app.factory("Departments",function($http){
	return {
		getDepartments : function(){			
			return  $http.get('http://127.0.0.1/job-bank/Education/getDepartments');			
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
		getTowns : function(idProvince){			
			return $http({
                url: 'http://127.0.0.1/job-bank/Location/getTowns',
                method: "POST",
                data : "idProvince="+idProvince,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
           });
        }       
    };
});

app.factory("GradeTitle",function($http){
	return {
		getGradeTitle : function(){			
			return  $http.get('http://127.0.0.1/job-bank/GradeTitle/getGradeTitle');			
			}
	};
});

app.factory("Curso",function($http){
	return {/*
		getCurso : function(idGradeTitle){			
			return $http({
                url: 'http://127.0.0.1/job-bank/GradeTitle/getCurso',
                method: "POST",
                data : "idGradeTitle="+idGradeTitle,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
           });
        }   */    
    };
});


app.factory("Contract",function($http){
	return {
		getContract : function(){			
			return  $http.get('http://127.0.0.1/job-bank/Contract/getContract');			
			}
	};
});


app.factory("Language",function($http){
	return {
		getLanguage : function(){			
			return  $http.get('http://127.0.0.1/job-bank/Language/getLanguage');			
			}
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

function convertToData(object){
	data = "";
	for(element in object ){		
		data += element + "=" + object[element]+"&";			
	}			
	return data.substr(0, data.length - 1);
};


//factoria para registrar usuarios a la que le inyectamos la otra factoria
//mensajesFlash para poder hacer uso de sus funciones
app.factory("signupUsers", function($http, mensajesFlash){	
    return {
      newUser : function(data, link){        	
            return $http({
                url: link,
                method: "POST",
                data : data,
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


app.factory("updateApplicants", function($http, mensajesFlash){
	return {
		updateApplicant : function(data, link){
			return $http({
				url: link,
                method: "POST",
                data : data,
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

//factoria para loguear y desloguear usuarios en angularjs
app.factory("authUsers", function($http, $location,  mensajesFlash){
    return {
        //retornamos la función login de la factoria authUsers para loguearnos correctamente
        login : function(user){
            return $http({
                url: 'http://127.0.0.1/job-bank/login/loginuser',
                method: "POST",
                data : "email="+user.email+"&password="+user.password,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(data){
            	console.log(data.data.respuesta);
                if(data.data.respuesta == "success"){             	
                    mensajesFlash.clear();                                      
                window.location.href = 'http://127.0.0.1/job-bank/BolsaDeTrabajo#/offerList';
                }else if(data.data.respuesta == "incomplete_form"){
                    mensajesFlash.show("Debes introducir bien los datos del formulario");
                }else if(data.data.respuesta == "failed"){
                    mensajesFlash.show("El email o el password introducidos son incorrectos, inténtalo de nuevo.");
                }else if(data.data.respuesta == "notActive"){
                    mensajesFlash.show("Tu cuenta no esta activada, actívala desde tu cuenta de correo");
                }
            },function(){
                $location.path("/");
            });
        }
       
    };
});


