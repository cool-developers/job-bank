app.controller("applicantDataController", function($scope, $location, Provinces, Towns , updateApplicants){
	
	Provinces.getProvinces().then(function(Provinces){
		$scope.provinces = Provinces.data;	
	});
	
	$scope.provinceSelected = function(){
		Towns.getTowns($scope.selectedProvince).then(function (Towns){
			$scope.towns = Towns.data;
		});
	};		
	
	$scope.updateApplicant = function(){			
        updateApplicants.updateApplicant(convertToData($scope.applicant), "http://127.0.0.1/job-bank/applicant/updateapplicant");
    };
	
	
});
/*
app.directive("date", function(){
	
	
	
});
*/