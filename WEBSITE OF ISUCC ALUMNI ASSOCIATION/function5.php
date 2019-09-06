<?php 

include 'connection/mysqliconn.php';	

$userObj  = mysqli_query($connect, 'SELECT * FROM `tbl_user_account`');




if(isset($_POST['data'])){
	$dataArr = $_POST['data'] ; 

	foreach($dataArr as $id){
		mysqli_query($connect, "DELETE FROM tbl_user_account where id='$id'");
	}
	echo 'record deleted successfully';
}

?>