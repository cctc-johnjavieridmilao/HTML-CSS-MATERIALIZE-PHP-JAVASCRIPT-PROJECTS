<?php 
include './admin/conn.php';
date_default_timezone_set('Asia/Manila');
if ($_POST) {
$name = mysqli_real_escape_string($connect, $_POST['user_names_2']);
$cp = mysqli_real_escape_string($connect, $_POST['user_cpnumber_2']);
$o_name = mysqli_real_escape_string($connect, $_POST['user_order_name_2']);
$cat = mysqli_real_escape_string($connect, $_POST['user_cat_2']);
$prize = mysqli_real_escape_string($connect, $_POST['user_prize_2']);
$persons = mysqli_real_escape_string($connect, $_POST['user_counts_2']);
$addres = mysqli_real_escape_string($connect, $_POST['user_address_2']);
$dine_in = mysqli_real_escape_string($connect, $_POST['user_dine_in']);
$pick_up = mysqli_real_escape_string($connect, $_POST['pp_text']);
$date = date('Y-m-d H:i:s');
$expiration_date =  date('Y-m-d H:i:s',strtotime($date. '+1 days'));


$query = "INSERT INTO orders (uname,cpnumber,ordername,category,prize,persons,address,ordersfn,expiration_date,dining_in_time,pick_up_time) VALUES ('$name','$cp','$o_name','$cat','$prize','$persons','$addres','no','$expiration_date','$dine_in','$pick_up')";
if (mysqli_query($connect,$query)) {
	echo '<div class="alert alert-success" role="alert">Order Send!</div>';
}
else{
	echo 'query error';
}
}
 ?>