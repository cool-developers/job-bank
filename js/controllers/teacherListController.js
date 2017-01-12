app.controller("teacherListController", function($http, $scope, signupUsers, Departments){
	$scope.signupUser = function(){
		 var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHIJKLMNPQRTUVWXYZ2346789";
 		 $scope.user.password = "";
 		 for (i=0; i < 8; i++) $scope.user.password += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
		 
	     signupUsers.newUser($scope.user);
    };
    Departments.getDeparments().then(function(Provinces){
		$scope.provinces = Provinces.data;	
	});
});
