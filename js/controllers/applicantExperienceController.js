app.controller("applicantExperienceController", function($scope, ProfessionalLevels, Functions, inputApplicantExperiences){

	ProfessionalLevels.getProfessionalLevels().then(function(ProfessionalLevel){
		$scope.professionalLevels = ProfessionalLevel.data;	
	});
		
	Functions.getFunctions().then(function(Functions){
		$scope.functions = Functions.data;	
	});
	
		
	$scope.inputApplicantExperience = function(){	
		inputApplicantExperiences.inputApplicantExperience(convertToData($scope.applicant), "http://127.0.0.1/job-bank/applicant/inputapplicantexperience");
	};
	
	
	
});