<?php
    require '../connections/my_cnx.php';

    if($_POST["action"] == "student_login_button_function")
    {
      global $con;
      session_start();
      $student_username = $_POST["student_username"];
      $student_password = $_POST["student_password"];
      $success = 0;
  
      $queryy = "SELECT * FROM ptc_student_users WHERE username='$student_username' AND password='$student_password' LIMIT 1";
      $queryy_run = mysqli_query($con, $queryy);
      if (mysqli_num_rows($queryy_run) > 0) //if meron
      {
        $success = 1;
        $_SESSION['kakalogin_lang'] = true;
        $_SESSION['student_username'] = $student_username;

        $sql3 = "  SELECT * FROM ptc_student_users WHERE username='$student_username';  ";
        $result3 = mysqli_query($con, $sql3);
        if($row3 = mysqli_fetch_assoc($result3))
        {
          $_SESSION['student_id'] = $row3['id'];
        }
      }
      else
      {
        $success = 0;
      }
      
      echo $success;
    }

    if($_POST["action"] == "admin_login_button_function")
    {
      global $con;
      session_start();
      $admin_username = $_POST["admin_username"];
      $admin_password = $_POST["admin_password"];
      $success = 0;
  
      $queryy = "SELECT * FROM ptc_admin WHERE username='$admin_username' AND password='$admin_password' LIMIT 1";
      $queryy_run = mysqli_query($con, $queryy);
      if (mysqli_num_rows($queryy_run) > 0) //if meron
      {
        $success = 1;
        $_SESSION['kakalogin_lang'] = true;
        $_SESSION['admin_username'] = $admin_username;

        $sql3 = "  SELECT * FROM ptc_admin WHERE username='$admin_username';  ";
        $result3 = mysqli_query($con, $sql3);
        if($row3 = mysqli_fetch_assoc($result3))
        {
          $_SESSION['admin_id'] = $row3['id'];
          $_SESSION['admin_type'] = $row3['type'];
        }
      }
      else
      {
        $success = 0;
      }
      
      echo $success;
    }
?>