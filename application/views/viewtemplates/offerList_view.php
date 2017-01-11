<ul>
	<?php
	if (isset($error)){
		echo("<li>$error</li>");	
	}
	echo validation_errors("<li>","</li>"); ?>
</ul>	




<div ng-include="'Templates/get/menu.php'"></div>


<form>
	<div>
             <label>Titulo del puesto</label>
             <input type="text" required ng-model="offer." />
 
 			<br>
             <label>Curso</label>
             <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>	
 			 
 			 <br>
 			 
 			 <label>Fecha limite: </label>
 			 <input type="date" name="fechalimi" step="1" min="2013-01-01" max="2013-12-31" value="2013-01-01">
 			 
 			 <br>
 			 
 			 <label>Descripción: </label>
 			 <textarea rows="6" cols="50" name="comment">Escriba aqui su descripción...</textarea>
 			 
 			  <label>Tipo de contrato: </label>
 			  <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select><br>
 			 
 			  <label>Idiomas: </label>
 			  <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select><br>
 			 
 			  <label>Conocimientos: </label>
 			  <select >
 				<option ng-repeat="province in provinces" value="{{province.idProvince}}"> {{province.provinceName}}</option>
 			 </select>
 			 
 			 <br>
 			 
 			  <input type="radio" name="estado" value="pribada" > Pribada<br>
  			  <input type="radio" name="estado" value="publica"> Publica<br>
 
             <button ng-disabled="!registerUserForm.$valid" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
 		 </div>   	
</form>

