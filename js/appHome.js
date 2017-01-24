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
	.when("/applicantData", {
		templateUrl : "/job-bank/templates/get/applicantData_view",
		controller : "applicantDataController"
	})
	.when("/applicantGradeTitle", {
		templateUrl : "/job-bank/templates/get/applicantGradeTitle_view",
		controller : "applicantGradeTitleController"
	})
	.otherwise({ reditrectTo : "/offerList" });
});
