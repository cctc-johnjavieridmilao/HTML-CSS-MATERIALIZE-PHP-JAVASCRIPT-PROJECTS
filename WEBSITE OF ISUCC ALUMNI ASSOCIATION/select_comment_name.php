<?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
     include 'connection/mysqliconn.php';   
      $query = "SELECT * FROM children WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      while ($row = mysqli_fetch_array($result)) {
          echo "<strong>".$row['user']."</strong>";
      }
 }  
 ?>
