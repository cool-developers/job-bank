<form name="applicantExperience">   
			 
			<div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>
						
			 <label>Nombre de la empresa</label>
			 <br>
			 <input type="text" required placeholder="Nombre de la empresa" name="experienceEnterpriseName" ng-model="applicant.experienceEnterpriseName" />
              <span ng-show="applicantExperience.experienceEnterpriseName.$error.required">Introduce el nombe de de la empresa.</span>
			 <br>
			 
			 				
			 <label>Nombre del puesto de trabajo</label>
			 <br>
			 <input type="text" required placeholder="Nombre del puesto de trabajo" name="experienceWorkstationName" ng-model="applicant.experienceWorkstationName" />
              <span ng-show="applicantExperience.experienceWorkstationName.$error.required">Introduce el nombe de de la empresa.</span>
			 <br>	 	
	 		
	 		<label>Fecha de inicio</label>
		 	<input type="date" required  name="experienceDateStart" ng-model="applicant.experienceDateStart">
		   
		    <label>Fecha fin</label>	 
		 	<input type="date" name="experienceDateEnd" ng-model="applicant.applicant_has_gradeTitleEndDate">
	 	    <br>
			 			
			<label>Descripcion del trabajo realizado</label>
			 <br>
			 <textarea placeholder="Max 2000" rows="5"  cols="50" name="applicant.experienceDescription" ng-model="applicant.experienceDescription" />  </textarea>
			 <br>		

			<label>Nivel profesional de la empresa</label>
   	         <br>   	         
 			 <select required ng-model="applicant.professionalLevel_idProfessionalLevel" >
 				<option ng-repeat="professionalLevel in professionalLevels" value="{{professionalLevel.idProfessionalLevel}}"> {{professionalLevel.professionalLevelName}}</option>
 			 </select>	
			 <br>	
			<label>Funcion realizada en la empresa</label>
   	         <br>   	         
 			 <select required ng-model="applicant.function_idFunction" >
 				<option ng-repeat="function in functions" value="{{function.idFunction}}"> {{function.functionName}}</option>
 			 </select>	
 			 
 			 <br>
 			 <br>
             <button ng-disabled="!applicantExperience.$valid" ng-click="inputApplicantExperience(applicant)" type="submit" class="button radius large-5 columns">Añadir experiencia</button>
            
 		 </div>   
</form>