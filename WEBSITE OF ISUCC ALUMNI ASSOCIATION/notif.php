<?php
//insert.php
if(isset($_POST["SUBMIT"]))
{
 include 'connection/mysqliconn.php'; 
 $name = mysqli_real_escape_string($connect, $_POST["name"]);
 $email = mysqli_real_escape_string($connect, $_POST["email"]);
 $query = "
 INSERT INTO message_user(name, email)
 VALUES ('$name', '$email')
 ";
 mysqli_query($connect, $query);
}
?>
