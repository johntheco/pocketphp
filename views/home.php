<!-- Navigation -->
<!-- Static Navigation Bar
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4"> -->
<!-- Fixed Navigation Bar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mb-4">
    <a class="navbar-brand" href="#">PocketPHP</a>

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



<!-- Main Content -->
<main role="main" class="container">
    <div class="jumbotron">
        <h1>PocketPHP</h1>
        <p class="lead">PocketPHP is extremely minimalistic
        micro-boilerplate for building simple PHP websites
        and applications with support of basic functionality
        such as routing, templating, error Handling, static
        files and regexp routes handling. PocketPHP is in
        early stage of development and mainly suitable for
        educational purposes, such as learning about basic
        mechanisms of server applications, MVC design pattern,
        or PHP programming language.</p>
        <a class="btn btn-lg btn-primary" href="https://github.com/johntheco/pocketphp" role="button" target="_blank">Try it!</a>
    </div>
</main>

<ul>
    <li>Algorithms/Data Structures</li>
    <li>Patterns</li>
    <li>MySQL/SQL</li>
    <li>INDEXES + KEYS</li>
    <li>Make pages on bootstrap</li>
    <li>Shadow DOM</li>
    <li>jQuery - quick lookup</li>
    <li>HTML/CSS - quick lookup</li>
    <li>JavaScript - quick lookup</li>
    <li>PHP - quick lookup</li>
</ul>
