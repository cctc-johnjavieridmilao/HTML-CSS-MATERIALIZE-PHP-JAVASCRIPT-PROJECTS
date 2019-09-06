<?php 
session_start();
if(empty($_SESSION['u_name'])){
    header("location:register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Resto | Serve</title>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
</head>
<style>
.d {
  position: fixed;
  top: 0;
  width: 100%;
}
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
</style>
<body>
<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay d">
  <header class="bmd-layout-header">
    <div class="navbar navbar-light bg-faded">
      <button class="navbar-toggler" type="button" data-toggle="drawer" data-target="#dw-s2">
        <span class="sr-only">Toggle drawer</span>
        <i class="material-icons">menu</i>
      </button>
      <ul class="nav navbar-nav">
        <li class="nav-item"><?php echo $_SESSION['u_name']; ?></li>
      </ul>
    </div>
  </header>
  <div id="dw-s2" class="bmd-layout-drawer bg-faded">
    <header>
      <img src="photos/logo.jpg" style="height: 100px;object-fit: cover;">
    </header>
     <?php include 'sidebar1.php'; ?>
  </div>
  <main class="bmd-layout-content">
    <div class="container">
    <br>
    <nav class="navbar navbar-light bg-light">
  	<a class="navbar-brand" href="#">About</a>
	</nav>
	<br>
   <div class="card">
  <img class="card-img-top" src="photos/rykas.jpg" alt="Card image cap">
  <div class="card-body">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cabatuan Road, Cauayan City, Isabela</li>
    <li class="list-group-item">WMXX+WM Cabatuan, Isabela</li>
    <li class="list-group-item">09159765057</li>
  </ul>
  </div>
</div>

    </div>
  </main>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>