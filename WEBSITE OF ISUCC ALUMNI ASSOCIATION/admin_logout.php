<?php 
include 'connection/mysqliconn.php';
$updateStatusout = "UPDATE admin_account SET status=0 WHERE ID=1";
mysqli_query($connect,$updateStatusout);
header("Location:admin_login.php");
 ?>