<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
     include 'connection/mysqliconn.php';   
      $query = "SELECT * FROM message_user WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= ' ';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                  <h4><span class="fas fa-user-graduate">  ' .$row['name'].'</span></h4>
                ';  
      }  
      $output .= "";  
      echo $output;  
 }  
 ?>
