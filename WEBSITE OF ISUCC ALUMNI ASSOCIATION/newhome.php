<?php include 'helper/function.php'; ?>
<?php include 'visitor.php'; ?>
<?php include 'functionusercontent.php'; ?>
<?php 
ob_start();
if(isset($_SESSION['user_id'])){
    header("Location: home.php"); 
  }
?>
<?php
include 'connection/mysqliconn.php';

$item_per_page = 1;

$results = mysqli_query($connect,"SELECT COUNT(*) FROM tbl_project");
$get_total_rows = mysqli_fetch_array($results); //total records

//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page); 

?>
<!DOCTYPE html>
<html>
<head>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b92a67f11e1d40011d81637&product=sticky-share-buttons' async='async'></script>  
<title>Home</title>
<link rel="shortcut icon" href="img/alumniLogo.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="theme-color" content="green" />
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" type="text/css" href="css/style3.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="css/hover.css">
<link rel="stylesheet" type="text/css" href="css/hover-min.css">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<link rel="stylesheet" type="text/css" href="css/lightbox.css">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome-animation.min.css">
<link rel="stylesheet" type="text/css" href="js1/nprogress.css">
<link rel="stylesheet" type="text/css" href="css/notiny.min.css">
<link rel="stylesheet" type="text/css" href="loader/dist/css/introLoader.min.css">
<link rel="stylesheet" type="text/css" href="loader/dist/css/introLoader.css">

</head>
<style>

  @media screen and (max-width: 786px){

    html,body{
      max-width: 100%; 
       overflow-x: hidden; 
    }
    .leftside{
      display: none;
    }
    #ann123{
     width: 20rem;
     margin-top: 15px;
    }
  
   iframe{
    width: 20rem;
   }
   #img-thumbnail{
    width: 250px;
   }
   .collapse ul{
     
       margin-left: -1.5% !important;
     }
     .navbar-nav ul{
      margin-left: -10% !important;
     }
     #pics{
      display: none;
     }
  }
  #animated1{
   -webkit-animation-delay: 1ms;
  }
  #animated2{
   -webkit-animation-delay: 700ms;
  }
  #animated3{
   -webkit-animation-delay: 900ms;
  }
   #animated4{
   -webkit-animation-delay: 1150ms;
  }
   #animated5{
   -webkit-animation-delay: 1450ms;
  }
  #animated6{
   -webkit-animation-delay: 1700ms;
  }
  #animated7{
   -webkit-animation-delay: 2300ms;
  }
   #animated8{
   -webkit-animation-delay: 2700ms;
  }
  #animated9{
   -webkit-animation-delay: 20s;
  }

  /* Sweep To Right */
.hvr-sweep-to-right:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #d8d8d8;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transform-origin: 0 50%;
  transform-origin: 0 50%;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.hvr-sweep-to-right:hover, .hvr-sweep-to-right:focus, .hvr-sweep-to-right:active {
  color: white;
}
.hvr-sweep-to-right:hover:before, .hvr-sweep-to-right:focus:before, .hvr-sweep-to-right:active:before {
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
/* Sweep To Left */
.hvr-sweep-to-left {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  position: relative;
  -webkit-transition-property: color;
  transition-property: color;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.hvr-sweep-to-left:before {
  content: "";
  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
   background: #d8d8d8;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transform-origin: 100% 50%;
  transform-origin: 100% 50%;
  -webkit-transition-property: transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.hvr-sweep-to-left:hover, .hvr-sweep-to-left:focus, .hvr-sweep-to-left:active {
  color: white;
}
.hvr-sweep-to-left:hover:before, .hvr-sweep-to-left:focus:before, .hvr-sweep-to-left:active:before {
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}

.searchbtn{
  font-size:20px;
  background:green;
  position:absolute;
  display:inline-block;
  width:50px;
  height:40px;
  text-align:center;
  color:white;
  text-decoration:none;
  background-color:green;
  color:white;
  border-bottom:4px solid white;
  border-radius:0 0 2px 2px;
  -webkit-transition: background-color 250ms ease-out, ;
  -moz-transition: background-color 250ms ease-out;
  -o-transition: background-color 250ms ease-out;
  transition: background-color 250ms ease-out;
}

.searchbtn:hover{ 
  background-color:green;
}
.searchbtn1{
  font-size:20px;
  background:green;
  position:absolute;
  display:inline-block;
  width:50px;
  height:40px;
  text-align:center;
  color:white;
  text-decoration:none;
  background-color:green;
  color:white;
  border-radius:0 0 2px 2px;
  -webkit-transition: background-color 250ms ease-out, ;
  -moz-transition: background-color 250ms ease-out;
  -o-transition: background-color 250ms ease-out;
  transition: background-color 250ms ease-out;
}

.searchbtn1:hover{ 
  color: yellow;
}
.searchform{
 margin:0;
 display:none;
 background:green;
 padding:20px 42px;
 text-align:center;
 position:relative;
 transition:background-color 500ms linear;
}

.searchfield{
 border:none;
 padding:10px 0;
 background:none;
 color:white;
 outline:none;
 border-bottom:1px solid white;
 width:80%;
 font-size:26px;
}

input::-webkit-input-placeholder {
 color: rgba(255,255,255,0.6);
}

.submitbtn{
 background:none;
 border:none;
 font-size:36px;
 color:white;
}
.sticky-top {
    transition: all 0.25s ease-in;
}
  #a{
       font-family: Century Gothic;
       color: black;
       font-size: 16px;
       overflow: hidden;
       text-overflow: ellipsis;
       display: -webkit-box;
       line-height: 16px;     /* fallback */
       max-height: 62px;      /* fallback */
       -webkit-line-clamp: 1; /* number of lines to show */
       -webkit-box-orient: vertical;
    }
    #a:hover{
     text-decoration: underline;
      color: black;
    }
  #ul1{
    cursor: pointer;
     display: inline-block;
     
  }
  #li{
    padding: 12px;

  }
  #li:hover{
   
  }

.navbar{
  -webkit-transition: all 0.5s ease;
  -moz-transition: position 10s;
  -ms-transition: position 10s;
  -o-transition: position 10s;
  transition: all 0.5s ease;
}
.fixed {
  position: sticky;
  top: 0;
  left: 0;
  animation: smoothScroll 1s forwards;
  z-index: 100;
}
@keyframes smoothScroll {
  0% {
    transform: translateY(-100px);
  }
  100% {
    transform: translateY(0px);
  }
}
.modal-body::-webkit-scrollbar {
    width: .2em;
}
 
.modal-body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
.modal-body::-webkit-scrollbar-thumb {
  background-color: green;
  outline: 1px solid slategrey;
  }
  .form-control:focus {
    border-color: green;
    outline: 0;
    -webkit-box-shadow: none;
     box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.7);
}
.form-control{
  box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.7);
   border-color: green;
}
hr { 
  
}
#posted{
  font-family: Century Gothic;
  font-size: 13px;
  color: darkgrey;
  
}
#posteds{
  display: block;
  margin-top: -15px;
  margin-left: 70px;
}
#RecentAnn{
    overflow: hidden;
       text-overflow: ellipsis;
       display: -webkit-box;
       line-height: 20px;     /* fallback */
       max-height: 62px;      /* fallback */
       -webkit-line-clamp: 1; /* number of lines to show */
       -webkit-box-orient: vertical;
}
#imageann{
   
}


.list-group-item{
  display: inline-block;
}
#divann{
  display: block;
  margin-left: 90px;
  margin-top: -40px;
}
#annRes{
      overflow: hidden;
       text-overflow: ellipsis;
       display: -webkit-box;
       line-height: 16px;     /* fallback */
       max-height: 62px;      /* fallback */
       -webkit-line-clamp: 1; /* number of lines to show */
       -webkit-box-orient: vertical;
       display: inline-block;
}
#home:hover{
  color: yellow;
}
#reg:hover{
  color: yellow;
}
#about:hover{
  color: yellow;
}
#search:hover{
  color: yellow;
}
#form:hover{
  color: yellow;
}
#msg:hover{
  color: yellow;
}
#acc:hover{
  color: yellow;
}
#out:hover{
  color: yellow;
}

input[type=search]::-webkit-search-cancel-button {
    -webkit-appearance: searchfield-cancel-button;
}
#nprogress .bar {
  height:6px;
  background-color: green;
}
#nprogress .spinner-icon {
  border-top-color: green;
  border-left-color: green;
}
@media screen and (max-width: 786px){
  #pag{
    margin-left:-100px;
  }
  #pic{
    display: block;
  }
   .img-fluid{
    width: 330px !important;
  }
}
@media (min-width: 768px) {
.carousel-multi-item-2 .col-md-3 {
float: left;
width: 25%;
max-width: 100%; } 

}

.carousel-multi-item-2 .card img {
border-radius: 2px; }

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
</style>

<body>
<div id="element" class="introLoading"></div>
<button id="scrollToTopButton" onclick="scrollToTop(300,3);"><i class="fa fa-arrow-up"></i></button>
<?php NewHomeheader(); ?>
<?php //include 'search.php'; ?>
<section id="sec-one">
<div id="firstPage">
<div id="cons">
<h1 class=" animated bounceInDown font-home" id="anim1">
<font class="animated fadeInDown" id="animated1"> It's</font> <font class="animated bounceInDown" id="animated2">great</font> <font class="animated bounceInDown" id="animated3">to</font> <font class="animated bounceInDown" id="animated4"> have</font> <font class="animated bounceInDown" id="animated5"> you</font><font class="animated fadeInDown" id="animated6"> back </font><font class="animated fadeInDown" id="animated7">fellow</font> <font color="#6EE04C" class="animated fadeInDown" id="animated8">Graduates</font>
</h1>
<p class="animated fadeInDown font-paragraph2 " id="animated9">
          Thank you for your cooperation! 
</p>
<p>.</p>
        <p>.</p>


        </div>  
      </div><!--firstPage-->
    </section>
    <section>
      <div id="fooBar">
      </div>
      <p style="background-color: green;" id="two-sentence">ISUCC ALUMNI</p>
       <?php newHomeContent(); ?>
      </div>
    </div>
  </div>
  </div>

<!-- Footer -->
<?php HomeFooter(); ?>
  
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=272850613443956&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
    window.onload = function onLoad() {
    var circle = new ProgressBar.Line('#progress', {
        color: '#FCB03C',
        duration: 3000,
        easing: 'easeInOut'
    });

    circle.animate(1);
};
  </script>
  <!-- Footer -->
<!-- Full Height Modal Right -->
<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-full-height modal-right" role="document">


      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100" id="myModalLabel" style="font-size: 15px;font-family: Century Gothic;text-transform: uppercase;"> <i class="fas fa-search"></i> Search Anouncement and News Here...</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="max-height: 100%;overflow: auto;">
           <div class="container" style="width: 100%;">
            <input type="search" autocomplete="off"  class="form-control clearable" required name="name" id="name"  
            placeholder="Type Here..." />
            <div id="nameList" style="margin-top: 10px;"></div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Full Height Modal Right -->
  <script src="js/notiny.min.js"></script>
 <script src="js1/nprogress.js"></script>
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
  <script src="js/lightbox.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="loader/dist/jquery.introLoader.pack.min.js"></script>
       <script src="loader/dist/jquery.introLoader.min.js"></script>
       <script src="loader/dist/helpers/spin.min.js"></script>
       <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
  //initial page number to load
  $("#resultsss").load("fetch_paginate.php").fadeIn('slow');
  $(".pagination").bootpag({
     total: <?php echo $pages; ?>,
     page: 1,
     maxVisible: 5 
  }).on("page", function(e, num){
    e.preventDefault();
    if(true){
      $("#resul").show();
      $("#resultsss").hide();
       setTimeout(function(){
        $("#resul").hide();
     $("#resultsss").fadeOut("slow").load("fetch_paginate.php", {'page':num}).fadeIn(1500);
    },2000);
    }
    
  });

});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#element").introLoader({
        animation: {
            name: 'cssLoader',
            options: {
                exitFx:'slideUp',
                ease: "easeInOutCirc",
                style: 'fluoGreen',
                delayBefore: 1000,
                exitTime: 500
            }
        }
    });
});
</script>
<script type="text/javascript">
    var alerted = localStorage.getItem('alerted') || '';
    if (alerted != 'yes') {
      setTimeout(function()
      {
        swal({
      title: 'Thankyou for Visiting our Website',
      animation: false,
      showConfirmButton: false,
      customClass: 'animated tada',
      timer: 5000
      })
     localStorage.setItem('alerted','yes');
      },15000);
    }
</script>
<script>
//$(document).ready(function()
//{
    //setTimeout(function()
    {
        const toast = swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 5000
      });

      toast({
        type: 'success',
       title: 'Thankyou for Visiting our Website!'
      })
    }, 
    5000);
});
</script>
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
   $(window).scroll(function() {
  var sticky = $('.navbar'),
    scroll = $(window).scrollTop();
   
  if (scroll >= 40) { 
    sticky.addClass('fixed'); }
  else { 
   sticky.removeClass('fixed');

}
});
 </script>
<script>
 //$( document ).ready(function() {
     //$(".searchbtn").click(function(){
     //$(".searchform").slideToggle("500");
     //});
 //});
</script>
<script>
 //$( document ).ready(function() {
    // $(".searchbtn1").click(function(){
     //$(".searchform").slideToggle("500");
     //);
 //});
</script>
<script>
  AOS.init();
</script>
<script>
            var html,body,scrollToTopButton;
            window.onload=function(){
                html=document.documentElement;
                body=document.body;
                scrollToTopButton=document.getElementById("scrollToTopButton");
            };
            window.onscroll=controlScrollToTopButton;

            function controlScrollToTopButton(){
                var windowInnerHeightX2=2*window.innerHeight;
                if (body.scrollTop > windowInnerHeightX2 || html.scrollTop > windowInnerHeightX2) {
                    scrollToTopButton.classList.add("show");

                }
                else {
                     scrollToTopButton.classList.remove("show");

                }
            }
            function scrollToTop(totalTime, easingPower) {
                var timeInterval=1;
                var scrollTop=Math.round(body.scrollTop || html.scrollTop);
                var timeLeft=totalTime;
                var scrollByPixel=setInterval(function(){
                    var percentSpent=(totalTime-timeLeft)
                    if(timeLeft >=0){
                        var newScrollTop=scrollTop*(1 - easeInOut(percentSpent,easingPower));
                        body.scrollTop=newScrollTop;
                        html.scrollTop=newScrollTop;
                        timeLeft--;
                    } 
                    else {
                        clearInterval(scrollByPixel);
                    }
                },timeInterval);
            }
            function easeInOut(t,power) {
                if(t < 0.5) {
                    return 0.5*Math.pow(2*t,power);
                }
                else {
                    return 0.5*(2-Math.pow(2*(1-t),power));
                }
            }
        </script>
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
    $('#name').keyup(function(){
      var query = $(this).val();
      if (query != '') {
        $.ajax({
                 url:"search3.php",  
                 method:"POST",
                 data:{query:query},
                 success:function(data)
                 {
                  $('#nameList').fadeIn();
                  $('#nameList').html(data);
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


