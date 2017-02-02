<div class="recoverpadre">

<h1 class="h1">Recuperar contraseña</h1>
<div class="recover">
 <div class="large-12 columns">
                <label>Email</label>
                <input type="email" required placeholder="Introduce tu email" ng-model="user.email" name"email">
                <span ng-show="loginUserForm.email.$error.required">Campo obligatorio.</span>
 </div>

<br>

<button class="button success botonb" ng-click="">Enviar</button>
<button class="button success botonw" ng-click="toLogin()">Ir al registro</button>
</div>
</div>