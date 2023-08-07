<?php
// Perform the logout action here (e.g., destroying session, clearing cookies, etc.)

// Redirect the user back to the login page after logout (replace login.php with the actual login page URL)
//GITHUB123
session_destroy();
header("Location: login/login.php");
exit;
?>
