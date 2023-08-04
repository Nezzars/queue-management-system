<?php
    require '../connections/my_cnx.php';
    

    if($_POST["action"] == "admin_login_button_function")
    {
      global $con;
      session_start();
      $admin_username = $_POST["admin_username"];
      $admin_password = $_POST["admin_password"];
      $success = 0;
  
      $agent_query = "SELECT * FROM ptc_admin WHERE username='$admin_username' AND password='$admin_password' LIMIT 1";
      $agent_query_run = mysqli_query($con, $agent_query);
      if (mysqli_num_rows($agent_query_run) > 0) //if meron
      {
        $success = 1;
        $_SESSION['kakalogin_lang'] = true;
      }
      else
      {
        $success = 0;
      }
      
      echo $success;
    }
?>