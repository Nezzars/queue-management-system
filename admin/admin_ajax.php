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
            u.student_number
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
        $qweqwe = str_replace('---', ', ', $qweqwe);

        $formattedDate = date("F j, Y", strtotime($datee));

        $echo[1] .= "
            <tr>
                <td>".$counter."</td>
                <td>".$row['username']."</td>
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
    
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $admin_firstname = $_POST['admin_firstname'];
    $admin_middlename = $_POST['admin_middlename'];
    $admin_lastname = $_POST['admin_lastname'];
    
    $admin_fullname = $admin_lastname.", ".$admin_firstname." ".$admin_middlename;
    $admin_type= "Admin";
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
    

  }
?>


