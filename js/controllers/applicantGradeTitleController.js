app.controller("applicantGradeTitleController", function($scope, $location, Titulations, GradeTitles, inputApplicantGrades){
	
	Titulations.getTitulations().then(function(Titulations){
		$scope.titulations = Titulations.data;	
	});	
		

	$scope.applicant = {applicant_has_gradeTitleTitulation : null};	
	
	$scope.titulationSelected = function(){
		GradeTitles.getGradeTitles($scope.selectedTitulation).then(function(GradeTitles){
		$scope.gradeTitles = GradeTitles.data;		
			
		});
	};	
	
	$scope.inputApplicantGrade = function(){
		console.log($scope.applicant);
		inputApplicantGrades.inputApplicantGrade(convertToData($scope.applicant), "http://127.0.0.1/job-bank/applicant/inputapplicantgrade");
	};
	
	
});