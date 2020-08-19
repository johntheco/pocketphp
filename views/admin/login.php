<div class="container login-container">
    <div class="container row">
        <div class="container form-container col-sm-4 my-auto">
            
            <form method="POST" action="/admin/login">

                <!-- TODO: apply further functionality where you can login to admin panel using either username or email
                <div class="form-group group-container">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" placeholder="Username" required>
                    <small id="usernameHelp" class="form-text text-muted">Username for your account</small>
                </div>-->

                <div class="form-group group-container">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="email@email.com" required>
                    <small id="emailHelp" class="form-text text-muted">Email for your account</small>
                </div>

                <div class="form-group group-container">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                    <small id="passwordHelp" class="form-text text-muted">Password for your account</small>
                </div>

                <div class="form-group group-container my-auto">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

        </div>
    </div>
</div>