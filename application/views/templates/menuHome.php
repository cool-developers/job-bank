<script type="text/javascript" src="/job-bank/js/appHome.js"></script>

</head>
<body>  



<ul>
	<li > <a href="#/offerList">Ofertas</a></li>
	<?php if($rol == 1){ ?>
	<li>  <a href="#/teacherList">Profesores</a> </li>	
	<?php } ?>	
	<?php if($rol == 1 || $rol == 2){ ?>
	<li>  <a href="#/applicantList">Alumnos</a></li>
	<?php } ?>
	<?php if($rol == 3){ ?>
	<li>  <a href="#/CV">Curriculum</a> </li>
	<?php } ?>
</ul>