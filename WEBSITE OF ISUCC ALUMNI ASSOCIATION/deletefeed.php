<?php 

include 'connection/mysqliconn.php'; 
if(isset($_POST["checkbox_value"]))
{
 foreach($_POST["checkbox_value"] as $id)
 {
  $query = "DELETE FROM message_user WHERE id = '".$id."'";
  mysqli_query($connect, $query);
 }
}
?>