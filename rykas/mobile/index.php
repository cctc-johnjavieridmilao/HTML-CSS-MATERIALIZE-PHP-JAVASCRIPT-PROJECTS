<?php
include 'function/count.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rykas</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<style>
body::-webkit-scrollbar {
    width: .5em;
}
 
body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
  }
.has-error{
 border-color:#cc0000;
 background-color:#ffff99;
 transition: 0.8s;
}
@media screen and (orientation: landscape) {
    .ui-mobile .ui-page {
        min-height: 0 !important;
    }
}
</style>
<body>
  <!-- Index page -->
<div data-role="page" id="index">
    <div data-role="panel" id="menu" data-display="overlay">
    <img src="photos/logo.jpg" style="object-fit: cover;height: 120px;">
     <ul data-role="listview" data-filter="true" data-filter-placeholder="Search Menus..." data-inset="true">
    <li><a href="#appetizer" data-transition="slide">Appetizers <span class="ui-li-count"><?php count_appe(); ?></span></a></li>
    <li><a href="#beef" data-transition="slide">Beef <span class="ui-li-count"><?php count_beef(); ?></span></a></li>
    <li><a href="#chicken" data-transition="slide">Chicken <span class="ui-li-count"><?php count_chicken(); ?></span></a></li>
    <li><a href="#hotsoup" data-transition="slide">Hot Soup <span class="ui-li-count"><?php count_hot_soup(); ?></span></a></li>
    <li><a href="#p_corner" data-transition="slide">Pinoy Corner <span class="ui-li-count"><?php count_p_corner(); ?></span></a></li>
    <li><a href="#sizzlings" data-transition="slide">Sizzlings <span class="ui-li-count"><?php count_sizzlins(); ?></span></a></li>
    <li><a href="#vegetables" data-transition="slide">Vegetables <span class="ui-li-count"><?php count_vegetables(); ?></span></a></li>
	</ul>
	</div>

	<div data-role="panel" id="options" data-position="right" data-display="overlay">
     <ul data-role="listview" data-inset="true">
    <li><a href="#about" data-transition="slide">About</a></li>
    <li><a href="#feedback" data-transition="slide">Send Feedback</a></li>
    <li><a class="goto">Admin</a></li>
	</ul>
	</div>
    
	<div data-role="header">
		 <a href="#menu" data-icon="bars" class="ui-btn-left">Menu</a>
		  <a href="#options" data-icon="gear" class="ui-btn-right">Options</a>
		<h1>Resto Serve</h1>
	</div>

	<div data-role="content">
	<div class="ui-grid-b ui-responsive">
    <div class="ui-block-a"><div class="ui-body ui-body-d">
   <img src="MENU/APPETIZERS/CALAMARES P.260.00.jpg" style="object-fit: cover;height: 100px;width: 350px;" class="picla" data-label-class="label-class" alt="Appetizers"/>
	</div>
	</div>
    <div class="ui-block-b"><div class="ui-body ui-body-d">
    <img src="MENU/BEEF/BEEF WITH AMPALAYA P.230.00.jpg" class="picla" style="object-fit: cover;height: 100px;width: 350px;" data-label-class="label-class" alt="Beef"/>
    </div>
	</div>
    <div class="ui-block-c"><div class="ui-body ui-body-d">
   <img src="MENU/CHICKEN/HOT CHILI WINGS P.230.00.jpg" style="object-fit: cover;height: 100px;width: 350px;" class="picla" data-label-class="label-class" alt="Chicken"/>
	</div>
	</div>
	<div class="ui-block-c"><div class="ui-body ui-body-d">
   <img src="MENU/HOT SOUP/MUSHROOM SOUP P.250.00.jpg" style="object-fit: cover;height: 100px;width: 350px;" class="picla" data-label-class="label-class" alt="Hot Soup"/>
	</div>
	</div>
	<div class="ui-block-c"><div class="ui-body ui-body-d">
   <img src="MENU/PINOY CORNER/ADOBONG NATIVE NA MANOK P.250.00.jpg" style="object-fit: cover;height: 100px;width: 350px;" class="picla" data-label-class="label-class" alt="Pinoy Corner"/>
	</div>
	</div>
	<div class="ui-block-c"><div class="ui-body ui-body-d">
   <img src="MENU/SIZZLINGS/SIZZLING CHILI SQUID P.260.00.jpg" style="object-fit: cover;height: 100px;width: 350px;" class="picla" data-label-class="label-class" alt="Sizzlings"/>
	</div>
	</div>
	<div class="ui-block-c"><div class="ui-body ui-body-d">
   <img src="MENU/VAGETABLES/GISING GISING P.230.00.jpg" style="object-fit: cover;height: 100px;width: 350px;" class="picla" data-label-class="label-class" alt="Vegetables"/>
	</div>
	</div>
</div><!-- /grid-b -->
</div><!-- /grid-a -->

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>	
</div>

<!-- appetizer page -->
<div data-role="page" id="appetizer">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>Appetizers</h1>
	</div>
	<div data-role="content">
	<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Search...">
	<?php 
    include 'conn/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Appetizers'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
     foreach ($res as $value) {
      $output = "";
      $output.='
       <li class="view" id="'.$value['id'].'">
    	<a id="'.$value['id'].'" data-transition="slide">
        <img src="upload/'.$value['image'].'" style="object-fit: cover;height: 80px;">
        <h2>'.mb_strimwidth($value['name'], 0, 20, '...').'</h2>
        <p>'.$value['description'].'</p>
    	</a>
   	 </li>
      ';
      echo $output;
     }
    }
    else{
     $output = "No Available Data";
     echo $output;
    }
    
	?>
</ul>
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- beef page -->
<div data-role="page" id="beef">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>Beef</h1>
	</div>

	<div data-role="content">
	<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Search...">
	<?php 
    include 'conn/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Beef'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
     foreach ($res as $value) {
      $output = "";
      $output.='
       <li class="view_beef" id="'.$value['id'].'">
    	<a>
        <img src="upload/'.$value['image'].'" style="object-fit: cover;height: 80px;">
        <h2>'.mb_strimwidth($value['name'], 0, 20, '...').'</h2>
        <p>'.$value['description'].'</p>
    	</a>
   	 </li>
      ';
      echo $output;
     }
    }
    else{
     $output = "No Available Data";
     echo $output;
    }
    
	?>
</ul>
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- chicken page -->
<div data-role="page" id="chicken">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>Chicken</h1>
	</div>

	<div data-role="content">
	<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Search...">
	<?php 
    include 'conn/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Chicken'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
     foreach ($res as $value) {
      $output = "";
      $output.='
       <li class="view_chicken" id="'.$value['id'].'">
    	<a>
        <img src="upload/'.$value['image'].'" style="object-fit: cover;height: 80px;">
        <h2>'.mb_strimwidth($value['name'], 0, 20, '...').'</h2>
        <p>'.$value['description'].'</p>
    	</a>
   	 </li>
      ';
      echo $output;
     }
    }
    else{
     $output = "No Available Data";
     echo $output;
    }
    
	?>
</ul>
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- hotsuop page -->
<div data-role="page" id="hotsoup">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>Hot Soup</h1>
	</div>

	<div data-role="content">
     	<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Search...">
	<?php 
    include 'conn/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Hot Soup'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
     foreach ($res as $value) {
      $output = "";
      $output.='
       <li class="view_soup" id="'.$value['id'].'">
    	<a>
        <img src="upload/'.$value['image'].'" style="object-fit: cover;height: 80px;">
        <h2>'.mb_strimwidth($value['name'], 0, 20, '...').'</h2>
        <p>'.$value['description'].'</p>
    	</a>
   	 </li>
      ';
      echo $output;
     }
    }
    else{
     $output = "No Available Data";
     echo $output;
    }
    
	?>
</ul>
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- p_corner page -->
<div data-role="page" id="p_corner">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>Pinoy Corner</h1>
	</div>

	<div data-role="content">
		<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Search...">
	<?php 
    include 'conn/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Pinoy Corner'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
     foreach ($res as $value) {
      $output = "";
      $output.='
       <li class="view_pinoycorner" id="'.$value['id'].'">
    	<a href="#">
        <img src="upload/'.$value['image'].'" style="object-fit: cover;height: 80px;">
        <h2>'.mb_strimwidth($value['name'], 0, 20, '...').'</h2>
        <p>'.$value['description'].'</p>
    	</a>
   	 </li>
      ';
      echo $output;
     }
    }
    else{
     $output = "No Available Data";
     echo $output;
    }
    
	?>
</ul>
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- sizzlings page -->
<div data-role="page" id="sizzlings">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>Sizzlings</h1>
	</div>

	<div data-role="content">
		<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Search...">
	<?php 
    include 'conn/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Sizzlings'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
     foreach ($res as $value) {
      $output = "";
      $output.='
       <li class="view_sizzlings" id="'.$value['id'].'">
    	<a href="#">
        <img src="upload/'.$value['image'].'" style="object-fit: cover;height: 80px;">
        <h2>'.mb_strimwidth($value['name'], 0, 20, '...').'</h2>
        <p>'.$value['description'].'</p>
    	</a>
   	 </li>
      ';
      echo $output;
     }
    }
    else{
     $output = "No Available Data";
     echo $output;
    }
    
	?>
</ul>
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- vegetables page -->
<div data-role="page" id="vegetables">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>Vegetables</h1>
	</div>

	<div data-role="content">
		<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Search...">
	<?php 
    include 'conn/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Vagetables'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
     foreach ($res as $value) {
      $output = "";
      $output.='
       <li class="view_vegetables" id="'.$value['id'].'">
    	<a href="#">
        <img src="upload/'.$value['image'].'" style="object-fit: cover;height: 80px;">
        <h2>'.mb_strimwidth($value['name'], 0, 20, '...').'</h2>
        <p>'.$value['description'].'</p>
    	</a>
   	 </li>
      ';
      echo $output;
     }
    }
    else{
     $output = "No Available Data";
     echo $output;
    }
    
	?>
</ul>
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- about page -->
<div data-role="page" id="about">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>About</h1>
	</div>

	<div data-role="content">
     <img src="photos/rykas.jpg" style="object-fit: cover;height: 200px;width: 350px;" class="picla" data-label-class="label-class" alt="About Rykas"/>
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- feedback page -->
<div data-role="page" id="feedback">

	<div data-role="header">
		 <a href="#index" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1>Send Feedback</h1>
	</div>

	<div data-role="content">
	<div id="al"></div>
	<form method="post" id="form_data">
	<label for="text-basic">Name:</label>
	<input type="text" name="name" id="name">
	<label for="text-basic">Email:</label>
	<input type="email" name="email" id="email">
	<label for="text-basic">Topic:</label>
	<input type="text" name="topic" id="topic">
	<label for="textarea">Message:</label>
	<textarea cols="5" rows="5" name="msg" id="msg"></textarea>
	<br>
	<button type="submit" id="send" class="ui-btn ui-icon-check ui-btn-icon-left" data-icon="back">Send Feedback</button>
	</div>
   	</form>
	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>
<!-- viewappe page -->
<div data-role="page" id="view">

	<div data-role="header">
		 <a href="#appetizer" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1 id="tt">View</h1>
	</div>

	<div data-role="content" id="cn">
     
   
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>

<!-- viewbeef page -->
<div data-role="page" id="view_beef">

	<div data-role="header">
		 <a href="#beef" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1 id="tt">View</h1>
	</div>

	<div data-role="content" id="show_beef">
     
   
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>
<!-- viewchicken page -->
<div data-role="page" id="view_chicken">

	<div data-role="header">
		 <a href="#chicken" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1 id="tt">View</h1>
	</div>

	<div data-role="content" id="show_chicken">
     
   
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>
<!-- viewhotsoup page -->
<div data-role="page" id="view_soup">

	<div data-role="header">
		 <a href="#hotsoup" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1 id="tt">View</h1>
	</div>

	<div data-role="content" id="show_soup">
     
   
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>
<!-- view hot pinoy corner page -->
<div data-role="page" id="view_pinoycorner">

	<div data-role="header">
		 <a href="#p_corner" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1 id="tt">View</h1>
	</div>

	<div data-role="content" id="show_pinoycorner">
     
   
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>
<!-- view sizzlings -->
<div data-role="page" id="view_sizzlings">
<div data-role="header">
		 <a href="#sizzlings" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1 id="tt">View</h1>
	</div>

	<div data-role="content" id="show_sizzlings">
     
   
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>
<!-- view vegetables -->
<div data-role="page" id="view_vegetables">
<div data-role="header">
		 <a href="#vegetables" data-direction="reverse" data-icon="back" data-transition="slide">Back</a>
		<h1 id="tt">View</h1>
	</div>

	<div data-role="content" id="show_vegetables">
     
   
	</div>

	<div data-role="footer" data-position="fixed">
		<h4>&copy Rykas Hotel</h4>
	</div>
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="rykas_js/picla.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
$('#form_data').on('submit', function(event){
event.preventDefault();
var name = $('#name').val();
var email = $('#email').val();
var topic = $('#topic').val();
var msg = $('#msg').val();

if (name == "" || name == null) {
 $('#al').slideDown('slow').html('<a href="#" class="ui-btn ui-icon-delete ui-btn-icon-left ui-shadow-icon" style="color:red;">Empty Name</a>').fadeOut('slow');
 $('#name').focus();
}
else if(email == "" || email == null){
 $('#al').slideDown('slow').html('<a href="#" class="ui-btn ui-icon-delete ui-btn-icon-left ui-shadow-icon" style="color:red;">Empty Email</a>').fadeOut('slow');
 $('#email').focus();	
}
else if(topic == "" || topic == null){
 $('#al').slideDown('slow').html('<a href="#" class="ui-btn ui-icon-delete ui-btn-icon-left ui-shadow-icon" style="color:red;">Empty Topic</a>').fadeOut('slow');
 $('#topic').focus();
}
else if(msg == "" || msg == null){
$('#al').slideDown('slow').html('<a href="#" class="ui-btn ui-icon-delete ui-btn-icon-left ui-shadow-icon" style="color:red;">Empty Message</a>').fadeOut('slow');
$('#msg').focus();
}
else{
$.ajax({
url:"send_feedback.php",
method:"POST",
data:
$('#form_data').serialize()
,
cache:false,
beforeSend:function(){
$.mobile.loading('show');
},
complete:function(){
$.mobile.loading('hide');
},
success:function(data){
$('#al').fadeIn('slow').html(data);	
$('#form_data')[0].reset();
}
});
}

});
$.mobile.defaultPageTransition = "slide";

$('.view').click(function(){
var id = $(this).attr("id");
$.ajax({
url:"view.php",
method:"POST",
data:{id:id},
success:function(data){
$('#cn').html(data);
window.location.href = "#view";
}
});
});
$('.view_beef').click(function(){
var id = $(this).attr("id");
$.ajax({
url:"view.php",
method:"POST",
data:{id:id},
success:function(data){
$('#show_beef').html(data);
window.location.href = "#view_beef";
}
});
});
$('.view_chicken').click(function(){
var id = $(this).attr("id");
$.ajax({
url:"view.php",
method:"POST",
data:{id:id},
success:function(data){
$('#show_chicken').html(data);
window.location.href = "#view_chicken";
}
});
});
$('.view_soup').click(function(){
var id = $(this).attr("id");
$.ajax({
url:"view.php",
method:"POST",
data:{id:id},
success:function(data){
$('#show_soup').html(data);
window.location.href = "#view_soup";
}
});
});
$('.view_pinoycorner').click(function(){
var id = $(this).attr("id");
$.ajax({
url:"view.php",
method:"POST",
data:{id:id},
success:function(data){
$('#show_pinoycorner').html(data);
window.location.href = "#view_pinoycorner";
}
});
});
$('.view_sizzlings').click(function(){
var id = $(this).attr("id");
$.ajax({
url:"view.php",
method:"POST",
data:{id:id},
success:function(data){
$('#show_sizzlings').html(data);
window.location.href = "#view_sizzlings";
}
});
});
$('.view_vegetables').click(function(){
var id = $(this).attr("id");
$.ajax({
url:"view.php",
method:"POST",
data:{id:id},
success:function(data){
$('#show_vegetables').html(data);
window.location.href = "#view_vegetables";
}
});
});
});
</script>
 <script type="text/javascript">
    	$(document).ready(function(){
          $('.goto').click(function(){
             window.location.href = "../admin/login.php";
          });
    	});
    </script>