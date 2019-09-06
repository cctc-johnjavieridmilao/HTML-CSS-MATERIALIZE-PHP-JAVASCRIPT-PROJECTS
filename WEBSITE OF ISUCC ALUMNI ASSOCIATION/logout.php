<?php 
include 'helper/function.php';
session_destroy();
unset($_SESSION['password']);
unset($_SESSION['email']);
session_unset();
session_write_close();
Logout()
 ?>