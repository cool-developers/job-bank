<div ng-include="'Templates/get/menu.php'"></div>


<form>
	<div>
             <label>Titulo del puesto</label>
             <input type="text" required ng-model="offer." />
 
 			
             <label>Password</label>
             <input type="password" required placeholder="Introduce un password..." ng-model="user.password" />
 
             <button ng-disabled="!registerUserForm.$valid" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
 		 </div>   	
</form>

