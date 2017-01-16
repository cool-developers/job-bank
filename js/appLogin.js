var app = angular.module("app", ["ngRoute"]);

app.config(function($routeProvider){
		
	$routeProvider.when("/", {
		templateUrl : "/job-bank/templates/get/login_view",
		controller : "loginController"
	})
	.when("/signup", {
		templateUrl : "/job-bank/templates/get/signup_view",
		controller : "signupController"
	})
	.when("/recover", {
		templateUrl : "/job-bank/templates/get/recover_view",
		controller : "recoverController"
	})
	.otherwise({ reditrectTo : "/" });
});
