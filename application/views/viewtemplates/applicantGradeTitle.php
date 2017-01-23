<form name="applicantGradeTitleForm">   
			 
			<div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>

			
 			 <label>Nombre</label>
			 <br>
			 <input type="text" required placeholder="Introduce el nombre" name="applicantName" ng-model="applicant.applicantName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
			 
		
 			 
             <button ng-disabled="!applicantGradeTitle.$valid" ng-click="updateApplicant(applicant)" type="submit" class="button radius large-5 columns">Regístrarme</button>
            
 		 </div>   
</form>

