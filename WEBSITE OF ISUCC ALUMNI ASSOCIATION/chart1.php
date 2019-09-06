<?Php
       
    $dbhost = 'localhost';
    $dbname = 'alumni_db';  
    $dbuser = 'root';                  
    $dbpass = ''; 
    
    
    try{
        
        $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $ex){
        
        die($ex->getMessage());
    }
    $stmt = $dbcon->prepare("SELECT gender,date, count(*) as number FROM alumni_records GROUP BY gender");
    $stmt->execute();
    $json= [];
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $json[]= array('date' => $date, 'gender'=> $gender);
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Displaying Mysql Records With Morris Js</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<body>
<h1>Displaying Mysql Records With Morris Js- Bar Chart, Line Chart, Area Chart And Donut Chart</h1>
<div id="myfirstchart" style="height: 400px;"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
    new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: <?php echo json_encode($json); ?>,
  barColors: ['red'],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['gender']
});
</script>
</body>
</html>