var app = angular.module("app", ["ngRoute"]);

app.config(function($routeProvider){
		
	$routeProvider.when("/", {
		templateUrl : "/job-bank/index.php/templates/get/login_view",
		controller : "loginController"
	})
	.when("/signup", {
		templateUrl : "/job-bank/index.php/templates/get/signup_view",
		controller : "signupController"
	})
	.when("/recover", {
		templateUrl : "/job-bank/index.php/templates/get/recover_view",
		controller : "recoverController"
	})
	.otherwise({ reditrectTo : "/" });
});
