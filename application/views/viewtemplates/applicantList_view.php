<form name="registerApplicantForm">   


		<div class="recoverpadre">
			<div class="recoverlist">

 			 <label>Email</label>
			 
             <input type="email" required placeholder="Introduce un email correcto..." name="email" ng-model="user.email" />
              <span ng-show="registerApplicantForm.email.$error.required">El email introducido no es valido.</span>
			 <br>		
             <button ng-disabled="!registerApplicantForm.$valid" ng-click="signupApplicant(user)" type="submit" class="button radius large-5 columns botonb">Regístrar</button>
           
           	</div>
           	
 		 </div>   
</form>