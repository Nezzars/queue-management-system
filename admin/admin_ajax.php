<?php
  require '../connections/my_cnx.php';

  

  if($_POST["action"] == "get_all_appointments_depends_on_date")
  {
    global $con;
    $datee = $_POST["datee"];
    $process_courses = $_POST["process_courses"];
    $echo = array();

    $sql = "  SELECT * FROM ptc_student_appointments_history WHERE datee='$datee';  ";
    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result))
    {
        $echo[0] = $row['total_students'];
    }

    $sql = "
        SELECT
            a.*,
            u.student_number,
            u.full_name,
            u.course
        FROM
            ptc_student_appointments a
        INNER JOIN
            ptc_student_users u ON a.username = u.username
        WHERE
            a.datee = '$datee';
    ";

    $result = mysqli_query($con, $sql);
    $counter = 1;
    $echo[1] = "";

    while ($row = mysqli_fetch_assoc($result)) {
        
        // $row['course']   //complete BSIT
        $idd = "";
        $sql12 = "  SELECT * FROM ptc_courses WHERE course='".$row['course']."';  ";
		$result12 = mysqli_query($con, $sql12);
        if($row12 = mysqli_fetch_assoc($result12))
        {
            $idd = $row12['id']; //2
        }

        // $process_courses //1 --- 2

        $process_courses_array = explode(' --- ', $process_courses);
        $meron = in_array($idd, $process_courses_array);

        if($meron == true)
        {
            $qweqwe = $row['requested_documents'];
            $qweqwe_list = explode(' --- ', $qweqwe);
            // $qweqwe = str_replace(' --- ', ', ', $qweqwe);

            $requested_documentss = "<ul>";

            foreach ($qweqwe_list as $item)
            {
                $requested_documentss .= "<li>$item</li>";
            }

            $requested_documentss .= "</ul>";

            $formattedDate = date("F j, Y", strtotime($datee));

            $status_row = "";

            if($row['status'] == "PENDING")
                $status_row = "<span style='background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>".$row['status']."</span>";
            else if($row['status'] == "ONGOING")
                $status_row = "<span style='background: linear-gradient(135deg, #23a6d5 0%, #23d5ab 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>".$row['status']."</span>";
            else if($row['status'] == "DONE")
                $status_row = "<span style='background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);border-radius: 10px;color: white;text-align: center;padding: 10px 20px;'>".$row['status']."</span>";


            $parts = explode(' ', $row['course']);

            if (count($parts) > 1) {
                $abbreviation = trim($parts[count($parts) - 1], '()');
            }

            $echo[1] .= "
                <tr>
                    <td style='vertical-align: middle; text-align: center;'>".$counter."</td>
                    <td style='vertical-align: middle; text-align: center;'>".strtoupper($row['full_name'])."</td>
                    <td style='vertical-align: middle; text-align: center;'>".$row['student_number']."</td>
                    <td style='vertical-align: middle; text-align: center;'>".$abbreviation."</td>
                    <td style='vertical-align: middle; text-align: center;'>".$requested_documentss."</td>
                    <td style='vertical-align: middle; text-align: center;'>".$row['purpose_of_request']."</td>
                    <td style='vertical-align: middle; text-align: center;'>".$formattedDate."</td>
                    <td style='vertical-align: middle; text-align: center;' id='status_id_".$row['id']."'>".$status_row."</td>
                    <td style='vertical-align: middle; text-align: center;' id='admin_processor_".$row['id']."'>".$row['admin_processor']."</td>
                    <td style='vertical-align: middle; text-align: center;'>
                        <div class='dropdown123'>
                            <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" onclick=\"toggleDropdown(".$row['id'].")\">Update Status</button>
                            <ul class='dropdown-menu' id='myDropdown".$row['id']."'>
                                <li><a class='dropdown-item' style='cursor:pointer;' onclick='update_status_func(\"".$row['id']."\", \"PENDING\")'>PENDING</a></li>
                                <li><a class='dropdown-item' style='cursor:pointer;' onclick='update_status_func(\"".$row['id']."\", \"ONGOING\")'>ONGOING</a></li>
                                <li><a class='dropdown-item' style='cursor:pointer;' onclick='update_status_func(\"".$row['id']."\", \"DONE\")'>DONE</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            ";

            $counter++;
        }
    }

    // $echo[2]=$process_courses;

    // $echo[1] = "QWE";

    $response = json_encode($echo);
    echo $response;
  }


  if($_POST["action"] == "add_event_ajax")
  {
    global $con;
    
    $event_textfield = trim($_POST['event_textfield']);
    $month_select = trim($_POST['month_select']);
    $day_select = trim($_POST['day_select']);

    $date_formatted = "0000-$month_select-$day_select";
    $existing = false;
    $echos = array();

    $sql = "SELECT * FROM ptc_holidays WHERE date_month_and_day = '$date_formatted'";
    $result = mysqli_query($con, $sql);
    if($row = mysqli_fetch_assoc($result))
    {
        $existing = true;
    }

    if($existing == false)
    {
        $sql = "INSERT INTO ptc_holidays (

            holiday_name,
            date_month_and_day

        ) VALUES (
            
            '$event_textfield',
            '$date_formatted'
            
            )";
        $result = mysqli_query($con,$sql);

        $echos[0] = "add_success";
        $echos[1] = "";

        $sql = "SELECT * FROM ptc_holidays;";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $echos[1] .= '
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

        $response = json_encode($echos);
        echo $response;
    }
    else
    {
        $echos[0] = "add_failed_dahil_may_existing_day_and_month";

        $response = json_encode($echos);
        echo $response;
    }
  }

    if($_POST["action"] == "add_admin_ajax")
    {
        global $con;
        
        $admin_username = trim($_POST['admin_username']);
        $admin_password = trim($_POST['admin_password']);
        $admin_firstname = trim($_POST['admin_firstname']);
        $admin_middlename = trim($_POST['admin_middlename']);
        $admin_lastname = trim($_POST['admin_lastname']);
        $selected_process_course = $_POST['selected_process_course'];
        $echos = array();
        
        $admin_fullname = $admin_firstname." ".$admin_lastname;
        $admin_type= "Admin";

        $username_existing = false;

        $admin_username = strtolower($admin_username); // Convert to lowercase and trim whitespace

        $sql = "SELECT * FROM ptc_admin WHERE TRIM(LOWER(username)) = '$admin_username'";
        $result = mysqli_query($con, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
            $username_existing = true;
        }

        if($username_existing == false)
        {
            $sql = "INSERT INTO ptc_admin (

                username,
                password,
                process_course,
                full_name,
                first_name,
                middle_name,
                last_name,
                type

            ) VALUES (
                
                '$admin_username',
                '$admin_password',
                '$selected_process_course',
                '$admin_fullname',
                '$admin_firstname',
                '$admin_middlename',
                '$admin_lastname',
                '$admin_type'
                
                )";
            $result = mysqli_query($con,$sql);

            $echos[0] = "add_success";
            $echos[1] = "";

            $sql = "SELECT * FROM ptc_admin;";
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

                $echos[1] .= '
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

            $response = json_encode($echos);
            echo $response;
        }
        else
        {
            $echos[0] = "add_failed_dahil_may_existing_username";

            $response = json_encode($echos);
            echo $response;
        }
    }
    
    if($_POST["action"] == "my_account_update_ajax")
    {
        global $con;
        session_start();
        $my_account_username = $_POST['my_account_username'];
        $my_account_password = $_POST['my_account_password'];
        $my_account_first_name = $_POST['my_account_first_name'];
        $my_account_middle_name = $_POST['my_account_middle_name'];
        $my_account_last_name = $_POST['my_account_last_name'];
        $echos = array();
        
        $my_account_full_name = $my_account_first_name." ".$my_account_last_name;
        if($_SESSION['admin_id'] == "1")
            $admin_type= "Super Admin";
        else 
            $admin_type= "Admin";
        $username_existing = false;

        $my_account_username = strtolower($my_account_username); // Convert to lowercase and trim whitespace
        $sql = "SELECT * FROM ptc_admin WHERE TRIM(LOWER(username)) = '$my_account_username'";
        $result = mysqli_query($con, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
            if($_SESSION['admin_id'] == $row['id'])
                $username_existing = false;
            else
                $username_existing = true;
        }

        if($username_existing == false)
        {
            $sql = "UPDATE ptc_admin SET
                        username = '$my_account_username',
                        password = '$my_account_password',
                        full_name = '$my_account_full_name',
                        first_name = '$my_account_first_name',
                        middle_name = '$my_account_middle_name',
                        last_name = '$my_account_last_name'
                    WHERE 
                        id = '".$_SESSION['admin_id']."'
                    ";
            $result = mysqli_query($con, $sql);

            $echos[0] = "update_success";
            $echos[1] = "";

            $sql = "SELECT * FROM ptc_admin;";
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

                $echos[1] .= '
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

            $echos[2] = $my_account_username;
            $echos[3] = $my_account_password;
            $echos[4] = $my_account_first_name;
            $echos[5] = $my_account_middle_name;
            $echos[6] = $my_account_last_name;
            $echos[7] = $admin_type;
            $echos[8] = $_SESSION['admin_id'];

            // if($admin_type == "Super Admin")
            // {
            //     $_SESSION['admin_username'] = $update_username_admin_input;
            // }

            $response = json_encode($echos);
            echo $response;
        }
        else
        {
            $echos[0] = "update_failed_dahil_may_existing_username";

            $response = json_encode($echos);
            echo $response;
        }

        // echo $_SESSION['student_id'];
    }

    if($_POST["action"] == "update_admin_ajax")
    {
        global $con;
        session_start();
        
        $update_id_admin_input = trim($_POST['update_id_admin_input']);
        $update_username_admin_input = trim($_POST['update_username_admin_input']);
        $update_password_admin_input = trim($_POST['update_password_admin_input']);
        $update_firstname_admin_input = trim($_POST['update_firstname_admin_input']);
        $update_middlename_admin_input = trim($_POST['update_middlename_admin_input']);
        $update_lastname_admin_input = trim($_POST['update_lastname_admin_input']);
        $update_selected_process_course = $_POST['update_selected_process_course'];
        $echos = array();
        
        $update_fullname_admin_input = $update_firstname_admin_input." ".$update_lastname_admin_input;
        if($update_id_admin_input == "1")
            $admin_type= "Super Admin";
        else 
            $admin_type= "Admin";
        $username_existing = false;

        $update_username_admin_input = strtolower($update_username_admin_input); // Convert to lowercase and trim whitespace
        $sql = "SELECT * FROM ptc_admin WHERE TRIM(LOWER(username)) = '$update_username_admin_input'";
        $result = mysqli_query($con, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
            if($update_id_admin_input == $row['id'])
                $username_existing = false;
            else
                $username_existing = true;
        }

        if($username_existing == false)
        {
            $sql = "UPDATE ptc_admin SET
                        username = '$update_username_admin_input',
                        password = '$update_password_admin_input',
                        process_course = '$update_selected_process_course',
                        full_name = '$update_fullname_admin_input',
                        first_name = '$update_firstname_admin_input',
                        middle_name = '$update_middlename_admin_input',
                        last_name = '$update_lastname_admin_input',
                        type = '$admin_type'
                    WHERE id = $update_id_admin_input";

            $result = mysqli_query($con, $sql);

            $echos[0] = "update_success";
            $echos[1] = "";

            $sql = "SELECT * FROM ptc_admin;";
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

                $echos[1] .= '
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

            $echos[2] = $update_username_admin_input;
            $echos[3] = $update_password_admin_input;
            $echos[4] = $update_firstname_admin_input;
            $echos[5] = $update_middlename_admin_input;
            $echos[6] = $update_lastname_admin_input;
            $echos[7] = $admin_type;
            $echos[8] = $update_id_admin_input;

            // if($admin_type == "Super Admin")
            // {
            //     $_SESSION['admin_username'] = $update_username_admin_input;
            // }

            $response = json_encode($echos);
            echo $response;
        }
        else
        {
            $echos[0] = "update_failed_dahil_may_existing_username";

            $response = json_encode($echos);
            echo $response;
        }
    }

    if($_POST["action"] == "get_admin_data_display_to_update_modal")
    {
        global $con;
        $id = $_POST['id'];
        $echos = array();

        $sql = "  SELECT * FROM ptc_admin WHERE id='$id';  ";
		$result = mysqli_query($con, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
            $echos[0] = $row['username'];
            $echos[1] = $row['password'];
            $echos[2] = $row['first_name'];
            $echos[3] = $row['middle_name'];
            $echos[4] = $row['last_name'];
            $echos[5] = $row['id'];
            $echos[6] = $row['process_course'];
        }

        $response = json_encode($echos);
        echo $response;
    }

    if($_POST['action'] == "delete_admin_user_ajax")
    {
        global $con;
        session_start();
        $id = $_POST['id'];
        $echos = array();

        $sql = "  SELECT * FROM ptc_admin WHERE id='$id';  ";
		$result = mysqli_query($con, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
            if($row['type'] == "Super Admin")
            {
                $echos[0] = "failed_to_delete_because_super_admin";
            }
            else
            {
                $echos[0] = "delete_success";

                $query = "DELETE FROM `ptc_admin` WHERE id = '$id'";
                mysqli_query($con, $query);

                $echos[1] = "";
                $sql = "SELECT * FROM ptc_admin;";
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

                    $echos[1] .= '
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
            }
        }
        
        $response = json_encode($echos);
        echo $response;
    }

    if($_POST['action'] == "delete_event_ajax")
    {
        global $con;
        session_start();
        $id = $_POST['id'];
        $echos = array();

        $sql = "  SELECT * FROM ptc_holidays WHERE id='$id';  ";
		$result = mysqli_query($con, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
            $echos[0] = "delete_success";

            $query = "DELETE FROM `ptc_holidays` WHERE id = '$id'";
            mysqli_query($con, $query);

            $echos[1] = "";
            $sql = "SELECT * FROM ptc_holidays;";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $echos[1] .= '
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
        }
        
        $response = json_encode($echos);
        echo $response;
    }

    if($_POST["action"] == "update_status")
  	{
        global $con;
		$id = $_POST['id'];
		$status = $_POST['status'];
		// $admin_processor = $_POST['admin_processor'];
        if($status == "PENDING")
        {
            $admin_processor = "undefinedd";

            $sql = "UPDATE `ptc_student_appointments` SET 

            status = '$status',
            admin_processor = ''
            
            WHERE id='$id'";
            mysqli_query($con, $sql);
        }
        else
        {
            $admin_processor = $_POST['admin_processor'];

            $sql = "UPDATE `ptc_student_appointments` SET 

            status = '$status',
            admin_processor = '$admin_processor'
            
            WHERE id='$id'";
            mysqli_query($con, $sql);
        }

        

        echo $status . " --- " . $id . " --- " . $admin_processor;
	}

    if($_POST["action"] == "get_appointments_realtime")
  	{
        global $con;
		$pinindot_na_date = $_POST['pinindot_na_date'];
        $statuses = array();
        $admin_processors = array();
        $ids = array();
        $index = 0;

        $sql = "  SELECT * FROM ptc_student_appointments WHERE datee='$pinindot_na_date';  ";
		$result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $statuses[$index] = $row['status'];
            $admin_processors[$index] = $row['admin_processor'];
            $ids[$index] = $row['id'];
            $index++;
        }

        $response = array(
            'statuses' => $statuses,
            'admin_processors' => $admin_processors,
            'ids' => $ids
        );
        
        echo json_encode($response);
    }
?>


