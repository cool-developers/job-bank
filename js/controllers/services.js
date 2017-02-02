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

app.factory("Titulations",function($http){
	return {
		getTitulations : function(){			
			return  $http.get('http://127.0.0.1/job-bank/Titulation/getTitulations');			
			}
	};
});

app.factory("GradeTitles",function($http){
	return {
		getGradeTitles : function(idTitulation){			
			return $http({
                url: 'http://127.0.0.1/job-bank/GradeTitle/getGradeTitles',
                method: "POST",
                data : "idTitulation="+idTitulation,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
           });
        }       
    };
});


app.factory("ProfessionalLevels",function($http){
	return {
		getProfessionalLevels : function(){			
			return  $http.get('http://127.0.0.1/job-bank/ProfessionalLevel/getProfessionalLevels');			
			}
	};
});

app.factory("Functions",function($http){
	return {
		getFunctions : function(){			
			return  $http.get('http://127.0.0.1/job-bank/Functions/getFunctions');			
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




/*Curso IKER
app.factory("Curso",function($http){
	return {
		getCurso : function(idGradeTitle){			
			return $http({
                url: 'http://127.0.0.1/job-bank/GradeTitle/getCurso',
                method: "POST",
                data : "idGradeTitle="+idGradeTitle,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
           });
        }       
    };
});
*/

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


app.factory("LanguageLevel",function($http){
	return {
		getLanguageLevel : function(){			
			return  $http.get('http://127.0.0.1/job-bank/LanguageLevel/getLanguageLevel');			
			}
	};
});


app.factory("Day",function($http){
	return {
		getDay : function(){			
			return  $http.get('http://127.0.0.1/job-bank/Day/getDay');			
			}
	};
});


app.factory("Knowledges",function($http){
	return {
		getKnowledge: function(){			
			return  $http.get('http://127.0.0.1/job-bank/Knowledge/getKnowledge');			
			}
	};
});



//Controler para las etiquetas
app.controller('MainCtrl', function($scope, $http) {
  $scope.tags = [
    { text: 'Tag1' },
    { text: 'Tag2' },
    { text: 'Tag3' }
  ];
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

app.factory("insert", function($http, mensajesFlash){
	return {
		insertData : function(data, link){
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

app.factory("inputApplicantGrades", function($http, mensajesFlash){
	return {
		inputApplicantGrade : function(data, link){
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
app.factory("inputApplicantExperiences", function($http, mensajesFlash){
	return {
		inputApplicantExperience : function(data, link){
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
                }else if(data.data.respuesta == "noData"){                	
                window.location.href = 'http://127.0.0.1/job-bank/BolsaDeTrabajo#/applicantData';
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


app.directive("languageDirective", ["Language","LanguageLevel",function(Language, LanguageLevel){
	
return {
	restrict: "E",
	replace: true,
	scope: {
		offer_has_languages : "=ngModel"
	},
	required: "?ngModel",
	templateUrl: "/job-bank/templates/get/languagedirectivetemplate",
	link: function(scope, element, attrs){
		scope.offer_has_languages =[];
		
		scope.required = false;
		    
     	Language.getLanguage().then(function (Language){
			scope.languages = Language.data;
		});
		
		LanguageLevel.getLanguageLevel().then(function (LanguageLevel){
		 	scope.languagelevels = LanguageLevel.data;
		});
	
		
		
		
	    scope.titulationChange = function(num){
	
			scope.offer_has_languages = scope.offer_has_languages.filter(function(l){ 
				if(l.id==num) { 
					l.languageTitulationLevel_idLanguageLevel = null;
					l.languageReadLevel_idLanguageLevel = null;
					l.languageWriteLevel_idLanguageLevel = null;
					l.languageListenLevel_idLanguageLevel = null;
					l.languageSpeakLevel_idLanguageLevel = null;
					l.languageExpresateLevel_idLanguageLevel = null;
					}  
				return l;
			
			});	
			
		};    

      
     
      scope.cont = 0;
    
      scope.addNewChoice = function() {
 		scope.required = true;
      	if(scope.offer_has_languages.length == 0){
      		
      	  scope.cont++;
		  scope.offer_has_languages.push({'id': scope.cont , 'language_idLanguage' : null} );
		   		
      	}else{
      		console.log();
      		language = scope.offer_has_languages[scope.offer_has_languages.length - 1]["language_idLanguage"];
           	            	
	      	if (language!= null ){
	      		 //scope.languages = scope.languages.filter(function (l) {return l.idLanguage != language; });
	      		 scope.cont++;
		 		 scope.offer_has_languages.push({'id': scope.cont});
		 		
	      	}else{
	      		scope.required = true;
	      	}
      	}   	    	
	   
	  };
	  
	  scope.languageSelected = function(num){
	  	scope.required = false;
	  	scope.titulationChange(num); 
	  };
	    
	  scope.removeChoice = function(num) {	    
	    scope.offer_has_languages = scope.offer_has_languages.filter(function(l) { return l.id != num; });
	  };	
	  
	  
	  
	}
};
}]);


