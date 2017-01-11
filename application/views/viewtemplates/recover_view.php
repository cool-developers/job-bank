<h1 class="subheader">{{ saludo }}</h1>

<h1>Recuperar contraseña</h1>

 <div class="large-12 columns">
                <label>Email</label>
                <input type="email" required placeholder="Introduce tu email" ng-model="user.email" name"email">
                <span ng-show="loginUserForm.email.$error.required">Campo obligatorio.</span>
 </div>

<br>

<button class="button success" ng-click="">Enviar</button>
<button class="button success" ng-click="toLogin()">Al login</button>