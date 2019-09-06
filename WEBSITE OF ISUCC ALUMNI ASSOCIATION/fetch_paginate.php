<?php
include 'connection/mysqliconn.php';

$item_per_page = 1;

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
$results = mysqli_query($connect, "SELECT * FROM tbl_project ORDER BY id ASC LIMIT $position, $item_per_page");

//output results from database
echo '<div class="row">';
while($row = mysqli_fetch_array($results))
{
	echo '<div class="col-md-6 mb-4">
            <div class="view overlay zoom">
              <img style="display: block;width: 450px;" src="images/'.$row['image'].'"  class="img-fluid z-depth-1-half" alt="" >
            </div>
            
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">
           <h3 class="h3 mb-3" style="font-size: 20px;"><strong>'.$row['subject'].'</strong></h3>

            <p>
    <strong> <font color="green">Posted on:</font>  <span class="fas fa-calendar-alt"></span> '.$row['date'].'</strong><br><br>
            '.mb_strimwidth($row['project'], 0, 350).'
            </p>

            <!-- CTA -->
            <a  href="project.php?id='.$row['id'].' && codess='.$row['code'].'" class="btn btn-success btn-md hvr-bounce-in">Readmore
             
            </a>
            <a href="allproject.php" class="btn btn-md hvr-bounce-in" style="background-color: #eab407;">View All
             
            </a>
          </div>';
}
echo '</div>';

?>

