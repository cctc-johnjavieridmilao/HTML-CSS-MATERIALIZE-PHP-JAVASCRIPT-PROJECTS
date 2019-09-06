<?php 
include 'conn.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$query = "UPDATE tbl_menus SET available = 1 WHERE id='$id'";
     if (mysqli_query($connect,$query)) {
     	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Meal Set to Available!</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
     }
     else{
     	echo 'Error query';
     }
}

if (isset($_POST['avail_id'])) {
	$id = $_POST['avail_id'];
	$query = "UPDATE tbl_menus SET available = 0 WHERE id='$id'";
     if (mysqli_query($connect,$query)) {
     	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Meal Set to Available!</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>';
     }
     else{
     	echo 'Error query';
     }
}

?>