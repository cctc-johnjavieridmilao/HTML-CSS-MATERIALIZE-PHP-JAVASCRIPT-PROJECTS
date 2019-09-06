<?php
//insert.php
if(isset($_POST["register"]))
{
 include 'connection/mysqliconn.php'; 
 $name = mysqli_real_escape_string($connect, $_POST["name"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $query = "
 INSERT INTO tbl_user_account(name, email)
 VALUES ('$name', '$email')
 ";
 mysqli_query($connect, $query);
}
?>
