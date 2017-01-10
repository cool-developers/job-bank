<h1 class="subheader">{{ saludo }}</h1>
<form name="registerUserForm">   
        <div>
            <div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>
   	         <label>Población</label>
 			 <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>	
 			 <br> 		    
			 <label>Email</label>
             <input type="email" required placeholder="Introduce un email correcto..." name="email" ng-model="user.email" />
              <span ng-show="registerUserForm.email.$error.required">El email introducido no es valido.</span>
 		
             <label>Password</label>
             <input type="password" required placeholder="Introduce un password..." name="password" ng-model="user.password" ng-minlength="8" ng-maxlength="45"/>
             <span ng-show="registerUserForm.password.$error.required">La contraeña obligatoria.</span>
             <span ng-show="registerUserForm.password.$error.minlength">La contraseña debe tener un minimo de 8 caracteres.</span>
             <span ng-show="registerUserForm.password.$error.maxlength">La contraseña debe tener un minimo de 45 caracteres.</span>
                       
 
             <button ng-disabled="!registerUserForm.$valid" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
 		 </div>   
</form>
<button class="button success" ng-click="toLogin()">Al login</button>