<?php 
 include 'connection/mysqliconn.php';
 $send = true;
 $alert = "";
 if (isset($_POST['submit'])) 
 {
 	$comment = $_POST['comment'];
 	$name = $_POST['name'];
    if ($send == true) {
    	$query = "INSERT INTO comments (comment,name) VALUES ('$comment','$name')";
    	mysqli_query($connect,$query);
    	$alert = "<script>alert('Comment Added Succesful');</script>";
    } else {
       $alert = "<script>alert('not Add');</script>";
    }

 }
 function DisplayComment(){
 	include 'connection/mysqliconn.php';
 	$query = "SELECT * FROM comments ORDER BY id DESC";
	$result = mysqli_query($connect,$query);

	while ($row = mysqli_fetch_array($result)) {
	echo '
	 <div class="panel panel-default">
  <div class="panel-body">
    '.$row['name'].'
  </div>
</div>

	';
	
		}
 }

?>  

