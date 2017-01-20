app.controller("offerListController", function($scope, GradeTitle, Curso, Contract){
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
		


});


