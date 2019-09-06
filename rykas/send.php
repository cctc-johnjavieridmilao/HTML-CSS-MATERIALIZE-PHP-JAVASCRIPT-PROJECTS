<?php 
include './admin/conn.php';
if ($_POST) {
$name = mysqli_real_escape_string($connect, $_POST['name']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$topic = mysqli_real_escape_string($connect, $_POST['topic']);
$message = mysqli_real_escape_string($connect, $_POST['message']);

$query = "INSERT INTO tbl_feedback (name,email,topic,feedback) VALUES ('$name','$email','$topic','$message')";
if (mysqli_query($connect,$query)) {
	echo '<div class="alert alert-success" role="alert">Feedback Send!</div>';
}
else{
	echo 'query error';
}
}
 ?>