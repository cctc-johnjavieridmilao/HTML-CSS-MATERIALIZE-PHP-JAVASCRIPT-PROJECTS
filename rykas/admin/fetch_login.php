<?php 
include 'conn.php';
if ($_POST) {
  $uname = mysqli_real_escape_string($connect, $_POST['uname']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$query = "SELECT * FROM admin WHERE uname='$uname' AND pass = '$password'";
$res = mysqli_query($connect,$query);
$num = mysqli_num_rows($res);
if ($num == 1) {
	?>
	<div class="alert alert-success" role="alert">Welcome <?php echo $uname; ?> Please wait for Sec... <span class="fas fa-spinner fa-spin"></span></div>
	<script>
		
				window.setTimeout(() => {
				 window.location.href = "mob_admin.php";
				}, 5000)
			
	</script>
	<?php
}
else{
	echo '<div class="alert alert-warning" role="alert">Wrong username or Password!</div>';
}
}
?>