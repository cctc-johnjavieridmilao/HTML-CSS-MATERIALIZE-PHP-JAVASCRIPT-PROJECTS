<?php 

include 'connection/mysqliconn.php'; 	

$userObj  = mysqli_query($connect, 'SELECT * FROM `message_user`');




if(isset($_POST['data'])){
	$dataArr = $_POST['data'] ; 

	foreach($dataArr as $id){
		mysqli_query($connect, "DELETE FROM message_user where id='$id'");
	}
	echo 'record deleted successfully';
}

?>