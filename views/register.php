<?php

// require_once(ROOT . '/views/partials/error.php');

?>

<div class="container text-center">
<!-- Login Form -->
<form class="form-signin" method="POST" action="/register">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>

    <label for="inputLogin" class="sr-only">Login</label>
    <input type="text" id="inputLogin" name="login" class="form-control" placeholder="Login" required="" autofocus="">

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="">

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">

    <label for="inputRepassword" class="sr-only">Repeat password</label>
    <input type="password" id="inputRepassword" name="repassword" class="form-control" placeholder="Repeat password" required="">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>
</div>