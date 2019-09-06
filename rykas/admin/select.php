<?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
     include 'conn.php'; 
      $query = "SELECT * FROM tbl_feedback WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
        $date = new DateTime($row['date']);
           $output .= '  
                <tr>  
                     <td width="30%"><label>Date</label></td>  
                     <td width="70%">'.$date->format('l,F,j,Y').'</td>  
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
                     <td width="70%">'.mb_strimwidth($row["topic"], 0, 20,"...").'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Feedback</label></td>  
                     <td width="70%">'.mb_strimwidth($row["feedback"], 0, 20,"...").'</td>  
                </tr>
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
