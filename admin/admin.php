<?php
    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    include '../connections/my_cnx.php';

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
      // include '../cdn/cdns.php';
  ?>
  
  <!-- Include Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- swal -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
 Add Bootstrap CSS and JS for the modal -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
  <!-- Add Bootstrap CSS and JS for the modal -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>
  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
  <title>Administrator</title>

  <style>
      
    .fc-event-center-title 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color:blue;
    }
    .fc-event-total {
        background-color: lightgray;
        border: 1px solid gray;
        font-weight: bold;
    }

    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      background-color:lightgreen;
    }
    hr
    {
      padding:0;
      margin:0;
    }

    /* MOBILE VIEW LEFT NAV BAR TOGGLE DESIGN */
    #checkbox_leftnavbar {
    display: none;
    }

    .toggle_leftnavbar {
    position: relative;
    width: 40px;
    height: 40px;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition-duration: .5s;
    }

    .bars_leftnavbar {
    width: 100%;
    height: 4px;
    background-color: #1F5642;
    border-radius: 4px;
    }

    #bar2_leftnavbar {
    transition-duration: .8s;
    }

    #bar1_leftnavbar,#bar3_leftnavbar {
    width: 70%;
    }

    #checkbox_leftnavbar:checked + .toggle_leftnavbar .bars_leftnavbar {
    position: absolute;
    transition-duration: .5s;
    }

    #checkbox_leftnavbar:checked + .toggle_leftnavbar #bar2_leftnavbar {
    transform: scaleX(0);
    transition-duration: .5s;
    }

    #checkbox_leftnavbar:checked + .toggle_leftnavbar #bar1_leftnavbar {
    width: 100%;
    transform: rotate(45deg);
    transition-duration: .5s;
    }

    #checkbox_leftnavbar:checked + .toggle_leftnavbar #bar3_leftnavbar {
    width: 100%;
    transform: rotate(-45deg);
    transition-duration: .5s;
    }

    #checkbox_leftnavbar:checked + .toggle_leftnavbar {
    transition-duration: .5s;
    transform: rotate(180deg);
    }
/* MOBILE VIEW LEFT NAV BAR TOGGLE DESIGN */
  </style>
</head>

<body>
  
  <!-- Loading SPINNER -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal11" id="launch_modal_id" style="display:none;">
  open loading
</button>

<div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="loader">
        <div class="loading">
        </div>
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="display:none;">
        <div class="modal-header" style="display:none;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_loading_button">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
    </div>
</div>

<style>
* {
  margin: 0;
  padding: 0;
}

.loader {
  display: none;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%, -50%);
}

.loading {
  border: 2px solid #ccc;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border-top-color: #1ecd97;
  border-left-color: #1ecd97;
  animation: spin 1s infinite ease-in;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
</style>

<script type="text/javascript">
    function open_loading() 
    {
        document.getElementById("launch_modal_id").click();
        document.getElementsByClassName("loader")[0].style.display = "block";
        document.getElementById("exampleModal11").style.pointerEvents = "none";
    }
    function close_loading() 
    {
        document.getElementById("close_loading_button").click();
    }
</script>  
<!-- Loading SPINNER -->
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

<style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Style the navigation bar */
        .navbar {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.2);
        }
        
        /* Container to center the content */
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
        }
        
        /* Style the logo */
        .logo img {
            height: 40px;
            width: auto;
            display: block;
        }
        
        /* Style the navigation list */
        .nav-list {
            list-style: none;
            display: flex;
        }
        
        /* Style navigation list items */
        .nav-list li {
            margin: 0 15px;
        }
        
        /* Style navigation links */
        .nav-list li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        /* Style navigation link on hover */
        .nav-list li a:hover {
            background-color: #555;
        }
        
        /* Style logout link */
        .logout {
            margin-left: auto;
        }
        
        /* Style logout link on hover */
        .logout a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #d9534f;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .logout a:hover {
            background-color: #c9302c;
        }

        /* Base styling for desktop */
        .nav-list {
            display: flex;
            align-items: center;
            margin-right: 30px;
        }

        /* Responsive styling for mobile */
        @media (max-width: 767px) {
            .nav-list {
                margin-right: 0;
                flex-direction: column;
                text-align: center;
            }
        }

        .fc-event-center-title {
            text-align: center;
        }

        #main_panel
        {
            width: calc(100% - 250px); 
            margin-left:250px;
        }


    </style>
    <?php
      $sql = "  SELECT * FROM ptc_admin WHERE username='".$_SESSION['admin_username']."';";
      $result = mysqli_query($con, $sql);
      $top_nav_bar = mysqli_fetch_assoc($result);
    ?>
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background-color: white; border: 1px solid lightgray;">
      <div id="i want this on left">
          <ul class="nav-list" style="margin: 0; padding: 0; list-style: none;" id="leftnavbar_toggle_button">
            <input type="checkbox" id="checkbox_leftnavbar" onclick="leftnavbar_toggle_button_function();">
            <label for="checkbox_leftnavbar" class="toggle_leftnavbar">
                <div class="bars_leftnavbar" id="bar1_leftnavbar"></div>
                <div class="bars_leftnavbar" id="bar2_leftnavbar"></div>
                <div class="bars_leftnavbar" id="bar3_leftnavbar"></div>
            </label>
          </ul>
      </div>
      <div id="i want this on right" style="color: black;">
          <ul class="nav-list" style="margin: 0; padding: 0; list-style: none;">
              <li style="pointer-events: none;">Type: <b><?php echo strtoupper($top_nav_bar['type']); ?></b></li>
              <li style="pointer-events: none;">Name: <b><?php echo strtoupper($top_nav_bar['full_name']); ?></b></li>
              <li style="pointer-events: none;">Username: <b><?php echo strtoupper($top_nav_bar['username']); ?></b></li>
          </ul>
      </div>
  </div>

  
<style>
    .dropdown1 {
      position: relative;
      display: inline-block;
    }

    .dropdown1-toggle {
      background-color: #f1f1f1;
      color: #333;
      padding: 15px 20px; /* Increased padding */
      border: none;
      cursor: pointer;
      font-size: 20px; /* Increased font size */
    }

    .dropdown1-toggle::after {
      content: "\25BE"; /* Down arrow */
      margin-left: 5px;
    }

    .dropdown1-menu {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 250px; /* Increased width */
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown1-menu a {
      color: #333;
      padding: 15px 20px; /* Increased padding */
      text-decoration: none;
      display: block;
      font-size: 20px; /* Increased font size */
    }

    .dropdown1-menu a:hover {
      background-color: #ddd;
    }

    .dropdown1:hover .dropdown1-menu {
      display: block;
    }
</style>


<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        }

        .navbar1 {
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

        .navbar1-header {
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

        .navbar1-items {
        list-style-type: none;
        padding: 0;
        margin: 0;
        width: 100%;
        }

        .navbar1-items li {
        padding: 15px;
        }

        .navbar1-items li a {
        text-decoration: none;
        color: black;
        font-size: 18px;
        }

        .department_lists-items li {
          padding: 0px;
          padding-left:15px;
        }

        .department_lists-items li a {
        text-decoration: none;
        color: black;
        font-size: 18px;
        }

        /* Add hover effect for links */
        .navbar1-items li a:hover {
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
  </style>
  <style>
    /* Custom styling for the modal */
    .modal-dialog {
      max-width: 500px;
    }

    /* Additional margin for the modal body */
    .modal-body {
      margin: 20px;
    }

    /* Center the department name input */
    .department-input {
      width: 100%;
    }

    /* Style the footer buttons */
    .modal-footer .btn-secondary {
      background-color: #6c757d;
      border-color: #6c757d;
    }

    .modal-footer .btn-secondary:hover {
      background-color: #5a6268;
      border-color: #545b62;
    }

    .modal-footer .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .modal-footer .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
  <style>
    .department-container {
      width: 100%;
      /* display: flex; */
      /* justify-content: space-between; */
      align-items: center;
      padding: 20px;
      border: 1px solid lightgray;
      background-color: white;
      font-size: 24px;
    }

    .department-actions {
      display: flex;
      align-items: center;
    }

    .btn {
      margin-left: 10px;
    }

    @media screen and (max-width: 768px) {
      .department-container {
        flex-direction: column;
        text-align: center;
      }

      .department-actions {
        flex-direction: column;
        margin-top: 10px;
      }
      
      .btn {
        margin-left: 0;
        margin-top: 5px;
      }
    }

    /* Media query for mobile devices */
    @media (max-width: 767px) {
        table {
            width: 100%;
        }
        th, td {
            padding: 8px;
        }
        .table-responsive {
            overflow-x: auto;
        }
    }

</style>

  <div class="navbar1" id="left_nav_bar" style="overflow-x:scroll;">
    <center>
      <div class="navbar1-header">
          <div class="logo">
              <img src="../images/ptc_logo_whitebg.jpg" style="width:180px; height:180px;" alt="Your Logo" width="300" height="300">
          </div>
      </div>
    <h2>Administrator</h2>
    </center>
    <hr style="width:100%; margin-bottom:10px;">
    <ul class="navbar1-items" id="dashboard_button">
      <li style="cursor:pointer;" onclick="document.getElementById('dashboard_with_icon_button').click();"><a onclick="show_dashboard_panel();" style="cursor:pointer;" id="dashboard_with_icon_button"><i class="fas fa-tachometer-alt" style="color:green;"></i> &nbsp&nbsp Dashboard</a></li>
    </ul>
    <script>
      document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    </script>
    <ul class="navbar1-items" id="appointments_button">
      <li style="cursor:pointer;" onclick="document.getElementById('appointments_with_icon_button').click();"><a onclick="show_appointments_panel();" style="cursor:pointer;" id="appointments_with_icon_button"><i class="fa fa-solid fa-calendar-days" style="color:green;"></i> &nbsp&nbsp Appointments</a></li>
    </ul>
    <ul class="navbar1-items" id="admin_users_button">
      <li style="cursor:pointer;" onclick="document.getElementById('admin_users_with_icon_button').click();"><a onclick="show_admin_users_panel();" style="cursor:pointer;" id="admin_users_with_icon_button"><i class="fa fa-solid fa-users" style="color:green;"></i> &nbsp&nbsp Admin Users</a></li>
    </ul>
    <!-- <ul class="navbar1-items" id="navbar1-items">
      <li><a onclick="department_toggle();" style="cursor:pointer;" id="department_with_icon_button"><i class="fa fa-solid fa-building" style="color:green;"></i> &nbsp&nbsp Departments &nbsp&nbsp&nbsp<i class="fa fa-solid fa-caret-down"></i></a></li>
    </ul>
    <div id="department_lists" style="width:100%; display:none;">
      <ul class="department_lists-items" id="department_lists-items">
        <hr style="width:100%;">

        <div id="department_lists_from_db">
          <?php
            // $count = 1;
            // $sql = "  SELECT * FROM ptc_departments;  ";
            // $result = mysqli_query($con, $sql);
            // while($row = mysqli_fetch_assoc($result))
            // {
            //     $department_name = $row['department_name'];
            //     $words = explode("_", $department_name);
            //     foreach ($words as &$word) 
            //     {
            //         $word = ucfirst($word);
            //     }
            //     $transformed_department_name = implode(" ", $words);

            //     echo '
            //       <li style="padding-top:10px; padding-bottom:10px; cursor:pointer;" id="li_id_'.$row['id'].'" onclick="document.getElementById(\'department_id_'.$row['id'].'\').click();"><a style="cursor:pointer;" id="department_id_'.$row['id'].'">'.$count.'. '.$transformed_department_name.'</a></li>
            //       <hr style="width:100%;">
            //     ';
            //     $count++;
            // }
          ?>
        </div>
        
        <li style="padding-top:10px; padding-bottom:10px; cursor:pointer;" onclick="document.getElementById('plus_add_department_button').click();"><a onclick="document.getElementById('add_department_button').click();" style="cursor:pointer;" id="plus_add_department_button"><b>+ ADD DEPARTMENT</b></a></li>
        <hr style="width:100%;">
      </ul>
    </div> -->
    <!-- <ul class="navbar1-items" id="dashboard_button">
      <li style="cursor:pointer;"><a onclick="" style="cursor:pointer;" id="dashboard_with_icon_button"><i class="fa fa-solid fa-book-open" style="color:green;"></i> &nbsp&nbsp Guide</a></li>
    </ul> -->
    <hr style="width:100%; margin-top:10px;">
    <ul class="navbar1-items" id="my_account_button">
      <li style="cursor:pointer;" onclick="document.getElementById('my_account_with_icon_button').click();"><a onclick="show_my_account_panel();" style="cursor:pointer;" id="my_account_with_icon_button"><i class="fa fa-solid fa-user" style="color:green;"></i> &nbsp&nbsp My Account</a></li>
    </ul>
    <ul class="navbar1-items" id="logout_button">
      <li style="cursor:pointer;" onclick="document.getElementById('logout_with_icon_button').click();"><a onclick="logout_button()" style="cursor:pointer;" id="logout_with_icon_button"><i class="fa fa-solid fa-right-from-bracket" style="color:green;"></i> &nbsp&nbsp Log-out</a></li>
    </ul>
  </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_department_modal" style="display:none;" id="add_department_button">
  open add department
</button>

<!-- The Modal -->
<div class="modal fade" id="add_department_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="departmentName">Department Name:</label>
          <input type="text" class="form-control department-input" id="add_department_department_name_textfield" placeholder="ex. Deans Office" required>
          <br>
          <label for="departmentName">Room:</label>
          <input type="text" class="form-control department-input" id="add_department_room_textfield" placeholder="ex. 201" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="add_department_ajax();">Add Department</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="add_department_close_button">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="main_panel" style="">
  <script>
    open_loading();
  </script>
<!-- DASHBOARD PANEL -->
  <div id="dashboard_panel" class="left_nav_bar_buttons" >
    <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>Dashboard</b> </h1>
    <div style="display: table;table-layout: fixed; border-spacing: 30px; width:100%; text-align:center;">
      <div style="display: table-cell; float:left; width:100%; background-color:white; border-radius:10px;">
        <br>
        <h1><i class="fa-solid fa-calendar-days" style="color:green;"></i></h1>
        <h4><b id="currentDate"></b></h4>
        <h5>Date Today</h5> 
        <br>
      </div>
      <!-- <div style="display: table-cell; float:left; width:5%;">
        <br>
      </div> -->
      <!-- <div style="display: table-cell; float:left; width:30%; background-color:white; border-radius:10px;">
        <br>
        <h1><i class="fa fa-solid fa-building" style="color:green;"></i></h1>
        <h4><b>0</b></h4> 
        <h5>Total Department</h5> 
        <br>
      </div>
      <div style="display: table-cell; float:left; width:5%;">
        <br>
      </div>
      <div style="display: table-cell; float:left; width:30%; background-color:white; border-radius:10px;">
        <br>
        <h1><i class="fa fa-solid fa-chalkboard-user" style="color:green;"></i></h1>
        <h4><b>0</b></h4> 
        <h5>Total Students</h5> 
        <br>
      </div> -->
    </div>
    <div id="biar">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
  </div>
<!-- DASHBOARD PANEL -->
<!-- APPOINTMENT PANEL -->
<div id="appointments_panel" class="left_nav_bar_buttons">
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>Appointments</b> </h1>
    <br>
    <div style="width:95%; margin:auto; padding:20px; background-color:white; border-top:3px solid green; border-radius:5px;">
    <div class="card">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="eventTitle"></p>
                    <p id="eventStart"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
      // ... (other calendar options)

      // Event click callback
      eventClick: function(info) {
          $('#eventTitle').text(info.event.title);
          $('#eventStart').text('Start: ' + moment(info.event.start).format('YYYY-MM-DD'));
          $('#eventModal').modal('show');
      },

      events: [
          {
              title: '50/50',
              start: '2023-08-10',
              classNames: ['fc-event-center-title']
          },







          {
              title: '1/50',
              start: '2023-08-11',
              classNames: ['fc-event-center-title']
          },
          






          {
              title: '23/50',
              start: '2023-08-12',
              classNames: ['fc-event-center-title']
          },






          {
              title: '43/50',
              start: '2023-08-13',
              classNames: ['fc-event-center-title']
          },





          {
              title: '50/50',
              start: '2023-08-14',
              classNames: ['fc-event-center-title']
          },



          {
              title: '10/50',
              start: '2023-08-15',
              classNames: ['fc-event-center-title']
          }
      ]
  });

  calendar.render();
});
</script>
<!-- APPOINTMENT PANEL -->
<!-- ADMIN USERS PANEL -->
<div id="admin_users_panel" class="left_nav_bar_buttons">
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>Admin Users</b> </h1>
  <br>
  <div style="width: 95%; margin: auto; padding: 20px; background-color: white; border-top: 3px solid green; border-radius: 5px;">
    <input type="button" value="Add User" class="btn btn-primary">
    <br>
    <br>
    <div class="table-responsive">
        <table id="department_table" class="table table-striped" style="overflow-x: auto; border-collapse: collapse; text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Admin Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
        <?php
          $sql = "  SELECT * FROM ptc_admin;  ";
          $result = mysqli_query($con, $sql);
      
          while($row = mysqli_fetch_assoc($result))
          {
              echo '
              <tr>
                <td>'.strtoupper($row['id']).'</td>
                <td>'.strtoupper($row['full_name']).'</td>
                <td>'.strtoupper($row['username']).'</td>
                <td>'.strtoupper($row['type']).'</td>
                <td>
                  <input type="button" value="Update" class="btn btn-success">
                  <input type="button" value="Delete" class="btn btn-danger">
                </td>
              </tr>
              ';
          }
        ?>
        
        
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- ADMIN USERS PANEL -->
<!-- MY ACCOUNT PANEL -->
<div id="my_account_panel" class="left_nav_bar_buttons" >
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>My Account</b> </h1>
  <br>
  <div style="width:95%; margin:auto; padding:20px; background-color:white; border-top:3px solid green; border-radius:5px;">
    <br>
    <br>
  </div>
</div>
<!-- MY ACCOUNT PANEL -->

<!-- DEPARTMENT PANEL -->
<!-- <div id="department_panel" class="left_nav_bar_buttons" style="width: calc(100% - 250px); margin-left: 250px; display:none;">
    <div id="department_name_and_action" style="padding:0; background-color: white;">
    </div>
    <br>
    <div style="width:80%; margin:auto; padding:20px; background-color:white;">
      <div class="form-shadow" style="overflow: auto;">
        <center><h2>USERS TABLE</h2></center>
        <input type="button" value="Add User" class="btn btn-primary">
        <br>
        <br>
        <table id="department_table" class="table table-striped" style="overflow-x:auto; border-collapse: collapse; text-align:center;">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Admin Type</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Billy Bernabe</td>
              <td>billybebsxz</td>
              <td>Deans Office</td>
              <td>
                <input type="button" value="Update" class="btn btn-success">
                <input type="button" value="Delete" class="btn btn-danger">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>  -->
<!-- DEPARTMENT PANEL -->
</div><!-- END OF MAIN PANEL-->

<script>
$(document).ready(function() {
  $('#department_table').DataTable({
    responsive: true
  });
});
</script>

<script>
  setTimeout(function() {
    close_loading();
    document.querySelector('.fc-next-button').click();
    setTimeout(function() {
      document.querySelector('.fc-prev-button').click();
      document.getElementById("dashboard_with_icon_button").click();
      document.getElementById("biar").style.display = "none";
    }, 800);
  }, 1500); // 2000 milliseconds = 2 seconds
</script>

<script>
  //2am
  var mobile_view = false;
  function leftnavbar_toggle_button_function()
  {
    if(document.getElementById("checkbox_leftnavbar").checked)
    {
      $('#left_nav_bar').animate({ marginLeft: '0' });
    }
  }

  function myFunction(x)
  {
    if (x.matches) 
    { // mobile view
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById('leftnavbar_toggle_button').style.display = "block";
      document.getElementById('main_panel').style.width = "100%";
      $('#main_panel').animate({ marginLeft: '0' });
      document.getElementById("checkbox_leftnavbar").checked = false;
      mobile_view = true;
    } 
    else 
    {
      $('#left_nav_bar').animate({ marginLeft: '0' }); //display = 'block';
      document.getElementById('leftnavbar_toggle_button').style.display = "none";
      document.getElementById('main_panel').style.width = "calc(100% - 250px)";
      $('#main_panel').animate({ marginLeft: '250px' });
      document.getElementById("checkbox_leftnavbar").checked = true;
      mobile_view = false;
    }
  }
  var x = window.matchMedia("(max-width: 914px)")
  myFunction(x) // Call listener function at run time
  x.addListener(myFunction)
</script>
</body>
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

  // function department_toggle()
  // {
  //   $("#department_lists").slideToggle();
  // }
</script>
<script>
  
  function show_dashboard_panel()
  {
    document.getElementById('dashboard_panel').style.display = "Inherit";
    document.getElementById('appointments_panel').style.display = "none";
    document.getElementById('admin_users_panel').style.display = "none";
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
    document.getElementById("my_account_button").style.backgroundColor = "white";
    
    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_appointments_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('appointments_panel').style.display = "Inherit";
    document.getElementById('admin_users_panel').style.display = "none";
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "lightgreen";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
    document.getElementById("my_account_button").style.backgroundColor = "white";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_admin_users_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('appointments_panel').style.display = "none";
    document.getElementById('admin_users_panel').style.display = "Inherit";
    document.getElementById('my_account_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "lightgreen";
    document.getElementById("my_account_button").style.backgroundColor = "white";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_my_account_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('appointments_panel').style.display = "none";
    document.getElementById('admin_users_panel').style.display = "none";
    document.getElementById('my_account_panel').style.display = "Inherit";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("appointments_button").style.backgroundColor = "white";
    document.getElementById('admin_users_button').style.backgroundColor = "white";
    document.getElementById("my_account_button").style.backgroundColor = "lightgreen";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  
  // function show_department_panel()
  // {
  //   document.getElementById('dashboard_panel').style.display = "none";
  //   document.getElementById('department_panel').style.display = "Inherit";

  //   document.getElementById("dashboard_button").style.backgroundColor = "white";
  //   var elements = document.querySelectorAll('[id^="li_id_"]');
  //   elements.forEach(function(element) {
  //     element.style.backgroundColor = "white";
  //   });
  // }

  function add_department_ajax()
  {
    if(document.getElementById('add_department_department_name_textfield').value == "")
    {
      document.getElementById('add_department_department_name_textfield').setCustomValidity("Please fill up this field.");
      document.getElementById('add_department_department_name_textfield').reportValidity();
    }
    else if(document.getElementById('add_department_room_textfield').value == "")
    {
      document.getElementById('add_department_room_textfield').setCustomValidity("Please fill up this field.");
      document.getElementById('add_department_room_textfield').reportValidity();
    }
    else
    {
      var data = 
      {
        action: 'add_department_ajax',
        add_department_department_name_textfield: $("#add_department_department_name_textfield").val(),
        add_department_room_textfield: $("#add_department_room_textfield").val(),
      };

      $.ajax({
        url: 'admin_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          var parsedResponse = JSON.parse(response);
          // document.getElementById("tbodies_pending").innerHTML = parsedResponse[0];

          if(parsedResponse[0].trim() == "add_successfully")
          {
            document.getElementById("add_department_close_button").click();
            document.getElementById("add_department_department_name_textfield").value = "";
            document.getElementById("add_department_room_textfield").value = "";

            //displaying all data from db
            // alert(parsedResponse[1]);
            document.getElementById("department_lists_from_db").innerHTML = parsedResponse[1];
            document.getElementById("department_id_"+parsedResponse[2]).click();

            Swal.fire(
              'Success!',
              'Adding Department Successfully!',
              'success'
            );

          }
          else
          {
            Swal.fire(
              'Failed!',
              'The Department already exists!',
              'error'
            );
          }
        }

      });
    }
  }
</script>
<script>
    // const department_lists_from_db = e => 
    // {
    //   var department_id = `${e.target.id}`;
    //   // alert(department_id);  

    //   if (department_id.startsWith("department_id_")) 
    //   {
    //     var data = 
    //     {
    //       action: 'ipasok_sa_department_panel_mga_details',
    //       department_id: department_id,
    //     };

    //     $.ajax({
    //       url: 'admin_ajax.php',
    //       type: 'post',
    //       data: data,

    //       success:function(response)
    //       {
    //         var parsedResponse = JSON.parse(response);
    //       // document.getElementById("tbodies_pending").innerHTML = parsedResponse[0];

    //         //ilagay department name sa header
    //         // document.getElementById("department_name_and_action").innerHTML = '<span style="font-size:26px;">Department Name: <b>'+parsedResponse[0]+'</b></span><input type="button" value="Delete" class="btn btn-danger" style="float:right;"><input type="button" value="Rename" class="btn btn-info" style="float:right; margin-right:10px;">';
    //         document.getElementById("department_name_and_action").innerHTML = '<div class="department-container">'+
    //         '<span>Department Name: <b>'+parsedResponse[0]+'</b></span>'+
    //         '<div class="department-actions">'+
    //         '  <input type="button" value="Rename" class="btn btn-info">'+
    //         '  <input type="button" value="Delete" class="btn btn-danger">'+
    //         '</div>'+
    //         '</div>';

    //         document.getElementById("department_table").innerHTML = "";
    //         document.getElementById("department_table").innerHTML += '<thead class="thead-dark">'
    //         + '<tr>'
    //         + '<th>ID</th>'
    //         + '<th>Full Name</th>'
    //         + '<th>Username</th>'
    //         + '<th>Admin Type</th>'
    //         + '<th>Actions</th>'
    //         + '</tr>'
    //         + '</thead>';

    //         document.getElementById("department_table").innerHTML += parsedResponse[1];

    //         document.getElementById("li_id_"+parsedResponse[2]).style.backgroundColor = "lightgreen";
            
    //         // Destroy the existing DataTable instance
    //         var dataTable = $("#department_table").DataTable();
    //         dataTable.destroy();

    //         // Now you can reinitialize the DataTable with new settings or data
    //         $("#department_table").DataTable({});
            
    //         show_department_panel();
    //         document.getElementById("li_id_"+parsedResponse[2]).style.backgroundColor = "lightgreen";
    //       }
    //     });
    //   }
    // }
    // document.getElementById("department_lists_from_db").addEventListener("click", department_lists_from_db);
    
</script>
<script>
function getCurrentFormattedDate() {
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    const currentDate = new Date();
    const monthIndex = currentDate.getMonth();
    const day = currentDate.getDate();
    const year = currentDate.getFullYear();

    const formattedDate = months[monthIndex] + " " + day + ", " + year;
    return formattedDate;
}

document.getElementById('currentDate').textContent = getCurrentFormattedDate();

document.getElementById("left_nav_bar").addEventListener('mousedown', function(event) {
    event.preventDefault();
});

document.getElementById("left_nav_bar").addEventListener('mouseup', function(event) {
    event.preventDefault();
});
</script>
</html>


