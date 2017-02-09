<form name="applicantGradeTitleForm">   
			 
			<div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>

				
 			 <label>Titulación</label>
 			 <br>
 			 <select ng-change="titulationSelected()" ng-model="selectedTitulation">
 				<option ng-repeat="titulation in titulations" value="{{titulation.idTitulation}}"> {{titulation.titulationName}}</option>
 			 </select>	
 			 <br> 	 			 
 			 
 			 
			 
			 <input ng-show="selectedTitulation == 13"type="text" placeholder="Introduce el nombre" name="applicant_has_gradeTitleTitulation" ng-model="applicant.applicant_has_gradeTitleTitulation" />
         	 <!-- <span ng-show="applicantGradeTitleForm.applicant_has_gradeTitleTitulation.$error.required">Introduce la titulación.</span> -->
			
 			 <br> 
 			 
 			 <div ng-show="(selectedTitulation != 13 && selectedTitulation) || applicant.applicant_has_gradeTitleTitulation">
	 			 <label>Titulo del grado</label>
	 			 <br>
	 			 
	 			 <select ng-change="gradeTitleSelected()" ng-show="gradeTitles.length >= 1 " ng-model="applicant.gradeTitle_idGradeTitle">
	 				<option ng-repeat="gradeTitle in gradeTitles" value="{{gradeTitle.idGradeTitle}} {{gradeTitle.gradeTitleName}}"> {{gradeTitle.gradeTitleName}}</option>
	 			 </select>	 
	 		    
	 		   
				 <input required ng-show="gradeTitles.length <= 0 || another == true" type="text" placeholder="Introduce el nombre" name="applicant_has_gradeTitleName" ng-model="applicant.applicant_has_gradeTitleName" />
	         	 <!-- <span ng-show="applicantGradeTitleForm.applicant_has_gradeTitleName.$error.required">Introduce el titulo del grado/curso.</span> -->
	 		</div> 
	 			
	 			
	 		 <br> 	
	 			 
	 			 		 
	 		 <div ng-show="applicant.applicant_has_gradeTitleName || applicant.gradeTitle_idGradeTitle">
	 			 	 <date-container required ng-model="offer.offerEndDate">
		 			 	<date-field container ="d"> </date-field>
		 			 	<date-field container ="m"> </date-field>
		 			 	<date-field container ="y"> </date-field>
		 			 </date-container>
		 			  <br>	
		 			 <span ng-show="offer.offerEndDate.substring(0 , 5) == 'Error'">{{offer.offerEndDate}}</span>
	 			  <label>Fecha fin</label>	 
	 			 		 <date-container required ng-model="offer.offerEndDate">
			 			 	<date-field container ="d"> </date-field>
			 			 	<date-field container ="m"> </date-field>
			 			 	<date-field container ="y"> </date-field>
			 			 </date-container>
			 			  <br>	
			 			 <span ng-show="offer.offerEndDate.substring(0 , 5) == 'Error'">{{offer.offerEndDate}}</span>
	 		 </div>
 			 <br>
 			 
             <button ng-disabled="!applicantGradeTitleForm.$valid" ng-click="inputApplicantGrade(applicant)" type="submit" class="button radius large-5 columns">Añadir estudio</button>
            
 		 </div>   
</form>

