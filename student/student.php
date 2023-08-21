<?php
    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    session_start();

    include '../connections/my_cnx.php';
?>
<?php
  $sql = "  SELECT * FROM ptc_student_users WHERE username='".$_SESSION['student_username']."';";
  $result = mysqli_query($con, $sql);
  $top_nav_bar = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Student</title>
  <?php
    // include '../cdn/cdns.php';
  ?>
  <link rel="stylesheet" href="student.css">
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
  <style>
    .fc-event-slot-available 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color:green;
      font-size:14px;
    }

    .fc-event-no-slot-available 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color:red;
      font-size:14px;
      color:white;
    }
    /* .fc-event-slot-available::before 
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
  </style>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      background-color:lightgreen;
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
  </style>
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

            .fc-event-slot-available 
            {
              font-size:10px;
            }

            .fc-event-no-slot-available 
            {
              font-size:10px;
            }

            #title_label
            {
              display:none;
            }
        }
        

        #main_panel
        {
            width: calc(100% - 250px); 
            margin-left:250px;
        }


    </style>
    <style>
      /* .modal-body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f4f4f4;
      } */
      
      .checkbox-container {
        display: flex;
        flex-direction: column;
        align-items: left;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }
      
      .checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }
      
      .checkbox label {
        margin-left: 10px;
        font-size: 16px;
      }
      
      .checkbox input[type="checkbox"] {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #007BFF;
        border-radius: 4px;
        cursor: pointer;
        transition: border-color 0.3s;
        margin-top:-10px;
      }
      
      .checkbox input[type="checkbox"]:checked {
        border-color: #28A745;
        background-color: #28A745;
      }
    </style>
    <style>
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
              <li style="pointer-events: none;">Type: <b>STUDENT</b></li>
              <li style="pointer-events: none;">Name: <b><?php echo strtoupper($top_nav_bar['full_name']); ?></b></li>
              <li style="pointer-events: none;">Username: <b><?php echo strtoupper($top_nav_bar['username']); ?></b></li>
          </ul>
      </div>
  </div>

<div class="navbar1" id="left_nav_bar" style="overflow-x:scroll;">
    <center>
      <div class="navbar1-header">
          <div class="logo">
              <img src="../images/ptc_logo_whitebg.jpg" style="width:180px; height:180px;" alt="Your Logo" width="300" height="300">
          </div>
      </div>
    <h2>Student</h2>
    </center>
    <hr style="width:100%; margin-bottom:10px;">
    <ul class="navbar1-items" id="dashboard_button">
      <li style="cursor:pointer;" onclick="document.getElementById('dashboard_with_icon_button').click();"><a onclick="show_dashboard_panel();" style="cursor:pointer;" id="dashboard_with_icon_button"><i class="fas fa-tachometer-alt" style="color:green;"></i> &nbsp&nbsp Dashboard</a></li>
    </ul>
    <script>
      document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    </script>
    <ul class="navbar1-items" id="schedule_an_appointment_button">
      <li style="cursor:pointer;" onclick="document.getElementById('schedule_an_appointment_with_icon_button').click();"><a onclick="show_schedule_an_appointment_panel();" style="cursor:pointer;" id="schedule_an_appointment_with_icon_button"><i class="fa fa-solid fa-calendar-days" style="color:green;"></i> &nbsp&nbsp Appointment Scheduling</a></li>
    </ul>
    <ul class="navbar1-items" id="my_appointments_button">
      <li style="cursor:pointer;" onclick="document.getElementById('my_appointments_with_icon_button').click();"><a onclick="show_my_appointments_panel();" style="cursor:pointer;" id="my_appointments_with_icon_button"><i class="fa fa-solid fa-users" style="color:green;"></i> &nbsp&nbsp My Appointments</a></li>
    </ul>
    <hr style="width:100%; margin-top:10px;">
    <ul class="navbar1-items" id="my_profile_button">
      <li style="cursor:pointer;" onclick="document.getElementById('my_profile_with_icon_button').click();"><a onclick="show_my_profile_panel();" style="cursor:pointer;" id="my_profile_with_icon_button"><i class="fa fa-solid fa-user" style="color:green;"></i> &nbsp&nbsp My Profile</a></li>
    </ul>
    <ul class="navbar1-items" id="logout_button">
      <li style="cursor:pointer;" onclick="document.getElementById('logout_with_icon_button').click();"><a onclick="logout_button()" style="cursor:pointer;" id="logout_with_icon_button"><i class="fa fa-solid fa-right-from-bracket" style="color:green;"></i> &nbsp&nbsp Log-out</a></li>
    </ul>
  </div>
<div id="main_panel" style=""><!-- Start of main_panel -->
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
<div id="schedule_an_appointment_panel" class="left_nav_bar_buttons">
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>Appointment Scheduling</b> </h1>
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
                  <!-- appointment modal -->
                    <div class="checkbox-container">
                      <div class="mb-3">
                        <label for="" class="form-label"><b>Record Requested <span style="color:red;">*</span></b></label><br>
                        <span id="eventDate"></span><br>
                        <span id="totalAppointment"></span><br>
                      </div>
                      <div class="checkbox">
                        <input type="checkbox" id="transcript_checkbox">
                        <label for="transcript_checkbox">Transcript</label>
                      </div>
                      <div class="checkbox">
                        <input type="checkbox" id="diploma_checkbox">
                        <label for="diploma_checkbox">Diploma</label>
                      </div>
                      <div class="checkbox">
                        <input type="checkbox" id="form_137_checkbox">
                        <label for="form_137_checkbox">Form 137</label>
                      </div>
                      <div class="checkbox">
                        <input type="checkbox" id="certification_checkbox" onchange="appointment_certification_function();">
                        <label for="certification_checkbox">Certification</label>
                      </div>
                      <div class="mb-3" style="margin-left:20px; display:none;" id="certification_checkboxes">
                        <label for="others_textfield" class="form-label">Certifications</label>
                        <div class="checkbox">
                          <input type="checkbox" id="honorable_dismissal_checkbox">
                          <label for="honorable_dismissal_checkbox">Honorable Dismissal</label>
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" id="good_moral_character_checkbox">
                          <label for="good_moral_character_checkbox">Good Moral Character</label>
                        </div>
                      </div>
                      <div class="checkbox">
                        <input type="checkbox" id="others_checkbox" onchange="appointment_others_function();">
                        <label for="others_checkbox">Others</label>
                      </div>
                      <div class="mb-3" style="margin-left:20px; display:none;" id="others_label_and_textfield">
                        <label for="others_textfield" class="form-label">Please specify requested document if not in the list</label>
                        <input type="text" class="form-control" id="others_textfield" placeholder="Please Specify your request">
                      </div>
                      <hr>
                      <div class="mb-3">
                        <label for="purpose_of_request_textfield" class="form-label">Purpose of request</label>
                        <input type="text" class="form-control" id="purpose_of_request_textfield" placeholder="Type purpose of request">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    
    </div>
</div>
<!-- APPOINTMENT PANEL -->
<!-- ADMIN USERS PANEL -->
<div id="my_appointments_panel" class="left_nav_bar_buttons">
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>My Appointments</b> </h1>
  <br>
  <div style="width: 95%; margin: auto; padding: 20px; background-color: white; border-top: 3px solid green; border-radius: 5px;">
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
          // $sql = "  SELECT * FROM ptc_admin;  ";
          // $result = mysqli_query($con, $sql);
      
          // while($row = mysqli_fetch_assoc($result))
          // {
          //     echo '
          //     <tr>
          //       <td>'.strtoupper($row['id']).'</td>
          //       <td>'.strtoupper($row['full_name']).'</td>
          //       <td>'.strtoupper($row['username']).'</td>
          //       <td>'.strtoupper($row['type']).'</td>
          //       <td>
          //         <input type="button" value="Update" class="btn btn-success">
          //         <input type="button" value="Delete" class="btn btn-danger">
          //       </td>
          //     </tr>
          //     ';
          // }
        ?>
        
        
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- ADMIN USERS PANEL -->
<!-- MY ACCOUNT PANEL -->
<div id="my_profile_panel" class="left_nav_bar_buttons" >
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>My Profile</b> </h1>
  <br>
  <div style="width:95%; margin:auto; padding:20px; background-color:white; border-top:3px solid green; border-radius:5px;">
    <br>
    <br>
  </div>
</div>
<!-- MY ACCOUNT PANEL -->
</div> <!-- end of main_panel -->
</body>


















































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
<script>
$(document).ready(function() {
  $('#department_table').DataTable({
    responsive: true
  });
});
</script>
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

  function show_dashboard_panel()
  {
    document.getElementById('dashboard_panel').style.display = "Inherit";
    document.getElementById('schedule_an_appointment_panel').style.display = "none";
    document.getElementById('my_appointments_panel').style.display = "none";
    document.getElementById('my_profile_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    document.getElementById("schedule_an_appointment_button").style.backgroundColor = "white";
    document.getElementById('my_appointments_button').style.backgroundColor = "white";
    document.getElementById("my_profile_button").style.backgroundColor = "white";
    
    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_schedule_an_appointment_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('schedule_an_appointment_panel').style.display = "Inherit";
    document.getElementById('my_appointments_panel').style.display = "none";
    document.getElementById('my_profile_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("schedule_an_appointment_button").style.backgroundColor = "lightgreen";
    document.getElementById('my_appointments_button').style.backgroundColor = "white";
    document.getElementById("my_profile_button").style.backgroundColor = "white";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_my_appointments_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('schedule_an_appointment_panel').style.display = "none";
    document.getElementById('my_appointments_panel').style.display = "Inherit";
    document.getElementById('my_profile_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("schedule_an_appointment_button").style.backgroundColor = "white";
    document.getElementById('my_appointments_button').style.backgroundColor = "lightgreen";
    document.getElementById("my_profile_button").style.backgroundColor = "white";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
  function show_my_profile_panel()
  {
    // alert("qwe");
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('schedule_an_appointment_panel').style.display = "none";
    document.getElementById('my_appointments_panel').style.display = "none";
    document.getElementById('my_profile_panel').style.display = "Inherit";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    document.getElementById("schedule_an_appointment_button").style.backgroundColor = "white";
    document.getElementById('my_appointments_button').style.backgroundColor = "white";
    document.getElementById("my_profile_button").style.backgroundColor = "lightgreen";

    if(mobile_view == true)
    {
      $('#left_nav_bar').animate({ marginLeft: '-250px' }); //display = "none"
      document.getElementById("checkbox_leftnavbar").checked = false;
    }
  }
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    // ... (other calendar options)

    // Event click callback
    eventClick: function(info) {
      if(info.event.title == "50/50")
      {
        Swal.fire(
          'Invalid!',
          'No Slot Available!',
          'error'
        )
      }
      else
      {
        if(document.getElementById("certification_checkbox").checked)
        {
          $('#certification_checkboxes').toggle();
          document.getElementById("honorable_dismissal_checkbox").checked = false;
          document.getElementById("good_moral_character_checkbox").checked = false;
        }
        if(document.getElementById("others_checkbox").checked)
        {
          $('#others_label_and_textfield').toggle();
          document.getElementById("others_textfield").value = "";
        }

        document.getElementById("transcript_checkbox").checked = false;
        document.getElementById("diploma_checkbox").checked = false;
        document.getElementById("form_137_checkbox").checked = false;
        document.getElementById("certification_checkbox").checked = false;
        document.getElementById("others_checkbox").checked = false;
        document.getElementById("purpose_of_request_textfield").value = "";

        $('#totalAppointment').html('Total Appointments: <b>'+info.event.title+'</b>');
        $('#eventDate').html('Appointment Date: <b>' + moment(info.event.start).format('YYYY-MM-DD') + '</b>');
        $('#eventModal').modal('show');
      }
    },

    eventContent: function(info) {
      var iconClass = info.event.extendedProps.iconClass;
      if(iconClass == 'fa fa-solid fa-check')
        var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br>Slot Available<br></span>  <br> ' : '';
      else if(iconClass == 'fa fa-solid fa-x')
        var iconHtml = iconClass ? '<i class="' + iconClass + '"></i> <span id="title_label"><br>No Slot Available<br></span>  <br> ' : '';
      return {
        html: iconHtml + info.event.title
      };
    },

    events: generateEvents(),

    // events: [
    //   {
    //     title: '50/50',
    //     start: '2023-08-21',
    //     classNames: ['fc-event-slot-available'],
    //     iconClass: 'fa fa-solid fa-check'
    //   },
      
    //   {
    //     title: '50/50',
    //     start: '2023-08-22',
    //     classNames: ['fc-event-no-slot-available'],
    //     iconClass: 'fa fa-solid fa-x'
    //   },
      // ... (other events)
    // ]
  });

  calendar.render();
});

function generateEvents() {
  var startDate = moment();
  var events = [];

  for (var i = 0; i < 90; i++) {
    var eventDate = startDate.clone().add(i, 'days');

    // Skip Saturdays (6) and Sundays (0)
    if (eventDate.day() !== 6 && eventDate.day() !== 0) {
      var event = {
        title: '0/50',
        start: eventDate.format('YYYY-MM-DD'),
        classNames: ['fc-event-slot-available'],
        iconClass: 'fa fa-solid fa-check'
      };

      events.push(event);
    }
  }

  return events;
}
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
  function appointment_others_function()
  {
    if(document.getElementById("others_checkbox").checked)
    {
      $('#others_label_and_textfield').slideToggle('2000');
      document.getElementById("others_textfield").value = "";
    }
    else
    {
      $('#others_label_and_textfield').slideToggle('2000');
      document.getElementById("others_textfield").value = "";
    }
  }

  function appointment_certification_function()
  {
    if(document.getElementById("certification_checkbox").checked)
    {
      $('#certification_checkboxes').slideToggle('2000');
      document.getElementById("honorable_dismissal_checkbox").checked = false;
      document.getElementById("good_moral_character_checkbox").checked = false;
    }
    else
    {
      $('#certification_checkboxes').slideToggle('2000');
      document.getElementById("honorable_dismissal_checkbox").checked = false;
      document.getElementById("good_moral_character_checkbox").checked = false;
    }
  }
</script>
