<!DOCTYPE  html>
<!--ng-app hace referencia al nombre de nuestro modulo-->
<html lang="es" ng-app="app">
	<head>
		<meta charset="UTF-8" />
		<link  rel="stylesheet" type="text/css" href="/job-bank/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="/job-bank/css/foundation.min.css" />
		<script type="text/javascript" src="/job-bank/js/prueba.js"></script>
		<script type="text/javascript" src="/job-bank/js/angular.min.js"></script>
		<script type="text/javascript" src="/job-bank/js/angular-route.min.js"></script>
		<script>
			var root = '<?php echo base_url(); ?>';
		</script>
	</head>
	<body>
		<div class="row">		
			<div ng-view></div>
		</div>

		<script type="text/javascript" src="/job-bank/js/app.js"></script>
		<script type="text/javascript" src="/job-bank/js/controller.js"></script>
	</body>
</html>