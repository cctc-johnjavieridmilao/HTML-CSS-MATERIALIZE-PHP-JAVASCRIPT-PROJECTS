<?php 
function generateRandomString($length = 6) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characterLength = strlen($characters);
		$randomString = '';

		for($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $characterLength - 1)];
		}
		return $randomString;
	}

  include 'connection/mysqliconn.php';
	if ($_POST) {
   	$subject = $_POST['subject'];
   	$news = $_POST['editor'];
   	$image = $_FILES["image"] ["name"];
    $tmp = $_FILES["image"] ["tmp_name"];
    $r = rand(1,500);
    move_uploaded_file($tmp, "images/$r$image");
    $new_com_code = generateRandomString();
	$query = "INSERT INTO  tbl_news (subject,news,image,code) VALUES ('$subject','$news','$r$image','$new_com_code')";
	if (mysqli_query($connect,$query)) {
	echo "<script>swal('Your News is Submitted!','','success');</script>";
	}
	else{
		echo "<script>swal('Error','','error');</script>";
	}
}
?>