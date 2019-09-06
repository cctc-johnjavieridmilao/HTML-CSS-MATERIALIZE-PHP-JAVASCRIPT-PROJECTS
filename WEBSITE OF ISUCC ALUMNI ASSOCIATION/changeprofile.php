<?php 
$id = $_SESSION['user_id'];
include 'connection/mysqliconn.php';
if (isset($_POST['btn_update_photo'])) {
  $image = $_FILES["image"] ["name"];
  $tmp = $_FILES["image"] ["tmp_name"];	
  $r = rand(1,500);
  move_uploaded_file($tmp, "images/$r$image");

  $query = "UPDATE account SET images='$r$image' WHERE acc_id='$id'";
  mysqli_query($connect,$query);
  header("Location:direct_profile.php");
}
 ?>
 