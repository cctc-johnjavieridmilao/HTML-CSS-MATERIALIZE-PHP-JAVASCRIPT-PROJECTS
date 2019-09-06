<?php
//Start session
session_start();
//Check whether the session variable $_SESSION['user_name'] is present or not

if (!isset($_SESSION['u_name']) || (trim($_SESSION['u_name']) == '')) {
    header("location:register.php");
    exit();
}


?>