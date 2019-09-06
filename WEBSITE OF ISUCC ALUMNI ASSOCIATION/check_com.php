<?php

$message = "";

	// new comment
	if(isset($_POST['new_comment'])) {
		$new_com_name = $_SESSION['user'];
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

		echo '<meta http-equiv="refresh" content="2">';
			
		$message =  "<script>swal('Your Aannoucement is Submitted!','click okay','success');</script>";
	}
	// new reply
	if(isset($_POST['new_reply'])) {
		$new_reply_name = $_SESSION['fullname'];
		$new_reply_text = $_POST['form_new-reply'];
		$new_reply_date = date('Y-m-d H:i:s');
		$new_reply_code = $_POST['code'];

		include 'badwords.php';
		if($new_reply_text ==  $badwords || $new_reply_text == $badwords1 || $new_reply_text == $badwords2 || $new_reply_text == $badwords3 || $new_reply_text == $badwords4 || $new_reply_text == $badwords5 || $new_reply_text == $badwords6 || $new_reply_text == $badwords7 || $new_reply_text == $badwords8 || $new_reply_text == $badwords9 || $new_reply_text == $badwords10) {

			?>
			<script type="text/javascript">alert('Your Comment does not Aloowed');</script>
			<?php
			}
			else {

			mysqli_query($connect, "INSERT INTO `children` (`user`, `text`, `date`, `par_code`) VALUES ('$new_reply_name', '$new_reply_text', '$new_reply_date', '$new_reply_code')") or die(mysqli_error());
			?>
			<meta http-equiv="refresh" content="2">
			<?php
			$message =  "<script>
			const toast = swal.mixin({
			  toast: true,
			  position: 'top-end',
			  showConfirmButton: false,
			  timer: 3000
			});

			toast({
			  type: 'success',
			 title: 'Comment Added'
			})
			</script>
			";
			}
		}
?>
