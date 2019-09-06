<?php 
include 'functionusercontent.php'; 
include 'connection/mysqliconn.php';
$query = "SELECT * FROM about";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result); 
?>
<!DOCTYPE html>
<html>

<head>
  <title>About</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/alumniLogo.png" />
   <meta name="theme-color" content="green" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
  crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/lightbox.css">
</head>
<style>
html,
body {
  background-color: #F1EEEE;
}

body::-webkit-scrollbar {
  width: .5em;
}

body::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
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
  background-color: white;
  cursor: pointer;
  box-shadow: 2px 4px 16px rgba(0, 0, 0, 0, 3);
  opacity: 0;
  transform: scale(0);
  visibility: hidden;
  transition: .2s;
  z-index: 100;

}

#scrollToTopButton.show {
  opacity: 1;
  transform: scale(1);
  visibility: visible;
}

header {
  background-color: green;
  width: 100%;
  height: 80px;
}

#img {
  width: 70px;
  height: 70px;
  margin-left: 30px;
  margin-top: 5px;

}

h1 {
  margin-top: -50px;
  margin-left: 110px;
  font-size: 20px;
  font-family: Century Gothic;
}

h2 {
  margin-top: -10px;
  margin-left: 110px;
  font-size: 13px;
  font-family: Century Gothic;
}


#txt h2 {
  font-family: Century Gothic;
  font-size: 25px;
  margin-top: 30px;
  margin-left: 20px;
  border-bottom: 2px solid black;

}

#txt {
  width: 320px;
  position: absolute;
  top: 15%;
  left: 47.6%;
  transform: translate(-50%, 50%);
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

.uk-input:hover {
  background-color: green;
  transition: 1s;
  color: black;
}

#nprogress .bar {
  height: 6px;
  background-color: white;
}

#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}

#imgg {
  margin-top: 5px;
}

.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;
}

p {
  font-size: 15px;
}

#orgchart {
  width: 90%;
  display: block;
  height: auto;
}

@media screen and (max-width: 786px) {
  h3 {
    font-size: 25px !important;
  }
}
</style>

<body>
  <button id="scrollToTopButton" onclick="scrollToTop(300,3);">
    <i class="fa fa-arrow-up"></i>
  </button>
  <header>
    <img src="img/alumnilogofirst.png" id="img">
    <h1 id="txt1">
      <font color="yellow">ISUCC
        <font color="white"> Alumni Association</font>
      </font>
    </h1>
    <h2 id="txt2">
      <font color="white">
        <span class="fas fa-user-graduate" style="color: white;font-size: 15px;"></span> ABOUT ALUMNI</font>
      </h2>
    </header>
    <main class="mt-5">
      <div class="container animated bounceInUp">
        <div class="col-md-12">
          <h3 style="font-size: 25px;" id="un">
            <strong style="color: green;">University Mission</strong>
            <strong style="color: rgb(255,200,54);">and Vision</strong>
          </h3>
          <br>
          <div class="card-deck">
            <!--Panel-->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Vision</h5>
                <p class="card-text">
                  <?php echo $row['vision']; ?>
                </p>
                <p class="card-text">
                  <small class="text-muted"></small>
                </p>
              </div>
            </div>
            <!--/.Panel-->
            <!--Panel-->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Mission</h5>
                <p class="card-text">
                  <?php echo $row['mission']; ?>
                </p>
                <p class="card-text">
                  <small class="text-muted"></small>
                </p>
              </div>
            </div>
            <!--/.Panel-->
          </div>
        </div>
        <br>
        <div class="col-md-12">
          <h3 style="font-size: 25px;">
            <strong style="color: green;">University</strong>
            <strong style="color: rgb(255,200,50);">Core Values</strong>
          </h3>
          <!--Panel-->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Excelence</h5>
              <p class="card-text">
                <?php echo $row['excelence']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <!--Panel-->
          <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Integrity</h5>
              <p class="card-text">
                <?php echo $row['integrity']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <!--Panel-->
          <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Innovation</h5>
              <p class="card-text">
                <?php echo $row['innovation']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <!--Panel-->
          <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Efficiency</h5>
              <p class="card-text">
                <?php echo $row['efficiency']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <!--Panel-->
          <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Collaborating</h5>
              <p class="card-text">
                <?php echo $row['collborating']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <!--Panel-->
          <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Accountability</h5>
              <p class="card-text">
                <?php echo $row['accountability']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <!--Panel-->
          <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Environmentalism</h5>
              <p class="card-text">
                <?php echo $row['environmentalism']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <!--Panel-->
          <br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Public Engagement</h5>
              <p class="card-text">
                <?php echo $row['publicengagement']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <br>
          <h3 style="font-size: 25px;">
            <strong style="color: green;">Historical</strong>
            <strong style="color: rgb(255,200,50);">Background</strong>
          </h3>
          <!--Panel-->
          <div class="card">
            <div class="card-body">

              <p class="card-text">
                <b>Cauyan Campus, one of the nine campuses of Isabela State University System, was established as Cauyan High
                  School in 1945, Cauyan Polytechnic Colgege on February 23,1995 and integrated to Isabela State University
                  in October 1999 by virtue of CHED Memorandum Order No.18, S. 1999.
                </b>
              </p>
              <p class="card-text">Since integration to the Isabela State University System, Cauayan Campus has immensely manifested remarkable
                improvement not only in terms of population but also in infrastructure, school buildings, equipments and modern
                facilities. It has also expanded its program offerings and is optimistic to open additional programs in the
              future</p>

              <p class="card-text">Cauayan Campus has been the most numbered of student enrolled among the other capuses. Since it has a total of
                9,558 enrollees for the first semester of School Year 2013-2014 and is expected to increase by ten percent(10%)
                comes School Year 2014-2015. With its strategic geographical location and the concerned efforts of its faculty,
                staff, students and strong support of the university officials including the city government and other civic
                spirited Cauayenos, Cauayan Campus is becoming a premier seat of learning where students find their dreams
              of a global career very possible.</p>

              <p class="card-text">The 5-year development plan of this campus has included the offering of Doctor of Medicine. The existence of
                hospitals in the City of Cauayan, the strong support of local political leaders, and the strategic location
                of Cauayan Campus make the offering feasible. The program could strongly be supported with standards. The presence
                of high-caliber medical practitioners in the locality is enough to develop future medical services to the community.
                Statistics shows that there is only one school offering medical program in Region 2 and none in the Province
                of Isabela. Should this proposal be approved, Isabela State University would be the first University in the
              Province of Isabela to offer a medical program.</p>
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
          <br>
          <h3 style="font-size: 25px;">
            <strong style="color: green;">Organisational</strong>
            <strong style="color: rgb(255,200,50);">Chart</strong>
          </h3>
          <!--Panel-->
          <div class="card">
            <div class="card-body">

              <img width="100%" src="img/orgchart.jpg">
              <p class="card-text">
                <small class="text-muted"></small>
              </p>
            </div>
          </div>
          <!--/.Panel-->
        </div>
      </main>


      <br>
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
    </body>

    </html>
    <script>
      NProgress.start();
      NProgress.set(0.4);
  //Increment 
  var interval = setInterval(function () {
    NProgress.inc();
  }, 1000);
  $(document).ready(function () {
    NProgress.done();
    clearInterval(interval);
  });
</script>
<script>
  var html, body, scrollToTopButton;
  window.onload = function () {
    html = document.documentElement;
    body = document.body;
    scrollToTopButton = document.getElementById("scrollToTopButton");
  };
  window.onscroll = controlScrollToTopButton;

  function controlScrollToTopButton() {
    var windowInnerHeightX2 = 2 * window.innerHeight;
    if (body.scrollTop > windowInnerHeightX2 || html.scrollTop > windowInnerHeightX2) {
      scrollToTopButton.classList.add("show");

    } else {
      scrollToTopButton.classList.remove("show");

    }
  }

  function scrollToTop(totalTime, easingPower) {
    var timeInterval = 1;
    var scrollTop = Math.round(body.scrollTop || html.scrollTop);
    var timeLeft = totalTime;
    var scrollByPixel = setInterval(function () {
      var percentSpent = (totalTime - timeLeft)
      if (timeLeft >= 0) {
        var newScrollTop = scrollTop * (1 - easeInOut(percentSpent, easingPower));
        body.scrollTop = newScrollTop;
        html.scrollTop = newScrollTop;
        timeLeft--;
      } else {
        clearInterval(scrollByPixel);
      }
    }, timeInterval);
  }

  function easeInOut(t, power) {
    if (t < 0.5) {
      return 0.5 * Math.pow(2 * t, power);
    } else {
      return 0.5 * (2 - Math.pow(2 * (1 - t), power));
    }
  }
</script>