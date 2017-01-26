app.controller("applicantGradeTitleController", function($scope, $location, Titulations, GradeTitles, inputApplicantGrades){
	
	Titulations.getTitulations().then(function(Titulations){
		$scope.titulations = Titulations.data;	
	});	
		

	$scope.applicant = {applicant_has_gradeTitleTitulation : null,
						applicant_has_gradeTitleName : null};	
	
	$scope.titulationSelected = function(){
		GradeTitles.getGradeTitles($scope.selectedTitulation).then(function(GradeTitles){
		$scope.gradeTitles = GradeTitles.data;			
		});
		$scope.applicant["applicant_has_gradeTitleTitulation"] = $scope.selectedTitulation;	
		$scope.applicant["applicant_has_gradeTitleName"] = null;
		$scope.applicant["gradeTitle_idGradeTitle"] = null;
		if($scope.selectedTitulation == 13){
			$scope.applicant["applicant_has_gradeTitleTitulation"] = null;
		}
		
	};	
	
	$scope.gradeTitleSelected = function(){			
		str = $scope.applicant["gradeTitle_idGradeTitle"];
		$scope.applicant["applicant_has_gradeTitleName"] = str.substring(str.indexOf(" ")+1);
		$scope.applicant["gradeTitle_idGradeTitle"] = str.substring(0, str.indexOf(" "));
		if($scope.applicant["applicant_has_gradeTitleName"] == "Otro"){
			$scope.another = true;
			$scope.applicant["applicant_has_gradeTitleName"] = null;
		}else{
			$scope.another = false;
		}
			
		
	};
	
	
	$scope.inputApplicantGrade = function(){	
		inputApplicantGrades.inputApplicantGrade(convertToData($scope.applicant), "http://127.0.0.1/job-bank/applicant/inputapplicantgrade");
	};
	
	
});