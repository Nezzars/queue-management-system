
<?php

ini_set('log_errors','On');
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

session_start();

include '../connections/my_cnx.php';
//GIT2
//include('../security.php');
// include('../database/dbconfig.php');
//include "../../connections/database.php";
//include "../../security/security.php";



//include_once '../../connections/connection.php';
// $query = "SELECT Distinct(Province) FROM ffpi_setupaddress";
// $result = $con->query($query);


//$username = $_SESSION['username'];
//$getuser = mysqli_query($con,"SELECT branch FROM ffpi_accounts WHERE username = '$username'");
//$user = mysqli_fetch_array($getuser);
?>
<?php


$timezone = "Asia/Colombo";
date_default_timezone_set($timezone);
$today = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <!-- <link rel="icon" href="images/ffpi.png"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content"ie=edge">
    <link rel="stylesheet" href="registration_form.css" />
    <?php
      include '../cdn/cdns.php';
    ?>
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <style>
        body{
            background-image: url('../homepage/homepageimg.jpg');
            background-size: cover;
        }
    </style>
    <style>
        @media screen and (max-width: 600px) {
            .main-container {
                padding: 1%;
            }

            #title {
                text-align: center;
            }

            .form-row {
                margin-left: 1%;
                text-align: center
            }

            #suffix-affiliate-container .row {
                display: block
            }

        }
    </style>

    <!--<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script> -->

  </head>

  <body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <br>
    <br>
    <br>
    <?php
      include "../navbars/homepage_navbar.php";
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
  <!-- START OF TEST FORM NILABAS KO SYA SA MAIN CONTAINER -->

  
  <form id="test-form" class="mb-3 p-2" style="background-color:white; border-radius:10px; margin-top:20px; margin-bottom:40px;" action="registration_form_function.php" method="post" name="registration_form">
  <h1 id="title" class="h2 mb-0 text-gray-800 p-2" style="text-align:center; background-color:#1F5642; color:white;margin:-8px; border-radius:10px;">Student Registration Form</h1>
    <div id="personal-details" class="form-group" style="padding:40px;">
        
        <br>
    <!--</div>
     CLOSING DIV -->

     

     

    <!-- OPENING DIV OF USER PASS-->
       <div id="user-pass" class="form-group">

         <!-- OPENING DIV OF ROW-->
        <!-- <div class="row">
            <div class="col">

                <label for="username_textfield"><b>ORDER ID</b></label>
                
                <input type="text" required id="order_id" name="order_id" class="form-control form-control-sm mb-2">
                <script>
                    const inputField = document.getElementById("order_id");
                    let timeoutId;

                    inputField.addEventListener("keypress", function() {
                    clearTimeout(timeoutId);
                    
                    timeoutId = setTimeout(function() {
                        open_loading();

                        select_data_using_order_id('select_data_using_order_id');
                    }, 1000);
                    });
                </script>
            </div>
        </div>
        <br> -->

        <span id="availability2"></span>

        <style>
            /* Add this CSS to adjust the height of the toggle button */
            .input-group .toggle-password {
            height: 34px; /* You can adjust the height to match the input field */
            padding: 0 10px;
            border: 1px solid #ced4da;
            border-left: none;
            }

            .input-group .toggle-password i {
            font-size: 14px;
            }

            .input-group .toggle-password:hover {
            background-color: #f7f7f7;
            }

        </style>
        <h5 style="text-align:center; margin-top:-40px;">Account Information</h5>
        <div class="form-row">
            <!-- OPENING DIV COL-->
                <div class="col">
                    <label for="username_textfield">Username</label>
                    <input type="text" required id="username_textfield" name="username_textfield" class="form-control form-control-sm mb-2">
                </div>
            <!-- CLOSING DIV -->

            <!-- OPENING DIV 
                <div class="col">
                    <label for="memberpassword">Password</label>
                    <div class="input-group">
                        <input type="password" required id="memberpassword" name="memberpassword" class="form-control form-control-sm">
                    <div id="error-message" class="text-danger"></div>
                </div>-->

                <div class="col">
                    <label for="password_textfield">Password</label>
                    <div class="input-group">
                        <input type="password" required id="password_textfield" name="password_textfield" class="form-control form-control-sm">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary toggle-password" type="button" id="togglePassword">
                                <i class="fa fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>
                    <div id="error-message" class="text-danger"></div>
                </div>

                <div class="col">
                    <label for="confirm_password_textfield">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" required id="confirm_password_textfield" name="confirm_password_textfield" class="form-control form-control-sm">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary toggle-password" type="button" id="toggleConfirmPassword">
                                <i class="fa fa-eye" id="eyeIcon1"></i>
                            </button>
                        </div>
                    </div>
                    <div id="error-message" class="text-danger"></div>
                </div>
                <!-- Add Font Awesome CSS for the eye icon -->
                <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
        
                <script>
                  document.getElementById("togglePassword").addEventListener("click", function() {
                  const passwordInput = document.getElementById("password_textfield");
                  const eyeIcon = document.getElementById("eyeIcon");

                  if (passwordInput.type === "password") {
                      passwordInput.type = "text";
                      eyeIcon.classList.remove("fa-eye");
                      eyeIcon.classList.add("fa-eye-slash");
                  } else {
                      passwordInput.type = "password";
                      eyeIcon.classList.remove("fa-eye-slash");
                      eyeIcon.classList.add("fa-eye");
                  }
                  });
                </script>

                <script>
                  document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
                  const passwordInput = document.getElementById("confirm_password_textfield");
                  const eyeIcon = document.getElementById("eyeIcon1");

                  if (passwordInput.type === "password") {
                      passwordInput.type = "text";
                      eyeIcon.classList.remove("fa-eye");
                      eyeIcon.classList.add("fa-eye-slash");
                  } else {
                      passwordInput.type = "password";
                      eyeIcon.classList.remove("fa-eye-slash");
                      eyeIcon.classList.add("fa-eye");
                  }
                  });
                </script>

        </div>
        <!-- CLOSING DIV -->

        <hr>
        <h5 style="text-align:center;">Institute Information</h5>
        <div class="form-row">
            <label for="email">Student Number: </label>
            <input type="email" required name="student_number_textfield" class="form-control mb-2" id="student_number_textfield" placeholder="Ex. 2018-1132">
        </div>
        <div class="form-row">
            <label for="email">Institute Email</label>
            <input type="email" required name="email" class="form-control mb-2" id="institute_email_textfield" placeholder="@paterostechnologicalcollege.edu.ph">
        </div>
        <div class="form-row">
            <label for="gender">Student Type</label>
            <select class="form-control form-control-sm mb-2" name="student_type_dropdownlist" id="student_type_dropdownlist">
              <option value="" disabled selected>Choose...</option>
              <option value="Regular">Regular</option>
              <option value="Irregular">Irregular</option>
            </select>
        </div>
        <div class="form-row">
            <label for="email">Course</label>
            <input type="email" required name="email" class="form-control mb-2" id="course_textfield" placeholder="Ex. BSIT">
        </div>

        <hr>
        <h5 style="text-align:center;">Personal Information</h5>
                <div class="form-row">
                    <label for="firstname">First Name</label>
                    <input type="text" required id="first_name_textfield" name="firstname" class="form-control form-control-sm mb-2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="20">
                </div>

                <!-- MIDDLE NAME -->
                 <div class="form-row">
                                    <label for="middlename">Middle Name</label>
                                    <input type="text" placeholder="Leave if none" id="middle_name_textfield" name="middlename" class="form-control form-control-sm mb-2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="20">
                 </div>



                <!-- LAST NAME -->
                <div class="form-row">
                    <label for="lastname">Last Name</label>
                    <input type="text" required="" id="last_name_textfield" name="lastname" class="form-control form-control-sm mb-2" id="inputls" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="20">
                </div>

                <div class="form-row">
                                <label for="suffix">Suffix</label>
                                <input type="text" placeholder="Leave if none" id="suffix_textfield" name="suffix" class="form-control form-control-sm mb-2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15">
                            </div>

                <!-- <div class="form-row">
                    <label for="civilstatus">Civil Status</label>
                    <select id="civilstatus" required name="civilstatus" list="civilstatus" class="form-control form-control-sm mb-2">

                    
                    </select>
                </div> -->
                
                <div class="form-row">
                    <label for="gender">Gender</label>
                    <select class="form-control form-control-sm mb-2" name="gender_dropdownlist" id="gender_dropdownlist">
                      <option value="" disabled selected>Choose...</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="bday">Birthday</label>
                    <input type="date" required id="birthday_textfield" value="" name="bday" class="form-control form-control-sm mb-2">
                </div>

                <div class="form-row">
                    <label for="contactnumber">Contact No.</label>
                    <input type="text" required name="contactnumber" class="form-control form-control-sm mb-2" id="contact_no_textfield" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" placeholder="Leave if none">
                </div>

                <div class="form-row">
                    <label for="address">Street Address</label>
                    <input type="text" required id="street_address_textfield" class="form-control form-control-sm mb-2" name="street_address" placeholder="House No. and Street Name">
                </div>
                <div class="form-row">
                    <label for="address">Province</label>
                    <select class="form-control form-control-sm mb-2" name="province_dropdownlist" id="province_dropdownlist" onchange="select_province_ajax();">
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
                <div class="form-row">
                    <label for="address">Town / City</label>
                    <select class="form-control form-control-sm mb-2" name="town_city_dropdownlist" id="town_city_dropdownlist" onchange="select_town_city_ajax();">
                      <!-- may laman na -->
                    </select>
                </div>
                <div class="form-row">
                    <label for="address">Barangay</label>
                    <select class="form-control form-control-sm mb-2" name="barangay_dropdownlist" id="barangay_dropdownlist">
                      
                    </select>
                </div>
                <div class="form-row">
                    <label for="address">Postcode / ZIP</label>
                    <input type="text" required id="postcode_textfield" class="form-control form-control-sm mb-2" name="postcode" placeholder="Optional">
                </div>

                <!-- PREVIOUS POSITION OF AFFILIATE COUPON -->

                

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="agree_checkbox" required>
                        <label class="form-check-label" for="invalidCheck" onclick="document.getElementById('agree_checkbox').click();">
                        I Agree to terms and conditions. Read the complete <a href="#">Privacy Statement</a> to know more.
                        </label>
                        <div class="invalid-feedback">
                        You must agree before submitting.
                        </div>
                    </div>
                </div>

                <!--<input type="submit" id="temp_submit" name = "temp_submit" style="display:none;"> -->
                <center>
                  <br>
                  <input type = "button" name = "submitMember" id = "submitMember" value="Sign Up" class="btn btn-success" style="width:100%;" onclick="submitMember_function()">
                  <br>
                  <br>
                  Already have an account? <a href="../login/login.php">Login</a>
                </center>


</form>


<!-- END OF TEST FORM -->

</div> <!-- CLOSING DIV OF MAIN CONTAINER-->

<!-- =========== VALIDATION ============ 

<script>
    $(document).ready(function() {
        var loginForm = $("#test-form");
         //We set our own custom submit function
            loginForm.on("submit", function(e) {
                //Prevent the default behavior of a form
                e.preventDefault();
                
                //Our AJAX POST
                $.ajax({
                type: "POST",
                url: "login.php",
                data: {
                    //This will tell the form if user is captcha varified.
                    g-recaptcha-response: grecaptcha.getResponse()
                },
                success: function(response) {
                    console.log(response);
                    //console.log("Form successfully submited");
                }
                })
            });
    });
</script>
-->

<!-- ========== Auto load and Cities here! =========== -->

<script type="text/javascript" src="JavaScripts/autoload.js"></script>

<script type="text/javascript" src="JavaScripts/printdesign.js"></script>





<!-- Source of Province -->

<script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>

<script type="text/javascript">

// GENERATE FUNCTION

function generate(info)

{



console.log(info);

var webrequest = new XMLHttpRequest();

webrequest.onreadystatechange = function() {

  if (info.lenght == 0)

  {

    return;

  }

  if (this.readyState == 4 && this.status == 200)

  {

    console.log(this.responseText);

    var arr = JSON.parse(this.responseText);

    console.log(arr)

    document.getElementById("afullname").value = arr[0];

    document.getElementById("aposition").value = arr[1];

    document.getElementById("agent_id").value = arr[2];



  }

}

webrequest.open("GET", "autofill.php?agentid=" + info, true);

webrequest.send();



}

// END OF GENERATE FUNCTION

// START OF OF SEARCH FUN FUNCTION
function searchfun()

{

const searchid = document.querySelector('#searchid').value

console.log(searchid);

var webrequest = new XMLHttpRequest();

webrequest.onreadystatechange = function() {

  if (searchid.length == 0)

  {

    return;

  }

  if (this.readyState == 4 && this.status == 200)

  {

    console.log(this.responseText);

    var arr = JSON.parse(this.responseText);

    // console.log(arr)

    document.getElementById("contractno").value = arr[0];

    document.getElementById("memberid").value = arr[1];

    document.getElementById("date").value = arr[2];

    document.getElementById("lastname").value = arr[3];

    document.getElementById("firstname").value = arr[4];

    document.getElementById("middlename").value = arr[5];

    document.getElementById("suffix").value = arr[6];

    document.getElementById("address").value = arr[7];

    document.getElementById("province").value = arr[8];



    $('#city').ph_locations('fetch_list', [{
      "province_code": `${arr[8]}`
    }]);

    $('#barangay').ph_locations('fetch_list', [{
      "city_code": `${arr[9]}`
    }]);

    setTimeout(() => {

      document.getElementById("barangay").value = `${arr[10]}`;

    }, 500)



    document.getElementById("zipcode").value = arr[11];

    document.getElementById("bday").value = arr[12];

    document.getElementById("age").value = arr[13];

    document.getElementById("bplace").value = arr[14];

    document.getElementById("gender").value = arr[15];

    document.getElementById("civilstatus").value = arr[16];

    document.getElementById("number").value = arr[17];

    document.getElementById("email").value = arr[18];

    document.getElementById("height").value = arr[19];

    document.getElementById("weight").value = arr[20];





    $('#city').ph_locations('fetch_list', [{
      "province_code": `${arr[8]}`
    }]);

    $('#barangay').ph_locations('fetch_list', [{
      "city_code": `${arr[9]}`
    }]);

    setTimeout(() => {

      document.getElementById("barangay").value = `${arr[10]}`;

    }, 500)





    //Primary

    document.getElementById("pname").value = arr[21];

    document.getElementById("p_relationship").value = arr[22];

    document.getElementById("page").value = arr[23];

    document.getElementById("pbday").value = arr[24];

    //Contingent

    document.getElementById("cname").value = arr[25];

    document.getElementById("c_relationship").value = arr[26];

    document.getElementById("cage").value = arr[27];

    document.getElementById("cbday").value = arr[28];

    //Agent

    document.getElementById("agent_id").value = arr[29];

    document.getElementById("afullname").value = arr[30];

    document.getElementById("aposition").value = arr[31];



    //Plan type

    document.getElementById("plan_type").value = arr[32];

    document.getElementById("modeofpayment").value = arr[33];

    document.getElementById("amounttopay").value = arr[34];

    document.getElementById("numberperpay").value = arr[35];

    document.getElementById("amountperpay").value = arr[36];

    document.getElementById("totalamount").value = arr[37];



    //Health Status



    // document.getElementById("num1").checked = arr[38] > 0 ? true : false;

    var radio1 = arr[38] > 0 ? document.getElementById("yes1") : document.getElementById("no1");

    radio1.checked = true;

    var radio2 = arr[39] > 0 ? document.getElementById("yes2") : document.getElementById("no2");

    radio2.checked = true;

    var radio3 = arr[40] > 0 ? document.getElementById("yes3") : document.getElementById("no3");

    radio3.checked = true;

    var radio4 = arr[41] > 0 ? document.getElementById("yes4") : document.getElementById("no4");

    radio4.checked = true;

    var radio5 = arr[42] > 0 ? document.getElementById("yes5") : document.getElementById("no5");

    radio5.checked = true;

    var radio6 = arr[43] > 0 ? document.getElementById("yes6") : document.getElementById("no6");

    radio6.checked = true;

    var radio7 = arr[44] > 0 ? document.getElementById("yes7") : document.getElementById("no7");

    radio7.checked = true;

    var radio8 = arr[45] > 0 ? document.getElementById("yes8") : document.getElementById("no8");

    radio8.checked = true;

    var radio9 = arr[46] > 0 ? document.getElementById("yes9") : document.getElementById("no9");

    radio9.checked = true;

    var radio10 = arr[47] > 0 ? document.getElementById("yes10") : document.getElementById("no10");

    radio10.checked = true;

    var radio11 = arr[48] > 0 ? document.getElementById("yes11") : document.getElementById("no11");

    radio11.checked = true;

    var radio12 = arr[49] > 0 ? document.getElementById("yes12") : document.getElementById("no12");

    radio12.checked = true;

    var radio13 = arr[50] > 0 ? document.getElementById("yes13") : document.getElementById("no13");

    radio13.checked = true;

    var radio14 = arr[51] > 0 ? document.getElementById("yes14") : document.getElementById("no14");

    radio14.checked = true;

    var radio15 = arr[52] > 0 ? document.getElementById("yes15") : document.getElementById("no15");

    radio15.checked = true;

    var radio16 = arr[53] > 0 ? document.getElementById("yes16") : document.getElementById("no16");

    radio16.checked = true;

    var radio17 = arr[54] > 0 ? document.getElementById("yes17") : document.getElementById("no17");

    radio17.checked = true;

    var radio18 = arr[55] > 0 ? document.getElementById("yes18") : document.getElementById("no18");

    radio18.checked = true;

    var radio19 = arr[56] > 0 ? document.getElementById("yes19") : document.getElementById("no19");

    radio19.checked = true;

    document.getElementById("num20").value = arr[57];





    // console.log(document.getElementById("number"))

  }

}

webrequest.open("GET", "autofill.php?searchid=" + searchid, true);

webrequest.send();



}
// START OF OF SEARCH FUN FUNCTION


// For Dependent Radio Button
document.getElementById('Dependent').onclick = function() {
document.getElementById('independent').removeAttribute('readonly');

}

document.getElementById('Dependent1').onclick = function() {
$('#independent').attr('readonly', true);

}
// End Of Radio Button



document.getElementById('mem_Edit').onclick = function() {



document.getElementById("contractno").readOnly = false;

document.getElementById("date").readOnly = false;

document.getElementById("lastname").readOnly = false;

document.getElementById("firstname").readOnly = false;

document.getElementById("middlename").readOnly = false;

document.getElementById("suffix").readOnly = false;

document.getElementById("address").readOnly = false;

$('#province').attr('disabled', false);

$('#city').attr('disabled', false);

$('#barangay').attr('disabled', false);

document.getElementById("zipcode").readOnly = false;

document.getElementById("bday").readOnly = false;

document.getElementById("age").readOnly = false;

document.getElementById("bplace").readOnly = false;

$('#gender').attr('disabled', false);

$('#civilstatus').attr('disabled', false);

document.getElementById("number").readOnly = false;

document.getElementById("email").readOnly = false;

document.getElementById("height").readOnly = false;

document.getElementById("weight").readOnly = false;

//Primary

document.getElementById("pname").readOnly = false;

$('#p_relationship').attr('disabled', false);

document.getElementById("page").readOnly = false;

document.getElementById("pbday").readOnly = false;

//Contingent

document.getElementById("cname").readOnly = false;

$('#c_relationship').attr('disabled', false);

document.getElementById("cage").readOnly = false;

document.getElementById("cbday").readOnly = false;

//Agent

document.getElementById("agent_id").readOnly = false;

//Plan type

$('#plantype').attr('disabled', false);

$('#modeofpayment').attr('disabled', false);



document.getElementById("yes1").disabled = false;

document.getElementById("no1").disabled = false;

document.getElementById("yes2").disabled = false;

document.getElementById("no2").disabled = false;

document.getElementById("yes3").disabled = false;

document.getElementById("no3").disabled = false;

document.getElementById("yes4").disabled = false;

document.getElementById("no4").disabled = false;

document.getElementById("yes5").disabled = false;

document.getElementById("no5").disabled = false;

document.getElementById("yes6").disabled = false;

document.getElementById("no6").disabled = false;

document.getElementById("yes7").disabled = false;

document.getElementById("no7").disabled = false;

document.getElementById("yes8").disabled = false;

document.getElementById("no8").disabled = false;

document.getElementById("yes9").disabled = false;

document.getElementById("no9").disabled = false;

document.getElementById("yes10").disabled = false;

document.getElementById("no10").disabled = false;

document.getElementById("yes11").disabled = false;

document.getElementById("no11").disabled = false;

document.getElementById("yes12").disabled = false;

document.getElementById("no12").disabled = false;

document.getElementById("yes13").disabled = false;

document.getElementById("no13").disabled = false;

document.getElementById("yes14").disabled = false;

document.getElementById("no14").disabled = false;

document.getElementById("yes15").disabled = false;

document.getElementById("no15").disabled = false;

document.getElementById("yes16").disabled = false;

document.getElementById("no16").disabled = false;

document.getElementById("yes17").disabled = false;

document.getElementById("no17").disabled = false;

document.getElementById("yes18").disabled = false;

document.getElementById("no18").disabled = false;

document.getElementById("yes19").disabled = false;

document.getElementById("no19").disabled = false;

document.getElementById("num20").readOnly = false;



document.getElementById("Submit").style.display = "none";

document.getElementById("Update").disabled = false;

document.getElementById("reset").disabled = false;

};
</script>



<!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->

<script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>

<script type="text/javascript">
var my_handlers = {

fill_cities: function() {



  var province_code = $(this).val();

  $('#city').ph_locations('fetch_list', [{
    "province_code": province_code
  }]);

},



fill_barangays: function() {



  var city_code = $(this).val();

  $('#barangay').ph_locations('fetch_list', [{
    "city_code": city_code
  }]);

}

};



$(function() {



$('#province').on('change', my_handlers.fill_cities);

$('#city').on('change', my_handlers.fill_barangays);





$('#province').ph_locations({
  'location_type': 'provinces'
});

$('#city').ph_locations({
  'location_type': 'cities'
});

$('#barangay').ph_locations({
  'location_type': 'barangays'
});



$('#province').ph_locations('fetch_list');

});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
function FetchState(id) {

$('#city').html('');
$('#barangay').html('<option>Choose Municipality First</option>');
$.ajax({
  type: 'post',
  url: 'ajaxdata.php',
  data: {
    country_id: id
  },
  success: function(data) {
    $('#town_city').html(data);
  }

})
}

function FetchCity(id) {
$('#barangay').html('');
$.ajax({
  type: 'post',
  url: 'ajaxdata.php',
  data: {
    state_id: id
  },
  success: function(data) {
    $('#barangay_textfield').html(data);
  }

})
}
</script>

<script>
function Fetchdata(id) {
$('#modeofpayment').html('');
$.ajax({
  type: 'post',
  url: 'modeofpayment.php',
  data: {
    state_id: id
  },
  success: function(data) {
    $('#modeofpayment').html(data);
  }

})
}
</script>
<script>
function GetDetail(str) {
if (str.length == 0) {
  document.getElementById("amounttopay").value = "";
  document.getElementById("noofmonthstopay").value = "";
  document.getElementById("totalamount").value = "";

  return;
} else {

  // Creates a new XMLHttpRequest object
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    var dropboxvalue = document.getElementById("plantype").value;
    var myid = dropboxvalue;

    // Defines a function to be called when
    // the readyState property changes
    if (this.readyState == 4 &&
      this.status == 200) {
      console.log(this.responseText);

      // Typical action to be performed
      // when the document is ready
      var myObj = JSON.parse(this.responseText);
      // Returns the response data as a
      // string and store this array in
      // a variable assign the value
      // received to first name input field
      document.getElementById("amounttopay").value = myObj[0];
      document.getElementById("noofmonthstopay").value = myObj[1];
      document.getElementById("totalamount").value = myObj[2];

      // Assign the value received to
      // last name input field
    }
  };

  // xhttp.open("GET", "filename", true);
  xmlhttp.open("GET", "amounttopay.php?myid=" + str, true);

  // Sends the request to the server
  xmlhttp.send();
}
}
</script>



<!-- START OF FOOTER -->
<footer>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 mt-3">
                <h6 class="text-center p-1 text-dark">2023 @ Pateros Technological College</h6>
            </div>
        </div>
    </div>
</footer>
<!-- END OF FOOTER -->

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</body>

</html>


 <script>
  $(document).ready(function(){
   $('#username_textfield').blur(function(){

   var member_username = $(this).val();
    $.ajax({
     url:'checkmember.php',
     method:"POST",
     data:{user_name:member_username},
      success:function(data)
   {
    //    alert(data);
        if(data != '000')
        {
         $('#availability2').html('<span class="text-danger" id="username_validity">User Existing</span>');
         $('#Submit').attr("disabled", true);

        }
        else
        {
         $('#availability2').html('<span class="text-success" id="username_validity">Username Available</span>');
         $('#Submit').attr("disabled", false);

        }
       }
     })

   });
  });
 </script>

<script>
 $(document).ready(function(){
   $('#agent_id').blur(function(){

     var agent_id = $(this).val();

     $.ajax({
      url:'checkagent.php',
      method:"POST",
      data:{agent:agent_id},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability1').html('<span class="text-success">Valid');
        $('#Submit').attr("disabled", false);

       }
       else
       {
        $('#availability1').html('<span class="text-danger">Agent ID Not Found');
        $('#Submit').attr("disabled", true);

       }
      }
     })

  });
 });
</script>

<script>
 $(document).ready(function(){
   $('#agent_username').blur(function(){

     var agent_username = $(this).val();

     $.ajax({
      url:'checkusename.php',
      method:"POST",
      data:{username:agent_username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-success" id="affiliate_code_validity">Valid');
        $('#Submit').attr("disabled", false);

       }
       else
       {
        $('#availability').html('<span class="text-danger" id="affiliate_code_validity">Coupon Not Found');
        $('#Submit').attr("disabled", true);

       }
      }
     })

  });
 });
</script>



<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<!-- If using a CDN -->

<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script> -->
<script type="text/javascript">
        function select_data_using_order_id(action){
        $(document).ready(function(){
            var data = {
            action: action,
            order_id: $("#order_id").val(),
            };

            $.ajax({
            url: 'index_ajax.php',
            type: 'post',
            data: data,
            success:function(response){

                var parsedResponse = JSON.parse(response);

                
                if(parsedResponse[7] == "Order_ID_not_found")
                {
                    Swal.fire({
                        title: "Invalid!",
                        text: "Order ID is not found",
                        icon: 'error',
                        confirmButtonText: 'Okay'
                    });
                    document.getElementById("firstname").value = parsedResponse[0];
                    document.getElementById("firstname").style.backgroundColor = "white";
                        
                    document.getElementById("lastname").value = parsedResponse[1];
                    document.getElementById("lastname").style.backgroundColor = "white";

                    document.getElementById("street_address").value = parsedResponse[2];
                    document.getElementById("street_address").style.backgroundColor = "white";

                    document.getElementById("town_city").value = parsedResponse[3];
                    document.getElementById("town_city").style.backgroundColor = "white";

                    document.getElementById("postcode").value = parsedResponse[4];
                    document.getElementById("postcode").style.backgroundColor = "white";

                    document.getElementById("email").value = parsedResponse[5];
                    document.getElementById("email").style.backgroundColor = "white";

                    document.getElementById("number").value = parsedResponse[6];
                    document.getElementById("number").style.backgroundColor = "white";
                }
                else
                {
                    document.getElementById("firstname").value = parsedResponse[0];
                    document.getElementById("firstname").style.backgroundColor = "#E8F0FE";
                        
                    document.getElementById("lastname").value = parsedResponse[1];
                    document.getElementById("lastname").style.backgroundColor = "#E8F0FE";

                    document.getElementById("street_address").value = parsedResponse[2];
                    document.getElementById("street_address").style.backgroundColor = "#E8F0FE";

                    document.getElementById("town_city").value = parsedResponse[3];
                    document.getElementById("town_city").style.backgroundColor = "#E8F0FE";

                    document.getElementById("postcode").value = parsedResponse[4];
                    document.getElementById("postcode").style.backgroundColor = "#E8F0FE";

                    document.getElementById("email").value = parsedResponse[5];
                    document.getElementById("email").style.backgroundColor = "#E8F0FE";

                    document.getElementById("number").value = parsedResponse[6];
                    document.getElementById("number").style.backgroundColor = "#E8F0FE";
                }
                
                // Swal.fire({
                //     title: parsedResponse[0],
                //     text: parsedResponse[1],
                //     icon: 'success',
                //     confirmButtonText: 'Okay'
                // });

                close_loading();
            }
            });
        });
        }
</script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function submitMember_function()
    {
        if (document.getElementById("username_textfield").value.trim() == "")
        {
            document.getElementById("username_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("username_textfield").reportValidity();
            Swal.fire(
              'Invalid!',
              'Please put your username!',
              'error'
            )
        }
        else if (document.getElementById("username_textfield").value.trim().length < 5)
        {
            document.getElementById("username_textfield").setCustomValidity("Username must be at least 5 characters long.");
            document.getElementById("username_textfield").reportValidity();
            Swal.fire(
              'Invalid!',
              'Username must be at least 5 characters long!',
              'error'
            )
        }
        else if (document.getElementById("username_textfield").value.trim().length > 18)
        {
            document.getElementById("username_textfield").setCustomValidity("Username must be 18 characters or less.");
            document.getElementById("username_textfield").reportValidity();
            Swal.fire(
              'Invalid!',
              'Username must be 18 characters or less!',
              'error'
            )
        }
        else if (document.getElementById("password_textfield").value == "")
        {
            document.getElementById("password_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("password_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your password!',
              'error'
            )
        }
        else if (document.getElementById("confirm_password_textfield").value == "")
        {
            document.getElementById("confirm_password_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("confirm_password_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your confirm password!',
              'error'
            )
        }
        else if (document.getElementById("confirm_password_textfield").value !== document.getElementById("password_textfield").value) {
            document.getElementById("confirm_password_textfield").setCustomValidity("Passwords do not match");
            document.getElementById("confirm_password_textfield").reportValidity();

            Swal.fire(
                'Invalid!',
                'Passwords are not the same!',
                'error'
            );
        }
        else if (document.getElementById("student_number_textfield").value.trim() == "")
        {
            document.getElementById("student_number_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("student_number_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Student Number!',
              'error'
            )
        }
        else if (document.getElementById("institute_email_textfield").value.trim() == "")
        {
            document.getElementById("institute_email_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("institute_email_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Institute Email!',
              'error'
            )
        }
        else if (!document.getElementById("institute_email_textfield").value.endsWith("@paterostechnologicalcollege.edu.ph"))
        {
            document.getElementById("institute_email_textfield").setCustomValidity("Email must end with @paterostechnologicalcollege.edu.ph.");
            document.getElementById("institute_email_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Email is invalid! You must put your Institute Email!',
              'error'
            )
        }
        else if (document.getElementById("student_type_dropdownlist").value.trim() == "")
        {
            document.getElementById("student_type_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("student_type_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Student Type!',
              'error'
            )
        }
        else if (document.getElementById("course_textfield").value.trim() == "")
        {
            document.getElementById("course_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("course_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Course!',
              'error'
            )
        }
        else if (document.getElementById("first_name_textfield").value.trim() == "")
        {
            document.getElementById("first_name_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("first_name_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your First Name!',
              'error'
            )
        }
        else if (document.getElementById("last_name_textfield").value.trim() == "")
        {
            document.getElementById("last_name_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("last_name_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Last Name!',
              'error'
            )
        }
        else if (document.getElementById("gender_dropdownlist").value.trim() == "")
        {
            document.getElementById("gender_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("gender_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Gender!',
              'error'
            )
        }
        else if (document.getElementById("birthday_textfield").value.trim() == "")
        {
            document.getElementById("birthday_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("birthday_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Birthday!',
              'error'
            )
        }
        else if (document.getElementById("street_address_textfield").value.trim() == "")
        {
            document.getElementById("street_address_textfield").setCustomValidity("Please fill out this field.");
            document.getElementById("street_address_textfield").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please put your Street Address!',
              'error'
            )
        }
        else if (document.getElementById("province_dropdownlist").value.trim() == "")
        {
            document.getElementById("province_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("province_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Province!',
              'error'
            )
        }
        else if (document.getElementById("town_city_dropdownlist").value.trim() == "")
        {
            document.getElementById("town_city_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("town_city_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Town / City!',
              'error'
            )
        }
        else if (document.getElementById("barangay_dropdownlist").value.trim() == "")
        {
            document.getElementById("barangay_dropdownlist").setCustomValidity("Please fill out this field.");
            document.getElementById("barangay_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please select your Barangay!',
              'error'
            )
        }
        else if (!document.getElementById("agree_checkbox").checked)
        {
            // document.getElementById("barangay_dropdownlist").setCustomValidity("Please fill out this field.");
            // document.getElementById("barangay_dropdownlist").reportValidity();

            Swal.fire(
              'Invalid!',
              'Please Agree to terms and conditions!',
              'error'
            )
        }
        else 
        {
          open_loading();
          var data = 
          {
            action1: 'student_registration_ajax',
            username_textfield: document.getElementById("username_textfield").value.trim(),
            password_textfield: document.getElementById("password_textfield").value,
            student_number_textfield: document.getElementById("student_number_textfield").value.trim(),
            institute_email_textfield: document.getElementById("institute_email_textfield").value.trim(),
            student_type_dropdownlist: document.getElementById("student_type_dropdownlist").value.trim(),
            course_textfield: document.getElementById("course_textfield").value.trim(),
            first_name_textfield: document.getElementById("first_name_textfield").value.trim(),
            middle_name_textfield: document.getElementById("middle_name_textfield").value.trim(),
            last_name_textfield: document.getElementById("last_name_textfield").value.trim(),
            suffix_textfield: document.getElementById("suffix_textfield").value.trim(),
            gender_dropdownlist: document.getElementById("gender_dropdownlist").value.trim(),
            birthday_textfield: document.getElementById("birthday_textfield").value.trim(),
            contact_no_textfield: document.getElementById("contact_no_textfield").value.trim(),
            street_address_textfield: document.getElementById("street_address_textfield").value.trim(),
            province_dropdownlist: document.getElementById("province_dropdownlist").value.trim(),
            town_city_dropdownlist: document.getElementById("town_city_dropdownlist").value.trim(),
            barangay_dropdownlist: document.getElementById("barangay_dropdownlist").value.trim(),
            postcode_textfield: document.getElementById("postcode_textfield").value.trim(),
          };

          $.ajax({
            url: 'registration_form_ajax.php',
            type: 'post',
            data: data,

            success:function(response){
              // alert(response);
              
              if(response.trim() == "username_existing")
              {
                setTimeout(function() {
                    Swal.fire(
                        'Invalid!',
                        'Username already exists! Please try a different one!',
                        'error'
                    );
                    close_loading();
                    document.getElementById("username_textfield").scrollIntoView();
                    document.getElementById("username_textfield").focus();
                }, 1000);
              }
              else
              {
                var loginPageURL = '../login/login.php';
                window.location.href = loginPageURL;
              }
            }
              
          });
        }
    }

    function select_province_ajax()
    {
      // alert(document.getElementById("province_dropdownlist").value);

      var data = 
      {
        action1: 'select_province_ajax',
        province_dropdownlist: document.getElementById("province_dropdownlist").value,
      };

      $.ajax({
        url: 'registration_form_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          // alert(response); //alert metro manila
          document.getElementById("town_city_dropdownlist").innerHTML = response;
          document.getElementById("barangay_dropdownlist").innerHTML = "";
        }

      });
    }

    function select_town_city_ajax()
    {
      // alert(document.getElementById("town_city_dropdownlist").value);
      
      var data = 
      {
        action1: 'select_town_city_ajax',
        town_city_dropdownlist: document.getElementById("town_city_dropdownlist").value,
      };

      $.ajax({
        url: 'registration_form_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          // alert(response); //alert metro manila
          document.getElementById("barangay_dropdownlist").innerHTML = response;
        }

      });
    }
</script>
