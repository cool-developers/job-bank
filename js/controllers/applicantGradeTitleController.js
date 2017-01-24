app.controller("applicantGradeTitleController", function($scope, $location, Titulations){
	
	Titulations.getTitulations().then(function(Titulations){
		$scope.titulations = Titulations.data;	
	});	
	
});