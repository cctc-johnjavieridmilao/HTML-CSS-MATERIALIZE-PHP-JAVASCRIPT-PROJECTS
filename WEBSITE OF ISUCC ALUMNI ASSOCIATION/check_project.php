<?php
$message = "";
	// new comment
	if (isset($_POST['new_project'])) {
   $subject = $_POST['subject'];
   $news = $_POST['editor3'];
   $image = $_FILES["image"] ["name"];
    $tmp = $_FILES["image"] ["tmp_name"];
    $r = rand(1,500);
    move_uploaded_file($tmp, "images/$r$image");
    $new_com_code = generateRandomString();

	    $query = "INSERT INTO  tbl_project (subject,project,image,code
	) VALUES ('$subject','$news','$r$image','$new_com_code')";

	mysqli_query($connect,$query);
	echo '<meta http-equiv="refresh" content="2">';
	$message =  "<script>swal('Project Posted!','click okay','success');</script>";

	}
	// new reply
		if(isset($_POST['new_reply'])) {
		$new_reply_name =  $_SESSION['fullname'];
		$new_reply_text = $_POST['new-reply'];
		$new_reply_date = date('Y-m-d H:i:s');
		$new_reply_code = $_POST['code'];
		include 'badwords.php';

		if($new_reply_text ==  $badwords || $new_reply_text == $badwords1 || $new_reply_text == $badwords2 || $new_reply_text == $badwords3 || $new_reply_text == $badwords4 || $new_reply_text == $badwords5 || $new_reply_text == $badwords6 || $new_reply_text == $badwords7 || $new_reply_text == $badwords8 || $new_reply_text == $badwords9 || $new_reply_text == $badwords10)
		 {

			$message =  "<script>
		const toast = swal.mixin({
		  toast: true,
		  position: 'top-end',
		  showConfirmButton: false,
		  timer: 3000
		});

		toast({
		  type: 'error',
		 title: 'your Comment does not Allowed or out of the Topic'
		})
		</script>";
		}
		else{
			mysqli_query($connect, "INSERT INTO `tbl_project_children` (`user`, `text`, `date`, `par_code`) VALUES ('$new_reply_name', '$new_reply_text', '$new_reply_date', '$new_reply_code')") or die(mysqli_error());
				echo '<meta http-equiv="refresh" content="3">';
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
			</script>";
		}
		
	}
?>