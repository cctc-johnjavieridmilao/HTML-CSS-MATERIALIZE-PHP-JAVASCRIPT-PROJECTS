 <?php  
include 'connection/mysqliconn.php';
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $newstitle = mysqli_real_escape_string($connect, $_POST["title"]);  
      $news = mysqli_real_escape_string($connect, $_POST["news"]);  
      if($_POST["news_id"] != '')  
      {  
         sleep(3);
           $query = "  
           UPDATE parents   
           SET title='$newstitle',   
           text='$news'   
           WHERE id='".$_POST["news_id"]."'";  
           $message = '<script>alert("News Updated");</script>';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO tbl_news(newstitle,  news)  
           VALUES('$newstitle', '$news');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM parents ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="10%">News Title</th>
                          <th width="15%">Date Submit</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["newstitle"] . '</td>
                          <td>' . $row["date"] . '</td>
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
       echo '<meta http-equiv="refresh" content="2" />';
 }  
 ?>
