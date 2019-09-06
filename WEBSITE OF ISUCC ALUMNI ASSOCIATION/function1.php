<?php 

include 'connection/mysqliconn.php'; 
if(isset($_POST["checkbox_value"]))
{
 foreach($_POST["checkbox_value"] as $id)
 {
  //$query = "DELETE FROM account WHERE acc_id = '".$id."'";
   $query = "DELETE FROM alumni_records WHERE id = '".$id."'";
  mysqli_query($connect, $query);
   //mysqli_query($connect, $queryy);
 }
}
?>