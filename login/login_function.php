<?php
  require '../connections/my_cnx.php';
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    global $con;
    $username = $_POST["username"];
    $password = $_POST["password"];

    $agent_query = "SELECT * FROM ptc_student_users WHERE username='$username' AND password='$password' LIMIT 1";
    $agent_query_run = mysqli_query($con, $agent_query);
    if (mysqli_num_rows($agent_query_run) > 0) //if meron
    {
      $_SESSION['kaka_login_lang'] = true;
      $loginPageURL = '../student/student_dashboard.php';
      header("Location: $loginPageURL");
    }
    else
    {
      $_SESSION['failed_login'] = true;
      $loginPageURL = 'login.php';
      header("Location: $loginPageURL");
    }
  }
?>

