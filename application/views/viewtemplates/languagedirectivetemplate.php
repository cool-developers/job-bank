<div>

<div ng-repeat="offer_has_language in offer_has_languages">
 			 	
 			 	<table>
 			 		<tr>
 			 			<td> <label>Idioma: </label> </td>
 			 			<td>  
 			 				 <select ng-change="languageSelected(offer_has_language.id)" ng-model="offer_has_language.language_idLanguage">
								<option ng-repeat="language in languages" value="{{language.idLanguage}}"> {{language.languageName}}</option>
							 </select>
							 <span ng-show="required && $last">*</span>
						</td> 	
 			 			
 			 			<td><button type="button" class="remove botonb"  ng-click="removeChoice(offer_has_language.id)"><-</button></td>
 			 		</tr>
 			 		<tr> 			 				
 			 			<td> <label>Titulación mínima:<input ng-change="titulationChange(offer_has_language.id)" type="checkbox" ng-model="Titulation"> </label>    </td>		 			
 			 			<td>
							 <select ng-show="Titulation" ng-model="offer_has_language.languageTitulationLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
						</td>
 			 		</tr>
 			 	</table>
 			 	 			
 			 	<table  ng-hide="Titulation" >	
 			 		<tr>
 			 			<td>Leido </td>
 			 			<td>Escrito</td>
 			 			<td>Oido   </td>
 			 			<td>Hablado</td>
 			 			<td>Expresado</td>
 			 		</tr>
 			 		<tr>
 			 			<td>
 			 				 <select ng-model="offer_has_language.languageReadLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 			<td>
 			 				 <select ng-model="offer_has_language.languageWriteLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 			<td>
 			 				 <select ng-model="offer_has_language.languageListenLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 			<td>
 			 				 <select ng-model="offer_has_language.languageSpeakLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 			<td>
 			 				 <select ng-model="offer_has_language.languageExpresateLevel_idLanguageLevel">
								<option ng-repeat="languagelevel in languagelevels" value="{{languagelevel.idLanguageLevel}}"> {{languagelevel.languageLevelName}}</option>
							 </select>
 			 			</td>
 			 		</tr>
 			 		
 			 	</table> 			 	
 			 				
 			 		
 			 
 			 </div>	 
 	
   			 <button type="button"  ng-hide="required" class="addfields botonb" ng-click="addNewChoice()">Añadir idioma</button>
   			 
</div>