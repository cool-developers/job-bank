<h1 class="subheader">{{ saludo }}</h1>
<form name="registerUserForm">   
        <div>
            <div ng-show="flash_error">
                <div data-alert class="alert-box alert round">{{ flash_error }}</div>
            </div>
 
            <div ng-show="flash_success">
                <div data-alert class="alert-box success round">{{ flash_success }}</div>
            </div>
             
             <label>Email</label>
             <input type="email" required placeholder="Introduce un email correcto..." ng-model="user.email" />
 			 <br>
             <label>Password</label>
             <input type="password" required placeholder="Introduce un password..." ng-model="user.password" />
 			 <br>
			 <label>Provincia</label>
 			 <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>	
 			  			 <br>
 			 <label>Población</label>
 		     <select >
 				<option ng-repeat="town in towns" value="{{town.idTown}}"> {{town.townName}}</option>
 			 </select>	
 			 <br>
             <button ng-disabled="!registerUserForm.$valid" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
 		 </div>   
</form>
<button class="button success" ng-click="toLogin()">Al login</button>