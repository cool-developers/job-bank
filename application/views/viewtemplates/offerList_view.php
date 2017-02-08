<ul>
	<?php
	if (isset($error)){
		echo("<li>$error</li>");	
	}
	echo validation_errors("<li>","</li>"); ?>
</ul>	
<form name="offerForm">
	<div class="datapadre">
		<div class="recover">
			 <label> Nombre de la empresa </label> 
			 <input type="text" required placeholder="Introduce el nombre" name="offerEnterpriseName" ng-model="offer.offerEnterpriseName" />
			 <br>
			 
			 <label> Email de la empresa </label> 
			 <input type="email" required placeholder="Introduce el correo" name="offerEnterpriseEmail" ng-model="offer.offerEnterpriseEmail" />
			  <br>
			  
			 <label> Teléfono de la empresa </label> 
			 <input type="text" required placeholder="Introduce un titulo" name="offerEnterpisePhone" ng-model="offer.offerEnterpisePhone" />
			 <br>					 
			 
             <label>Titulo del puesto</label>	
			 <input type="text" required placeholder="Introduce un titulo" name="offerJobTitle" ng-model="offer.offerJobTitle" />
             <!-- <input type="text" required ng-model="offer." /> -->
 			
 			 <br>
             <label>Curso</label>
               	
               
 			 <select ng-model="offer.gradeTitle_idGradeTitle" >
 				<option ng-repeat="gradeTitles in gradeTitle" value="{{gradeTitles.idGradeTitle}}"> {{gradeTitles.gradeTitleName}}</option>
 			 </select>	
 
 			 <br>
 			</div>
 			 <div class="recover">
 			 <label>Fecha limite: </label>
 			
 			 <br>
 			 
 
 			 <date-container required ng-model="date">
 			 	<date-field container ="d"> </date-field>
 			 	<date-field container ="m"> </date-field>
 			 	<date-field container ="y"> </date-field>
 			 </date-container>
 			<br><span ng-show="date == 'error">Introduce una fecha correcta</span>
 			 
 			 <br>
 			 
 			 <label>Descripción: </label>
 			 <textarea name="offerDescription" rows="6" cols="50" name="comment" ng-model="offer.offerDescription">Escriba aquí su descripción...</textarea>
 			 
 			 <br>
 			 <label>Tipo de contrato: </label>
 			  <select ng-model="offer.contract_idContract">
 			 <option ng-repeat="contract in contracts" value="{{contract.idContract}}"> {{contract.contractName}}</option>
 			 </select><br>
 			 
 			 
 			</div>
 			 <div class="recover">	
 			 <label>Jornada: </label>
 			  <select ng-model="offer.day_idDay">
 			 <option ng-repeat="day in days" value="{{day.idDay}}"> {{day.dayName}}</option>
 			 </select><br> 			 
 					 			 
 		 			 
 			 <language-directive ng-model="offer_has_languages"></language-directive>	
   			 

   			 
   			
   			
   			 <label>Conocimientos </label>
   			 
   			  <knowledge-directive ng-model="offer_has_knowledges"> </knowledge-directive>
   			  
   			
   			 		   
 			 <label>Numero de vacantes: </label>
			 <input type="number" required name="offerVacant" ng-model="offer.offerVacant" />
 			 
 			 <!--
 			  <label>Conocimientos: </label>
 			  <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>
 			 
 			 <br> 
 			 
 			 -->
 			 
 			  </br>
 			  <label>Gestión: </label> 			  
 			  Pribada <input type="radio" name="Pribada" required  ng-model="offer.offerType" value="true" /> 
  			  Publica <input type="radio" name="Publica" required ng-model="offer.offerType" value="false" /> <br>
			  <span ng-show = "offer.offerType == true">La oferta la gestionara el centro</span> 
			  <span ng-show = "offer.offerType == false">La oferta la gestionara el propio sistema y sera publica para los alumnos</span> 
			  <br>
             

 
 		
 			 
             <button ng-disabled="!offerForm.$valid" ng-click="updateOffer()" type="submit" class="button radius large-5 columns botonb">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns botonw">Reset</button>
             </div>
 		 </div>   	
</form>

