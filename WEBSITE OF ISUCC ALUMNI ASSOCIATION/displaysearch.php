<?php 
session_start();
include 'connection/mysqliconn.php';
//$title = $_SESSION['title'];
//$subject = $_SESSION['subject'];
$name = $_GET['name'];
$query = "SELECT * FROM parents WHERE title='$name'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($result);

$query1 = "SELECT * FROM tbl_news WHERE subject='$name'";
$result1 = mysqli_query($connect,$query1);
$row1 = mysqli_fetch_assoc($result1);

	//$id = $_SESSION['id'];
  //$code = $_SESSION['code'];
  $query2 = "SELECT * FROM parents WHERE title='$name'";
  $result2 = mysqli_query($connect,$query2);
  $row2 = mysqli_fetch_assoc($result2); 
  $user = $row2['user'];
  //$date = $row2['date'];
  //$dt = new DateTime($date);
  $title = $row2['title'];
  $image = $row2['image'];
  $ann = $row2['text'];

  $dates = $row2['date'];
  $dates = new dateTime($dates);
  $dates = date_format($dates, 'M j, Y | H:i:s');

  //$id1 = $_SESSION['newsid'];
  //$code1 = $_SESSION['code1'];
  $query3 = "SELECT * FROM tbl_news WHERE subject='$name'";
  $result3 = mysqli_query($connect,$query3);
  $row3 = mysqli_fetch_assoc($result3); 
  //$date = $row3['date'];
  //$dt = new DateTime($date);
  $titles = $row3['subject'];
  $images = $row3['image'];
  $anns = $row3['news'];

  $datess = $row3['date'];
  $datess = new dateTime($datess);
  $datess = date_format($datess, 'M j, Y | H:i:s');
?>

<?php include 'functionusercontent.php'; ?>
<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html>
<head>
  
	<title>Alumni Search</title>
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
<?php regcss(); ?>
<style type="text/css">
a{
  color: black;
}
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
#getimg{
	width: 100%;
	height: auto;
	margin-left: -10px;
}
#getimg1{
	width: 100%;
	height: auto;
	margin-left: -10px;
}
#scrollToTopButton {
  position: fixed;
  bottom: 40px;
  right: 40px;
  height: 60px;
  width: 60px;
  font-size: xx-large;
  border-radius: 50%;
  border: 0;
  outline: 0;
  background-color: green;
  cursor: pointer;
  box-shadow: 2px 4px 16px rgba(0,0,0,0,3);
  opacity: 0;
  transform: scale(0);
  visibility: hidden;
  transition: .2s;

}
#scrollToTopButton.show{
    opacity: 1;
    transform: scale(1);
    visibility: visible;
}
#nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}
.bc-icons-2 .breadcrumb-item + .breadcrumb-item::before {
    content: none; }
.bc-icons-2 .breadcrumb-item.active {
    color: #455a64; }
@media screen and (max-width: 786px){
    html,body{
      overflow-x: hidden;
    }
 #imgg {
  margin-left: 190px;  
}

}
</style>
<body>
	<button id="scrollToTopButton" onclick="scrollToTop(300,3);"><i class="fa fa-arrow-up"></i></button>
	<header>
		<img id="img" src="img/alumnilogofirst.png">
		<h1 id="txt1"><font color="yellow">ISUCC<font color="white"> Alumni Association</font></font></h1>
		<h2 id="txt2"><font color="white"> <span class="fas fa-user-graduate" style="color: font-size: 15px;"></span> ALUMNI SEARCH</font></h2>
	</header>
<div class="col-md-12">

  </div>
  <?php
    if ($row['title'] == true) {
      ?>
        <main class="mt-3">
       <div class="container">
         <h3 style="font-size: 25px;">
   <span class="fas fa-search"></span> Search For 
  <?php
  if ($row['title'] == true) {
     echo $row['title'];
   } 
   elseif ($row1['subject'] == true) {
    echo $row1['subject'];
   }
  ?>
 </h3>
           <div class="row">
               <div class="col-md-12">
                <div class="bc-icons-2" >
                    <ol class="breadcrumb animated bounceInLeft" style="background-color: white;">
                <li class="breadcrumb-item"><a class="black-text" href="home.php">Home</a><i style="font-size: 10px;" class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                 <li class="breadcrumb-item"><a class="black-text" href="#"><?php if($_SERVER['PHP_SELF'] == "/alumni/displaysearch.php"){echo "Search";} ?></a><i style="font-size: 10px;" class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                <li class="breadcrumb-item"><a class="black-text" href="#"><?php echo $title; ?></a></li>
                 </ol>
                </div>
                    <div class="card-deck">
                    <!--Panel-->
                    <div class="card animated bounceInUp">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 30px;"><?php echo $title; ?></h5>
                            <p class="card-text"><span style="color: green;">Posted on <?php echo $dates; ?></span> | <span style="color: rgb(255,200,50);"> Written by Administrator</span></p>
                             <img width="100%" src="images/<?php echo $image; ?>">
                              <br><br>
                              <p class="card-text"><?php echo $ann; ?></p>
                        </div>
                        <div class="card-footer">
                           <a href="add_cm_direct.php"> <span class="far fa-comment"> Add Comment</span></a>
                        <?php 
               $code = $_GET['code'];
        require 'connect.php';
      $chi_result = mysqli_query($connect, "SELECT * FROM `children` WHERE `par_code`='$code' ORDER BY `date` DESC");
        $chi_cnt = mysqli_num_rows($chi_result);

        if($chi_cnt == 0){
        } else {
          echo '<a class="link-reply" id="children" style="color: black;" name="'.$code.'"><span title="See All Replies" id="tog_text" class="far fa-comment"> Comments</span> ('.$chi_cnt.')</a>'
            .'<div class="child-comments" id="C-'.$code.'">';

          foreach($chi_result as $com) {
            $chi_date = new dateTime($com['date']);
            $chi_date = date_format($chi_date, 'M j, Y | H:i:s');
            $chi_user = $com['user'];
            $chi_com = $com['text'];
            $chi_par = $com['par_code'];

                 
            echo '<div class="child" id="'.$code.'-C">'
                .'<p title="'.$chi_user.'" class="user">'.$chi_user.'</p>&nbsp;'
                .'<p class="time">'.$chi_date.'</p>'
                .'<p class="comment-text">'.$chi_com.'</p>'
              .'</div>';
          }
          echo '</div>';
      }
              ?>
                        </div>
                    </div>
                    <!--/.Panel-->

               </div>
           </div>
       </div>
   </main>
   <br>
      <?php
    }
    elseif ($row1['subject'] == true) {
    	?>
       <main class="mt-3">
       <div class="container">
         <h3 style="font-size: 25px;">
   <span class="fas fa-search"></span> Search For 
  <?php
  if ($row['title'] == true) {
     echo $row['title'];
   } 
   elseif ($row1['subject'] == true) {
    echo $row1['subject'];
   }
  ?>
 </h3>
    	 <div class="row">
               <div class="col-md-12">
                <div class="bc-icons-2" >
                    <ol class="breadcrumb animated bounceInLeft" style="background-color: white;">
                <li class="breadcrumb-item"><a class="black-text" href="home.php">Home</a><i style="font-size: 10px;" class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                 <li class="breadcrumb-item"><a class="black-text" href="#"><?php if($_SERVER['PHP_SELF'] == "/alumni/displaysearch.php"){echo "Search";} ?></a><i style="font-size: 10px;" class="fa fa-angle-double-right mx-2" aria-hidden="true"></i></li>
                <li class="breadcrumb-item"><a class="black-text" href="#"><?php echo $titles; ?></a></li>
                 </ol>
                </div>
                    <div class="card-deck">
                    <!--Panel-->
                    <div class="card animated bounceInUp">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 30px;"><?php echo $titles; ?></h5>
                            <p class="card-text"><span style="color: green;">Posted on <?php echo $datess; ?></span> | <span style="color: rgb(255,200,50);"> Written by Administrator</span></p>
                             <img width="100%" src="images/<?php echo $images; ?>">
                              <br><br>
                              <p class="card-text"><?php echo $anns; ?></p>
                        </div>
                        <div class="card-footer">
                           <a href="add_cm_direct.php"> <span class="far fa-comment"> Add Comment</span></a>
                        <?php 
       $code1  = $_GET['code'];
  require 'connect.php';
    $chi_result = mysqli_query($connect, "SELECT * FROM `tbl_new_children` WHERE `par_code`='$code1' ORDER BY `date` DESC");
        $chi_cnt = mysqli_num_rows($chi_result);

        if($chi_cnt == 0){
        } else {
          echo '<a class="link-reply" id="children" style="color: black;" name="'.$code1.'"><span title="See All Replies" id="tog_text" class="far fa-comment"> Comments</span> ('.$chi_cnt.')</a>'
            .'<div class="child-comments" id="C-'.$code1.'">';

          foreach($chi_result as $com) {
            $chi_date = new dateTime($com['date']);
            $chi_date = date_format($chi_date, 'M j, Y | H:i:s');
            $chi_user = $com['user'];
            $chi_com = $com['text'];
            $chi_par = $com['par_code'];

                 
            echo '<div class="child" id="'.$code1.'-C">'
                .'<p title="'.$chi_user.'" class="user">'.$chi_user.'</p>&nbsp;'
                .'<p class="time">'.$chi_date.'</p>'
                .'<p class="comment-text">'.$chi_com.'</p>'
              .'</div>';
          }
          echo '</div>';
      }
              ?>
                        </div>
                    </div>
                    <!--/.Panel-->

               </div>
           </div>
       </div>
   </main>
   <br>
    	<?php
    }
   ?>

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
        
        parent.append("<br /><br /><form action='' id='comment_form' method='post'><textarea class='form-control form-text' cols='20' name='new-reply' id='new-reply' required='required'></textarea><input type='hidden' name='code' value='"+comCode+"' /><button type='submit' class='form-submit btn btn-success' id='form-reply' name='new_reply'>Reply <span class='fas fa-paper-plane'></span></button><button type = 'button' class='form-submit btn btn-warning' onclick='myFunction()' id='cancelform'>Cancel</button></form>")
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
