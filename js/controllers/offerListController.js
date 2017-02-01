app.controller("offerListController", function($scope, GradeTitle, Contract, Language, LanguageLevel, Day , insert){
	
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
	
	$scope.updateOffer = function(){	
		
		console.log($scope.offer_has_languages);
		
		for(l = 0; l < $scope.offer_has_languages.length; l++){	
			
		for(x = 0; x < Object.keys($scope.offer_has_languages[l]).length; x++){	
				
				name = Object.keys($scope.offer_has_languages[l])[x];
				console.log(name);
				if(name != "id" && name != "$$hashKey"){					
					$scope.offer[name+l] = $scope.offer_has_languages[l][name];
				}
				
			}				
		}
		
		
				
    	insert.insertData(convertToData($scope.offer), "http://127.0.0.1/job-bank/OfferList/updateOffer");
    };
    
	

});


