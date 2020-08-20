<!-- Navigation -->
<!-- Static Navigation Bar
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4"> -->
<!-- Fixed Navigation Bar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mb-4">
    <a class="navbar-brand" href="/">PocketPHP</a>

    <!-- Collapser! It is relatively easy to implement this XD -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-control="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Need for spacing -->
        <div class="mr-auto"></div>

        <!-- Actual Navbar -->
        <ul class="navbar-nav">

            <?php
            if($this->userauth){
                echo <<<LOGOUT
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                LOGOUT;
            } else {
                echo <<<LOGIN_REGISTER
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                LOGIN_REGISTER;
            }
            ?>
        </ul>
    </div>
</nav>

<main role="main" class="container main-container">
    <div class="jumbotron">
        <h1>User Profile</h1>
        <p>Here will be profile information.</p>
    </div>
</main>
