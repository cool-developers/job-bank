<form name="applicantExperience">   
			 
			<div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>

             <button ng-disabled="!applicantExperience.$valid" ng-click="inputApplicantGrade(applicant)" type="submit" class="button radius large-5 columns">Añadir estudio</button>
            
 		 </div>   
</form>