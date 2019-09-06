<?php 
include 'conn.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$query = "DELETE FROM tbl_menus WHERE id='$id'";
	if (mysqli_query($connect,$query)) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Data Deleted!</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
	}
	else{
		echo 'query Error!';
	}
}
 ?>