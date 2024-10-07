<?php session_start() ?>
<?php $title = "Login" ?>
<?php ob_start() ?>
<link rel="stylesheet" href="../assets/css/login.css">
<?php $styles = ob_get_clean() ?>
<?php ob_start() ?>

<div class="container">
    <section class="row">
        <section class="col">
            <div class="d-flex justify-content-center align-items-center text-center pt-40">
                <a href="./"><img src="../assets/img/logo/yt_final1.png" alt="CCV"></a>
            </div>
            <p class="text-center fs-4 fuchsia pt-4">
                Trust, God & Having New Life...
            </p>
        </section>
        <section class="col">
            <div class="container">
                <div class="row justify-content-center pt-20">
                    <div class="col-md-6 login-container bg-bubble-gum p-4 rounded w-form mb-20 shadow-sm">
                        <h2 class="text-center mb-4 fuchsia">Login</h2>
                        <form action="../logic/login.php" method="post" id="loginform">
                            <p class="form-group">
                                <label for="username" class="fuchsia">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                            </p>
                            <p class="form-group">
                                <label for="password" class="fuchsia">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </p>
                            <p class="form-group pt-1">
                                <button type="submit" name="login" class="btn bg-fuchsia text-white" style="width: 100%">Login</button>
                            <p class="text-center"> <a href="./forgot-password.php" class="forgot-password-link">Forgot
                                    Password?</a></p>
                            <p class="text-muted text-center">Don't Have an Account? <a href="./signup.php" class="fuchsia" style="text-decoration:none">Register</a></p>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>

<?php $content = ob_get_clean() ?>

<?php ob_start() ?>
<script src="../assets/js/login.session.storage.js"></script>
<?php $scripts = ob_get_clean() ?>

<?php require_once "../shared/layout.php" ?>