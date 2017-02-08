app.controller("offerListController", function($scope, GradeTitle, Contract, Day , insert){
	
	$scope.offer_has_languages = [];		
	$scope.offer_has_knowledges = [];
	
	$scope.saludo = "Hola estas en el offerlist";
	
	GradeTitle.getGradeTitle().then(function(GradeTitle){
		$scope.gradeTitle = GradeTitle.data;	
	});
	
	/* IKER Cursos
	$scope.cursoSelected = function(){
		Curso.getCurso($scope.selectedCurso).then(function (Curso){
			$scope.curso = Curso.data;
		});
	};	
	*/
	
	Contract.getContract().then(function (Contract){
		$scope.contracts = Contract.data;
	});
	
	Day.getDay().then(function (Day){
		$scope.days = Day.data;
	});
	
	$scope.updateOffer = function(){	
		
		$scope.offer["languages"] = JSON.stringify($scope.offer_has_languages);	
		$scope.offer["knowledges"] = JSON.stringify($scope.offer_has_knowledges);				
    	insert.insertData(convertToData($scope.offer), "http://127.0.0.1/job-bank/OfferList/updateOffer");
    };
    
	

});


