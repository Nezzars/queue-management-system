<?php
  require '../connections/my_cnx.php';

  

  if($_POST["action"] == "get_all_appointments_depends_on_date")
  {
    global $con;
    $datee = $_POST["datee"];
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
            u.full_name
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
        
        $qweqwe = $row['requested_documents'];
        $qweqwe = str_replace(' --- ', ', ', $qweqwe);

        $formattedDate = date("F j, Y", strtotime($datee));

        $echo[1] .= "
            <tr>
                <td>".$counter."</td>
                <td>".strtoupper($row['full_name'])."</td>
                <td>".$row['student_number']."</td>
                <td>".$qweqwe."</td>
                <td>".$row['purpose_of_request']."</td>
                <td>".$formattedDate."</td>
            </tr>
        ";

        $counter++;
    }

    // $echo[1] = "QWE";

    $response = json_encode($echo);
    echo $response;
  }

    if($_POST["action"] == "add_admin_ajax")
    {
        global $con;
        
        $admin_username = trim($_POST['admin_username']);
        $admin_password = trim($_POST['admin_password']);
        $admin_firstname = trim($_POST['admin_firstname']);
        $admin_middlename = trim($_POST['admin_middlename']);
        $admin_lastname = trim($_POST['admin_lastname']);
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
                full_name,
                first_name,
                middle_name,
                last_name,
                type

            ) VALUES (
                
                '$admin_username',
                '$admin_password',
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
                $echos[1] .= '
                <tr>
                    <td>'.strtoupper($row['id']).'</td>
                    <td>'.strtoupper($row['full_name']).'</td>
                    <td>'.strtoupper($row['username']).'</td>
                    <td>'.strtoupper($row['type']).'</td>
                    <td>
                    <input type="button" value="Update" class="btn btn-success" onclick="open_update_modal(\''.trim($row['id']).'\');">
                    <input type="button" value="Delete" class="btn btn-danger">
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
                $echos[1] .= '
                <tr>
                    <td>'.strtoupper($row['id']).'</td>
                    <td>'.strtoupper($row['full_name']).'</td>
                    <td>'.strtoupper($row['username']).'</td>
                    <td>'.strtoupper($row['type']).'</td>
                    <td>
                    <input type="button" value="Update" class="btn btn-success" onclick="open_update_modal(\''.trim($row['id']).'\');">
                    <input type="button" value="Delete" class="btn btn-danger">
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
        }

        $response = json_encode($echos);
        echo $response;
    }
?>


