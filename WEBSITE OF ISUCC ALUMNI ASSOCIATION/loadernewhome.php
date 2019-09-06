<!DOCTYPE html>
<html>
<head>
	<title>Loader</title>
	 <link rel="stylesheet" type="text/css" href="loader/dist/css/introLoader.min.css">
      <link rel="stylesheet" type="text/css" href="loader/dist/css/introLoader.css">

</head>
<body>
  <div id="element" class="introLoading"></div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="loader/dist/jquery.introLoader.pack.min.js"></script>
       <script src="loader/dist/jquery.introLoader.min.js"></script>
       <script src="loader/dist/helpers/spin.min.js"></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
    $("#element").introLoader({
        animation: {
            name: 'cssLoader',
            options: {
                exitFx:'slideUp',
                ease: "easeInOutCirc",
                style: 'fluoGreen',
                delayBefore: 3000,
                exitTime: 100
            }
        }
    });
});
</script>
<script type="text/javascript">
	setTimeout(function() {
		window.location = "newhome.php";
	}, 5000);
</script>