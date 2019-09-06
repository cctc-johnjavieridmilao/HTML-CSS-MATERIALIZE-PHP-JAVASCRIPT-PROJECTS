<?php 
 include 'functionusercontent.php';
 ?> 
<?php 
include ('helper/function.php');
 include 'connection/mysqliconn.php'; 
$error = "";
//echo  $_SESSION['email'];
$fname = $_SESSION['firstname'];
$userfulname = $_SESSION['fullname'];
$querySelect = "SELECT * FROM children  WHERE user='$userfulname' ORDER BY date DESC";
$result = mysqli_query($connect,$querySelect);
?>
<?php 
if (empty($_SESSION['user_id'])) {
   header("Location:login.php");
   session_start();
   $_SESSION['Accloginfirst'] = "Login Firstsss";
}

?>
<?php 
$id = $_SESSION['user_id'];
include 'connection/mysqliconn.php';
if (isset($_POST['btn_update_photo'])) {
	$image = $_FILES["image"] ["name"];
	$tmp = $_FILES["image"] ["tmp_name"];
	$r = rand(1,500);
	move_uploaded_file($tmp, "images/$r$image");

	$query = "UPDATE account SET images='$r$image' WHERE acc_id='$id'";
	mysqli_query($connect,$query);
	header("Location:direct_profile.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="shortcut icon" href="img/alumniLogo.png"/>
	 <link rel="stylesheet" type="text/css" href="css/uikit.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.css">
	  <script src="js/uikit.js"></script>
    <script src="js/uikit.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="css/hover.css">
  <link rel="stylesheet" type="text/css" href="css/hover-min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
    
  <link rel="stylesheet" type="text/css" href="css/lightbox.css">
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
   event.preventDefault();
   $(this).ekkoLightbox();
 });
</script>
</head>
<style>
label{
	font-size: 12px;
}
 body{
 	overflow-x: hidden;
 	max-height: 100%;
 	background-color: #F1EEEE;
 }
 html,body{
 	background-color: #F1EEEE;
 	max-height: 100%;
 }
	header{
		background-color: green;
		width: 100%;
		height: 80px;
	}
	img{
		width: 70px;
		height: 70px;
		margin-left: 30px;
		margin-top: 5px;

	}
	h1{
		margin-top: -50px;
		margin-left: 110px;
		font-size: 20px;
		font-family: Century Gothic;
	}
	h2{
		margin-top: -20px;
		margin-left: 110px;
		font-size: 13px;
		font-family: Century Gothic;
	}


#txt h2{
	 font-family: Century Gothic;
	 font-size: 25px;
	 margin-top: 30px;
	 margin-left: 20px;
	border-bottom: 2px solid black;

}
#txt{
	width: 320px;
	position: absolute;
	top: 15%;
	left: 47.6%;
	transform: translate(-50%,50%);
	color: white;
	text-align: center;
}
input::-webkit-input-placeholder {
color: black !important;
}
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: green;
    color: white;
    text-align: center;
    height: 30px;
}
.uk-input:hover{
	background-color: green;
	transition: 1s;
	color: black;
}
 #nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}
@media screen and (max-width: 786px){
#txt1{
	margin-top: -60px;
	font-size: 18px;
}
#imgg{
	margin-left: 205px;
	margin-top: 5px;
}
.footer{
	height: 40px;
}

.input-group{
	margin-left: -50px;
}
#btn1{
	margin-left: -110px;
}
#insert_form{
	margin-left: -720px;
	margin-top: -40px;
}
#insert_form input{
	width: 310px;
}
#submit{
	margin-left: -40px;
}
#txtch {
	margin-left: -715px;
	margin-top: 350px;
}
html,body{
      max-width: 100%; 
       overflow-x: hidden; 
    }

}
</style>

<body>
	<?php 
	if(isset($_SESSION['Update'])):
		echo "<script>swal('Records Updated','','success');</script>";
	endif; 
	unset($_SESSION['Update']);

	if(isset($_SESSION['Update_img'])):
		echo "<script>swal('Profile Updated','','success');</script>";
	endif; 
	unset($_SESSION['Update_img']);

   if(isset($_SESSION['nodata'])):
		echo "<script>swal('No Records Found','','warning');</script>";
	endif; 
	unset($_SESSION['nodata']);

	if(isset($_SESSION['no update'])):
     echo "<script>swal('No Records Updated','','warning');</script>";
 	endif;
 	unset($_SESSION['no update']);
	?>
	<?php echo $error; ?>
	<?php echo $alert; ?>
	<?php PagesHeader(); ?>
	<h1 style="margin-top: 5px; margin-left: 30px; font-size: 30px;"><?php DisplayProfilename() ?><span><?php DisplayPhoto() ?></span> <span style="margin-left: 20px;"> <a class="btn btn-success" href="#modal-center" uk-toggle> <span class="fas fa-user-tie"> Change Photo</span></a> </span> <span> <a href='userdata.php' class='btn btn-info'> <span class="fas fa-user-edit"> View Records</span></a></span> <span> <a href='home.php' class='btn btn-danger btn'> <span class="fas fa-undo-alt"> Back</span></a></span> <button class="btn btn-default"> <span class="far fa-clock"></span> Time Today: <span id="timestamp"> </button> </span></h1>
    <div>
    <?php 
     if (mysqli_num_rows($result) > 0) {
     	while ($row = mysqli_fetch_array($result)) {
     		$code = $row['par_code'];
     		if (!$row['par_code']) {
     			echo "Error code";
     		}
     		else {
                	$query = "SELECT * FROM parents WHERE code= '$code'";
                	$res = mysqli_query($connect,$query);
                	if (mysqli_num_rows($res) > 0) {
                		while ($row = mysqli_fetch_array($res)) {
                		 if ($row['user'] == 0) {
                		 	echo $row['title'];
                		 }
                		}
                	}
     		}
     	}
     }
     else{
     	echo "No Data Found";
     }

    ?>
  
 <?php PagesFooter(); ?>
<script src="js1/nprogress.js"></script>
 <script src="js/lightbox.min.js"></script>
</html>
</body>
<script>
 NProgress.start();
NProgress.set(0.4);
//Increment 
var interval = setInterval(function() { NProgress.inc(); }, 1000);
$(document).ready(function(){
    NProgress.done();
    clearInterval(interval);
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
    setInterval(timestamp, 1000);
});

function timestamp() {
    $.ajax({
        url: 'timestamp.php',
        success: function(data) {
            $('#timestamp').html(data);
        },
    });
}
</script>
<script type="text/javascript">
  document.getElementById("oldpass").addEventListener("keyup", function() {
    var nameInput = document.getElementById('oldpass').value;
    if (nameInput != "") {
        document.getElementById('submit').removeAttribute("disabled");
    } else {
        document.getElementById('submit').setAttribute("disabled", null);
    }
});
</script>
<script type="text/javascript">
  document.getElementById("newpass").addEventListener("keyup", function() {
    var nameInput = document.getElementById('newpass').value;
    if (nameInput != "") {
        document.getElementById('cpass').removeAttribute("disabled");
    } else {
        document.getElementById('cpass').setAttribute("disabled", null);
    }
});
</script>
<script type="text/javascript">
  document.getElementById("cpass").addEventListener("keyup", function() {
    var nameInput = document.getElementById('cpass').value;
    if (nameInput != "") {
        document.getElementById('oldpass').removeAttribute("disabled");
    } else {
        document.getElementById('oldpass').setAttribute("disabled", null);
    }
});
</script>
<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
      'maxWidth':350,
      'fitImagesInViewport':true,
      'resizeDuration':900
    })
</script>
<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
            <form method="POST" enctype="multipart/form-data">
            	Select your Photo:<input  type="file" name="image" class="form-control" required accept="image/png, image/jpeg , image/png" >
            	<input type="submit" style="margin-top: 10px;" name="btn_update_photo" value="Update" class="btn btn-success btn-xs">
            </form>
    </div>
</div>
