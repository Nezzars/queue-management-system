<?php
  require 'my_cnx.php';
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    global $con;
    $memberusername = $_POST["memberusername"];
    $memberpassword = $_POST["memberpassword"];

    $query = "INSERT INTO student_users VALUES('', '$memberusername', '$memberpassword', 'fullname')";
    mysqli_query($con, $query);
    
    $_SESSION['kaka_create_lang'] = true;
    $loginPageURL = 'login.php';
    header("Location: $loginPageURL");
  }
?>

