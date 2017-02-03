<!--<h1 class="subheader">{{ saludo }}</h1>-->
<div class="formpadre">
<div class=form>
	<img class="imagen" src="http://localhost/job-bank/img/icono.png"; alt="Smiley face" ><br>
<form name="loginUserForm"> 
        <div id="login-container">
            <div ng-show="flash">
                <div data-alert class="alert-box alert round">{{ flash }}</div>
            </div>
            <div class="col-5">
                <label>Email</label>
                <input type="email" required placeholder="Introduce tu email" ng-model="user.email" name"email">
                <span ng-show="loginUserForm.email.$error.required">Campo obligatorio.</span>
            </div><br>
            <div class="col-5">
                <label>Contraseña</label>
                <input type="password" required placeholder="Introduce tu password" ng-model="user.password"name"password">
                <span ng-show="loginUserForm.password.$error.required">Campo obligatorio.</span>
            </div><br>
 			<a ng-click="toRecover()" href="http://127.0.0.1/job-bank/Login#/recover">¿has olvidado tu contraseña?</a><br>
            <button  type="submit" ng-disabled="!loginUserForm.$valid" ng-click="login(user)" class="button expand round boton">Entrar</button>
        </div> 
</form>


</div>

<div class=form1>


<h1>BOLSA DE TRABAJO</h1>

<p>¿Buscas profesionales en nuestro centro?</p>
	
<p>	Ponte en <a href="http://www.fptxurdinaga.hezkuntza.net/web/guest/nosotros">contacto </a> con nosotros o registrate en la bolsa trabajo para gestionar tus ofertas.</p>


<button class="button success botonw" ng-click="toSignup()">Registrarse</button><br>


<div>



<div class="slider" style="max-width:100px">
  <img class="mySlides" src="http://localhost/job-bank/img/centro1.jpg" style="width:120%">
  <img class="mySlides" src="http://localhost/job-bank/img/centro2.jpg" style="width:120%">
  <img class="mySlides" src="http://localhost/job-bank/img/centro3.jpg" style="width:120%">
</div>


</div>


</div>
</div>
		
