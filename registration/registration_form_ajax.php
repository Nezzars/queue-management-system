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
        '" . password_hash($password_textfield, PASSWORD_DEFAULT) . "',
        '$student_number_textfield',
        '$institute_email_textfield',
        '$student_type_dropdownlist',
        '$course_textfield',
        '$last_name_textfield, $first_name_textfield $middle_name_textfield $suffix_textfield',
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
        $cities .= "<option value='".$row['City']."'>".$row['City']."</option>";
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
        $brgy .= "<option value='".$row['Barangay']."'>".$row['Barangay']."</option>";
    }
    
    echo $brgy; //metro manila
  }
?>