<div class="recoverpadre">
<div class="recover">
<form name="registerUserForm">   
        <div>
            <div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>
           
                 
			<label>Nombre de la empresa</label>          
		    <input type="text" required placeholder="Nombre de la empresa" name="enterpriseName" ng-model="user.enterpriseName"/>
		
            
            	 <label>Email</label>
			 
             <input type="email" required placeholder="Introduce un email... " name="email"   ng-model="user.email" ng-model-options="{updateOn: 'blur'}" required/>
  
            
             <span style="color:red" ng-show="registerUserForm.email.$touched && registerUserForm.email.$invalid">
	  			 <span ng-show="registerUserForm.email.$error.required">El email es obligatori.</span>
	 			 <span ng-show="registerUserForm.email.$error.email">El email no es correcto.</span>
  			 </span>
      
         
			
			
             <label>Contraseña</label>
          
             <input type="password" required placeholder="Introduce un password..." id="password" name="password" ng-model="user.password" ng-blur="checkP" ng-minlength="8" ng-maxlength="45" required />
          
            
             <span style="color:red" ng-show="registerUserForm.password.$dirty">
             <span ng-show="registerUserForm.password.$error.required">La contraeña obligatoria.</span>
             <span ng-show="registerUserForm.password.$error.minlength">La contraseña debe tener un minimo de 8 caracteres.</span>
             <span ng-show="registerUserForm.password.$error.maxlength">La contraseña debe tener un minimo de 8 caracteres.</span>
             </span>
              
             
           
             
             <label>Confirmar contraseña</label>
             <input type="password" required placeholder="Introduce un password..." name="password2" ng-model="password2" ng-minlength="8" ng-maxlength="45" pw-check="password" />
           	 
           	 
           	 <span ng-show='registerUserForm.password2.$error.pwmatch'> La contraseña no coincide. </span>
          
                     
             <span style="color:red" ng-show="registerUserForm.password2.$dirty && registerUserForm.password2==registerUserForm.password">
         	 <span>La contraseña debe tener un minimo de 8 caracteres.</span>
             </span>
                
 			 
   	   
   	         <label>Provincia</label>
   	           	         
 			 <select ng-change="provinceSelected()" ng-model="selectedProvince" >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>	
 			 
 			 <label>Población</label>
 			 
 			 
 			 <select ng-model="user.town_idTown">
 				<option ng-repeat="town in towns" value="{{town.idTown}}"> {{town.townName}}</option>
 			 </select>	
 			 
 			 <br>
 			 
 			 <label>Numero de teléfono</label>          
             <input type="text" required placeholder="Numero de teléfono" name="enterprisePhone" ng-model="user.enterprisePhone"/>
          
            
 			 
 			 <br><br>	 
		
             <!-- <button ng-disabled="!registerUserForm.$valid" ng-disabled="user.password!=password2" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button> 
             <button ng-disabled="!habilitado" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             -->
             <button ng-disabled="!registerUserForm.$valid" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns botonb">Regístrarme</button>
             <button class="button success botonw" ng-click="toLogin()">Regresar</button>
 		 </div>   
</form>

</div>
</div>