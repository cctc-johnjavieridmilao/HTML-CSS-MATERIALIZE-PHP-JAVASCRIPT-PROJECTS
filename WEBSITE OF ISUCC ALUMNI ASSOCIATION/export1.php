<?php  
//export.php  
include 'connection/mysqliconn.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM alumni_records ORDER BY id ASC";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
    <tr>  
    <th>ID</th>  
          <th width="15%">Name</th>
          <th width="15%" >Employment</th>
          <th>Gender</th>
          <th>Institution</th>
          <th>Program</th>
          <th>YearGraduated</th>
          <th>Job</th>
                                                      
   </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td>'.$row["id"].'</td>  
    <td>'.$row["fname"].'</td> 
    <td>'.$row["employed"].'</td>  
    <td>'.$row["gender"].'</td>  
    <td>'.$row["institution"].'</td>
    <td>'.$row["program"].'</td>  
    <td>'.$row["yeargraduted"].'</td> 
    <td>'.$row["work"].'</td>
                       
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
