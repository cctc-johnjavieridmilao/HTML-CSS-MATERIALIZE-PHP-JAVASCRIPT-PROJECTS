<?php 
include 'conn.php';
$query = "SELECT * FROM orders WHERE orderstatus = 0 ORDER BY id DESC";
$result = mysqli_query($connect, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <div class="alert alert_default">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><strong>'.$row["uname"].' Order '.$row['ordername'].'</strong>
  <br>
   <small><strong>'.$row["date"].'</strong></small>
  </p>
 </div>
 ';
}
$update_query = "UPDATE orders SET orderstatus = 1 WHERE orderstatus = 0";
mysqli_query($connect, $update_query);
echo $output;
?>