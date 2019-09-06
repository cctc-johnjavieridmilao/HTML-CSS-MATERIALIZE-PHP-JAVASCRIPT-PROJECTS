<?php 
include ('helper/function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="shortcut icon" href="img/alumniLogo.png"/>
	 <link rel="stylesheet" type="text/css" href="css/uikit.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
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
label{
	font-size: 12px;
}
 html,body{
 	
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
    height: 30px;
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
	<?php echo $alert; ?>
	<header>
		<img src="img/Logo.png">
		<h1 id="txt1"><font color="yellow">ISABELA STATE UNIVERSITY<font color="white"> CAUAYAN CAMPUS</font></font></h1>
		<h2 id="txt2"><font color="white">ALUMNI TRACKING</font></h2><div id="imgg"><img style="margin-top: -70px; margin-left: 17%; width: 30px;height: 30px;" src="img/graduate.png"></div>
	</header>
	<h1 style="margin-top: 15px; margin-left: 10px; font-size: 30px;">My Account Update</h1><hr>
   
    <div class="card" style="width: 40rem; margin-left: 350px;" >
  <div class="card-body">
    <h5 class="card-title">Update General Information</h5>
     <?php userupdate(); ?> 
  </div>
</div>
<div class="footer">
		<p style="font-size: 13px;">Alrights Reserve: &copy ISABELA STATE UNIVERSITY-Cauyan campus</p>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
</body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" id="insert_form" action="profile.php">
      	<label>FirstName</label>
        <input type="text" name="fname" id="fname" class="form-control">
        <label>LastName</label>
        <input type="text" name="lname" id="lname" class="form-control">
        <label>MiddleName</label>
        <input type="text" name="mname" id="mname" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


