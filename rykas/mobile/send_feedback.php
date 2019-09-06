<?php 
require 'conn/conn.php';
if ($_POST) {
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$topic = mysqli_real_escape_string($connect, $_POST['topic']);
	$msg = mysqli_real_escape_string($connect, $_POST['msg']);

	$query = "INSERT INTO tbl_feedback (name,feedback,email,topic) VALUES('$name','$msg','$email','$topic')";
	$execute = mysqli_query($connect,$query);
	if ($execute) {
		echo '<a href="#" class="ui-btn ui-icon-check ui-btn-icon-left ui-shadow-icon" style="color:green;">Feedback Submit! Thankyou '.$name.'</a>';
	}
	else{
		echo 'query Error'.mysqli_error($connect);
	}
}


?>