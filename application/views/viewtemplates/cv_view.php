<form name="cvForm">   

 			 <label>Nombre</label>
			 <br>
			 <input type="text" required placeholder="Introduce el nombre del profesor" name="applicantName" ng-model="applicant.applicantName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
			 
			 <label>Apellidos</label>
			 <br>
			 <input type="text" required placeholder="Introduce el nombre del profesor" name="applicantLastName" ng-model="applicant.applicantLastName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>		
			 
			 <label>Fecha</label>
			 <br>
			 <input type="number" maxlength="2" required placeholder="DD" name="day" ng-model="day" />
             <input type="number" maxlength="2" required placeholder="MM" name="month" ng-model="month" />
             <input type="number" maxlength="4" required placeholder="AAAA" name="year" ng-model="year" />       
			 <br>
			 
			 <!-- https://material.angularjs.org/latest/demo/chips -->
			 	 
			 <label>Código Postal</label>
			 <br>
			 <input type="text" required placeholder="Introduce el nombre del profesor" name="applicantName" ng-model="applicant.applicantName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
			 <label>Provincia</label>
   	         <br>   	         
 			 <select ng-change="provinceSelected()" ng-model="selectedProvince" >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>	
 			 <br>
 			 <label>Población</label>
 			 <br>
 			 <select ng-model="applicant.town_idTown">
 				<option ng-repeat="town in towns" value="{{town.idTown}}"> {{town.townName}}</option>
 			 </select>	
 			 <br> 				 
			 <label>Dirección</label>
			 <br>
			 <input type="text" required placeholder="Introduce el nombre del profesor" name="applicantName" ng-model="applicant.applicantName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
			 
			 <label>Teléfono 1</label>
			 <br>
			 <input type="text" required placeholder="Introduce el nombre del profesor" name="applicantName" ng-model="applicant.applicantName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
 			 
 			 <label>Teléfono 2</label>
			 <br>
			 <input type="text" required placeholder="Introduce el nombre del profesor" name="applicantName" ng-model="applicant.applicantName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
 			 
 			 <label>Permiso de conducir</label>
			 <br>
			 Si <input type="radio" name="applicantDriverLicense" ng-model="applicant.applicantDriverLicense" value="true">
			 No <input type="radio" name="	applicantDriverLicense" ng-model="applicant.applicantDriverLicense" value="false">
			 <br>
			 
			 <label>Coche</label>
			 <br>
			 Si <input type="radio" name="applicantVehicle" ng-model="applicant.applicantVehicle" value="true">
			 No <input type="radio" name="applicantVehicle" ng-model="applicant.applicantVehicle" value="false">
			 <br>
			 
			 <label>Trabajando</label>
			 <br>
			 Si <input type="radio" name="applicantWorkStatus" ng-model="applicant.applicantWorkStatus" value="true">
			 No <input type="radio" name="applicantWorkStatus" ng-model="applicant.applicantWorkStatus" value="false">
			 <br>
			 
 			 <label>Buscas Trabajo</label>
			 <br>
			 Si <input type="radio" name="applicantStatus" ng-model="applicant.applicantStatus" value="true">
			 No <input type="radio" name="applicantStatus" ng-model="applicant.applicantStatus" value="false">
			 <br>
			 
			 
 			 
             <button ng-disabled="!cvForm.$valid" ng-click="signupTeacher(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
            
 		 </div>   
</form>

