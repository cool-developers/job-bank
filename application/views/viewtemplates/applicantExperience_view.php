<form name="applicantExperience">   
			 
			<div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>
			
			
			<div class="datapadre">
			<div class="recover">	
						
			 <label>Nombre de la empresa</label>
			 
			 <input type="text" required placeholder="Nombre de la empresa" name="experienceEnterpriseName" ng-model="applicant.experienceEnterpriseName" />
              <span ng-show="applicantExperience.experienceEnterpriseName.$error.required">Introduce el nombe de de la empresa.</span>
			 <br>
			 
			 				
			 <label>Nombre del puesto de trabajo</label>
			 
			 <input type="text" required placeholder="Nombre del puesto de trabajo" name="experienceWorkstationName" ng-model="applicant.experienceWorkstationName" />
              <span ng-show="applicantExperience.experienceWorkstationName.$error.required">Introduce el nombe de de la empresa.</span>
			 <br>	 	
	 		
	 		<label>Fecha de inicio</label>
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
	 	    <br>
	 	    
	 	    	
   			 <label>Conocimientos:</label>   			 
   			 <knowledge-directive ng-model="offer_has_knowledges"> </knowledge-directive>
   			  
   			
   			 		   
	 	    
	 	    
	 	    </div>
			<div class="recover">
			 			
			<label>Descripcion del trabajo realizado</label>
			 
			 <textarea placeholder="Max 2000" rows="5"  cols="50" name="applicant.experienceDescription" ng-model="applicant.experienceDescription" />  </textarea>
			 <br>		
			
			
			<label>Nivel profesional de la empresa</label>
   	            	         
 			 <select required ng-model="applicant.professionalLevel_idProfessionalLevel" >
 				<option ng-repeat="professionalLevel in professionalLevels" value="{{professionalLevel.idProfessionalLevel}}"> {{professionalLevel.professionalLevelName}}</option>
 			 </select>	
			 <br>	
			<label>Funcion realizada en la empresa</label>
   	            	         
 			 <select required ng-model="applicant.function_idFunction" >
 				<option ng-repeat="function in functions" value="{{function.idFunction}}"> {{function.functionName}}</option>
 			 </select>	
 			 
 			 <br>
 			 <br>
             <button ng-disabled="!applicantExperience.$valid" ng-click="inputApplicantExperience(applicant)" type="submit" class="button radius large-5 columns botonb">Añadir experiencia</button>
           </div> 
 		 </div>   
</form>