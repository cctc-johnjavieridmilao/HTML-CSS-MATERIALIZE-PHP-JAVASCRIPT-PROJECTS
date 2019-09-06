<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php  
include 'connection/mysqliconn.php';   
$query = "SELECT yeargraduted, count(*) as number FROM alumni_records GROUP BY yeargraduted";  
$result = mysqli_query($connect, $query);  
?>
<div class="content-wrapper" style="background-color: white;">
  <div id="piechart">
    
  </div>
 </div>
      <!-- Content Header (Page header) -->
      <script type="text/javascript"> 

       google.charts.load('current', {'packages':['corechart']});  
       google.charts.setOnLoadCallback(drawChart);  
       function drawChart()  
       {  
        var data = google.visualization.arrayToDataTable([  
          ['Yeargraduted', 'Alumni'],  
          <?php  
          while($row = mysqli_fetch_array($result))  
          {  
           echo "['".$row["yeargraduted"]."', ".$row["number"]."],";  
         }  
         ?>  
         ]);  
         var options = {  
         title: 'Percentage Of Yeargraduted',  
         hAxis: {title: 'Numbers of Alumni', titleTextStyle: {color: 'green'}},
         vAxis: {title: 'Year Graduated', titleTextStyle: {color: 'green'}},
         colors: ['green','green'],
         is3D:true


       };  
       var chart = new google.visualization.BarChart(document.getElementById('piechart'));  
       chart.draw(data, options);  
     }  
   </script>  