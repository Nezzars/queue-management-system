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
  $sql = "  SELECT * FROM ptc_student_users WHERE id='".$_SESSION['student_id']."';";
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
  <!-- <link rel="stylesheet" href="student.css"> -->
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
  <script src="../qrcode-generator-master/js/qrcode.js"></script>
  <?php
    $student_id = $_SESSION['student_id'];

    $query = "DELETE FROM `ptc_student_appointments` WHERE id = '$student_id' AND datee < CURDATE()";
    mysqli_query($con, $query);
    $query = "DELETE FROM `ptc_student_appointments_history` WHERE datee < CURDATE()";
    mysqli_query($con, $query);
  ?>
  <?php
    include "student_css.php";
  ?>
</head>
















































<body>
<div class="white-div" id="white-div">
  <!-- Iyong nilalaman dito -->
</div>
<script>
  document.getElementById("white-div").style.display = "block";
</script>
<?php
  if($_SESSION['kakasubmit_lang_ng_appointment'] == true)
  {
      echo "<script>
        Swal.fire(
          'Success!',
          'Submiting an appointment Successfully!',
          'success'
          )
        </script>";
      $_SESSION['kakasubmit_lang_ng_appointment'] = false;
  }

  if($_SESSION['kakacancel_lang_ng_appointment'] == true)
  {
      echo "<script>
        Swal.fire(
          'Success!',
          'Your appointment has been cancelled.',
          'success'
          )
      </script>";
      // $_SESSION['kakacancel_lang_ng_appointment'] = false;
  }

  if($_SESSION['kakasubmit_lang_ng_feedback'] == true)
  {
      echo "<script>
      Swal.fire(
        'Thank you for your feedback!',
        ' ',
        'success'
      )
      </script>";
  }

  if($_SESSION['kaka_delete_lang_ng_review'] == true)
  {
      echo "<script>
      Swal.fire(
        'Deleting your feedback successfully!',
        ' ',
        'success'
      )
      </script>";
  }

  if($_SESSION['kakaupdate_lang_ng_feedback'] == true)
  {
      echo "<script>
      Swal.fire(
        'Updating your feedback successfully!',
        ' ',
        'success'
      )
      </script>";
      // $_SESSION['kakaupdate_lang_ng_feedback'] = false;
  }
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
              <li style="pointer-events: none;">Name: <b id="name_top_nav_bar"><?php echo strtoupper($top_nav_bar['first_name'])." ".strtoupper($top_nav_bar['last_name']); ?></b></li>
              <li style="pointer-events: none;">Username: <b><span id="username_top_nav_bar"><?php echo strtoupper($top_nav_bar['username']); ?></span></b></li>
              <input type="hidden" value="<?php echo $top_nav_bar['username']; ?>" id="username">
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
  // open_loading();
</script>
<!-- APPOINTMENT PANEL -->
<div id="schedule_an_appointment_panel" class="left_nav_bar_buttons">
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>Appointment Scheduling</b> </h1>
    <br>
    <div style="width:95%; margin:auto; padding:20px; background-color:white; border-top:3px solid green; border-radius:5px;">
    <div class="card">
      <div class="card-body">
          <div id="calendar">

          </div>
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
                        <input type="hidden" value="qwe" id="date_hidden">
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
                        <input type="text" class="form-control" id="others_textfield" placeholder="Please Specify your request" oninput="limitChars(this)">
                      </div>
                      <hr>
                      <div class="mb-3">
                        <label for="purpose_of_request_textfield" class="form-label">Purpose of request</label>
                        <input type="text" class="form-control" id="purpose_of_request_textfield" placeholder="Type purpose of request" required oninput="limitChars(this)">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="appointment_submit_function();">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="appointment_close_button">Close</button>
                </div>
            </div>
        </div>
    </div>

    
    </div>
</div>
<!-- APPOINTMENT PANEL -->
<!-- DASHBOARD PANEL -->
<div id="dashboard_panel" class="left_nav_bar_buttons" >
    <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>Dashboard</b> </h1>
    <div style="display: table;table-layout: fixed; border-spacing: 30px; width:100%; text-align:center;">
      <div style="display: table-cell; float:left; width:100%; background-color:white; border-radius:10px;">
        <br>
        <h1><i class="fa-solid fa-calendar-days" style="color:green;"></i></h1>
        <h4><b id="currentDate"></b></h4>
        <h5>Date Today</h5> 
      </div>
      <div id="review_panel" name="yes_review" style="display: table-cell; float:left; background-color:white; border-radius:10px; margin-top:20px; padding:20px; text-align:left;">
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
        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
          Show Comments
        </button></center>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ratings and Reviews</h5>
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
      <div class="gitna1" style="">
        &nbsp
      </div>
      <?php
        $sql = "  SELECT * FROM ptc_feedbacks WHERE username='".$top_nav_bar['username']."';  ";
        $result = mysqli_query($con, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
          $spanss = "";
          if($row['stars'] == "1")
          {
            $spanss = 
            '
              <span class="stars" id="star1" style="color:gold;">&#9733;</span>
              <span class="stars" id="star2">&#9733;</span>
              <span class="stars" id="star3">&#9733;</span>
              <span class="stars" id="star4">&#9733;</span>
              <span class="stars" id="star5">&#9733;</span>
            ';
          }
          else if($row['stars'] == "2")
          {
            $spanss = 
            '
              <span class="stars" id="star1" style="color:gold;">&#9733;</span>
              <span class="stars" id="star2" style="color:gold;">&#9733;</span>
              <span class="stars" id="star3">&#9733;</span>
              <span class="stars" id="star4">&#9733;</span>
              <span class="stars" id="star5">&#9733;</span>
            ';
          }
          else if($row['stars'] == "3")
          {
            $spanss = 
            '
              <span class="stars" id="star1" style="color:gold;">&#9733;</span>
              <span class="stars" id="star2" style="color:gold;">&#9733;</span>
              <span class="stars" id="star3" style="color:gold;">&#9733;</span>
              <span class="stars" id="star4">&#9733;</span>
              <span class="stars" id="star5">&#9733;</span>
            ';
          }
          else if($row['stars'] == "4")
          {
            $spanss = 
            '
              <span class="stars" id="star1" style="color:gold;">&#9733;</span>
              <span class="stars" id="star2" style="color:gold;">&#9733;</span>
              <span class="stars" id="star3" style="color:gold;">&#9733;</span>
              <span class="stars" id="star4" style="color:gold;">&#9733;</span>
              <span class="stars" id="star5">&#9733;</span>
            ';
          }
          else if($row['stars'] == "5")
          {
            $spanss = 
            '
              <span class="stars" id="star1" style="color:gold;">&#9733;</span>
              <span class="stars" id="star2" style="color:gold;">&#9733;</span>
              <span class="stars" id="star3" style="color:gold;">&#9733;</span>
              <span class="stars" id="star4" style="color:gold;">&#9733;</span>
              <span class="stars" id="star5" style="color:gold;">&#9733;</span>
            ';
          }

          echo 
          '
            <div id="review_panel" name="yes_review" style="display: table-cell; float:left; background-color:white; border-radius:10px; margin-top:20px; padding:20px; text-align:left;">
              <h3><b>Your Review</b></h3>
              <br>
              <h5>'.strtoupper($top_nav_bar['first_name'])." ".strtoupper($top_nav_bar['last_name']).'</h5>
              <div id="print_spans_here">
                '.$spanss.'
              </div>
              <br><br>
              <input type="button" value="Edit your review" class="btn btn-primary" data-target="#edit_review_modal" data-toggle="modal" id="edit_a_review_button" onclick="edit_a_review_onclick('.$row['id'].');">
              <input type="button" value="Delete your review" class="btn btn-danger" id="delete_a_review_button" onclick="delete_a_review_onclick('.$row['id'].');">
      
              <div class="modal fade" id="edit_review_modal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Edit Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); align-items: left;background-color: #fff;padding: 20px; margin-left:10px; margin-right:10px;">
                        <input type="hidden" value="" id="stars">
                        <span>Full Name: <b>'.strtoupper($top_nav_bar['first_name'])." ".strtoupper($top_nav_bar['last_name']).'</b></span>
                        <br>
                        <span>Reviews are public.</span>
                        <br>
                        <span class="stars" id="star1_inside_modal" onmouseover="star1_inside_modal_mouse_over();" onmouseout="star1_inside_modal_mouse_out();" onclick="star1_inside_modal_onclick();">&#9733;</span>
                        <span class="stars" id="star2_inside_modal" onmouseover="star2_inside_modal_mouse_over();" onmouseout="star2_inside_modal_mouse_out();" onclick="star2_inside_modal_onclick();">&#9733;</span>
                        <span class="stars" id="star3_inside_modal" onmouseover="star3_inside_modal_mouse_over();" onmouseout="star3_inside_modal_mouse_out();" onclick="star3_inside_modal_onclick();">&#9733;</span>
                        <span class="stars" id="star4_inside_modal" onmouseover="star4_inside_modal_mouse_over();" onmouseout="star4_inside_modal_mouse_out();" onclick="star4_inside_modal_onclick();">&#9733;</span>
                        <span class="stars" id="star5_inside_modal" onmouseover="star5_inside_modal_mouse_over();" onmouseout="star5_inside_modal_mouse_out();" onclick="star5_inside_modal_onclick();">&#9733;</span>
                        <br>
                        <br>
                        <label for="experience_textfield" class="form-label">Experience: </label>
                        <textarea class="form-control" id="experience_textfield" placeholder="Describe your experience (optional)" required oninput="experience_textarea(this)"></textarea>
      
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="review_edit_button('.$row['id'].');">Edit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="review_close_button">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ';
        }
        else 
        {
          echo 
          '
            <div id="review_panel" name="no_review" style="display: table-cell; float:left; background-color:white; border-radius:10px; margin-top:20px; padding:20px; text-align:left;">
              <h3><b>Rate this web-based application</b></h3>
              <h5>Tell others what you think</h5>
              <span class="stars" id="star1" onmouseover="star1_mouse_over();" onmouseout="star1_mouse_out();" onclick="star1_onclick();">&#9733;</span>
              <span class="stars" id="star2" onmouseover="star2_mouse_over();" onmouseout="star2_mouse_out();" onclick="star2_onclick();">&#9733;</span>
              <span class="stars" id="star3" onmouseover="star3_mouse_over();" onmouseout="star3_mouse_out();" onclick="star3_onclick();">&#9733;</span>
              <span class="stars" id="star4" onmouseover="star4_mouse_over();" onmouseout="star4_mouse_out();" onclick="star4_onclick();">&#9733;</span>
              <span class="stars" id="star5" onmouseover="star5_mouse_over();" onmouseout="star5_mouse_out();" onclick="star5_onclick();">&#9733;</span><br><br>
              <input type="button" value="Write a review" class="btn btn-info" data-target="#review_modal" data-toggle="modal" id="write_a_review_button" onclick="write_a_review_onclick();">
      
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#qr_modal" id="launch_qr_modal_id" style="display:none;">
              </button> -->
              <div class="modal fade" id="review_modal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); align-items: left;background-color: #fff;padding: 20px; margin-left:10px; margin-right:10px;">
                        <input type="hidden" value="" id="stars">
                        <span>Full Name: <b>'.strtoupper($top_nav_bar['first_name'])." ".strtoupper($top_nav_bar['last_name']).'</b></span>
                        <br>
                        <span>Reviews are public.</span>
                        <br>
                        <span class="stars" id="star1_inside_modal" onmouseover="star1_inside_modal_mouse_over();" onmouseout="star1_inside_modal_mouse_out();" onclick="star1_inside_modal_onclick();">&#9733;</span>
                        <span class="stars" id="star2_inside_modal" onmouseover="star2_inside_modal_mouse_over();" onmouseout="star2_inside_modal_mouse_out();" onclick="star2_inside_modal_onclick();">&#9733;</span>
                        <span class="stars" id="star3_inside_modal" onmouseover="star3_inside_modal_mouse_over();" onmouseout="star3_inside_modal_mouse_out();" onclick="star3_inside_modal_onclick();">&#9733;</span>
                        <span class="stars" id="star4_inside_modal" onmouseover="star4_inside_modal_mouse_over();" onmouseout="star4_inside_modal_mouse_out();" onclick="star4_inside_modal_onclick();">&#9733;</span>
                        <span class="stars" id="star5_inside_modal" onmouseover="star5_inside_modal_mouse_over();" onmouseout="star5_inside_modal_mouse_out();" onclick="star5_inside_modal_onclick();">&#9733;</span>
                        <br>
                        <br>
                        <label for="experience_textfield" class="form-label">Experience: </label>
                        <textarea class="form-control" id="experience_textfield" placeholder="Describe your experience (optional)" required oninput="experience_textarea(this)"></textarea>
      
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="review_submit_button();">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="review_close_button">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ';
        }
      ?>
          


      


    </div>
    <!-- <div id="biar">
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
    </div> -->
  </div>
<!-- DASHBOARD PANEL -->
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
                    <th>Requested Documents</th>
                    <th>Purpose of request</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
        <?php
          $sql = "  SELECT DISTINCT * FROM ptc_student_appointments WHERE username = '".$top_nav_bar['username']."';  ";
          $result = mysqli_query($con, $sql);
          $counter = 1;
      
          while($row = mysqli_fetch_assoc($result))
          {
            $requested_documents = $row['requested_documents'];
            $modified_requested_documents = str_replace(" --- ", ", ", $requested_documents); 

            $datee = $row['datee'];
            $datetime = new DateTime($datee);
            $formatted_date = $datetime->format("F d, Y");

              echo '
              <tr>
                <td>'.$counter.'</td>
                <td>'.strtoupper($modified_requested_documents).'</td>
                <td>'.strtoupper($row['purpose_of_request']).'</td>
                <td>'.strtoupper($formatted_date).'</td>
                <td>
                <input type="button" value="Show QR" class="btn btn-info" onclick="show_qr_appointment('.$row['id'].', \''.$row['datee'].'\')">
                  <input type="button" value="Cancel" class="btn btn-danger" onclick="cancel_appointment('.$row['id'].', \''.$row['datee'].'\')">
                </td>
              </tr>
              ';
              $counter++;
          }
        ?>
        
        
          </tbody>
      </table>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#qr_modal" id="launch_qr_modal_id" style="display:none;">
      </button>
      <div class="modal fade" id="qr_modal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">QR CODE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="qr_modal_body">
                  Show this QR code on the actual day of your appointment at the Registrar's Office. You will have priority over those in line.
                  <center>
                    <div id="qrcode">

                    </div>
                  </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="appointment_close_button">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
<!-- ADMIN USERS PANEL -->
<!-- MY ACCOUNT PANEL -->
<?php
  $sql = "  SELECT * FROM ptc_student_users WHERE id='".$_SESSION['student_id']."';";
  $result = mysqli_query($con, $sql);
  $my_profile = mysqli_fetch_assoc($result);
?>
<div id="my_profile_panel" class="left_nav_bar_buttons" >
  <h1 style="padding:10px; border:1px solid lightgray; text-align:center; background-color:#1F5642; color:white;"><b>My Profile</b> </h1>
  <br>
  <div style="width:95%; margin:auto; padding:20px; background-color:white; border-top:3px solid green; border-radius:5px;">
    <div class="container-fluid">
      <center><h4>Account Information</h4></center>
      <div class="mb-3">
        <label for="username_textfield">Username</label>
        <input value="<?php echo $my_profile['username']; ?>" disabled type="text" required id="username_textfield" name="username_textfield" class="form-control form-control-sm mb-2">
      </div>
      <div class="mb-3">
        <label for="password_textfield">Password</label>
        <div class="input-group">
            <input value="<?php echo $my_profile['password']; ?>" disabled type="password" required id="password_textfield" name="password_textfield" class="form-control form-control-sm">
            <div class="input-group-append">
                <button disabled class="btn btn-outline-secondary toggle-password" type="button" id="togglePassword">
                    <i class="fa fa-eye" id="eyeIcon"></i>
                </button>
            </div>
        </div>
        <div id="error-message" class="text-danger"></div>
      </div>
      <div class="mb-3">
        <label for="confirm_password_textfield">Confirm Password</label>
        <div class="input-group">
            <input value="<?php echo $my_profile['password']; ?>" disabled type="password" required id="confirm_password_textfield" name="confirm_password_textfield" class="form-control form-control-sm">
            <div class="input-group-append">
                <button disabled class="btn btn-outline-secondary toggle-password" type="button" id="toggleConfirmPassword">
                    <i class="fa fa-eye" id="eyeIcon1"></i>
                </button>
            </div>
        </div>
        <div id="error-message" class="text-danger"></div>
      </div>
      <div class="mb-3">
        <button class="btn btn-secondary" id="my_account_account_information_edit_button_id" onclick="my_account_account_information_edit_button();">&nbsp Edit &nbsp</button>
        <button class="btn btn-success" style="display:none;" id="my_account_account_information_update_button_id" onclick="my_account_account_information_update_button();">&nbsp Update &nbsp</button>
        <button class="btn btn-danger" style="display:none;" id="my_account_account_information_cancel_button_id" onclick="my_account_account_information_cancel_button();">&nbsp Cancel &nbsp</button>
      </div>
      <div class="styled-hr">
        <hr>
      </div>
      <center><h4>Institute Information</h4></center>
      <div class="mb-3">
        <label for="email">Student Number: </label>
        <input value="<?php echo $my_profile['student_number']; ?>" disabled type="email" required name="student_number_textfield" class="form-control mb-2" id="student_number_textfield" placeholder="Ex. 2018-1132">
      </div>
      <div class="mb-3">
        <label for="email">Institute Email</label>
        <input value="<?php echo $my_profile['institute_email']; ?>" disabled type="email" required name="email" class="form-control mb-2" id="institute_email_textfield" placeholder="@paterostechnologicalcollege.edu.ph">
      </div>
      <div class="mb-3">
        <label for="gender">Student Type</label>
        <select disabled class="form-control form-control-sm mb-2" name="student_type_dropdownlist" id="student_type_dropdownlist">
          <option value="" disabled selected>Choose...</option>
          <option value="Regular">Regular</option>
          <option value="Irregular">Irregular</option>
        </select>
        <?php echo "<script>document.getElementById('student_type_dropdownlist').value = '".$my_profile['student_type']."'</script>"; ?>
      </div>
      <div class="mb-3">
        <label for="email">Course</label>
        <input value="<?php echo $my_profile['course']; ?>" disabled type="text" required name="email" class="form-control mb-2" id="course_textfield" placeholder="Ex. Bachelor of Science in Information Technology (BSIT)">
      </div>
      <div class="mb-3">
        <button class="btn btn-secondary" id="my_account_institute_information_edit_button_id" onclick="my_account_institute_information_edit_button();">&nbsp Edit &nbsp</button>
        <button class="btn btn-success" style="display:none;" id="my_account_institute_information_update_button_id" onclick="my_account_institute_information_update_button();">&nbsp Update &nbsp</button>
        <button class="btn btn-danger" style="display:none;" id="my_account_institute_information_cancel_button_id" onclick="my_account_institute_information_cancel_button();">&nbsp Cancel &nbsp</button>
      </div>
      <div class="styled-hr">
        <hr>
      </div>
      <center><h4>Personal Information</h4></center>
      <div class="mb-3">
        <label for="firstname">First Name</label>
        <input value="<?php echo $my_profile['first_name']; ?>" disabled type="text" required id="first_name_textfield" name="firstname" class="form-control form-control-sm mb-2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="150">
      </div>
      <div class="mb-3">
        <label for="middlename">Middle Name</label>
        <input value="<?php echo $my_profile['middle_name']; ?>" disabled type="text" placeholder="Leave if none" id="middle_name_textfield" name="middlename" class="form-control form-control-sm mb-2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="150">
      </div>
      <div class="mb-3">
        <label for="lastname">Last Name</label>
        <input value="<?php echo $my_profile['last_name']; ?>" disabled type="text" required="" id="last_name_textfield" name="lastname" class="form-control form-control-sm mb-2" id="inputls" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="150">
      </div>
      <div class="mb-3">
        <label for="suffix">Suffix</label>
        <input value="<?php echo $my_profile['suffix']; ?>" disabled type="text" placeholder="Leave if none" id="suffix_textfield" name="suffix" class="form-control form-control-sm mb-2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="150">
      </div>
      <div class="mb-3">
        <label for="gender">Gender</label>
        <select disabled class="form-control form-control-sm mb-2" name="gender_dropdownlist" id="gender_dropdownlist">
          <option value="" disabled selected>Choose...</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <?php echo "<script>document.getElementById('gender_dropdownlist').value = '".$my_profile['gender']."'</script>"; ?>
      </div>
      <div class="mb-3">
        <label for="bday">Birthday</label>
        <input value="<?php echo $my_profile['birthday']; ?>" disabled type="date" required id="birthday_textfield" value="" name="bday" class="form-control form-control-sm mb-2">
      </div>
      <div class="mb-3">
        <label for="contactnumber">Contact No.</label>
        <input value="<?php echo $my_profile['contact_no']; ?>" disabled type="text" required name="contactnumber" class="form-control form-control-sm mb-2" id="contact_no_textfield" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11">
      </div>
      <div class="mb-3">
        <label for="address">Street Address</label>
        <input value="<?php echo $my_profile['street_address']; ?>" disabled type="text" required id="street_address_textfield" class="form-control form-control-sm mb-2" name="street_address" placeholder="House No. and Street Name">
      </div>
      <div class="mb-3">
        <label for="address">Province</label>
        <select disabled class="form-control form-control-sm mb-2" name="province_dropdownlist" id="province_dropdownlist" onchange="select_province_ajax();">
          <option value="" disabled selected>Choose...</option>
          <option value="Metro Manila">Metro Manila</option>
          <?php
            $sql = "SELECT DISTINCT Province FROM ptc_setupaddress;";
            $result = mysqli_query($con, $sql);
            
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $province = $row['Province'];
                    echo '<option value="' . $province . '">' . $province . '</option>';
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
            
            mysqli_close($con);
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="address">Town / City</label>
        <select disabled class="form-control form-control-sm mb-2" name="town_city_dropdownlist" id="town_city_dropdownlist" onchange="select_town_city_ajax();">
          <!-- may laman na -->
        </select>
      </div>
      <div class="mb-3">
        <label for="address">Barangay</label>
        <select disabled class="form-control form-control-sm mb-2" name="barangay_dropdownlist" id="barangay_dropdownlist">

        </select>
      </div>
      <div class="mb-3">
        <label for="address">Postcode / ZIP</label>
        <input value="<?php echo $my_profile['postcode']; ?>" disabled type="text" required id="postcode_textfield" class="form-control form-control-sm mb-2" name="postcode" placeholder="Optional">
      </div>
      <div class="mb-3">
        <button class="btn btn-secondary" id="my_account_personal_information_edit_button_id" onclick="my_account_personal_information_edit_button();">&nbsp Edit &nbsp</button>
        <button class="btn btn-success" style="display:none;" id="my_account_personal_information_update_button_id" onclick="my_account_personal_information_update_button();">&nbsp Update &nbsp</button>
        <button class="btn btn-danger" style="display:none;" id="my_account_personal_information_cancel_button_id" onclick="my_account_personal_information_cancel_button();">&nbsp Cancel &nbsp</button>
      </div>
    </div>
  </div>
  <br>
</div>
<!-- MY ACCOUNT PANEL -->
</div> <!-- end of main_panel -->
<!-- <button onclick="qweqwe();" type="button">
  qwe
</button> -->
</body>


















































<?php
  include 'student_js.php';
?>