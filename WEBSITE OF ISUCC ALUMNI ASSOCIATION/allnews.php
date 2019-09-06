<?php
 include 'connection/mysqliconn.php';  
$item_per_page = 6;

$results = mysqli_query($connect,"SELECT COUNT(*) FROM tbl_news");
$get_total_rows = mysqli_fetch_array($results); //total records

//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>All News</title>
	 <link rel="shortcut icon" href="img/alumniLogo.png"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
	<!-- Font Awesome -->
   <meta name="theme-color" content="green" />
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/hover.css">
  <link rel="stylesheet" type="text/css" href="css/hover-min.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
  <link rel="stylesheet" type="text/css" href="css/hover-min.css">
   <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
    <script src="js/lightbox.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
      <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
</head>
<style type="text/css">
	html,body{
	max-height: 100%;
	background-color: #F1EEEE;
}
	header{
		background-color: green;
		width: 100%;
		height: 80px;
	}
	#img{
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
	#txt2{
		margin-top: -10px;
		margin-left: 110px;
		font-size: 13px;
		font-family: Century Gothic;
	}

#txt h2{
	 font-family: Century Gothic;
	 font-size: 30px;
	 margin-top: 25px;
	 margin-left: 20px;
	border-bottom: 2px solid black;
	text-align: center;

}
#txt{
	width: 230px;
	position: absolute;
	top: 9%;
	left: 50%;
	transform: translate(-50%,50%);
	color: white;
}
input::-webkit-input-placeholder {
color: black !important;
}

.uk-input:hover{
	background-color: green;
	transition: 1s;
	color: black;
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

.pagination {
   display: -ms-flexbox;
  padding: 0px;
  margin: 0px;
  height: 30px;
  display: block;
  text-align: center;
}
.pagination li {
 position: relative;
  display: inline-block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: white;
  background-color: #fff;
  border: 1px solid #dee2e6;
}
.pagination .disabled {
  color: #6c757d;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #dee2e6;
  display: inline-block;
}
.pagination li a{
   -webkit-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  transition: all 0.3s linear;
  outline: 0;
  border: 0;
  background-color: transparent;
  font-size: 0.9rem;
  color: #212529;;
}
.pagination li:hover {
  z-index: 2;
  color: #0056b3;
  text-decoration: none;
  background-color: #e9ecef;
  border-color: #dee2e6;
}

.pagination li:focus {
  z-index: 2;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.pagination li:not(:disabled):not(.disabled) {
  cursor: pointer;
}

.pagination a:first-child .pagination li {
  margin-left: 0;
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.pagination a:last-child .pagination li {
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
}

#results .loading-indication{
  background: #FFFFFF;
  padding: 10px;
  margin-left: auto;
  margin-right: auto;
  position: absolute;
}

.lds-ring {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 51px;
  height: 51px;
  margin: 6px;
  border: 6px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: green transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


@media screen and (max-width: 786px){
  html,body{
  overflow-x: hidden;
  }
#txt1{
	margin-top: -60px;
	font-size: 18px;
}
#txt h2{
  font-size: 30px;
}
#imgg{
	margin-left: 205px;
	margin-top: 5px;
}
#txt{
	margin-top: -20px;
}
.footer{
	height: 40px;
}

}
</style>
<body>
<header>
		<img id="img" src="img/alumnilogofirst.png">
		<h1 id="txt1"><font color="yellow">ISUCC<font color="white"> Alumni Association</font></font></h1>
		<h2 id="txt2"><font color="white"><span class="fas fa-user-graduate" style="color: font-size: 11px;"></span>  ALUMNI NEWS </font> </h2>
	</header>
   <main class="mt-5 animated bounceInUp">
        <div class="container">
        <!--Section: Examples-->
            <section id="examples" class="text-center">

                <!-- Heading -->
                <h2 class="mb-3 font-weight-bold" style="text-transform: uppercase;color: green;font-size: 30px;">ALL <font color="#eab407">News</font> </h2>
                 <hr class=" accent-2 mb-5 mt-0 d-block mx-auto" style="width: 60px;background-color: green;height: 3px;">

                   
                 <div id="resulta_ann"></div>
                <div id="loader_an" class="lds-ring" style="display: none;height: 100px;"><div></div><div></div><div></div><div></div></div>
                <div class="pagination"></div>

                </div>
                <!--Grid row-->
              

            </section>
            <!--Section: Examples-->
        </div>
    </main>
    <br>
    <br>

<?php include 'homefooter.php'; ?>
  <script src="js1/nprogress.js"></script>
  <!-- Full Height Modal Right -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>
<script src="collapase/jquery.collapser.min.js"></script>
<script src="collapase/jquery.collapser.js"></script>
<!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
  //initial page number to load
  $("#resulta_ann").load("fetch_paginate_news.php").fadeIn('slow');
  $(".pagination").bootpag({
     total: <?php echo $pages; ?>,
     page: 1,
     maxVisible: 5 
  }).on("page", function(e, num){
    e.preventDefault();
    if(true){
      $("#loader_an").show();
      $("#resulta_ann").hide();
       setTimeout(function(){
        $("#loader_an").hide();
     $("#resulta_ann").fadeOut("slow").load("fetch_paginate_news.php", {'page':num}).fadeIn(1500);
    },2000);
    }
    
  });

});
</script>