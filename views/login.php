<?php

// require_once(ROOT . '/views/partials/error.php');

?>

<div class="container text-center">
<!-- Login Form -->
<form class="form-signin" method="POST" action="/login">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>
</div>