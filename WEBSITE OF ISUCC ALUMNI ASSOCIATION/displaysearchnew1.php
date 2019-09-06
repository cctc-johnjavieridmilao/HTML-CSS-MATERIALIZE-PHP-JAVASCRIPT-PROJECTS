 <?php require_once 'connect.php'; require_once 'functions.php'; include 'functionusercontent.php';?>
<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<?php 
include 'connection/mysqliconn.php'; 
  $id = $_GET['id'];
   $query = "SELECT * FROM parents WHERE id='$id'";
  $result = mysqli_query($connect,$query);
  $row = mysqli_fetch_assoc($result); 
 ?>

<!DOCTYPE html>
<html>
<head>
     <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b92a67f11e1d40011d81637&product=sticky-share-buttons' async='async'></script>
    <meta charset="utf-8">
    <title>Alumni AnnounceMent</title>
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
<style>
    .form-submit {
        text-transform: uppercase;
        border:1px solid rgba(1,1,1,0.3);
        cursor:pointer;
        padding:5px 13px;
        margin-top:5px;
    }
    #new-reply{
        width: 100%;
         
    }
    .child {
    margin-top:10px;
    margin-left:30px;
    padding-left:5px;
}
.child-comments {
    border-left:1px solid rgba(1,1,1,0.2);
}
.user, .time {
    display:inline-block;
}
.user {
    font-size:13px;
    color:#0072bc;
    text-decoration: none;
    word-break: break-all;
    line-height:17px;
}
.time {
    font-size:11px;
    color:#b2b1b1;
    transition:ease 0.2s all;
}
    .comment:hover .time {
        color:#767676;
    }
.comment-text {
    font-size:13px;
    line-height:17px;
    color:#222;
    margin:0px 10px;
}
.link-reply{
    margin-left: 10px;
    font-size: 15px;
}
#reply{
  font-size: 15px;
}
.bc-icons-2 .breadcrumb-item + .breadcrumb-item::before {
    content: none; }
.bc-icons-2 .breadcrumb-item.active {
    color: #455a64; }

.twitter-share-button{
    margin-left: 15px;
}
.fa-arrow-right{
    margin-left: 10px;
}
#nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}
@media screen and (max-width: 786px){
 #comment_form{
    margin-top: 30px;

 }
 
}
</style>
</head>
<body>
     <button id="scrollToTopButton" onclick="scrollToTop(300,3);"><i class="fa fa-arrow-up"></i></button>
    
    <?php Search1(); ?>
    <?php
    require_once 'check_com.php';
    echo $message;
     ?>
</div>
</div>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card text-center">
                <div class="card-header success-color white-text">
                    SHARE ON
                </div>
                 <div class="card-body">
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</main>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card text-center">
                <div class="card-header success-color white-text">
                   REACTS HERE
                </div>
                 <div class="card-body">
                    <div class="sharethis-inline-reaction-buttons"></div>
                </div>
            </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</main>
<br>
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
     $(document).ready(function() {
    $(".child-comments").hide();

    $("a#children").click(function() {
        var section = $(this).attr("name");
        var togTxt = $("#tog_text").text();
        $("#C-" + section).toggle();
    });

    $(".form-submit").click(function() {
        var commentBox = $("#comment");
        var commentCheck = commentBox.val();
        if(commentCheck == '' || commentCheck == NULL) {
            commentBox.addClass("form-text-error");
            return false;
        }
    });

    $(".form-reply").click(function() {
        var replyBox = $("#new-reply");
        var replyCheck = replyBox.val();
        if(replyCheck == '' || replyCheck == NULL) {
            replyBox.addClass("form-text-error");
            return false;
        }
    });

    $("a#reply").one("click", function() {
        var comCode = $(this).attr("name");
        var parent = $(this).parent();
        
        parent.append("<br /><form action='' id='comment_form' method='post'><textarea class='form-control form-text' cols='20' name='form_new-reply' id='new-reply' required='required'></textarea><input type='hidden' name='code' value='"+comCode+"' /><button type='submit' class='form-submit btn btn-success' id='form-reply' name='new_reply'>Reply <span class='fas fa-paper-plane'></span></button><button type = 'button' class='form-submit btn btn-warning' onclick='myFunction()'' id='cancelform'>Cancel</button></form>")
    });
})
</script>
<script type="text/javascript">
    function myFunction() {
    var x = document.getElementById("comment_form");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
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