<form name="registerTeacherForm">   

 			<label>Email</label>
			 <br>
             <input type="email" required placeholder="Introduce un email correcto..." name="email" ng-model="user.email" />
              <span ng-show="registerTeacherForm.email.$error.required">El email introducido no es valido.</span>
			 <br>
			 
			 <label>Departamentos</label>
			 <br>   	         
 			 <select ng-model="selectedDepartment" >
 				<option ng-repeat="department in departments" value="{{department.idDepartment}}"> {{department.departmentName}}</option>
 			 </select>	
             <button ng-disabled="!registerTeacherForm.$valid" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
 		 </div>   
</form>