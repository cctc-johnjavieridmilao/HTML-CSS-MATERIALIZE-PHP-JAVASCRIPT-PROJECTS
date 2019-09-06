<?php
session_start(); 
header("Location:login.php");
$_SESSION['logins'] = "Logins";
 ?>