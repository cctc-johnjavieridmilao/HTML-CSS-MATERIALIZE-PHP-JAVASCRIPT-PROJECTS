<?php
$message = "";
include 'connection/mysqliconn.php';
if (isset($_POST['submitann'])) {
	$subject = $_POST['subject'];
	$announcement = $_POST['editor1'];

	$query = "INSERT INTO announce (subject,annoucement) VALUES ('$subject','$announcement')";
	mysqli_query($connect,$query);
	$message =  "<script>swal('Your Aannoucement is Submitted!','click okay','success');</script>";
}
?>