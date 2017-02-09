<!--a continuacion hacemos referencia al contenedor padre del header-->
<header class="headpadre">
	<!--contenedor hijo-logo del padre del header-->
	<div class="headhijoi">
	<img src="http://localhost/job-bank/img/icono.png";>
		 
	</div>	
	<!--contenedor hijo-menu del padre del header-->	
	<div class="headhijod">
		<a href="#" onclick="mostrar('divTexto1'); return false" /><img src="http://localhost/job-bank/img/ajustes.png"; alt="Smiley face" height="42" width="42"></a>
		<div id="divTexto1" style="visibility:hidden">	<a href="http://127.0.0.1/job-bank/BolsaDeTrabajo/logout">Cerrar sesión</a>
		</div>
			<br><br><br>
			
		
	 
<ul class="posicion">
	<li > <a href="#/offerList">Ofertas</a></li>
	<?php if($rol == 1){ ?>
	<li>  <a href="#/teacherList">Profesores</a> </li>	
	<?php } ?>	
	<?php if($rol == 1 || $rol == 2){ ?>
	<li>  <a href="#/applicantList">Alumnos</a></li>
	<?php } ?>
	<?php if($rol == 3){ ?>
	<!-- <li>  <a href="#/CV">Curriculum</a> </li> -->
	<?php } ?>
</ul>
	
	
	
	</div>

	
</header>


<div>		
	<div ng-view></div>
</div>
