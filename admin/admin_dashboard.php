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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
      include '../cdn/cdns.php';
  ?>
  
  <title>Administrator</title>
  
</head>

<body>
  <?php
      if($_SESSION['kakalogin_lang'] == true)
      {
          echo "<script>
              Swal.fire(
              'Success!',
              'Login Successfully!',
              'success'
            )
          </script>";
          $_SESSION['kakalogin_lang'] = false;
      }
  ?>

  <?php
    include '../navbars/admin_navbar.php';
  ?>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        }

        .navbar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background-color: white;
        color: black;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
        z-index: 1000; /* Make sure the navbar is on top of other elements */
        }

        .navbar-header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        margin-bottom: 20px;
        }

        .logo {
        font-size: 24px;
        margin-left:10px;
        }

        .toggle-button {
        cursor: pointer;
        display: none;
        }

        .bar {
        width: 25px;
        height: 3px;
        background-color: #fff;
        margin: 5px 0;
        }

        .navbar-items {
        list-style-type: none;
        padding: 0;
        margin: 0;
        width: 100%;
        }

        .navbar-items li {
        padding: 15px;
        }

        .navbar-items li a {
        text-decoration: none;
        color: black;
        font-size: 18px;
        }

        /* Add hover effect for links */
        .navbar-items li a:hover {
        /* background-color: #444; */
        }

        /* Media query for responsive design */
        /* @media (max-width: 768px) {
          .toggle-button {
              display: block;
          }
          .navbar-items {
              display: none;
          }
          .navbar.active .navbar-items {
              display: block;
          }
        } */
        .logout-button {
        background-color: #c0392b;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        color: black;
        font-size: 18px;
        cursor: pointer;
        text-decoration: none;
        }

  </style>
    <div class="navbar">
    <center>
      <div class="navbar-header">
          <div class="logo">
              <img src="../images/ptc_logo_whitebg.jpg" style="width:150px; height:150px;" alt="Your Logo" width="300" height="300">
          </div>
      </div>
    </center>
    <h1>Administrator</h1>
    <br>
    <hr style="width:100%;">
    <br>
    <ul class="navbar-items" id="navbar-items">
      <li><a onclick="alert('qwe');" style="cursor:pointer;"><i class="fas fa-tachometer-alt" style="color:green;"></i> &nbsp&nbsp Dashboard</a></li>
    </ul>
    <ul class="navbar-items" id="navbar-items">
      <li><a onclick="department_toggle();" style="cursor:pointer;" id=""><i class="fa fa-solid fa-building" style="color:green;"></i> &nbsp&nbsp Departments &nbsp&nbsp&nbsp<i class="fa fa-solid fa-caret-down"></i></a></li>
    </ul>
    <div id="department_lists" style="width:100%; display:none;">
      <ul class="navbar-items" id="navbar-items">
        <hr style="width:100%; border:1px solid lightgray;">
        <li><a onclick="alert('qwe');" style="cursor:pointer;">Deans Office</a></li>
        <hr style="width:100%; border:1px solid lightgray;">
        <li><a onclick="alert('qwe');" style="cursor:pointer;">Registrar</a></li>
        <hr style="width:100%; border:1px solid lightgray;">
        <li><a onclick="alert('qwe');" style="cursor:pointer;">+ ADD DEPARTMENT </a></li>
        <hr style="width:100%; border:1px solid lightgray;">
      </ul>
    </div>
    <br>
      <hr style="width:100%;">
    <ul class="navbar-items" id="navbar-items">
      <li><a onclick="logout_button()" style="cursor:pointer;"><i class="fa fa-solid fa-right-from-bracket" style="color:green;"></i> &nbsp&nbsp Log-out</a></li>
    </ul>
  </div>

  
</body>
<script src="script.js"></script>
<script>
  function logout_button()
  {
    Swal.fire({
      title: 'Warning!',
      text: "Are you sure you want to log out?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "../logout.php";
      } else {
        // User clicked "No" or closed the dialog
        Swal.fire(
          'Cancelled',
          'Your action has been cancelled.',
          'error'
        );
      }
    });
  }

  function department_toggle()
  {
    $("#department_lists").stop().slideToggle();
  }
</script>
</html>


