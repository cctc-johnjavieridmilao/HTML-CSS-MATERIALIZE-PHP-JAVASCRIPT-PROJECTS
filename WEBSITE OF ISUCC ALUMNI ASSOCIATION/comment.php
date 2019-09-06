<?php require_once 'connect.php'; require_once 'functions.php'; include 'functionusercontent.php';?>
<?php 
if (empty($_SESSION['user_id'])) {
   header("Location:login.php");
   $_SESSION['commentLoginfirst'] = "Please Login First";
}
?>
<!doctype html>
<html>
	<head>
		<title>AnnounceMent</title>
		<link rel="shortcut icon" href="img/alumniLogo.png"/>
		<meta charset="UTF-8" lang="en-US">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style21.css">
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script src="js/global.js"></script>
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="https:/resources/demos/style.css">
	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script>
	  $( function() {
	    $( document ).tooltip();
	  } );
  </script>
   
	</head>
	</style>
	<body>
	<?php NewsandCommentCss(); ?>
    <h3 style="margin-left: 10px; margin-top: 10px;">Alumni AnnounceMent</h3><hr>
    <div id="dbtn"><a href="home.php" style="color: white;"><button style="margin-left: 270px; margin-top: -130px;" class="btn btn-danger"><span class="fas fa-home">Home</span></a></button></a></div>
		<div class="page-container" style="margin-top: -60px;">
			<div id="post" style="margin-left: 280px;"><?php get_total() ?></div>
			<?php 
				require_once 'check_com.php';
				echo $message;
			?>
			<?php get_comments(); ?>
			
		</div>
		<script src="collapase/jquery.collapser.min.js"></script>
		<script src="collapase/jquery.collapser.js"></script>
	</body>
</html>
<script>load_unseen_notification();</script>
 <script>
$(document).ready(function(){
 $('.cmt-box p').collapser({
    mode: 'words',
    truncate: 20
});
});
</script>
 <script>
$(document).ready(function(){
 $('.cmt-box1 p').collapser({
    mode: 'words',
    truncate: 20
});
});
</script>
<style>
	.panel{
		border-color: white;
	}
	#new-reply{
		max-width: 300px;
	}
	#form-reply{
		float: left;
	}
</style>