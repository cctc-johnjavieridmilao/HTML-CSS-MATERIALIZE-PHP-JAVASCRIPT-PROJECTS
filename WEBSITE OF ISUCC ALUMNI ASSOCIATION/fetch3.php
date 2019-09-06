<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "alumni_user_acc");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM tbl_acc_user WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 