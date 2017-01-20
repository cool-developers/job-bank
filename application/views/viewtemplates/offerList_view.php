<ul>
	<?php
	if (isset($error)){
		echo("<li>$error</li>");	
	}
	echo validation_errors("<li>","</li>"); ?>
</ul>	
<form>
	<div>
             <label>Titulo del puesto</label><br>	
             <input type="text">	
			
             <!-- <input type="text" required ng-model="offer." /> -->
 			
 			<br>
             <label>Curso</label>
             <br>   	
               
 			 <select ng-model="selectedCurso" >
 				<option ng-repeat="curso in GradeTitle" value="{{curso.idGradeTitle}}"> {{curso.gradeTitleName}}</option>
 			 </select>	
 
 			 <br>
 			 
 			 <label>Fecha limite: </label>
 			 <input type="date" name="fechalimi" step="1" min="2013-01-01" max="2013-12-31" value="<?php echo date("Y-m-d");?>">
 			 
 			 <br>
 			 
 			 <label>Descripción: </label><br>
 			 <textarea rows="6" cols="50" name="comment">Escriba aquí su descripción...</textarea>
 			 
 			 <br>
 			 <label>Tipo de contrato: </label><br>
 			  <select ng-model="selectedContract">
 			 <option ng-repeat="Contract in Contracts" value="{{Contract.idContract}}"> {{Contract.contractName}}</option>
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

             <input type="text" required ng-model="offer" />

 
 			{{offer}}
 			 
             <button ng-disabled="!registerUserForm.$valid" ng-click="signupUser(user)" type="submit" class="button radius large-5 columns">Regístrarme</button>
             <button type="reset" class="button radius alert large-5 columns">Reset</button>
 		 </div>   	
</form>

