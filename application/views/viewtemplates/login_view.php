<h1 class="subheader">{{ saludo }}</h1>

<form name="loginUserForm">
    <fieldset>
        <legend>Login</legend>
 
        <div class="row">
            <div ng-show="flash">
                <div data-alert class="alert-box alert round">{{ flash }}</div>
            </div>
            <div class="large-12 columns">
                <label>Email</label>
                <input type="email" required placeholder="Introduce tu email" ng-model="user.email">
            </div>
            <div class="large-12 columns">
                <label>Password</label>
                <input type="password" required placeholder="Introduce tu password" ng-model="user.password">
            </div>
 
            <button type="submit" ng-disabled="!loginUserForm.$valid" ng-click="login(user)" class="button expand round">Login</button>
        </div>
 
    </fieldset>
</form>

<button class="button success" ng-click="toSignup()">Al signup</button>

<button class="button success" ng-click="toRecover()">Al recover</button>