<style>
body {
	background-color:#7FBF3F;
}
	.spinner {
  margin: 100px auto;
  width: 50px;
  height: 40px;
  text-align: center;
  font-size: 10px;
}

.spinner > div {
  background-color: white;
  height: 100%;
  width: 6px;
  display: inline-block;
  
  -webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
  animation: sk-stretchdelay 1.2s infinite ease-in-out;
}

.spinner .rect2 {
  -webkit-animation-delay: -1.1s;
  animation-delay: -1.1s;
}

.spinner .rect3 {
  -webkit-animation-delay: -1.0s;
  animation-delay: -1.0s;
}

.spinner .rect4 {
  -webkit-animation-delay: -0.9s;
  animation-delay: -0.9s;
}

.spinner .rect5 {
  -webkit-animation-delay: -0.8s;
  animation-delay: -0.8s;
}

@-webkit-keyframes sk-stretchdelay {
  0%, 40%, 100% { -webkit-transform: scaleY(0.4) }  
  20% { -webkit-transform: scaleY(1.0) }
}
.center{
  display: block;
    margin-left: auto;
    margin-right: auto;
}

@keyframes sk-stretchdelay {
  0%, 40%, 100% { 
    transform: scaleY(0.4);
    -webkit-transform: scaleY(0.4);
  }  20% { 
    transform: scaleY(1.0);
    -webkit-transform: scaleY(1.0);
  }
}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Loading</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="spinner" id="fatherloadd" style="margin-top: 250px;">
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
</div>

</body>
</html>
<script>
  function fatherloadd() {
    $(function(){
      $("#fatherloadd").fadeOut("slow");
    });
  }
  setTimeout(fatherloadd,4000);
</script>
    <script>
      //scripts.js code
(function(){
 
 var fatherloadd = document.getElementById("fatherloadd");
 var loading = 0;
 var id = setInterval(frame, 5);

 function frame(){
  if(loading == 100) {
   clearInterval(id);
   //window.open("newhome.php", "_self");
  }
  else {
   loading = loading + 1;
   if(loading == 90) {
    preload.style.animation = "fadeout 1s ease";
   }
  }
 }

})();

    </script>

    