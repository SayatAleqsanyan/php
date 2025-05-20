<?php
session_start();
if(isset($_SESSION['login'])) {
    header("Location: ../../pages/home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Form</title>
    <link rel="stylesheet" href="./css/SignUp_LogIn_Form.css">
    <link rel="stylesheet" href="./css/validation.css">
</head>
    <body>
        <div class="container">
            <div class="form-box login">
                <form action="./php/action/action-login.php" method="post" id="login-form">
                    <p class="successful">
                        <?php
                        if (isset($_SESSION['reg_successful'])) {
                            echo $_SESSION['reg_successful'];
                        }
                        ?>
                    </p>
                    <p class="error">
                        <?php
                        if (isset($_SESSION['log_error'])) {
                            echo $_SESSION['log_error'];
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['reg_error'])) {
                            echo $_SESSION['reg_error'];
                        }
                        ?>
                    </p>
                    <h1>Login</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Login" name="login" class="input" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" name="password" class="input" required>
                        <i class='bx bxs-lock-alt' ></i>
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>

            <div class="form-box register">
                <form action="./php/action/action-registration.php" method="post" id="registration-form">
                <p class="error">
                        <?php
                        if (isset($_SESSION['reg_error'])) {
                            echo $_SESSION['reg_error'];
                        }
                        ?>
                    </p>
                    <h1>Registration</h1>
                    <div class="input-box">
                        <input type="text" placeholder="Login" name="login" class="input" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="email" placeholder="Email" name="email" class="input" required>
                        <i class='bx bxs-envelope' ></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" name="password" class="input" required>
                        <i class='bx bxs-lock-alt' ></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Repeat Password" name="repeat_password" class="input" required>
                        <i class='bx bxs-lock-alt' ></i>
                    </div>
                    <button type="submit" class="btn">Register</button>
                </form>
            </div>

            <div class="toggle-box">
                <div class="toggle-panel toggle-left">
                    <h1>Hello, Welcome!</h1>
                    <p>Don't have an account?</p>
                    <button class="btn register-btn">Register</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Already have an account?</p>
                    <button class="btn login-btn">Login</button>
                </div>
            </div>
        </div>

        <script src="./js/SignUp_LogIn_Form.js"></script>
        <script src="./js/validation.js"></script>
    </body>
</html>
