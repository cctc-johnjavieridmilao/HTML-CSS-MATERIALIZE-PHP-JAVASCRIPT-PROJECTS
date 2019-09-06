<?php 
session_start();
include 'connection/mysqliconn.php'; 
 if(!empty($_POST))
{
 $output = '';
 $address = mysqli_real_escape_string($connect, $_POST["address"]);
 $contact = mysqli_real_escape_string($connect, $_POST["contactnumber"]);
  $_SESSION['address'] = $_POST['address'];
  $_SESSION['contactnumber'] = $_POST['contactnumber'];
    $query = "
    INSERT INTO account(addressas,cnumbesaar)
     VALUES('$address','$contact')
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
	}
	 echo $output;
}
 ?>