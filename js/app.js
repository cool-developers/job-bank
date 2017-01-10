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
	.when("/offerList", {
		templateUrl : "/job-bank/templates/get/offerList_view",
		controller : "offerListController"
	})
	.when("/teacherList", {
		templateUrl : "/job-bank/templates/get/teacherList_view",
		controller : "offerListController"
	})
	.when("/applicantList", {
		templateUrl : "/job-bank/templates/get/applicantList_view",
		controller : "offerListController"
	})
	.otherwise({ reditrectTo : "/" });
});
