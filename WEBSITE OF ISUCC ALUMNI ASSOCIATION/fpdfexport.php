<?php
require "FPDF/fpdf.php";
include 'connection/conn.php';
/**
 * 
 */
class myPDF extends FPDF
{
	
	function header(){
    $this->SetFont('Arial','B',14);
    $this->Cell(276,5,'ALUMNI RECORDS',0,0,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Cell(276,10,'Alumni Records of ISU Alumnus',0,0,'C');
    $this->Ln(20);

  }
  function footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,'Page '.$this->Pageno().'/{nb}',0,0,'C');
  }
  function headertable(){
  	$this->SetFont('Times','B',12);
  	$this->Cell(20,10,'ID',1,0,'C');
  	$this->Cell(40,10,'Name',1,0,'C');
  	$this->Cell(50,10,'Address',1,0,'C');
  	$this->Cell(30,10,'Gender',1,0,'C');
  	$this->Cell(40,10,'Institusion',1,0,'C');
  	$this->Cell(60,10,'Program',1,0,'C');
  	$this->Cell(40,10,'Year Graduated',1,0,'C');
  	$this->Ln();

  }
  function viewTable($db){
   $this->SetFont('Times','',12);
   $stmt = $db->query('SELECT * FROM alumni_records');
   while($data = $stmt->fetch(PDO::FETCH_OBJ)){
   	$this->Cell(20,10,$data->id,1,0,'C'); 
  	$this->Cell(40,10,$data->fname,1,0,'L');
  	$this->Cell(50,10,$data->address,1,0,'L');
  	$this->Cell(30,10,$data->gender,1,0,'L');
  	$this->Cell(40,10,$data->institution,1,0,'L');
  	$this->Cell(60,10,$data->program,1,0,'L');
  	$this->Cell(40,10,$data->yeargraduted,1,0,'L');
  	$this->Ln();
   }
  }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headertable();
$pdf->viewTable($db);
$pdf->Output();
