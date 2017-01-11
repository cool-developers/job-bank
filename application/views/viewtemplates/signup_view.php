<h1 class="subheader">{{ saludo }}</h1>
<form name="registerUserForm">   
        <div>
            <div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>
   	   
   	         <label>Provincia</label>
   	         <br>   	         
 			 <select ng-change="provinceSelected()" ng-model="selectedProvince" >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>	
 			 <br>
 			 <label>Población</label>
 			 <br>
 			 <select>
 				<option ng-repeat="town in towns" value="{{town.idTown}}"> {{town.townName}}</option>
 			 </select>	
 			 
 			 <br>		 
			 <label>Email</label>
			 <br>
             <input type="email" required placeholder="Introduce un email correcto..." name="email" ng-model="user.email" />
              <span ng-show="registerUserForm.email.$error.required">El email introducido no es valido.</span>
			 <br>
             <label>Password</label>
             <br>
             <input type="password" required placeholder="Introduce un password..." name="password" ng-change="passwd()" ng-model="user.password" ng-minlength="8" ng-maxlength="45"/>
             <span ng-show="registerUserForm.password.$error.required">La contraeña obligatoria.</span>
             <span ng-show="registerUserForm.password.$error.minlength">La contraseña debe tener un minimo de 8 caracteres.</span>

             <span ng-show="registerUserForm.password.$error.maxlength">La contraseña debe tener un minimo de 8 caracteres.</span>
             <br>
             <label>Password2</label>
             <input type="password" required placeholder="Introduce un password..." name="password2" ng-change="passwd()" ng-model="password2" ng-minlength="8" ng-maxlength="45"/>
             
         
             
 			 <br>
             <!-- <button ng-disabled="!registerUserForm.$valid" ng-disabled="user.password!=password2" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button> -->
    
 
             <button ng-disabled="!registerUserForm.$valid && habilitado" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
             
 		 </div>   
</form>
<button class="button success" ng-click="toLogin()">Al login</button>