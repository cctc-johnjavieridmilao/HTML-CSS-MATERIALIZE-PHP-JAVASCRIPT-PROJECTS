<?php 
include 'conn.php';
if ($_POST['id']) {
	$id = $_POST['id'];
     $query1 = "UPDATE orders SET ordersfn='canceled' WHERE id='$id'";
     if (mysqli_query($connect,$query1)) {
     	echo '<span class="badge badge-pill badge-danger">Order Canceled <i class="fas fa-times-circle"></i></span>';
     }
     else{
     	echo 'Error';
     }
}









 ?>