<?php
  require '../connections/my_cnx.php';

  if($_POST["action"] == "insert_appointment")
  {
    global $con;
    session_start();
    $username = $_POST["username"];
    $transcript_checkbox = $_POST["transcript_checkbox"];
    $diploma_checkbox = $_POST["diploma_checkbox"];
    $form_137_checkbox = $_POST["form_137_checkbox"];
    $honorable_dismissal_checkbox = $_POST["honorable_dismissal_checkbox"];
    $good_moral_character_checkbox = $_POST["good_moral_character_checkbox"];
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
            if($transcript_checkbox == "true")
            {
                $requested_documentss .= "Transcript";
                // $query = "INSERT INTO ptc_student_appointments VALUES('', '$username', 'Transcript', '$purpose_of_request_textfield', '$date_hidden')";
                // mysqli_query($con, $query);
            }
            if($diploma_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Diploma";
                else
                    $requested_documentss .= " --- Diploma";
                // $query = "INSERT INTO ptc_student_appointments VALUES('', '$username', 'Diploma', '$purpose_of_request_textfield', '$date_hidden')";
                // mysqli_query($con, $query);
            }
            if($form_137_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Form 137";
                else
                    $requested_documentss .= " --- Form 137";
                // $query = "INSERT INTO ptc_student_appointments VALUES('', '$username', 'Form 137', '$purpose_of_request_textfield', '$date_hidden')";
                // mysqli_query($con, $query);
            }
            if($honorable_dismissal_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Honorable Dismissal";
                else
                    $requested_documentss .= " --- Honorable Dismissal";
                // $query = "INSERT INTO ptc_student_appointments VALUES('', '$username', 'Honorable Dismissal', '$purpose_of_request_textfield', '$date_hidden')";
                // mysqli_query($con, $query);
            }
            if($good_moral_character_checkbox == "true")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Good Moral Character";
                else
                    $requested_documentss .= " --- Good Moral Character";
                // $query = "INSERT INTO ptc_student_appointments VALUES('', '$username', 'Good Moral Character', '$purpose_of_request_textfield', '$date_hidden')";
                // mysqli_query($con, $query);
            }
            if($others_textfield != "")
            {
                if($requested_documentss == "")
                    $requested_documentss .= "Others: $others_textfield";
                else
                    $requested_documentss .= " --- Others: $others_textfield";
                // $query = "INSERT INTO ptc_student_appointments VALUES('', '$username', '$others_textfield', '$purpose_of_request_textfield', '$date_hidden')";
                // mysqli_query($con, $query);
            }
            $query = "INSERT INTO ptc_student_appointments VALUES('', '$username', '$requested_documentss', '$purpose_of_request_textfield', '$date_hidden')";
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
            echo "   - Full Name: ".$row1['full_name']."\n";
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
?>
