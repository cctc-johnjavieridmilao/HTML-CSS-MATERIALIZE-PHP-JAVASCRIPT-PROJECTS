<?php
include 'connection/mysqliconn.php';

$item_per_page = 6;

//sanitize post value
if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1;
}

//get current starting point of records
$position = (($page_number-1) * $item_per_page);

//Limit our results within a specified range. 
$results = mysqli_query($connect, "SELECT * FROM tbl_news ORDER BY id ASC LIMIT $position, $item_per_page");

//output results from database
echo '<div class="row">';
while($row = mysqli_fetch_array($results))
{
	echo '<div class="col-lg-4 col-md-6 mb-4 hvr-float">

                        <div class="view overlay zoom">
                          <a href="images/'.$row['image'].'" data-lightbox="image-1" data-title="'.$row['subject'].'"><img style="width: 350px;display: inline-block;height: 200px;" src="images/'.$row['image'].'"  class="img-thumbnail" alt=""></a>
                            
                        </div>

                        <h4 class="my-4 font-weight-bold">'.mb_strimwidth($row['subject'], 0, 20,"...").'</h4>
                         <strong  style="font-size: 12px;color: green;">Posted on: '.$row['date'].'</strong><br><br>
                        <p class="grey-text">'.mb_strimwidth($row['news'], 0, 50,"...").'</p>
                        <a href="news1.php?id='.$row['id'].' && codess='.$row['code'].'" class="btn btn-success hvr-bounce-in">Readmore</a>
                    </div>';
}
echo '</div>';

?>

