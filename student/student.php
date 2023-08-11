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
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Left Side Navigation Bar</title>
  <?php
    include '../cdn/cdns.php';
  ?>
  <link rel="stylesheet" href="student.css">
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
  <div id="sidebar">
    <h2 class="text-light">Navigation</h2>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Portfolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="../login/login.php">Logout</a>
      </li>
    </ul>
  </div>
  <div id="content">
    <button type="button" id="sidebar_3lines_toggle" class="btn btn-dark">
      <i class="fas fa-align-left"></i> <span></span>
    </button>
    <h1>Main Content</h1>
    <p>This is the main content area.</p>
  </div>
  
  <!-- Custom JavaScript -->
  <script>
    var sidebarVisible = true;
    
    $('#sidebar_3lines_toggle').on('click', function () {
      if (sidebarVisible) {
        $('#sidebar').animate({ left: '-250px' });
        $('#content').animate({ marginLeft: '0' });
      } else {
        $('#sidebar').animate({ left: '0' });
        $('#content').animate({ marginLeft: '250px' });
      }
      sidebarVisible = !sidebarVisible;
    });
  


  function myFunction(x)
  {
    if (x.matches) 
    { // If media query matches
      document.getElementById('sidebar_3lines_toggle').style.display = "inherit";
    } 
    else 
    {
      document.getElementById('sidebar_3lines_toggle').style.display = "none";

      $('#sidebar').animate({ left: '0' });
      $('#content').animate({ marginLeft: '250px' });
      sidebarVisible = true;
    }
  }
  var x = window.matchMedia("(max-width: 800px)")
  myFunction(x) // Call listener function at run time
  x.addListener(myFunction)
  
  </script>
</body>
