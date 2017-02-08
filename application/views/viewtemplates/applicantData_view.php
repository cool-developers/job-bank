<form name="applicantDataForm">   
			 
			<div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>

			<div class="datapadre">
			<div class="recover">
				
 			 <label>Nombre</label>
			 <input type="text" required placeholder="Introduce el nombre" name="applicantName" ng-model="applicant.applicantName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
			 
			 <label>Apellidos</label>
			 
			 <input type="text" required placeholder="Introduce el apellido" name="applicantLastName" ng-model="applicant.applicantLastName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>		
			 
			
			 
			 <label>Fecha</label>
			  
			 <input type="date" required  name="applicantBirthDate" ng-model="applicant.applicantBirthDate">
			 
			 <!--
			
			 
			 <input type="text" ng-minlength="1" ng-maxlength="2" maxlength="2" size="1" required placeholder="DD" name="day" ng-model="day" ng-model-options="{updateOn: 'blur'}"/>
             <input type="text" ng-minlength="1" ng-maxlength="2" maxlength="2"  size="1" required placeholder="MM" name="month" ng-model="month" ng-model-options="{ updateOn: 'blur'}" />
             <input type="text" ng-minlength="4" ng-maxlength="4" maxlength="4" size="3" required placeholder="AAAA" name="year" ng-model="year" ng-model-options="{ updateOn: 'blur'} "/>       
			 <br>
				
				
			 {{day}}
			 {{month}}	
			 {{year}}				
			 
			 -->
			 
		
 			
			 <br> 
			 <label>Código Postal</label>
			 
			 <input type="text" required placeholder="Introduce código postal" name="applicantPostcode" ng-model="applicant.applicantPostcode" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
			 
			</div>
			<div class="recover">
			 <label>Provincia</label>
   	           	         
 			 <select ng-change="provinceSelected()" ng-model="selectedProvince" >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>	
 			 <br>
 			 <label>Población</label>
 			 
 			 <select ng-model="applicant.town_idTown">
 				<option ng-repeat="town in towns" value="{{town.idTown}}"> {{town.townName}}</option>
 			 </select>	
 			 <br> 				 
			 <label>Dirección</label>
			 
			 <input type="text" placeholder="Introduce dirección" name="applicantAddress" ng-model="applicant.applicantAddress" />
              <span ng-show="registerTeacherForm.email.$error.required">La direccion introducida no es valida.</span>
			 <br>
			 
			 <label>Teléfono 1</label>
			 
			 <input type="text" placeholder="Introduce el télefono" name="applicantPhone1" ng-model="applicant.applicantPhone1" />
              <span ng-show="registerTeacherForm.email.$error.required">El teléfono introducido no es valido</span>
			 <br>
 			 
 			 <label>Teléfono 2</label>
			 
			 <input type="text" placeholder="Introduce otro télefono" name="applicantPhone2" ng-model="applicant.applicantPhone2" />
             <span ng-show="registerTeacherForm.email.$error.required">El teléfono introducido no es valido</span>
			 <br>
			</div>
 			 <div class="recover">
 			 <label>Permiso de Trabajo</label>
			 
			 Si <input type="radio" name="applicantWorkPermit" ng-model="applicant.applicantWorkPermit" value="true">
			 No <input type="radio" name="	applicantWorkPermit" ng-model="applicant.applicantWorkPermit" value="false">
			 <br>
 			 
 			 
 			 <label>Permiso de conducir</label>
			 
			 Si <input type="radio" name="applicantDriverLicense" ng-model="applicant.applicantDriverLicense" value="true">
			 No <input type="radio" name="	applicantDriverLicense" ng-model="applicant.applicantDriverLicense" value="false">
			 <br>			 
				 
			 <label>Coche</label>
			 
			 Si <input type="radio" name="applicantVehicle" ng-model="applicant.applicantVehicle" value="true">
			 No <input type="radio" name="applicantVehicle" ng-model="applicant.applicantVehicle" value="false">
			 <br>
			 
			 <label>Trabajando</label>
			 
			 Si <input type="radio" name="applicantWorkStatus" ng-model="applicant.applicantWorkStatus" value="true">
			 No <input type="radio" name="applicantWorkStatus" ng-model="applicant.applicantWorkStatus" value="false">
			 <br>
			 
 			 <label>Buscas Trabajo</label>
			 
			 Si <input type="radio" name="applicantStatus" ng-model="applicant.applicantStatus" value="true">
			 No <input type="radio" name="applicantStatus" ng-model="applicant.applicantStatus" value="false">
			 <br><br>
			 
			 
 			 
             <button ng-disabled="!applicantDataForm.$valid" ng-click="updateApplicant(applicant)" type="submit" class="button radius large-5 columns botonb">Regístrarme</button>
          </div>  
          </div>    
 		 </div>   
</form>

