var app = angular.module("app", ["ngRoute"]);

app.config(function($routeProvider){
	
	debugger;
	
	
	$routeProvider.when("/", {
		templateUrl : "/job-bank/index.php/templates/get/login3_view",
		controller : "loginController"
	})
	.when("/signup", {
		templateUrl : "/job-bank/index.php/templates/get/register_view",
		controller : "signupController"
	})
	.when("/recover", {
		templateUrl : "./../templates/get/recover_view",
		controller : "recoverController"
	})
	.otherwise({ reditrectTo : "/" });
});
