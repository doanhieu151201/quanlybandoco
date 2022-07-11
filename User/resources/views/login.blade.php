<link rel="stylesheet" href="../use/css/login.css" />

<div class="login-page"ng-app="myapp"ng-controller="mycontroller">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"ng-model="username"/>
      <input type="password" placeholder="password"ng-model="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#" >Sign In</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="username"ng-model="username"/>
      <input type="password" placeholder="password"ng-model="password"/>
      <button ng-click="login()">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
<script src="/js/angular.min.js"></script>

<script src="/js/login.js"></script>
