<ul>
	<?php
	if (isset($error)){
		echo("<li>$error</li>");	
	}
	echo validation_errors("<li>","</li>"); ?>
</ul>	
<form name="offerForm">
	<div>
			 <label> Nombre de la empresa </label> <br>
			 <input type="text" required placeholder="Introduce el nombre" name="offerEnterpriseName" ng-model="offer.offerEnterpriseName" />
			 <br>
			 
			 <label> Email de la empresa </label> <br>
			 <input type="email" required placeholder="Introduce el correo" name="offerEnterpriseEmail" ng-model="offer.offerEnterpriseEmail" />
			  <br>
			  
			 <label> Teléfono de la empresa </label> <br>
			 <input type="text" required placeholder="Introduce un titulo" name="offerEnterpisePhone" ng-model="offer.offerEnterpisePhone" />
			 <br>					 
			 
             <label>Titulo del puesto</label><br>	
			 <input type="text" required placeholder="Introduce un titulo" name="offerJobTitle" ng-model="offer.offerJobTitle" />
             <!-- <input type="text" required ng-model="offer." /> -->
 			
 			 <br>
             <label>Curso</label>
             <br>   	
               
 			 <select ng-model="offer.gradeTitle_idGradeTitle" >
 				<option ng-repeat="gradeTitles in gradeTitle" value="{{gradeTitles.idGradeTitle}}"> {{gradeTitles.gradeTitleName}}</option>
 			 </select>	
 
 			 <br>
 			 
 			 <label>Fecha limite: </label>
 			 <input type="date" name="offerEndDate" step="1"  value="<?php echo date("Y-m-d");?>" ng-model="offer.offerEndDate" />
 			 
 			 <br>
 			 
 			 <label>Descripción: </label><br>
 			 <textarea name="offerDescription" rows="6" cols="50" name="comment" ng-model="offer.offerDescription">Escriba aquí su descripción...</textarea>
 			 
 			 <br>
 			 <label>Tipo de contrato: </label><br>
 			  <select ng-model="offer.contract_idContract">
 			 <option ng-repeat="contract in contracts" value="{{contract.idContract}}"> {{contract.contractName}}</option>
 			 </select><br>
 			 
 			 <br>
 			 <label>Jornada: </label><br>
 			  <select ng-model="offer.day_idDay">
 			 <option ng-repeat="day in days" value="{{day.idDay}}"> {{day.dayName}}</option>
 			 </select><br>
 			 
 					 
 			 <label>Idiomas: </label> <br><br>
 			
 			 
 			 
 			 <div ng-repeat="offer_has_language in offer_has_languages">
 			 	
 			 	<table>
 			 		<tr>
 			 			<td> <label>Idioma: </label> </td>
 			 			<td> <label>Titulación mínima:<input ng-change="titulationChange(offer_has_language.id)" type="checkbox" ng-model="Titulation"> </label>    </td>
 			 		</tr>
 			 		<tr> 			 				
 			 			<td>  
 			 				 <select ng-model="offer_has_language.language_idLanguage">
								<option ng-repeat="language in languages" value="{{language.idLanguage}}"> {{language.languageName}}</option>
							 </select>
						</td> 			 			
 			 			<td>
							 <select ng-show="Titulation" ng-model="offer_has_language.languageTitulationLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
						</td>
 			 		</tr>
 			 		<tr>
 			 			<td>Nivel Leido</td>
 			 			<td>Nivel Escrito</td>
 			 			<td>Nivel Oido</td>
 			 			<td>Nivel Hablado</td>
 			 			<td>Nivel Expresado</td>
 			 		</tr>
 			 		<tr>
 			 			<td>
 			 				 <select ng-hide="Titulation" ng-model="offer_has_language.languageReadLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 			<td>
 			 				 <select ng-hide="Titulation" ng-model="offer_has_language.languageWriteLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 			<td>
 			 				 <select ng-hide="Titulation" ng-model="offer_has_language.languageTitulationLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 			<td>
 			 				 <select ng-hide="Titulation" ng-model="offer_has_language.languageTitulationLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 			<td>
 			 				 <select ng-hide="Titulation" ng-model="offer_has_language.languageTitulationLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 		</tr>
 			 		
 			 	</table> 			 	
 			 		 
				 <button type="button" class="remove" ng-show="$last" ng-click="removeChoice()">-</button>	
 			 
 			 </div>	 
 	
   			 <button type="button" class="addfields" ng-click="addNewChoice()">Add fields</button>
 			 
 			 <div id="choicesDisplay">
			      {{ offer_has_languages }}
			 </div>
 			 
 			 
 			 <!--
 			 	<div ng-app="angularjs-starter" ng-controller="MainCtrl">
			   <fieldset  data-ng-repeat="choice in choices">
			      <select ng-model="choice.option">
			         <option value>Select</option>
			         <option value="Mobile">Mobile</option>
			         <option value="Office">Office</option>
			         <option value="Home">Home</option>
			      </select>
			      <input type="text" ng-model="choice.number" name="" placeholder="Enter mobile number">
			      <button class="remove" ng-show="$last" ng-click="removeChoice()">-</button>
			   </fieldset>
			   <button class="addfields" ng-click="addNewChoice()">Add fields</button>
			       
			   <div id="choicesDisplay">
			      {{ choices }}
			   </div>
			</div>
 			 -->
 			 
 			 <br><br>
 			  <label>Idiomas: </label> <br>
 			  <select ng-model="offer.selectedLanguage">
 				<option ng-repeat="language in languages" value="{{language.idLanguage}}"> {{language.languageName}}</option>
 			 </select><br>
 			 

 			 
 			 <label>Numero de vacantes: </label><br>	
			 <input type="number" required name="offerVacant" ng-model="offer.offerVacant" />
 			 
 			 <!--
 			  <label>Conocimientos: </label>
 			  <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>
 			 
 			 <br> 
 			 
 			 -->
 			 
 			  </br>
 			  <label>Gestión: </label><br> 			  
 			  Pribada <input type="radio" name="Pribada"  ng-model="offer.offerType" value="true"> 
  			  Publica <input type="radio" name="Publica"  ng-model="offer.offerType" value="false"> <br>
			  <span ng-show = "offer.offerType == true">La oferta la gestionara el centro</span> 
			  <span ng-show = "offer.offerType == false">La oferta la gestionara el propio sistema y sera publica para los alumnos</span> 
             

 
 		
 			 
             <button ng-disabled="!offerForm.$valid" ng-click="updateOffer()" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
 		 </div>   	
</form>

