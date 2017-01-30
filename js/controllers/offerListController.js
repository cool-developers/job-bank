app.controller("offerListController", function($scope, GradeTitle, Contract, Language, Day , insert){
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
	
	
	$scope.updateOffer = function(){			
    	insert.insertData(convertToData($scope.offer), "http://127.0.0.1/job-bank/OfferList/updateOffer");
    };
    
    
    
      $scope.addNewChoice = function() {
	    var newItemNo = $scope.offer_has_languages.length+1;
	    $scope.offer_has_languages.push({'id':'choice'+newItemNo});
	 };
	    
	  $scope.removeChoice = function() {
	    var lastItem = $scope.offer_has_languages.length-1;
	    $scope.choices.splice(lastItem);
	  };
		
		

});


