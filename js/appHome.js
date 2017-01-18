var app = angular.module("app", ["ngRoute"]);

app.config(function($routeProvider){		
	
	$routeProvider.when("/offerList", {
		templateUrl : "/job-bank/templates/get/offerList_view",
		controller : "offerListController"
	})
	.when("/teacherList", {
		templateUrl : "/job-bank/templates/get/teacherList_view",
		controller : "teacherListController"
	})
	.when("/applicantList", {
		templateUrl : "/job-bank/templates/get/applicantList_view",
		controller : "applicantListController"
	})
	.when("/CV", {
		templateUrl : "/job-bank/templates/get/cv_view",
		controller : "cvController"
	})
	.otherwise({ reditrectTo : "/offerList" });
});
