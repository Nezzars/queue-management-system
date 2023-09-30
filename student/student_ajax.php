<?php
  require '../connections/my_cnx.php';

  if($_POST["action"] == "insert_appointment")
  {
    global $con;
    session_start();
    $username = $_POST["username"];
    $transcript_of_record_checkbox = $_POST["transcript_of_record_checkbox"];
    $certificate_of_grades_checkbox = $_POST["certificate_of_grades_checkbox"];
    $certified_true_copy_checkbox = $_POST["certified_true_copy_checkbox"];
    $form_137_checkbox = $_POST["form_137_checkbox"];
    $certificate_as_students_checkbox = $_POST["certificate_as_students_checkbox"];
    $honorable_dismissal_checkbox = $_POST["honorable_dismissal_checkbox"];
    $cav_checkbox = $_POST["cav_checkbox"];
    $certificate_of_subject_or_course_description_checkbox = $_POST["certificate_of_subject_or_course_description_checkbox"];
    $certificate_of_units_earned_checkbox = $_POST["certificate_of_units_earned_checkbox"];
    $others_textfield = $_POST["others_textfield"];
    $purpose_of_request_textfield = $_POST["purpose_of_request_textfield"];
    $date_hidden = $_POST["date_hidden"];

    $sql = "  SELECT * FROM ptc_student_appointments WHERE username='$username' AND datee='$date_hidden';  ";
    $result = mysqli_query($con, $sql);
    $merong_existing = false;

    while($row = mysqli_fetch_assoc($result))
    {
        $merong_existing = true;
    }

    if($merong_existing == false)
    {
        $sql = "  SELECT * FROM ptc_student_appointments_history WHERE datee='$date_hidden';  ";
        $result = mysqli_query($con, $sql);
        $total_students_is_50 = false;

        if($row = mysqli_fetch_assoc($result))
        {
            if($row['total_students'] >= 50)
            {
                $total_students_is_50 = true;
            }
        }

        if($total_students_is_50 == false)
        {
            $requested_documentss = "";
            if($transcript_of_record_checkbox == "true")
            {
                $requested_documentss .= "Transcript of Record(TOR)";
            }
            if($certificate_of_grades_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Certificate of grades(COG)";
                else
                    $requested_documentss .= " --- Certificate of grades(COG)";
            }
            if($certified_true_copy_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Certified True Copy(CTC)";
                else
                    $requested_documentss .= " --- Certified True Copy(CTC)";
            }
            if($form_137_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Form 137";
                else
                    $requested_documentss .= " --- Form 137";
            }
            if($certificate_as_students_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Certificate as Students";
                else
                    $requested_documentss .= " --- Certificate as Students";
            }
            if($honorable_dismissal_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Honorable Dismissal";
                else
                    $requested_documentss .= " --- Honorable Dismissal";
            }
            if($cav_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "CAV";
                else
                    $requested_documentss .= " --- CAV";
            }
            if($certificate_of_subject_or_course_description_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Certificate of Subject/Course Description";
                else
                    $requested_documentss .= " --- Certificate of Subject/Course Description";
            }
            if($certificate_of_units_earned_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Certificate of Units Earned";
                else
                    $requested_documentss .= " --- Certificate of Units Earned";
            }
            if($others_textfield != "")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Others: $others_textfield";
                else
                    $requested_documentss .= " --- Others: $others_textfield";
            }

            $query = "INSERT INTO ptc_student_appointments VALUES('', '$username', '$requested_documentss', '$purpose_of_request_textfield', 'PENDING', '', '$date_hidden')";
            mysqli_query($con, $query);
    
            $sql = "  SELECT * FROM ptc_student_appointments_history WHERE datee='$date_hidden';  ";
            $result = mysqli_query($con, $sql);
    
            if($row = mysqli_fetch_assoc($result))
            {
                $total_students = $row['total_students'];
                $total_students+=1;
    
                $sql = "UPDATE `ptc_student_appointments_history` SET total_students = '$total_students' WHERE datee='$date_hidden'";
                mysqli_query($con, $sql);
            }
            else
            {
                $query = "INSERT INTO ptc_student_appointments_history VALUES('', '1', '$date_hidden')";
                mysqli_query($con, $query);
            }
    
            $_SESSION['kakasubmit_lang_ng_appointment'] = true;
            
            // echo " - ".$transcript_checkbox." - ".$diploma_checkbox." - ".$form_137_checkbox." - ".$honorable_dismissal_checkbox." - ".$good_moral_character_checkbox." - ".$others_textfield." - ".$purpose_of_request_textfield." - ".$date_hidden;
    
            // $sql = "SELECT * FROM ptc_student_appointments_history";
            // $result = mysqli_query($con, $sql);
    
            // $total_students = array(); //laman neto lahat ng total_students //2, 2, 2
            // $total_students_index = 0;
    
            // $datee = array();   //laman neto lahat ng datee //2023-08-30, 2023-08-24, 2023-08-28
            // $datee_index = 0;
            
            // while ($row = mysqli_fetch_assoc($result)) 
            // {
            //     $datee[$datee_index] = $row['datee'];
            //     $datee_index++;
    
            //     $total_students[$total_students_index] = $row['total_students'];
            //     $total_students_index++;
            // }
            
            // $ifs = "if (eventDate.format('YYYY-MM-DD') == '0000-00-00') {var event = {title: '2/50',start: eventDate.format('YYYY-MM-DD'),classNames: ['fc-event-slot-available'],iconClass: 'fa fa-solid fa-check'};}";
    
            // for ($i = 0; $i < count($datee); $i++) 
            // {
            //     if($total_students[$i] == "50")
            //     {
            //         $classNames = "fc-event-no-slot-available";
            //         $iconClass = "fa fa-solid fa-x";
            //     }
            //     else
            //     {
            //         $classNames = "fc-event-slot-available";
            //         $iconClass = "fa fa-solid fa-check";
            //     }
    
            //     $ifs .= "else if (eventDate.format('YYYY-MM-DD') == '" . $datee[$i] . "') {var event = {title: '".$total_students[$i]."/50',start: eventDate.format('YYYY-MM-DD'),classNames: ['".$classNames."'],iconClass: '".$iconClass."'};}";
            // }
            
            
            // echo "<script>
            //     alert('" . $ifs . "');
            //   </script>";
    
            $echos = array();
            // $echos[0] = $ifs;
    
            $echos[1] = "submit_success";
            // $echos[2] = "
            
            // ";
            // $echos[2] = "alert('5678');";
            $response = json_encode($echos);
            echo $response;
        }
        else
        {
            $echos = array();
            $echos[1] = "submit_failed_because_of_total_students_is_50";
            $response = json_encode($echos);
            echo $response;
        }
    }
    else
    {
        $echos = array();
        $echos[1] = "submit_failed";
        $response = json_encode($echos);
        echo $response;
    }
  }

  if($_POST["action"] == "select_total_students_if_50")
  {
    global $con;
    $datee = $_POST["datee"];
    // $emailqwe = $_POST["email"];
    // $genderqwe = $_POST["gender"];

    $sql = "  SELECT * FROM ptc_student_appointments_history WHERE datee='$datee';  ";
    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result))
    {
        echo $row['total_students'];
    }
  }

  if($_POST["action"] == "cancel_appointment")
  {
    global $con;
    session_start();
    $id = $_POST["id"];
    $datee = $_POST["datee"];

    $query = "DELETE FROM `ptc_student_appointments` WHERE id = '$id' AND datee = '$datee'";
    mysqli_query($con, $query);

    $sql = "  SELECT * FROM ptc_student_appointments_history WHERE datee='$datee';  ";
    $result = mysqli_query($con, $sql);
    $total_studentss = "";

    if($row = mysqli_fetch_assoc($result))
    {
        $total_studentss = $row['total_students'];
    }

    if (intval($total_studentss) <= 1) 
    {
        $query = "DELETE FROM `ptc_student_appointments_history` WHERE datee = '$datee'";
        mysqli_query($con, $query);
    }
    else
    {
        $total_studentss = $total_studentss - 1;
        $sql = "UPDATE `ptc_student_appointments_history` SET total_students = '$total_studentss' WHERE datee='".$datee."'";
        mysqli_query($con, $sql);
    }

    $_SESSION['kakacancel_lang_ng_appointment'] = true;
    echo "delete_success";
    // echo $id . " and " . $datee;
  }

  if($_POST["action"] == "show_qr_code_in_appointments")
  {
    global $con;
    $id = $_POST["id"];
    $datee = $_POST["datee"];

    $sql = "  SELECT * FROM ptc_student_appointments WHERE id='$id' AND datee='$datee';  ";
    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result))
    {
        $requested_documents = $row['requested_documents'];
        $requested_documents = str_replace('---', ', ', $requested_documents);
        $requested_documents_array = explode(", ", $requested_documents);

        $formattedDate = date("F j, Y", strtotime($datee));

        // echo "Ilove you julia"

        echo "Appointment Schedule: \n";
        echo "   - ".$formattedDate;
        echo "\n\n";

        echo "Requested Documents: \n";
        for ($i=0; $i < count($requested_documents_array); $i++) 
        {
            echo "   - ".$requested_documents_array[$i];
            echo "\n";
        }
        echo "\n";

        echo "Purpose of Request: \n";
        echo "   - ".$row['purpose_of_request'];
        echo "\n\n";

        $usernamee = $row['username'];
        $sql1 = "  SELECT * FROM ptc_student_users WHERE username='$usernamee';  ";
        $result1 = mysqli_query($con, $sql1);
        if($row1 = mysqli_fetch_assoc($result1))
        {
            echo "Student Details: \n";
            echo "   - Full Name: ".$row1['first_name']." ".$row1['last_name']."\n";
            echo "   - Student Number: ".$row1['student_number']."\n";
            echo "   - Course: ".$row1['course']."\n";
            echo "   - Student Type: ".$row1['student_type']."\n";
            echo "   - Institute Email: ".$row1['institute_email']."\n";
            echo "\n\n";
        }

        
    }

    // $query = "INSERT INTO users VALUES('', '$nameqwe', '$emailqwe', '$genderqwe')";
    // mysqli_query($con, $query);
  }

  if($_POST["action"] == "submit_review")
  {
    global $con;
    session_start();
    $stars = $_POST["stars"];
    $experience_textfield = $_POST["experience_textfield"];
    $username = $_POST["username"];

    $sql = "  SELECT * FROM ptc_feedbacks WHERE username='$username';  ";
    $result = mysqli_query($con, $sql);
    $merong_existing = false;

    while($row = mysqli_fetch_assoc($result))
    {
        $merong_existing = true;
    }

    if($merong_existing == true)
    {
        echo "review_already_submitted";
    }
    else
    {
        $query = "INSERT INTO ptc_feedbacks (username, stars, comment, date_time) VALUES ('$username', '$stars', '$experience_textfield', NOW())";
        mysqli_query($con, $query);

        $_SESSION['kakasubmit_lang_ng_feedback'] = true;
        echo "review_submitted_successfully";
    }
    
    // echo $stars." - ".$experience_textfield." - ".$username;
  }

  if($_POST["action"] == "delete_review")
  {
    global $con;
    session_start();
    $id = $_POST["id"];

    $query = "DELETE FROM `ptc_feedbacks` WHERE id = '$id'";
    mysqli_query($con, $query);
    $_SESSION['kaka_delete_lang_ng_review'] = true;

    // echo $id;
    // echo $stars." - ".$experience_textfield." - ".$username;
  }

  if($_POST["action"] == "get_edit_review")
  {
    global $con;
    session_start();
    $id = $_POST["id"];
    $echos = array();

    $sql = "  SELECT * FROM ptc_feedbacks WHERE id='$id';  ";
    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result))
    {
        $echos[0] = $row['stars'];
        $echos[1] = $row['comment'];
    }

    $response = json_encode($echos);
    echo $response;
    // echo $id;
    // echo $stars." - ".$experience_textfield." - ".$username;
  }

  if($_POST["action"] == "edit_review")
  {
    global $con;
    session_start();
    $username = $_POST["username"];
    $stars = $_POST["stars"];
    $experience_textfield = $_POST["experience_textfield"];

    $sql = "UPDATE `ptc_feedbacks` SET 
    
    stars = '$stars' ,
    comment = '$experience_textfield' ,
    stars = '$stars' ,
    date_time = NOW()
    
    WHERE 
    
    username='".$username."'";
    mysqli_query($con, $sql);

    $_SESSION['kakaupdate_lang_ng_feedback'] = true;

    // $sql = "  SELECT * FROM ptc_feedbacks WHERE id='$id';  ";
    // $result = mysqli_query($con, $sql);

    // if($row = mysqli_fetch_assoc($result))
    // {
    //     $echos[0] = $row['stars'];
    //     $echos[1] = $row['comment'];
    // }

    // $response = json_encode($echos);
    // echo $response;
    // echo $id;
    // echo $stars." - ".$experience_textfield." - ".$username;
  }

//update account information
  if($_POST['action'] == "update_account_information")
  {
    global $con;
    session_start();

    $username_textfield = $_POST["username_textfield"];
    $password_textfield = $_POST["password_textfield"];
    $id = $_SESSION['student_id'];
    $old_username = $_SESSION['student_username'];
    $existing_username = false;

    $sql = "  SELECT * FROM ptc_student_users WHERE username='$username_textfield';  ";
		$result = mysqli_query($con, $sql);
    if($row = mysqli_fetch_assoc($result)) //if meron
    {
      $existing_username = true;
    }
    if($username_textfield == $_SESSION['student_username'])
        $existing_username = false;
    

    if($existing_username == false)
    {
        $query = "UPDATE `ptc_feedbacks` SET 
        username = '$username_textfield'
        WHERE 
        username = '$old_username'";
        mysqli_query($con, $query);

        $query = "UPDATE `ptc_student_users` SET 
        username = '$username_textfield',
        password = '$password_textfield'
        WHERE 
        id = '$id'";
        mysqli_query($con, $query);

        $query = "UPDATE `ptc_student_appointments` SET 
        username = '$username_textfield'
        WHERE 
        username = '$old_username'";
        mysqli_query($con, $query);
        
        $_SESSION['student_username'] = $username_textfield;

        echo $_SESSION['student_username'];
    }
    else
    {
        echo "username_is_existing123**";
    }
    
    // echo "Updated_Successfully";
  }
//end of update course information

//update institute information
    if($_POST['action'] == "update_institute_information")
    {
        global $con;
        session_start();
        $student_number_textfield = $_POST["student_number_textfield"];
        $institute_email_textfield = $_POST["institute_email_textfield"];
        $student_type_dropdownlist = $_POST["student_type_dropdownlist"];
        $course_textfield = $_POST["course_textfield"];
        $id = $_SESSION['student_id'];

        $query = "UPDATE `ptc_student_users` SET 
        student_number = '$student_number_textfield',
        institute_email = '$institute_email_textfield',
        student_type = '$student_type_dropdownlist',
        course = '$course_textfield'
        WHERE 
        id = '$id'";
        mysqli_query($con, $query);
        // echo "qwe";
    }
//end of update institute information

//update personal information
    if($_POST['action'] == "update_personal_information")
    {
        global $con;
        session_start();
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
        $id = $_SESSION['student_id'];

        $query = "UPDATE `ptc_student_users` SET 

        full_name = '$first_name_textfield $last_name_textfield',
        first_name = '$first_name_textfield',
        middle_name = '$middle_name_textfield',
        last_name = '$last_name_textfield',
        suffix = '$suffix_textfield',
        gender = '$gender_dropdownlist',
        birthday = '$birthday_textfield',
        contact_no = '$contact_no_textfield',
        street_address = '$street_address_textfield',
        province = '$province_dropdownlist',
        town_city = '$town_city_dropdownlist',
        barangay = '$barangay_dropdownlist',
        postcode = '$postcode_textfield'

        WHERE 
        
        id = '$id'";
        mysqli_query($con, $query);

        echo $first_name_textfield." ".$last_name_textfield;
    }
//end of update personal information
?>
