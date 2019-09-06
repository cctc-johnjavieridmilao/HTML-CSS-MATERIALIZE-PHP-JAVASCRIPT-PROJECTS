<?php  
 //fetch.php  
 include 'connection/mysqliconn.php';  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM account WHERE acc_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>