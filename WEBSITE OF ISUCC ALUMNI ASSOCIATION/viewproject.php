<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      include 'connection/mysqliconn.php';   
      $query = "SELECT * FROM tbl_project WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Title</label></td>  
                     <td width="70%">'.$row["subject"].'</td>  
                </tr> 
                 
                <tr>  
                     <td width="30%"><label>Description</label></td>  
                     <td width="70%">'.$row["project"].'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
