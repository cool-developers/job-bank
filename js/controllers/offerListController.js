app.controller("offerListController", function($scope, GradeTitle, Curso, Contract, Language, updateOffers){
	$scope.saludo = "Hola estas en el offerlist";
	
	GradeTitle.getGradeTitle().then(function(GradeTitle){
		$scope.GradeTitle = GradeTitle.data;	
	});
	
	
		$scope.cursoSelected = function(){
		Curso.getCurso($scope.selectedCurso).then(function (Curso){
			$scope.curso = Curso.data;
		});
	};	
	
	
		Contract.getContract().then(function (Contract){
			$scope.Contracts = Contract.data;
		});
		
		Language.getLanguage().then(function (Language){
			$scope.Languages = Language.data;
		});
		
		$scope.updateOffer = function(){			
        updateOffers.updateOffer(convertToData($scope.applicant), "http://127.0.0.1/job-bank/OfferList/updateOffer");
    };
		
		

});


