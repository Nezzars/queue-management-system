<?php
  require '../connections/my_cnx.php';

  if($_POST["action1"] == "student_registration_ajax")
  {
    global $con;
    session_start();
    $username_textfield = $_POST["username_textfield"];
    $password_textfield = $_POST["password_textfield"];
    $student_number_textfield = $_POST["student_number_textfield"];
    $institute_email_textfield = $_POST["institute_email_textfield"];
    $student_type_dropdownlist = $_POST["student_type_dropdownlist"];
    $course_textfield = $_POST["course_textfield"];
    $first_name_textfield = $_POST["first_name_textfield"];
    $middle_name_textfield = $_POST["middle_name_textfield"];
    $last_name_textfield = $_POST["last_name_textfield"];
    $suffix_textfield = $_POST["suffix_textfield"];
    $gender_dropdownlist = $_POST["gender_dropdownlist"];
    $birthday_textfield = $_POST["birthday_textfield"];
    $contact_no_textfield = $_POST["contact_no_textfield"];
    $street_address_textfield = $_POST["street_address_textfield"];
    $province_dropdownlist = $_POST["province_dropdownlist"];
    $town_city_dropdownlist = $_POST["town_city_dropdownlist"];
    $barangay_dropdownlist = $_POST["barangay_dropdownlist"];
    $postcode_textfield = $_POST["postcode_textfield"];
    $existing_username = false;

    $sql = "  SELECT * FROM ptc_student_users WHERE username='$username_textfield';  ";
		$result = mysqli_query($con, $sql);
    if($row = mysqli_fetch_assoc($result)) //if meron
    {
      $existing_username = true;
    }

    if($existing_username == false)
    {
      $query = "INSERT INTO ptc_student_users VALUES
      (
        '', 
        '$username_textfield', 
        '" . $password_textfield . "',
        '$student_number_textfield',
        '$institute_email_textfield',
        '$student_type_dropdownlist',
        '$course_textfield',
        '$first_name_textfield $last_name_textfield',
        '$first_name_textfield',
        '$middle_name_textfield',
        '$last_name_textfield',
        '$suffix_textfield',
        '$gender_dropdownlist',
        '$birthday_textfield',
        '$contact_no_textfield',
        '$street_address_textfield',
        '$province_dropdownlist',
        '$town_city_dropdownlist',
        '$barangay_dropdownlist',
        '$postcode_textfield'
        
      )";
      mysqli_query($con, $query);
      
      $_SESSION['kaka_create_lang'] = true;
      // $loginPageURL = '../login/login.php';
      // header("Location: $loginPageURL");
      echo "username_doesntexist";
    }
    else
    {
      echo "username_existing";
    }

    // echo $username_textfield; //metro manila
  }

  if($_POST["action1"] == "select_province_ajax")
  {
    global $con;
    $province_dropdownlist = $_POST["province_dropdownlist"]; //metro manila

    $cities = "";
    $cities .= '<option value="" disabled selected>Choose...</option>';
    $sql = "  SELECT DISTINCT City FROM ptc_setupaddress WHERE province='$province_dropdownlist';  ";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
      $cittty = trim($row['City']);
        $cities .= "<option value='$cittty'>$cittty</option>";
    }
    
    echo $cities; //metro manila
  }

  if($_POST["action1"] == "select_town_city_ajax")
  {
    global $con;
    $town_city_dropdownlist = $_POST["town_city_dropdownlist"]; //metro manila

    $brgy = "";
    $brgy .= '<option value="" disabled selected>Choose...</option>';
    $sql = "  SELECT DISTINCT Barangay FROM ptc_setupaddress WHERE City='$town_city_dropdownlist';  ";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $baranggayy = trim($row['Barangay']);
        $brgy .= "<option value='$baranggayy'>$baranggayy</option>";
    }
    
    echo $brgy; //metro manila
  }

  if($_POST['action1'] == "check_username_if_exists")
  {
    global $con;
    $username_textfield = $_POST['username_textfield'];

    $sql = "  SELECT * FROM ptc_student_users WHERE username='$username_textfield';  ";
		$result = mysqli_query($con, $sql);
    if($row = mysqli_fetch_assoc($result)) //if meron
    {
      echo "existing_username";
    }
    else
    {
      echo "not_existing_username";
    }
  }

  //send OTP
  require  '../vendor/autoload.php';
  use Twilio\Rest\Client;

  //first account
  // $twilioPhone = "18507530133";
  // $sid = "AC1a55ce90b6df52a87de2cff98bb098c1";
  // $token = "ec413c60e195e794d705882956748e27";
  
  // second account
  $twilioPhone = "+12513337861";
  $sid = "ACe9f1ca273d7335b107e86d0c152342f2";
  $token = "6f915ca33fae37e272320b83e768a6e8";

  if($_POST['action1'] == "send_otp_to_contact_no")
  {
    global $sid, $token, $twilioPhone;
    $localNumber = $_POST['contact_no_textfield'];
    $otp = $_POST['otp'];
    $phoneNumber = "+63" . substr($localNumber, 1);

    $message = "Your OTP is: ".$otp.". Please use this OTP to verify your account.";
    $to = $phoneNumber;
    $from = "";

    $response = [];

    if ($from == "") {
      $from = $twilioPhone;
    }


    $client = new Client($sid, $token);

    try {
      $client->messages->create(
        $to,
        array(
          'from' => $from,
          'body' => $message,
        )
      );
      $response['success'] = true;
      $status = "Success";
      $response['message'] = $status;
    } catch (\Exception $e) {
      $status = "Failed:" . $e->getMessage();
      $response['success'] = false;
      $response['message'] = $status;
    }
    
    $response1 = json_encode($response);
    echo $response1;

    // echo $response;
  }
?>