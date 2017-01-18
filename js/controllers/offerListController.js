app.controller("offerListController", function(GradeTitle){
	$scope.saludo = "Hola estas en el offerlist";
	
	Gradetitle.getGradeTitle().then(function(GradeTitle){
		$scope.GradeTitle = GradeTitle.data;	
	});

	
});


