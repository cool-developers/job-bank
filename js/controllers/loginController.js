app.controller("loginController", function($scope, $location, authUsers){
	$scope.saludo = "Hola desde el controlador login";
    $scope.user = { email : "", password : "" };
    var myIndex = 0;

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
	
	$scope.carusel = function(){
		var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1;} 
    if (x.length!=0)  {
    x[myIndex-1].style.display = "block";  
    setTimeout($scope.carusel, 2000); // Change image every 2 seconds
    }
	};
	$scope.carusel();
});

