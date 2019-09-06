<?php 
include 'conn.php';
if ($_POST['id']) {
	$id = $_POST['id'];
     $query = "UPDATE orders SET ordersfn='finished' WHERE id='$id'";
     if (mysqli_query($connect,$query)) {
     	echo '<span class="badge badge-pill badge-success">Order Finished <i class="fas fa-check-circle"></i></span></span>';
     }
     else{
     	echo 'Error';
     }
}
?>