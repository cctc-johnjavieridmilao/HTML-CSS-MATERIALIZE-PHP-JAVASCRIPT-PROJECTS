<?php  
include 'connection/mysqliconn.php';
if ($_POST) {
$date = $_POST['date'];
$yearnow =  new \DateTime();
$yearfuture =  new \DateTime('+ 1 years');
$slice = "-";
$msg = "Opss Schoolyear";
$msg1 = "is Already Post";
$msg2 = "And Current Year is";
$queryverify = "SELECT * FROM tbl_reg_date WHERE yeardate = '$date'";
$res = mysqli_query($connect,$queryverify);
$row = mysqli_fetch_assoc($res);
if ($row['yeardate'] != $date) {
$query = "INSERT INTO tbl_reg_date (yeardate) VALUES ('$date')";
 mysqli_query($connect,$query);
 echo "<script>swal('Year Posted','Click','success');</script>";
}
else if($row['yeardate'] == $date){
echo '<script type="text/javascript">swal("'.$msg.' '.$yearnow->format('Y').''.$slice.''.$yearfuture->format('Y').' '.$msg1.' '.$msg2.' '.$yearnow->format('Y').'","Click","warning");</script>';
} 
}
?>