<form name="registerTeacherForm">   
			<div class="recoverpadre">
			<div class="recoverlist">


 			 <label>Email</label>
			 
             <input type="email" required placeholder="Introduce un email correcto..." name="email" ng-model="user.email" />
              <span ng-show="registerTeacherForm.email.$error.required">El email introducido no es valido.</span>
			 <br>
			 <label>Nombre</label>
			 
			 <input type="text" required placeholder="Introduce el nombre del profesor" name="teacherName" ng-model="user.teacherName" />
              <span ng-show="registerTeacherForm.email.$error.required">El nombre introducido no es valido.</span>
			 <br>
			 
			 <label>Departamentos</label>
			    	         
 			 <select ng-model="user.selectedDepartment" >
 				<option ng-repeat="department in departments" value="{{department.idDepartment}}"> {{department.departmentName}}</option>
 			 </select>	<br><br>
             <button ng-disabled="!registerTeacherForm.$valid" ng-click="signupTeacher(user)" type="submit" class="button radius large-5 columns botonb">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns botonw">Reset</button>
 		 </div>   
 		  </div>   
 		   </div>   
</form>


<div ng-repeat="teacher in teachers">
	{{teacher.teacherName}} {{departments[teacher.department_idDepartment].departmentName}}
</div>