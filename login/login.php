<?php
ini_set('log_errors','On');
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

session_start();


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8" />
    <title>Login Form</title>
    <!-- <link rel="icon" href="images/ffpi.png"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css" />

    <?php
        include '../cdn/cdns.php';
    ?>
</head>

<body>

    <div class="wrapper">

        <div class="title-text">
            <div class="title login">Student Login</div>

            <div class="title signup">Admin Login</div>
        </div>
        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<br><h5 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h5>';
            unset($_SESSION['status']);
        }
        ?>
        <div class="form-container">

            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked />
                <input type="radio" name="slide" id="signup" />
                <label for="login" class="slide login">Student</label>
                <label for="signup" class="slide signup">Admin</label>
                <div class="slider-tab" style="background-image: url('../images/green_background.jpg');"></div>
            </div>

            <div class="form-inner">

                <form action="login_function.php" class="login" method="POST">
                    <div class="field">
                        <input type="text" name="username" placeholder="Username" required />
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <br>
                    <a href="#">Forgot password?</a>
                    <div class="field btn">
                        <div class="btn-layer" style="background-image: url('../images/green_background.jpg');">
                        </div>
                        <input type="submit" name="login_btn" value="Login" />
                    </div>
                    <br>
                    <span>Not a member? </span><a href="../registration/registration_form.php">Signup now</a>
                </form>

                <form action="" class="signup" method="POST">
                    <div class="field">
                        <input type="text" name="admin_username" id="admin_username" placeholder="Username" required />
                    </div>
                    <div class="field">
                        <input type="password" name="admin_password" id="admin_password" placeholder="Password" required />
                    </div>
                    <br>
                    <a href="#">Forgot password?</a>
                    <div class="field btn">
                        <!-- <div class="btn-layer" style="background-image: url('../images/green_background.jpg');"></div> -->
                        <input type="button" name="admin_login_button" id="admin_login_button" value="Login" onclick="admin_login_button_function();" style="background-image: url('../images/green_background.jpg');"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = () => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        };
        loginBtn.onclick = () => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        };
        signupLink.onclick = () => {
            signupBtn.click();
            return false;
        };
    </script>

</body>

<script src="login.js"></script>
</html>
<?php
    if($_SESSION['kaka_create_lang'] == true)
    {
        echo "<script>
            Swal.fire(
            'Success!',
            'Creating Account Successfully!',
            'success'
          )
        </script>";
        $_SESSION['kaka_create_lang'] = false;
    }
    if($_SESSION['failed_login'] == true)
    {
        echo "<script>
            Swal.fire(
            'Failed!',
            'Invalid Credentials!',
            'error'
          )
        </script>";
        $_SESSION['failed_login'] = false;
    }
?>