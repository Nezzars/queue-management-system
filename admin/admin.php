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
    .fc-event-slot-available 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color: #17a2b8;
      font-size:14px;
    }

    .fc-event-no-slot-available 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color: #17a2b8;
      font-size:14px;
      /* color:white; */
    }

    .fc-event-holidayy 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color:#F72D93;
      font-size:14px;
      color:white;
    }
      
    .fc-event-center-title 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color:blue;
    }
    /* .fc-event-center-title::before 
    {
      content: " ";
      display: block;
      height: 1em; /* Adjust this value to control the spacing
    }  */
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
  <?php
    include "admin_css.php";
  ?>
  
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

  <div class="navbar1" id="left_nav_bar" style="overflow-x:scroll; border-right:2px solid #90EE90">
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
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal">Open Modal</button> -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:80%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Appointments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <!-- appointment modal -->
                    <div class="checkbox-container">
                      <div class="mb-3">
                        <!-- <label for="" class="form-label"><b>Record Requested <span style="color:red;">*</span></b></label><br> -->
                        <span id="eventDate"></span><br>
                        <input type="hidden" value="qwe" id="date_hidden">
                        <span id="totalAppointment"></span><br>
                      </div>
                      <!-- DEPARTMENT PANEL -->
                      <table id="appointment_table" class="table table-striped table-responsive" style="overflow-x:auto; border-collapse: collapse;">
                        <thead class="thead-dark">
                          <tr>
                              <th>ID</th>
                              <th>Full Name</th>
                              <th>Student Number</th>
                              <th>Requested Documents</th>
                              <th>Purpose of request</th>
                              <th>Date</th>
                          </tr>
                        </thead>
                        <tbody id="appointment_tbody">
                          <tr>
                            <td>Example</td>
                            <td>Example</td>
                            <td>Example</td>
                            <td>Example</td>
                            <td>Example</td>
                            <td>Example</td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- DEPARTMENT PANEL -->

                      <script>
                        $(document).ready(function() {
                          $('#appointment_table').DataTable({
                            responsive: true
                          }); 
                        });
                      </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary" onclick="appointment_submit_function();">Submit</button> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="appointment_close_button">Close</button>
                </div>
            </div>
        </div>
    </div>

    
    </div>
</div>
<!-- APPOINTMENT PANEL -->
<!-- ADMIN USERS PANEL -->
<div id="admin_users_panel" class="left_nav_bar_buttons">
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>Admin Users</b> </h1>
  <br>
  <div style="width: 95%; margin: auto; padding: 20px; background-color: white; border-top: 3px solid green; border-radius: 5px;">
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" onclick="add_user_button();">
          Add User
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input required type="text" class="form-control" id="username_admin_input">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_admin_input">
                        <div class="input-group-append">
                            <span class="input-group-text" id="passwordToggle">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" id="firstname_admin_input">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Middle Name</label>
                  <input type="text" class="form-control" id="middlename_admin_input">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" id="lastname_admin_input">
                </div>
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_admin_function();">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
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
    <div class="container" style="width:100%;">
    
    <?php
    $sql = "  SELECT * FROM ptc_admin WHERE username='".$_SESSION['admin_username']."';";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
   
    ?>


      <div class="container-fluid">
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Admin Type</label>
            <input disabled readonly type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['type']; ?>">
          </div>
          <div class="mb-3">
            <div></div>
            <label class="form-label">Username</label>
            <input disabled readonly name="username" type="text" class="form-control" value="<?php echo $row['username']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="<?php echo $row['password']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input name="first_name" type="text" class="form-control" value="<?php echo $row['first_name']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Middle Name</label>
            <input name="middle_name" type="text" class="form-control" value="<?php echo $row['middle_name']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input name="last_name" type="text" class="form-control" value="<?php echo $row['last_name']; ?>">
          </div>
          <button name="update_account" class="btn btn-success">Update</button>
        </form>
      </div>
    </div>
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

</body>








<?php
  include "admin_js.php";
?>









































</html>


