app.controller("offerListController", function($scope, GradeTitle, Contract, Language, LanguageLevel , Knowledges, Day , insert){
	
	$scope.offer_has_languages = [];
	
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
	
	Language.getLanguage().then(function (Language){
		$scope.languages = Language.data;
	});
	
	Day.getDay().then(function (Day){
		$scope.days = Day.data;
	});
	
	
	LanguageLevel.getLanguageLevel().then(function (LanguageLevel){
		$scope.languagelevels = LanguageLevel.data;
	});
	
	Knowledges.getKnowledge().then(function (knowledge){
		$scope.knowledges = knowledge.data;
	});
	
	$scope.offer_has_knowleges = [];
	
	$scope.addKnowledge =function (knowledge){
		$scope.search["knowledge"] = " ";
		$scope.offer_has_knowleges.push(knowledge);
	};
	
	$scope.deleteKnowledge =function (knowledge){
		$scope.offer_has_knowleges = $scope.offer_has_knowleges.filter(function(k){ return k != knowledge;});
	};
	
	$scope.newKnowledge = function(){
		
	};
	
	
	
	
	
	
	
	
	$scope.updateOffer = function(){	
		
		$scope.offer["languages"] = JSON.stringify($scope.offer_has_languages);				
    	insert.insertData(convertToData($scope.offer), "http://127.0.0.1/job-bank/OfferList/updateOffer");
    };
    
	

});


