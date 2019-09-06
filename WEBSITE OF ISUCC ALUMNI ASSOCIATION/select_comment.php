<?php 
include 'connection/mysqliconn.php';  
if (isset($_POST['id'])) {
	

$id = $_POST['id'];
$output = '';
$query = "SELECT * FROM children WHERE id='$id'";
$res = mysqli_query($connect,$query);
   $output .= '
    <table class="table table-bordered">';
while ($row = mysqli_fetch_array($res)) {
	$date = new DateTime($row['date']);
    $output .= '
     		<tr>  
                     <td width="30%"><label>Date</label></td>  
                     <td width="70%">'.$date->format('l,F,j,Y | h:i:sa').'</td>  
                </tr> 
                 
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["user"].'</td>  
                </tr>  

                <tr>  
                     <td width="30%"><label>Comment</label></td>  
                     <td width="70%">'.$row["text"].'</td>  
                </tr>  
    ';
    $output .='</table>';

    echo $output;
}
}
 ?>