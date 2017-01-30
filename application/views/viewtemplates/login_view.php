<h1 class="subheader">{{ saludo }}</h1>

<div class=form>
<form name="loginUserForm"> 
        <div>
            <div ng-show="flash">
                <div data-alert class="alert-box alert round">{{ flash }}</div>
            </div>
            <div class="col-5">
                <label>Email</label><br>
                <input type="email" required placeholder="Introduce tu email" ng-model="user.email" name"email">
                <span ng-show="loginUserForm.email.$error.required">Campo obligatorio.</span>
            </div><br>
            <div class="col-5">
                <label>Contraseña</label><br>
                <input type="password" required placeholder="Introduce tu password" ng-model="user.password"name"password">
                <span ng-show="loginUserForm.password.$error.required">Campo obligatorio.</span>
            </div>
 
            <button type="submit" ng-disabled="!loginUserForm.$valid" ng-click="login(user)" class="button expand round">Login</button>
        </div> 
</form>

<a ng-click="toRecover()" href="http://127.0.0.1/job-bank/Login#/recover">¿has olvidado tu contraseña?</a>
</div>

<div class=form1>


<h1>BOLSA DE TRABAJO</h1>

<p>¿Buscas profesionales en nuestro centro?</p>
	
<p>	Ponte en <a href="http://www.fptxurdinaga.hezkuntza.net/web/guest/nosotros">contacto </a> con nosotros o registrate en la bolsa trabajo para gestionar las ofertas.</p>


<button class="button success" ng-click="toSignup()">Registrarse</button>

</div>
