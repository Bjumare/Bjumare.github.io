<?php
//use this page to kill a PHP session
//and send the user back to the public page
session_start();
unset($_SESSION['username']); //clear out variables
unset($_SESSION['user_pwd']);
header('Location: ../login.php');

//
?>