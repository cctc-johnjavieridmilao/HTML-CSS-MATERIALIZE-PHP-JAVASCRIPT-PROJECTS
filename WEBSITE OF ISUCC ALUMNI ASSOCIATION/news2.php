<?php require_once 'connect.php'; require_once 'functions.php'; include 'functionusercontent.php';?>
<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<?php 
include 'connection/mysqliconn.php'; 
  $id = $_GET['id'];
   $query = "SELECT * FROM tbl_news WHERE id='$id'";
  $result = mysqli_query($connect,$query);
  $row = mysqli_fetch_assoc($result); 
 ?>
<!DOCTYPE html>
<html>
<head>
    
	<meta charset="utf-8">
	<title>Alumni News</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
	<link rel="shortcut icon" href="img/alumniLogo.png"/>
	 <link rel="stylesheet" type="text/css" href="css/uikit.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="css/hover.css">
  	<link rel="stylesheet" type="text/css" href="css/hover-min.css">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
     <script src="js/uikit.js"></script>
    <script src="js/uikit.min.js"></script>
     <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>

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
}
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
</style>
</head>
<body>
	 <button id="scrollToTopButton" onclick="scrollToTop(300,3);"><i class="fa fa-arrow-up"></i></button>
	
	<?php News1() ?>
    <?php
    require_once 'check_newss.php';
    echo $message;
     ?>
      <div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" align="center">
         <span style="color: black;"> Share this Via <i class="fas fa-arrow-right" style=""> </span></i>
         <button class="uk-modal-close-default" type="button" uk-close></button>
       <?php
echo '<iframe  src="https://www.facebook.com/plugins/share_button.php?href='.$actual_link.'&layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId" width="83" height="28" style="border:none;overflow:hidden;margin-left: 15px;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
?>
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="<?php echo $row['subject'] ?>" data-via="<?php echo $row['news'] ?>" data-hashtags="ISUCC Alumni" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
 <i style="margin-left: 15px;"><g:plusone size="tall"></g:plusone></i>
</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=272850613443956&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <script src="js1/nprogress.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.5/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.5/js/uikit-icons.min.js"></script>
<?php PagesFooter(); ?>
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
        
        parent.append("<br /><form action='' method='post'><textarea class='form-text' cols='20' name='new-reply' id='new-reply' required='required'></textarea><input type='hidden' name='code' value='"+comCode+"' /><input type='submit' class='form-submit' id='form-reply' name='new_reply' value='Reply' /></form>")
    });

})
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