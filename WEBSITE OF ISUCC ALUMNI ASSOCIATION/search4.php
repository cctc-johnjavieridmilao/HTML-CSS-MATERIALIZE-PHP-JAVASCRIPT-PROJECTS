<?php  
include 'connection/mysqliconn.php';
if (isset($_POST['query'])) {
	$output = '';
	$query = "SELECT * FROM tbl_news WHERE subject LIKE '%".$_POST["query"]."%'";
	$query1 = "SELECT * FROM parents WHERE title LIKE '%".$_POST["query"]."%'";
	$result =mysqli_query($connect,$query);
	$result1 =mysqli_query($connect,$query1);
	$output = '<ul id="ul1" class="list-unstyled">';

	if (mysqli_num_rows($result) > 0) 
	{
		while ($row = mysqli_fetch_array($result)) {
			 $datess = $row['date'];
			 $datess = new dateTime($datess);
			 $datess = date_format($datess, 'M j, Y | H:i:s');
			$output .= '
			  <a id="a" href="displaysearchnew_news1.php?id='.$row['id'].'&& codess='.$row['code'].'">
             <div class="card ml-3" id="cards">
			 <ul class="list-group list-group-flush">
			  <div class="row">
			  <img id="imgq" src="images/'.$row['image'].'" width="70" height="70" /> 
			  <li class="list-group-item">'.mb_strimwidth($row['subject'], 0, 30,"...").' <span id="date">Posted on '.$row['date'].'<span></li>
			  </div>
			  
			    </ul>
			     </a>
             </div><br>
			';
		}
	}
	if (mysqli_num_rows($result1) > 0) {
		while ($row = mysqli_fetch_array($result1)) {
			$dates = $row['date'];
			$dates = new dateTime($dates);
			$dates = date_format($dates, 'M j, Y | H:i:s');
			$output .= '
			 <a id="a" href="displaysearchnew1.php?id='.$row['id'].'&& codess='.$row['code'].'">
               <div class="card ml-3">
			 <ul class="list-group list-group-flush">
			 <div class="row">
			 <img id="imgq" src="images/'.$row['image'].'" width="70" height="70" />
			        <li class="list-group-item">'.mb_strimwidth($row['title'], 0, 30,"...").' <span id="date">Posted on '.$row['date'].'<span></li>
			        </div>
			    </ul>
			    </a>
             </div><br>
			';
		}
	}
	if(mysqli_num_rows($result) == 0 && mysqli_num_rows($result1) == 0)
	{
     $output .= '<li id="li1" style="color:black;"><i class="fas fa-times-circle"></i> Keyword does not Match AnyArticles</li>';
	}
	$output .='</ul>';
	echo $output;
}

?>
