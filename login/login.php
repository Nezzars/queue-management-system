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
    <!-- <link rel="stylesheet" href="login.css" /> -->
    <?php
        include 'login_css.php';
    ?>
    <?php
        include '../cdn/cdns.php';
    ?>
    <style>
        body{
            background-image: url('../homepage/homepageimg.jpg');
            background-size: cover;
        }
    </style>
    
    
</head>

<body>
    <br>
    <?php
        include "../navbars/homepage_navbar.php";
      ?>
    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-2">
                <br><br>
            </div>
            <div class="col-md-4 col-12 mb-3">
                <div class="card text-bg-success">
                    <div class="card-header">Important Note:</div>
                    <div class="card-body">
                        <h5 class="card-title">Appointment Requirements</h5>
                        <p class="card-text">
                            You can register and log in to our system. Here are the possible documents you can request upon logging in:
                            <ul>
                                <li>Transcript of Record</li>
                                <li>Diploma</li>
                                <li>Form 137</li>
                                <li>Certifications</li>
                                <ol>
                                    <li>Honorable Dismissal</li>
                                    <li>Goodmoral Character</li>
                                </ol>
                            </ul>
                            if your document is not mentioned above, you can enter it in the "others" text field.
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-3">
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
                            <div class="slider-tab" style="background-color:rgb(29,87,63);"></div>
                        </div>

                        <div class="form-inner">

                            <!-- <form action="login_function.php" class="login" method="POST"> -->
                            <form action="" class="login" method="POST">
                                <div class="field">
                                    <input type="text" name="student_username" id="student_username" placeholder="Username" required />
                                </div>
                                <div class="field">
                                    <input type="password" name="student_password" id="student_password" placeholder="Password" required />
                                </div>
                                <!-- <a href="#">Forgot password?</a> -->
                                <div class="field btn">
                                    <div class="btn-layer" style="background-color:rgb(29,87,63);">
                                    </div>
                                    <input type="button" name="student_login_button" id="student_login_button" value="Login" onclick="student_login_button_function();" style="background-color:rgb(29,87,63);"/>
                                </div>
                                <br><br>
                                <span>Not a member? </span><a href="../registration/registration_form.php">Signup now</a>
                            </form>

                            <form action="" class="signup" method="POST">
                                <div class="field">
                                    <input type="text" name="admin_username" id="admin_username" placeholder="Username" required />
                                </div>
                                <div class="field">
                                    <input type="password" name="admin_password" id="admin_password" placeholder="Password" required />
                                </div>
                                <!-- <a href="#">Forgot password?</a> -->
                                <div class="field btn">
                                    <div class="btn-layer" style="background-color:rgb(29,87,63);">
                                    </div>
                                    <!-- <div class="btn-layer" style="background-image: url('../images/green_background.jpg');"></div> -->
                                    <input type="button" name="admin_login_button" id="admin_login_button" value="Login" onclick="admin_login_button_function();" style="background-color:rgb(29,87,63);"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

<!-- <script src="login.js"></script> -->
<script>
    function student_login_button_function()
    {
        if(document.getElementById("student_username").value === "")
        {
            document.getElementById("student_username").setCustomValidity("Username cannot be empty.");
            document.getElementById("student_username").reportValidity();
        }
        else if(document.getElementById("student_password").value === "")
        {
            document.getElementById("student_password").setCustomValidity("Password cannot be empty.");
            document.getElementById("student_password").reportValidity();
        }
        else
        {
            var data = 
            {
                action: 'student_login_button_function',
                student_username: $("#student_username").val(),
                student_password: $("#student_password").val(),
            };
        
            $.ajax
            ({
                url: 'login_ajax.php',
                type: 'post',
                data: data,
        
                success:function(response)
                {
                    if(response == 1)
                    {
                        // alert("1");
                        window.location.href = "../student/student.php";
                    }
                    else
                    {
                        // alert("0");
                        Swal.fire(
                            'Failed!',
                            'Invalid Credentials!',
                            'error'
                        );
                    }
        
                    // alert(response);
                }
            });
        }
    }

    function admin_login_button_function()
    {
        if(document.getElementById("admin_username").value === "")
        {
            document.getElementById("admin_username").setCustomValidity("Username cannot be empty.");
            document.getElementById("admin_username").reportValidity();
        }
        else if(document.getElementById("admin_password").value === "")
        {
            document.getElementById("admin_password").setCustomValidity("Password cannot be empty.");
            document.getElementById("admin_password").reportValidity();
        }
        else
        {
            var data = 
            {
                action: 'admin_login_button_function',
                admin_username: $("#admin_username").val(),
                admin_password: $("#admin_password").val(),
            };
        
            $.ajax
            ({
                url: 'login_ajax.php',
                type: 'post',
                data: data,
        
                success:function(response)
                {
                    if(response == 1)
                    {
                        // alert("1");
                        window.location.href = "../admin/admin.php";
                    }
                    else
                    {
                        // alert("0");
                        Swal.fire(
                            'Failed!',
                            'Invalid Credentials!',
                            'error'
                        );
                    }
        
                    // alert(response);
                }
            });
        }
    }
</script>
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