<?php  
 function fetch_data()  
 {  
      $output = '';  
      include 'connection/mysqliconn.php';   
      $sql = "SELECT * FROM alumni_records ORDER BY id ASC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["fname"].'</td>  
                          <td>'.$row["address"].'</td>  
                          <td>'.$row["gender"].'</td>
                          <td>'.$row["institution"].'</td> 
                          <td>'.$row["program"].'</td> 
                          <td>'.$row["yeargraduted"].'</td> 
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  

      require_once('tcpdf/tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Alumni Records");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Alumni Records</h4><br /> 
      <table border="1" cellspacing="1" cellpadding="2">  
           <tr>  
                <th>ID</th>  
                 <th width="15%">Name</th>
                <th width="15%" >Address</th>
                <th >Gender</th>
                <th >Institution</th>
                <th >Program</th>
                <th >Year Graduated</th>
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('Alumni.pdf', 'I');  
 }  
 ?>  