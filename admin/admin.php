<?php
    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    include '../connections/my_cnx.php';

    session_start();
    
    // $query = "DELETE FROM `ptc_student_appointments` WHERE datee < CURDATE()";
    // mysqli_query($con, $query);
    // $query = "DELETE FROM `ptc_student_appointments_history` WHERE datee < CURDATE()";
    // mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
      // include '../cdn/cdns.php';
  ?>
  
  <!-- Include jQuery and Popper.js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Add Bootstrap CSS and JS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- FullCalendar -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>

<!-- FullCalendar (latest version) -->
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>

<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<!-- multiselect -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

  <title>Administrator</title>

  <!-- select2 -->
  

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
  if(!isset($_SESSION['admin_id']) && isset($_SESSION['student_id']))
  {
    echo '
      <script>
        window.location.href = "../student/student.php";
      </script>
    ';
  }
  else if(!isset($_SESSION['admin_id']) && !isset($_SESSION['student_id']))
  {
    echo '
      <script>
        window.location.href = "../logout.php";
      </script>
    ';
  }
?>
  <input type="hidden" id="admin_id" value="<?php echo $_SESSION['admin_id']; ?>">
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
      $sql = "  SELECT * FROM ptc_admin WHERE id='".$_SESSION['admin_id']."';";
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
              <li style="pointer-events: none;">Name: <b id="topnavbar_name"><?php echo strtoupper($top_nav_bar['full_name']); ?></b></li>
              <li style="pointer-events: none;">Username: <b id="topnavbar_username"><?php echo strtoupper($top_nav_bar['username']); ?></b></li>
          </ul>
      </div>
  </div>
  <input type="hidden" id="process_coursess" value="<?php echo strtoupper($top_nav_bar['process_course']); ?>">

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
    <?php
      if($_SESSION['admin_type'] == "Super Admin")
      {
        echo '
            <li style="cursor:pointer;" onclick="document.getElementById(\'admin_users_with_icon_button\').click();"><a onclick="show_admin_users_panel();" style="cursor:pointer;" id="admin_users_with_icon_button"><i class="fa fa-solid fa-users" style="color:green;"></i> &nbsp&nbsp Admin Users</a></li>
        ';
      }
    ?>
    </ul>
    <ul class="navbar1-items" id="events_button">
    <?php
      if($_SESSION['admin_type'] == "Super Admin")
      {
        echo '
          <li style="cursor:pointer;" onclick="document.getElementById(\'events_with_icon_button\').click();"><a onclick="show_events_panel();" style="cursor:pointer;" id="events_with_icon_button"><i class="fa fa-solid fa-calendar-days" style="color:green;"></i> &nbsp&nbsp Events</a></li>
      ';
      }
    ?>
    </ul>
    
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
      </div><div id="review_panel" name="yes_review" style="display: table-cell; float:left; background-color:white; border-radius:10px; margin-top:20px; padding:20px; text-align:left;">
        <h3><b>Ratings and Reviews</b></h3>
        <h6>Ratings and reviews are verified and are from people who use the same type of device that you use.</h6>
        <br>
        <?php
          $five_counter = 0;
          $four_counter = 0;
          $three_counter = 0;
          $two_counter = 0;
          $one_counter = 0;
          $total_sum = 0;
          $one_counter_total_kapag_tinimes = 0;
          $two_counter_total_kapag_tinimes = 0;
          $three_counter_total_kapag_tinimes = 0;
          $four_counter_total_kapag_tinimes = 0;
          $one_counter_total_kapag_tinimes = 0;
          $total_ng_counter_total_kapag_tinimes = 0;
          $averageRatingg = 0;

          $sql = "  SELECT * FROM ptc_feedbacks WHERE stars='5';  ";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $five_counter++;
          }

          $sql = "  SELECT * FROM ptc_feedbacks WHERE stars='4';  ";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $four_counter++;
          }

          $sql = "  SELECT * FROM ptc_feedbacks WHERE stars='3';  ";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $three_counter++;
          }

          $sql = "  SELECT * FROM ptc_feedbacks WHERE stars='2';  ";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $two_counter++;
          }

          $sql = "  SELECT * FROM ptc_feedbacks WHERE stars='1';  ";
          $result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $one_counter++;
          }

          $total_sum = $one_counter+$two_counter+$three_counter+$four_counter+$five_counter;

          $one_counter_total_kapag_tinimes = $one_counter*1;
          $two_counter_total_kapag_tinimes = $two_counter*2;
          $three_counter_total_kapag_tinimes = $three_counter*3;
          $four_counter_total_kapag_tinimes = $four_counter*4;
          $five_counter_total_kapag_tinimes = $five_counter*5;


          $total_ng_counter_total_kapag_tinimes = $one_counter_total_kapag_tinimes+$two_counter_total_kapag_tinimes+$three_counter_total_kapag_tinimes+$four_counter_total_kapag_tinimes+$five_counter_total_kapag_tinimes;
          
          $averageRatingg = $total_ng_counter_total_kapag_tinimes/$total_sum;


          // if($total_sum == null)
          // {
          //   $total_sum = 1;
          // }
          if (is_nan($averageRatingg)) 
          {
            $averageRatingg = 0;
              // echo "<script>alert('".$five_counter*100/$total_sum." is NaN')</script>";
          }
          // echo "<script>alert('".$five_counter*100/$total_sum." is NaN')</script>";
          $five_counter_percent = $five_counter*100/$total_sum;
          $four_counter_percent = $four_counter*100/$total_sum;
          $three_counter_percent = $three_counter*100/$total_sum;
          $two_counter_percent = $two_counter*100/$total_sum;
          $one_counter_percent = $one_counter*100/$total_sum;

          if (is_nan($five_counter_percent)) 
            $five_counter_percent = 0;
          if (is_nan($four_counter_percent)) 
            $four_counter_percent = 0;
          if (is_nan($three_counter_percent)) 
            $three_counter_percent = 0;
          if (is_nan($two_counter_percent)) 
            $two_counter_percent = 0;
          if (is_nan($one_counter_percent)) 
            $one_counter_percent = 0;
          
        ?>
        <table style="width:100%;">
          <tr style="width:100%;">
            <td style="width:30%; ">
              <center>
                <h1><?php echo number_format($averageRatingg, 1); ?></h1>
                <?php echo number_format($total_sum); ?> <br>
                Reviews
              </center>
            </td>
            <td style="width:50%; ">
              <h5>5 <div style="width: 80%; background-color: #E3E3E3; height: 21px; margin-top:-22px; margin-left:27px; border-radius:5px;"><div style="width: <?php echo $five_counter_percent; ?>%; background-color: blue; height: 21px; margin-top:-22px; border-radius:5px;"></div></div></h5>
              <h5>4 <div style="width: 80%; background-color: #E3E3E3; height: 21px; margin-top:-22px; margin-left:27px; border-radius:5px;"><div style="width: <?php echo $four_counter_percent; ?>%; background-color: blue; height: 21px; margin-top:-22px; border-radius:5px;"></div></div></h5>
              <h5>3 <div style="width: 80%; background-color: #E3E3E3; height: 21px; margin-top:-22px; margin-left:27px; border-radius:5px;"><div style="width: <?php echo $three_counter_percent; ?>%; background-color: blue; height: 21px; margin-top:-22px; border-radius:5px;"></div></div></h5>
              <h5>2 <div style="width: 80%; background-color: #E3E3E3; height: 21px; margin-top:-22px; margin-left:27px; border-radius:5px;"><div style="width: <?php echo $two_counter_percent; ?>%; background-color: blue; height: 21px; margin-top:-22px; border-radius:5px;"></div></div></h5>
              <h5>1 <div style="width: 80%; background-color: #E3E3E3; height: 21px; margin-top:-22px; margin-left:27px; border-radius:5px;"><div style="width: <?php echo $one_counter_percent; ?>%; background-color: blue; height: 21px; margin-top:-22px; border-radius:5px;"></div></div></h5>
            </td>
            <td style="width:20%; text-align:left; ">
              <h5><?php echo number_format($five_counter_percent, 0); ?>%</h5>
              <h5><?php echo number_format($four_counter_percent, 0); ?>%</h5>
              <h5><?php echo number_format($three_counter_percent, 0); ?>%</h5>
              <h5><?php echo number_format($two_counter_percent, 0); ?>%</h5>
              <h5><?php echo number_format($one_counter_percent, 0); ?>%</h5>
            </td>
          </tr>
        </table>
        <br>
        <!-- Button trigger modal -->
        <!-- Button trigger modal -->
        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop1">
          Show Comments
        </button></center>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel1">Ratings and Reviews</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="radio-input">
                  <label>
                    <input value="value-1" name="value-radio" id="value-1" type="radio" checked="" onclick="r_and_r_all_radiobutton();">
                    <span>All</span>
                  </label>
                  <label>
                    <input value="value-2" name="value-radio" id="value-2" type="radio" onclick="r_and_r_5_radiobutton();">
                    <span>5 &nbsp<span style="color:gold;">&#9733;</span></span>
                  </label>
                  <label>
                    <input value="value-3" name="value-radio" id="value-3" type="radio" onclick="r_and_r_4_radiobutton();">
                    <span>4 &nbsp<span style="color:gold;">&#9733;</span></span>
                  </label>
                  <label>
                    <input value="value-4" name="value-radio" id="value-4" type="radio" onclick="r_and_r_3_radiobutton();">
                    <span>3 &nbsp<span style="color:gold;">&#9733;</span></span>
                  </label>
                  <label>
                    <input value="value-5" name="value-radio" id="value-5" type="radio" onclick="r_and_r_2_radiobutton();">
                    <span>2 &nbsp<span style="color:gold;">&#9733;</span></span>
                  </label>
                  <label>
                    <input value="value-6" name="value-radio" id="value-6" type="radio" onclick="r_and_r_1_radiobutton();">
                    <span>1 &nbsp<span style="color:gold;">&#9733;</span></span>
                  </label>
                  <span class="selection"></span>
                </div>

                <?php 
                  $sql = "SELECT f.*, u.first_name, u.last_name 
                  FROM ptc_feedbacks AS f
                  INNER JOIN ptc_student_users AS u ON f.username = u.username ORDER BY f.id DESC;";

                  $result = mysqli_query($con, $sql);
                  $total_reviews = 0;
                  $total_reviews_for_5 = 0;
                  $total_reviews_for_4 = 0;
                  $total_reviews_for_3 = 0;
                  $total_reviews_for_2 = 0;
                  $total_reviews_for_1 = 0;

                  $for_all_index = 0;
                  $for_5_index = 0;
                  $for_4_index = 0;
                  $for_3_index = 0;
                  $for_2_index = 0;
                  $for_1_index = 0;
                  $names_for_all = array();
                  $names_for_5 = array();
                  $names_for_4 = array();
                  $names_for_3 = array();
                  $names_for_2 = array();
                  $names_for_1 = array();
                  $stars_for_all = array();
                  $stars_for_5 = array();
                  $stars_for_4 = array();
                  $stars_for_3 = array();
                  $stars_for_2 = array();
                  $stars_for_1 = array();
                  $date_for_all = array();
                  $date_for_5 = array();
                  $date_for_4 = array();
                  $date_for_3 = array();
                  $date_for_2 = array();
                  $date_for_1 = array();
                  $time_for_all = array();
                  $time_for_5 = array();
                  $time_for_4 = array();
                  $time_for_3 = array();
                  $time_for_2 = array();
                  $time_for_1 = array();
                  $comments_for_all = array();
                  $comments_for_5 = array();
                  $comments_for_4 = array();
                  $comments_for_3 = array();
                  $comments_for_2 = array();
                  $comments_for_1 = array();

                  while($row = mysqli_fetch_assoc($result))
                  {
                    if($row['stars'] == "5")
                    {
                      $total_reviews_for_5 = $total_reviews_for_5+1;

                      $names_for_5[$for_5_index] = $row['first_name']." ".$row['last_name'];
                      $stars_for_5[$for_5_index] = "⭐⭐⭐⭐⭐";
                      $qwe = $row['date_time'];
                      $date = new DateTime($qwe);
                      $date_for_5[$for_5_index] = $date->format("F d, Y");
                      $time_for_5[$for_5_index] = $date->format("g:i A");
                      $comments_for_5[$for_5_index] = $row['comment'];
                      
                      $for_5_index++;
                    }
                    if($row['stars'] == "4")
                    {
                      $total_reviews_for_4 = $total_reviews_for_4+1;

                      $names_for_4[$for_4_index] = $row['first_name']." ".$row['last_name'];
                      $stars_for_4[$for_4_index] = "⭐⭐⭐⭐";
                      $qwe = $row['date_time'];
                      $date = new DateTime($qwe);
                      $date_for_4[$for_4_index] = $date->format("F d, Y");
                      $time_for_4[$for_4_index] = $date->format("g:i A");
                      $comments_for_4[$for_4_index] = $row['comment'];

                      $for_4_index++;
                    }
                    if($row['stars'] == "3")
                    {
                      $total_reviews_for_3 = $total_reviews_for_3+1;
                      
                      $names_for_3[$for_3_index] = $row['first_name']." ".$row['last_name'];
                      $stars_for_3[$for_3_index] = "⭐⭐⭐";
                      $qwe = $row['date_time'];
                      $date = new DateTime($qwe);
                      $date_for_3[$for_3_index] = $date->format("F d, Y");
                      $time_for_3[$for_3_index] = $date->format("g:i A");
                      $comments_for_3[$for_3_index] = $row['comment'];

                      $for_3_index++;
                    }
                    if($row['stars'] == "2")
                    {
                      $total_reviews_for_2 = $total_reviews_for_2+1;
                      
                      $names_for_2[$for_2_index] = $row['first_name']." ".$row['last_name'];
                      $stars_for_2[$for_2_index] = "⭐⭐";
                      $qwe = $row['date_time'];
                      $date = new DateTime($qwe);
                      $date_for_2[$for_2_index] = $date->format("F d, Y");
                      $time_for_2[$for_2_index] = $date->format("g:i A");
                      $comments_for_2[$for_2_index] = $row['comment'];
                      
                      $for_2_index++;
                    }
                    if($row['stars'] == "1")
                    {
                      $total_reviews_for_1 = $total_reviews_for_1+1;
                      
                      $names_for_1[$for_1_index] = $row['first_name']." ".$row['last_name'];
                      $stars_for_1[$for_1_index] = "⭐";
                      $qwe = $row['date_time'];
                      $date = new DateTime($qwe);
                      $date_for_1[$for_1_index] = $date->format("F d, Y");
                      $time_for_1[$for_1_index] = $date->format("g:i A");
                      $comments_for_1[$for_1_index] = $row['comment'];
                      
                      $for_1_index++;
                    }

                    $total_reviews = $total_reviews+1;

                    $names_for_all[$for_all_index] = $row['first_name']." ".$row['last_name'];
                    if($row['stars'] == "5")
                      $stars_for_all[$for_all_index] = "⭐⭐⭐⭐⭐";
                    else if($row['stars'] == "4")
                      $stars_for_all[$for_all_index] = "⭐⭐⭐⭐";
                    else if($row['stars'] == "3")
                      $stars_for_all[$for_all_index] = "⭐⭐⭐";
                    else if($row['stars'] == "2")
                      $stars_for_all[$for_all_index] = "⭐⭐";
                    else if($row['stars'] == "1")
                      $stars_for_all[$for_all_index] = "⭐";
                    $qwe = $row['date_time'];
                    $date = new DateTime($qwe);
                    $date_for_all[$for_all_index] = $date->format("F d, Y");
                    $time_for_all[$for_all_index] = $date->format("g:i A");
                    $comments_for_all[$for_all_index] = $row['comment'];
                    
                    $for_all_index++;
                  }
                ?>
                <div id="r_and_r_all_panel">
                  <div class="total-reviews">
                    Total Reviews: 
                    <?php 
                      echo $total_reviews;
                    ?>
                  </div>
                  <div class="comments-container mt-2" style="height:340px; overflow-y:scroll;">
                    <h5>User Comments</h5>
                    <?php
                      for ($i=0; $i < $for_all_index; $i++) 
                      { 
                        echo 
                        "
                          <div id='all_comments'>
                            <div class='comment'>
                              <div class='comment-author'>".$names_for_all[$i]."</div>
                              <div class='star-rating'>".$stars_for_all[$i]."</div>
                              <div class='comment-date'>".$date_for_all[$i]."</div>
                              <div class='comment-time'>".$time_for_all[$i]."</div>
                              <div class='comment-content'>
                                ".$comments_for_all[$i]."
                              </div>
                            </div>
                          </div>
                        ";
                      }
                    ?>
                  </div>
                </div>
                
                <div id="r_and_r_5_panel" style="display:none;">
                  <div class="total-reviews">
                    Total Reviews: 
                    <?php 
                      echo $total_reviews_for_5;
                    ?>
                  </div>
                  <div class="comments-container mt-2" style="height:340px; overflow-y:scroll;">
                    <h5>User Comments</h5>
                    <?php
                    for ($i=0; $i < $for_5_index; $i++) 
                    { 
                      echo 
                      "
                        <div id='all_comments'>
                          <div class='comment'>
                            <div class='comment-author'>".$names_for_5[$i]."</div>
                            <div class='star-rating'>".$stars_for_5[$i]."</div>
                            <div class='comment-date'>".$date_for_5[$i]."</div>
                            <div class='comment-time'>".$time_for_5[$i]."</div>
                            <div class='comment-content'>
                              ".$comments_for_5[$i]."
                            </div>
                          </div>
                        </div>
                      ";
                    }
                  ?>
                  </div>
                </div>
                
                <div id="r_and_r_4_panel" style="display:none;">
                  <div class="total-reviews">
                    Total Reviews: 
                    <?php 
                      echo $total_reviews_for_4;
                    ?>
                  </div>
                  <div class="comments-container mt-2" style="height:340px; overflow-y:scroll;">
                    <h5>User Comments</h5>
                    <?php
                      for ($i=0; $i < $for_4_index; $i++) 
                      { 
                        echo 
                        "
                          <div id='all_comments'>
                            <div class='comment'>
                              <div class='comment-author'>".$names_for_4[$i]."</div>
                              <div class='star-rating'>".$stars_for_4[$i]."</div>
                              <div class='comment-date'>".$date_for_4[$i]."</div>
                              <div class='comment-time'>".$time_for_4[$i]."</div>
                              <div class='comment-content'>
                                ".$comments_for_4[$i]."
                              </div>
                            </div>
                          </div>
                        ";
                      }
                    ?>
                  </div>
                </div>
                
                <div id="r_and_r_3_panel" style="display:none;">
                  <div class="total-reviews">
                    Total Reviews: 
                    <?php 
                      echo $total_reviews_for_3;
                    ?>
                  </div>
                  <div class="comments-container mt-2" style="height:340px; overflow-y:scroll;">
                    <h5>User Comments</h5>
                    <?php
                      for ($i=0; $i < $for_3_index; $i++) 
                      { 
                        echo 
                        "
                          <div id='all_comments'>
                            <div class='comment'>
                              <div class='comment-author'>".$names_for_3[$i]."</div>
                              <div class='star-rating'>".$stars_for_3[$i]."</div>
                              <div class='comment-date'>".$date_for_3[$i]."</div>
                              <div class='comment-time'>".$time_for_3[$i]."</div>
                              <div class='comment-content'>
                                ".$comments_for_3[$i]."
                              </div>
                            </div>
                          </div>
                        ";
                      }
                    ?>
                  </div>
                </div>
                
                <div id="r_and_r_2_panel" style="display:none;">
                  <div class="total-reviews">
                    Total Reviews: 
                    <?php 
                      echo $total_reviews_for_2;
                    ?>
                  </div>
                  <div class="comments-container mt-2" style="height:340px; overflow-y:scroll;">
                    <h5>User Comments</h5>
                    <?php
                      for ($i=0; $i < $for_2_index; $i++) 
                      { 
                        echo 
                        "
                          <div id='all_comments'>
                            <div class='comment'>
                              <div class='comment-author'>".$names_for_2[$i]."</div>
                              <div class='star-rating'>".$stars_for_2[$i]."</div>
                              <div class='comment-date'>".$date_for_2[$i]."</div>
                              <div class='comment-time'>".$time_for_2[$i]."</div>
                              <div class='comment-content'>
                                ".$comments_for_2[$i]."
                              </div>
                            </div>
                          </div>
                        ";
                      }
                    ?>
                  </div>
                </div>
                
                <div id="r_and_r_1_panel" style="display:none;">
                  <div class="total-reviews">
                    Total Reviews: 
                    <?php 
                      echo $total_reviews_for_1;
                    ?>
                  </div>
                  <div class="comments-container mt-2" style="height:340px; overflow-y:scroll;">
                    <h5>User Comments</h5>
                    <?php
                      for ($i=0; $i < $for_1_index; $i++) 
                      { 
                        echo 
                        "
                          <div id='all_comments'>
                            <div class='comment'>
                              <div class='comment-author'>".$names_for_1[$i]."</div>
                              <div class='star-rating'>".$stars_for_1[$i]."</div>
                              <div class='comment-date'>".$date_for_1[$i]."</div>
                              <div class='comment-time'>".$time_for_1[$i]."</div>
                              <div class='comment-content'>
                                ".$comments_for_1[$i]."
                              </div>
                            </div>
                          </div>
                        ";
                      }
                    ?>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
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
    
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content modal_content_appointment" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">Appointments</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="checkbox-container">
                            <div class="mb-3">
                              <!-- <label for="" class="form-label"><b>Record Requested <span style="color:red;">*</span></b></label><br> -->
                              <span id="eventDate"></span><br>
                              <input type="hidden" value="qwe" id="date_hidden">
                              <span id="totalAppointment"></span><br>
                            </div>
                            <!-- DEPARTMENT PANEL -->
                            <table id="appointment_table" class="table table-striped" style="overflow-x:auto; border-collapse: collapse;">
                              <thead class="thead-dark">
                                <tr>
                                    <th style="text-align:center;vertical-align: middle; ">ID</th>
                                    <th style="text-align:center;vertical-align: middle; ">Full Name</th>
                                    <th style="text-align:center;vertical-align: middle; ">Student Number</th>
                                    <th style="text-align:center;vertical-align: middle; ">Course</th>
                                    <th style="text-align:center;vertical-align: middle; ">Requested Documents</th>
                                    <th style="text-align:center;vertical-align: middle; ">Purpose of request</th>
                                    <th style="text-align:center;vertical-align: middle; ">Date</th>
                                    <th style="text-align:center;vertical-align: middle; ">Status</th>
                                    <th style="text-align:center;vertical-align: middle; ">Admin Processor</th>
                                    <th style="text-align:center;vertical-align: middle; ">Action</th>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user_modall" onclick="add_user_button();">
          Add User
        </button>

        <!-- Modal Add User -->
        <div class="modal fade" id="add_user_modall" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="add_user_modallLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="add_user_modallLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="username_admin_input">Username</label>
                  <input required type="text" class="form-control" id="username_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
                <div class="form-group">
                    <label for="password_admin_input">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                        <div class="input-group-append">
                            <span class="input-group-text" id="passwordToggle">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="process_course_innerHTML">
                  <label for="process_course_dropdownlist">Process Course</label>
                  <select class="form-control mb-2" id="process_course_dropdownlist" multiple>
                      <?php
                          $sql = "SELECT * FROM ptc_courses;";
                          $result = mysqli_query($con, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="'.$row['id'].'">'.$row['course'].'</option>';
                          }
                      ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="firstname_admin_input">First Name</label>
                  <input type="text" class="form-control" id="firstname_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="middlename_admin_input">Middle Name</label>
                  <input type="text" class="form-control" id="middlename_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="lastname_admin_input">Last Name</label>
                  <input type="text" class="form-control" id="lastname_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
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

        <!-- Modal Update User -->
        <div class="modal fade" id="update_user_modall" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="update_user_modallLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="update_user_modallLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form>
                <div class="form-group">
                  <input type="hidden" id="update_id_admin_input">
                  <label for="exampleInputEmail1">Username</label>
                  <input required type="text" class="form-control" id="update_username_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="update_password_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                        <div class="input-group-append">
                            <span class="input-group-text" id="update_passwordToggle">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="update_process_course_innerHTML">
                  <label for="update_process_course_dropdownlist">Process Course</label>
                  <select class="form-control mb-2" id="update_process_course_dropdownlist" multiple>
                      <?php
                          $sql = "SELECT * FROM ptc_courses;";
                          $result = mysqli_query($con, $sql);
                          while($row = mysqli_fetch_assoc($result)) {
                              echo '<option value="'.$row['id'].'">'.$row['course'].'</option>';
                          }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" id="update_firstname_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Middle Name</label>
                  <input type="text" class="form-control" id="update_middlename_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" id="update_lastname_admin_input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update_admin_function();">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    <br>
    <br>
    <div class="table-responsive">
        <table id="admin_users_table" class="table table-striped" style="overflow-x: auto; border-collapse: collapse; text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Admin Type</th>
                    <th>Process Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="admin_users_tbody">
        <?php
          $sql = "  SELECT * FROM ptc_admin;  ";
          $result = mysqli_query($con, $sql);
      
          while($row = mysqli_fetch_assoc($result))
          {
            $qweqwe = $row['process_course'];

            if (!empty($qweqwe)) {
                $qweqwe_list = array_map('intval', explode(' --- ', $qweqwe));
                
                $requested_documentss = "<ul>";
                
                $sql1 = "SELECT * FROM ptc_courses WHERE id IN (" . implode(',', $qweqwe_list) . ")";
                $result1 = mysqli_query($con, $sql1);
                
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $requested_documentss .= "<li>" . $row1['course'] . "</li>";
                }
                
                $requested_documentss .= "</ul>";
            } else {
                $requested_documentss = "";
            }
            

              echo '
              <tr>
                <td style="vertical-align: middle; text-align: center;">'.strtoupper($row['id']).'</td>
                <td style="vertical-align: middle; text-align: center;">'.strtoupper($row['full_name']).'</td>
                <td style="vertical-align: middle; text-align: center;">'.strtoupper($row['username']).'</td>
                <td style="vertical-align: middle; text-align: center;">'.strtoupper($row['type']).'</td>
                <td style="vertical-align: middle; text-align: center;">'.$requested_documentss.'</td>
                <td style="vertical-align: middle; text-align: center;">
                  <input type="button" value="Update" class="btn btn-success" onclick="open_update_modal(\''.trim($row['id']).'\');">
                  <input type="button" value="Delete" class="btn btn-danger" onclick="delete_admin_user(\''.trim($row['id']).'\');">
                </td>
              </tr>
              ';
          }
        ?>
        
        
        </tbody>
      </table>
    </div>
  </div>
    <br>
</div>
<!-- ADMIN USERS PANEL -->
<!-- EVENTS PANEL -->
<div id="events_panel" class="left_nav_bar_buttons">
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>Events</b> </h1>
  <br>
  <div style="width: 95%; margin: auto; padding: 20px; background-color: white; border-top: 3px solid green; border-radius: 5px;">
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_event_modall" onclick="add_event_button();">
          Add Event
        </button>

        <!-- Modal Add User -->
        <div class="modal fade" id="add_event_modall" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="add_event_modallLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="add_event_modallLabel">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="event_textfield">Event Title</label>
                  <input required type="text" class="form-control" id="event_textfield" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
                <table style="width:100%;">
                  <tr>
                    <th>Month</th>
                    <th>Day</th>
                  </tr>
                  <tr>
                    <td>
                      <select id="month_select" style="width:80%;" class="form-control">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    </td>
                    <td>
                      <select id="day_select" style="width:80%;" class="form-control">

                      </select>
                    </td>
                  </tr>
                </table>
              </form>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary" onclick="add_admin_function();">Add</button> -->
                <button type="button" class="btn btn-primary" onclick="add_event_function();">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Update User -->
        <div class="modal fade" id="update_event_modall" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="update_event_modallLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="update_event_modallLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form>
                <!-- <div class="form-group"> -->
                  <!-- <label for="event_textfield_on_update">Event ID</label> -->
                  <input required type="hidden" class="form-control" id="event_id_textfield_on_update" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                <!-- </div> -->
                <div class="form-group">
                  <label for="event_textfield_on_update">Event Title</label>
                  <input required type="text" class="form-control" id="event_textfield_on_update" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                </div>
                <table style="width:100%;">
                  <tr>
                    <th>Month</th>
                    <th>Day</th>
                  </tr>
                  <tr>
                    <td>
                      <select id="month_select_update" style="width:80%;" class="form-control">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    </td>
                    <td>
                      <select id="day_select_update" style="width:80%;" class="form-control">

                      </select>
                    </td>
                  </tr>
                </table>
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="update_event_function();">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
    <br>
    <br>
    <div class="table-responsive">
        <table id="events_table" class="table table-striped" style="overflow-x: auto; border-collapse: collapse; text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Month and Day</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="events_tbody">
        <?php
          $sql = "  SELECT * FROM ptc_holidays;  ";
          $result = mysqli_query($con, $sql);
      
          while($row = mysqli_fetch_assoc($result))
          {
              echo '
              <tr>
                <td style="vertical-align: middle; text-align: center;">'.$row['id'].'</td>
                <td style="vertical-align: middle; text-align: center;">'.strtoupper($row['holiday_name']).'</td>
                <td style="vertical-align: middle; text-align: center;">'.date("F d", strtotime($row['date_month_and_day'])).'</td>
                <td style="vertical-align: middle; text-align: center;">
                  <input type="button" value="Update" class="btn btn-success" onclick="event_open_update_modal(\''.trim($row['id']).'\');">
                  <input type="button" value="Delete" class="btn btn-danger" onclick="event_delete_function(\''.trim($row['id']).'\');">
                </td>
              </tr>
              ';
          }
        ?>
        
        
        </tbody>
      </table>
    </div>
  </div>
    <br>
</div>
<!-- EVENTS PANEL -->
<!-- MY ACCOUNT PANEL -->
<div id="my_account_panel" class="left_nav_bar_buttons" >
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>My Account</b> </h1>
  <br>
  <div style="width:95%; margin:auto; padding:20px; background-color:white; border-top:3px solid green; border-radius:5px;">
    <div class="container" style="width:100%;">
    
    <?php
    $sql = "  SELECT * FROM ptc_admin WHERE id='".$_SESSION['admin_id']."';";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
   
    ?>


      <div class="container-fluid">
        <form method="post">
          <div class="mb-4 form-group">
            <input type="hidden" id="my_account_id">
            <label class="form-label"><b>Admin Type</b></label>
            <input required disabled readonly type="text" class="form-control" id="my_account_admin_type" aria-describedby="emailHelp" value="<?php echo $row['type']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
          </div>
          <div class="mb-4 form-group">
            <label class="form-label"><b>Process Courses</b></label>
            <?php
              $usernamee = $top_nav_bar['username'];
              $sql = "  SELECT * FROM ptc_admin WHERE username='$usernamee';  ";
              $result = mysqli_query($con, $sql);
          
              if($row = mysqli_fetch_assoc($result))
              {
                $qweqwe = $row['process_course'];

                if (!empty($qweqwe)) {
                    $qweqwe_list = array_map('intval', explode(' --- ', $qweqwe));
                    
                    $requested_documentss = "<ul style='margin-left:40px;'>";
                    
                    $sql1 = "SELECT * FROM ptc_courses WHERE id IN (" . implode(',', $qweqwe_list) . ")";
                    $result1 = mysqli_query($con, $sql1);
                    
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $requested_documentss .= "<li>" . $row1['course'] . "</li>";
                    }
                    
                    $requested_documentss .= "</ul>";
                } else {
                    $requested_documentss = "";
                }
              }

              echo $requested_documentss;
            ?>
            <!-- <ul>
              <li>qweqwe</li>
              <li>qweqwe</li>
              <li>qweqwe</li>
            </ul> -->
          </div>
          <div class="mb-4 form-group">
            <div></div>
            <label class="form-label"><b>Username</b></label>
            <input required name="username" type="text" id="my_account_username" class="form-control" value="<?php echo $row['username']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
          </div>
          <div class="mb-4 form-group">
              <label class="form-label"><b>Password</b></label>
              <div class="input-group">
                  <input required type="password" class="form-control" id="my_account_password" value="<?php echo $row['password']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
                  <div class="input-group-append">
                      <span class="input-group-text" id="my_account_toggle_password">
                          <i class="fas fa-eye"></i>
                      </span>
                  </div>
              </div>
          </div>
          <div class="mb-4 form-group">
            <label class="form-label"><b>First Name</b></label>
            <input required name="first_name" type="text" id="my_account_first_name" class="form-control" value="<?php echo $row['first_name']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
          </div>
          <div class="mb-4 form-group">
            <label class="form-label"><b>Middle Name</b></label>
            <input required name="middle_name" type="text" id="my_account_middle_name" class="form-control" value="<?php echo $row['middle_name']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
          </div>
          <div class="mb-4 form-group">
            <label class="form-label"><b>Last Name</b></label>
            <input required name="last_name" type="text" class="form-control" id="my_account_last_name" value="<?php echo $row['last_name']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100">
          </div>
          <button type="button" class="btn btn-success" onclick="my_account_update_button();">Update</button>
        </form>
      </div>
    </div>
    <br>
    <br>
  </div>
</div>
<!-- MY ACCOUNT PANEL -->
</div><!-- END OF MAIN PANEL-->

</body>


<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

<?php
  include "admin_js.php";
?>









































</html>


