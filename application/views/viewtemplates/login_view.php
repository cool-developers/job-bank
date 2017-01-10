<h1 class="subheader">{{ saludo }}</h1>

<form name="loginUserForm"> 
        <div>
            <div ng-show="flash">
                <div data-alert class="alert-box alert round">{{ flash }}</div>
            </div>
            <div class="large-12 columns">
                <label>Email</label>
                <input type="email" required placeholder="Introduce tu email" ng-model="user.email" name"email">
                <span ng-show="loginUserForm.email.$error.required">Campo obligatorio.</span>
            </div>
            <div class="large-12 columns">
                <label>Password</label>
                <input type="password" required placeholder="Introduce tu password" ng-model="user.password"name"password">
                <span ng-show="loginUserForm.password.$error.required">Campo obligatorio.</span>
            </div>
 
            <button type="submit" ng-disabled="!loginUserForm.$valid" ng-click="login(user)" class="button expand round">Login</button>
        </div> 
</form>

<button class="button success" ng-click="toSignup()">Al signup</button>

<button class="button success" ng-click="toRecover()">Al recover</button>