app.controller("cvController", function($scope, $location, Provinces, Towns){
	
	Provinces.getProvinces().then(function(Provinces){
		$scope.provinces = Provinces.data;	
	});
	
	$scope.provinceSelected = function(){
		Towns.getTowns($scope.selectedProvince).then(function (Towns){
			$scope.towns = Towns.data;
		});
	};	
	
});
