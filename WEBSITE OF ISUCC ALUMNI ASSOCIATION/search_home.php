
<?php include 'functionusercontent.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Search</title>
   <link rel="shortcut icon" href="img/alumniLogo.png"/>
    <meta name="theme-color" content="green" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
</head>
<?php Logincss(); ?>
<style type="text/css">
#a{
 font-size: 17px;
  color: green;
}
#a:hover{
  border-right: 4px solid green;
  border-left:  5px solid green;
}
.abs{
 position: absolute;
}
	#nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}

.has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
   transition: 0.8s;
  }
  .text-danger{
    transition: 2s;
  }
  #date{
    font-size: 11px;
    display: block;
   color: black;
  }
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('img/circle-simple_light.gif') 50% 50% no-repeat;
    opacity: .8;
    display: none;
}
  @media screen and (max-width: 786px){
    #a:hover{
    display: block !important;
}
}
  

  
</style>
<header>
    <img id="img" src="img/alumnilogofirst.png">
    <h1 id="txt1"><font color="yellow">ISUCC<font color="white"> Alumni Association</font></font></h1>
    <h2 id="txt2"><font color="white"> <span class="fas fa-user-graduate" style="color: font-size: 15px;"></span> Alumni Search</font></h2>
  </header>
<body>
  
  <br><br>

<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <!-- Material form subscription -->
<div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
        <strong style="color: yellow;">Search News & Announcement</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">
        <div class="input-group md-form form-sm form-2 pl-0">
    <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search" name="name" id="name">
     <i class="fa fa-search" aria-hidden="true"></i>
    
</div>
 <div id="nameList"></div><br><br>
 <div class="loader"></div>
    </div>

</div>
<!-- Material form subscription -->
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
<br><br>
<?php include 'homefooter.php'; ?>
<script src="js1/nprogress.js"></script>
 <script src="js/lightbox.min.js"></script>
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
<!-- iCheck -->
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
<script>
  $(document).ready(function(){
     var Delay = 500;
    $('#name').keyup(function(){
      var query = $(this).val();
      if (query != '') {
        $.ajax({
                 url:"search4.php",  
                 method:"POST",
                 data:{query:query},
                 beforeSend:function()
                   {
                     $(".loader").show();
                   },
                 success:function(data)
                 {
                  setTimeout(function() {
                    $(".loader").hide();
                    $('#nameList').fadeIn();
                  $('#nameList').html(data);
                  }, Delay);
                 }
        });
      }
      else
      {
             $('#nameList').fadeOut();
             $('#nameList').html("");
      }
    });
    $(document).on('click','li', function(){
          $('#nameList').val($(this).text());
          $('#nameList').fadeOut();
    });
  });
</script>
