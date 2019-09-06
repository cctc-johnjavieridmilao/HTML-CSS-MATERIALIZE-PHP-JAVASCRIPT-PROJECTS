<?php 
include './admin/conn.php';
if ($_POST) {
$u_fname = mysqli_real_escape_string($connect, $_POST['fname']);
$u_lname = mysqli_real_escape_string($connect, $_POST['lname']);
$u_address = mysqli_real_escape_string($connect, $_POST['addres']);
$u_cp = mysqli_real_escape_string($connect, $_POST['cp']);
$u_pwd = mysqli_real_escape_string($connect, $_POST['pwd']);

$query = "INSERT INTO tbl_users (fname,lname,address,cpnum,password) VALUES ('$u_fname','$u_lname','$u_address','$u_cp','$u_pwd')";

if (mysqli_query($connect,$query)) {
	echo "Registered Success";
}
else{
	echo 'query error';
}
}


?>