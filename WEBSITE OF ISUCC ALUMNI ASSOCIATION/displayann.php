<?php 
 include 'connection/mysqliconn.php';  
  $sql = "SELECT * FROM announce ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 ?>  
 <?php 
 include 'fetchcomment.php';
 include ('helper/function.php');
?>  
<!DOCTYPE html>
<html>
<head>
	<title>AnnouceMent</title>
	<link rel="shortcut icon" href="img/alumniLogo.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="js/uikit.js"></script>
    <script src="js/uikit.min.js"></script>

</head>
<style>
	
	html,body{
		
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
		margin-top: -5px;
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
	left: 50%;
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

}
@media screen and (max-width: 786px){
	#button{
		margin-top: 60px;
		margin-left: -360px;
	}
	#dbtn{
		margin-left: -130px;
	}
	#container{
		margin-top: -66px !important;
	}

}
</style>
<body>
	<?php echo $alert; ?>
	<header>
		<img src="img/Logo.png">
		<h1 id="txt1"><font color="yellow">ISABELA STATE UNIVERSITY<font color="white"> CAUAYAN CAMPUS</font></font></h1>
		<h2 id="txt2"><font color="white">ALUMNI TRACKING</font></h2><div id="imgg"><img style="margin-top: -60px; margin-left: 17%; width: 30px;height: 30px;" src="img/graduate.png"></div>
	</header>
    <h3 style="margin-left: 10px; margin-top: 10px;">Alumni AnnounceMent</h3><hr>
    <div id="button"><button  style="margin-left: 370px; margin-top: -120px;" class="btn btn-primary" onclick="window.location.reload()"><span class="fas fa-retweet">NewsFeed</span></button></div>
    <div id="dbtn"><a href="home.php" style="color: white;"><button style="margin-left: 270px; margin-top: -160px;" class="btn btn-danger"><span class="fas fa-home">Home</span></a></button></a></div>
    <div id="container" style="margin-top: -37px;">
	<?php
     while($row = mysqli_fetch_array($result))  
     {  
     ?> 
      <div class="panel panel-success">
      	<div class="panel-heading"><?php echo $row['subject']; ?></div>
      	<div class="panel-body"><?php echo $row['annoucement']; ?></div>
      	<div class="panel-footer">Date: <?php echo $row['date']; ?> <a href="addcomment.php" class="btn btn-primary" style="float: right; margin-top: -7px;">Add Comment</a></div>
      </div>
     <?php
     }   
   ?>  
   </div>
   <div style="margin-top: -20px; width: 800px; margin-left: 10px; position: relative;"><?php DisplayComment() ?></div>
   <div class="footer">
   	<p>Alrights Reserve: &copy ISABELA STATE UNIVERSITY-Cauyan campus</p>
   </div>
   <style type="text/css">
		.footer{
			position: fixed;
			bottom: 0;
		}
	</style>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>