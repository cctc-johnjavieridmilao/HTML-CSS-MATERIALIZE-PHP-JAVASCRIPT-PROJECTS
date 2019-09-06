<?php include 'helper/function.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Confirm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="shortcut icon" href="img/alumniLogo.png"/>
	 <link rel="stylesheet" type="text/css" href="css/uikit.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="css/hover.css">
  <link rel="stylesheet" type="text/css" href="css/hover-min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
</head>
<style>
 html,body{
 	overflow-y: hidden;
 	max-height: 100%;
 	background-color: #F1EEEE;
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
}
.uk-input:hover{
	background-color: green;
	transition: 1s;
	color: black;
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
}
</style>

<body>
	<header>
		<img src="img/alumnilogofirst.png">
		<h1 id="txt1"><font color="yellow">ISUCC<font color="white"> Alumni Association</font></font></h1>
		<h2 id="txt2"><font color="white">ALUMNI TRACKING</font></h2><div id="imgg"><img style="margin-top: -70px; margin-left: 17%; width: 30px;height: 30px;" src="img/graduate.png"></div>
	</header>
	<div id="txt">
	<h2>CONFIRMATION CODE!</h2>
	</div>
<div class="container" style="margin-top: 70px;">
	<div class="row">
		<div class="col-md-5" style="margin-top: 100px; margin-left: 30%;">
			<?php
               if (isset($_SESSION['account_create'])):
               	 echo "<script>swal('Your Account is successFully Created Check you Email Now','click okay','success');</script>";
               endif;
               unset($_SESSION['account_create']);
               
             
             if (isset($_SESSION['please confirm'])):
               	echo "<script>swal('Please Confirm your Email','click okay','error');</script>";
               endif;
               unset($_SESSION['please confirm']);

			 ?>
			<form method="POST" action="">
				<div class="form-group" style="margin-top: -20px; margin-left: -40px;">
				<?php confirm_email();  ?>
				</div>
				<div class="form-group" style="margin-left: -40px;">
					<div class="input-group">
						<span class="input-group-addon"><span class="fa fa-user-lock"></span></span>
					<input type="text" name="confirm_code" style="height: 50px;" class="uk-input left-border-none hvr-bounce-in" placeholder="Enter Confirmation code...">
				</div>
			</div>
					<div class="form-group col-md-offset-3" style="margin-top: 10px; margin-left: 100px;">
                    <input type="submit" name="confirm" id="btn1" value="Confirm" class="uk-button uk-button-primary hvr-pulse">
                    </div>
				</div>
			</form>

		</div>
	</div>
</div>

<div class="footer">
		<p>Alrights Reserve: &copy ISABELA STATE UNIVERSITY-Cauyan campus</p>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></body>
</html>