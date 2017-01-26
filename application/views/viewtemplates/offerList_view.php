<ul>
	<?php
	if (isset($error)){
		echo("<li>$error</li>");	
	}
	echo validation_errors("<li>","</li>"); ?>
</ul>	
<form name="offerForm">
	<div>
             <label>Titulo del puesto</label><br>	
			 <input type="text" required placeholder="Introduce un titulo" name="title" ng-model="offer.title" />
             <!-- <input type="text" required ng-model="offer." /> -->
 			
 			<br>
             <label>Curso</label>
             <br>   	
               
 			 <select ng-model="offer.selectedCurso" >
 				<option ng-repeat="curso in GradeTitle" value="{{curso.idGradeTitle}}"> {{curso.gradeTitleName}}</option>
 			 </select>	
 
 			 <br>
 			 
 			 <label>Fecha limite: </label>
 			 <input type="date" name="fechalimi" step="1"  value="<?php echo date("Y-m-d");?>" ng-model="offer.fechalimi" />
 			 
 			 <br>
 			 
 			 <label>Descripción: </label><br>
 			 <textarea name="description" rows="6" cols="50" name="comment" ng-model="offer.description">Escriba aquí su descripción...</textarea>
 			 
 			 <br>
 			 <label>Tipo de contrato: </label><br>
 			  <select ng-model="offer.selectedContract">
 			 <option ng-repeat="Contract in Contracts" value="{{Contract.idContract}}"> {{Contract.contractName}}</option>
 			 </select><br>
 			 
 			  <label>Idiomas: </label>
 			  <select ng-model="offer.selectedLanguage">
 				<option ng-repeat="Language in Languages" value="{{Language.idLanguage}}"> {{Language.languageName}}</option>
 			 </select><br>
 			 
 			 <!--
 			  <label>Conocimientos: </label>
 			  <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>
 			 
 			 <br> 
 			 
 			 -->
 			 
 			 </br>
 			
 			  <input type="radio" name="estado"  ng-model="offer.applicantWorkPermit" value="true"> Pribada<br>
  			  <input type="radio" name="estado"  ng-model="offer.applicantWorkPermit" value="true"> Publica<br>

             

 
 		
 			 
             <button ng-disabled="!offerForm.$valid" ng-click="updateOffer(offer)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
 		 </div>   	
</form>

