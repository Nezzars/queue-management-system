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
  <link rel="stylesheet" href="styles.css">
  <?php
      include '../cdn/cdns.php';
  ?>
  
  <title>Left Side Navigation Bar</title>
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
        background-color: #333;
        color: #fff;
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
        color: #fff;
        font-size: 18px;
        }

        /* Add hover effect for links */
        .navbar-items li a:hover {
        background-color: #444;
        }

        /* Media query for responsive design */
        @media (max-width: 768px) {
        .toggle-button {
            display: block;
        }
        .navbar-items {
            display: none;
        }
        .navbar.active .navbar-items {
            display: block;
        }
        }
        .logout-button {
        background-color: #c0392b;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        text-decoration: none;
        }

  </style>
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
  <div class="navbar">
    <div class="navbar-header">
      <div class="logo">
        <!-- Place your logo or text here -->
        Web Based Queue Management System
      </div>
      <div class="toggle-button" onclick="toggleNavbar()">
        <!-- Hamburger icon for mobile view -->
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
    </div>
    <ul class="navbar-items" id="navbar-items">
      <li><a href="#">Sample</a></li>
      <li><a href="#">Sample</a></li>
      <li><a href="#">Sample</a></li>
      <li><a href="#">Sample</a></li>
      <!-- Add logout button -->
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </div>
  <script src="script.js"></script>
</body>
</html>

