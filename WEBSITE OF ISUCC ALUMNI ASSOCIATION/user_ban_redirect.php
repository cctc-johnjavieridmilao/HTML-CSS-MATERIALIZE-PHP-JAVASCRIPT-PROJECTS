<?php  include 'functionusercontent.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Ban Account</title>
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="shortcut icon" href="img/alumniLogo.png"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
    
  <link rel="stylesheet" type="text/css" href="css/lightbox.css">

</head>
<style>
html,body{

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
    margin-top: -10px;
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
#imgg{
  margin-top: 5px;
}
.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;
}

@media screen and (max-width: 786px){
#imgg{
  margin-left: 205px;
  margin-top: 5px;
}
</style>
<body>
<header>
    <img src="img/alumnilogofirst.png">
    <h1 id="txt1"><font color="yellow">ISUCC<font color="white"> Alumni Association</font></font></h1>
    <h2 id="txt2"><font color="white"> <span class="fas fa-user-graduate" style="color: white;font-size: 15px;"></span> ALUMNI TRACKING</font></h2>
  </header>
  <br><br><br><br>
  <div class="container-fluid" >
  	<div class="row" >
		<div class="col-md-9 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-body">
        <blockquote >
        <p>Your Account Has Been Ban For 72 Hours! Due For Inputing False Information and By Using Profanity ):</p>
        <footer>Administrator</footer>
      </blockquote>
				</div>
			</div>
		</div>
	</div>
</div>

<?php PagesFooter(); ?>
<script src="js1/nprogress.js"></script>
 <script src="js/lightbox.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>
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