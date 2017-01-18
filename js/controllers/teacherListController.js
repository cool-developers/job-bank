app.controller("teacherListController", function($http, $scope, signupUsers, Departments){
	$scope.signupTeacher = function(){
		 var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHIJKLMNPQRTUVWXYZ2346789";
 		 $scope.user.password = "";
 		 for (i=0; i < 8; i++) $scope.user.password += caracteres.charAt(Math.floor(Math.random()*caracteres.length));		 
	

         signupUsers.newUser(convertToData($scope.user), "http://127.0.0.1/job-bank/login/signupTeacher");
    	
    };
    Departments.getDepartments().then(function(Departments){
		$scope.departments = Departments.data;	
	});
						
	$http.get('http://127.0.0.1/job-bank/Teacher/getTeachers').then(function(Teacher){
		$scope.teachers = Teacher.data;
	});
	
	
});
