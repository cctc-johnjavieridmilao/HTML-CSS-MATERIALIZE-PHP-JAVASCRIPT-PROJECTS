<?php 
include './admin/conn.php';
if ($_POST) {
	$username = mysqli_real_escape_string($connect,$_POST['username']);
	$passwordss = mysqli_real_escape_string($connect,$_POST['passwordss']);

	$query = "SELECT * from tbl_users WHERE fname = '$username' and password = '$passwordss'";
	$res = mysqli_query($connect,$query);
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			session_start();
		    $_SESSION['u_name'] = $row['fname'];
		}
		?>
		<script type="text/javascript">
		window.location.href = "index1.php";
		</script>
		<?php
	}
	else{
      echo '<div class="alert alert-danger">Error Userame or Password</div>';
	}
}
?>