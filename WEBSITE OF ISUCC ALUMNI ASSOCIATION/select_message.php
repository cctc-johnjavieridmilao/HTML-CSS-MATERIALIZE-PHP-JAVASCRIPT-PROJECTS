<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
     include 'connection/mysqliconn.php';   
      $query = "SELECT * FROM message_user WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Number</label></td>  
                     <td width="70%">'.$row["id"].'</td>  
                </tr> 
                 
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>   
                <tr>  
                     <td width="30%"><label>Phone Number</label></td>  
                     <td width="70%">'.$row["phonenumber"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Message and Feedback</label></td>  
                     <td width="70%">'.$row["message"].'</td>  
                </tr>
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
