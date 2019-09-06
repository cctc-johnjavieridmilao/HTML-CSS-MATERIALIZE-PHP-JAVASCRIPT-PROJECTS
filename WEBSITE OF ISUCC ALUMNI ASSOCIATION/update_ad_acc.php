<?php 
if ($_POST) {
	include 'connection/mysqliconn.php';
	$uname = $_POST['uname'];
	$new = $_POST['new'];
	$confirm = $_POST['confirm'];
	$date_update = date('Y-m-d');

	$select = "SELECT * FROM admin_account WHERE User='$uname'";
	$res = mysqli_query($connect,$select);
	$row = mysqli_fetch_assoc($res);

		if (mysqli_num_rows($res) == 1) {
		$query = "UPDATE admin_account SET User='$uname',Pass='$confirm',date_update='$date_update' WHERE ID=1";
   		if (mysqli_query($connect,$query)) {
   		echo '<script>swal("Account Change","","success");</script>';
   		}
	}
   else {
	echo '<script>swal("Username does not Match","","error");</script>';
   }
}
?>