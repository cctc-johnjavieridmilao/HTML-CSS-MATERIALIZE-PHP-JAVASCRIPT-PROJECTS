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

	if($_POST) {
		$new_com_name = "Admin";
		$new_com_text = $_POST['editor2'];
		$new_subject = $_POST['subject'];
		$new_com_date = date('Y-m-d H:i:s');
		$new_com_code = generateRandomString();

		$image = $_FILES["image"] ["name"];
		$tmp = $_FILES["image"] ["tmp_name"];
		$r = rand(1,500);
		move_uploaded_file($tmp, "images/$r$image");

		if(isset($new_com_text)) {
			mysqli_query($connect, "INSERT INTO `parents` (`user`, `text`,`title`, `date`, `code`, `image`) VALUES ('$new_com_name', '$new_com_text', '$new_subject', '$new_com_date', '$new_com_code', '$r$image')");
		}
		echo "<script>swal('Your Aannoucement is Submitted!','click okay','success');</script>";
	}

 ?>		
