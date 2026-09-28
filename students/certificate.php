<?php
session_start();
include "../db.php";
require("../fpdf/fpdf.php");

if(!isset($_SESSION['student_id']))
{
    header("Location:login.html");
    exit();
}

$email=$_SESSION['email'];

$sql="SELECT score,total_questions
      FROM results
      WHERE email='$email' AND quiz_id=3
      ORDER BY result_id DESC
      LIMIT 1";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0)
{
    die("Result not found");
}

$row=mysqli_fetch_assoc($result);

$score=$row['score'];
$total=$row['total_questions'];

if($score>=6)
{
    $title="Certificate of Achievement";
    $message="Successfully Won the Online Quiz Competition";
}
else
{
    $title="Certificate of Participation";
    $message="Successfully Participated in the Online Quiz Competition";
}

$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetDrawColor(0,0,150);
$pdf->SetLineWidth(2);
$pdf->Rect(10,10,277,190);

$pdf->SetFont('Arial','B',26);
$pdf->Cell(0,20,$title,0,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','',18);
$pdf->Cell(0,10,'This Certificate is Proudly Presented To',0,1,'C');

$pdf->Ln(5);

$pdf->SetFont('Arial','B',24);
$pdf->Cell(0,15,$email,0,1,'C');

$pdf->Ln(5);

$pdf->SetFont('Arial','',18);
$pdf->MultiCell(0,10,$message,0,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,10,"Score : $score / $total",0,1,'C');

$pdf->Ln(20);

$pdf->Cell(90,10,'Quiz Coordinator',0,0,'C');
$pdf->Cell(90,10,'Principal',0,0,'C');
$pdf->Cell(90,10,'Date: '.date('d-m-Y'),0,1,'C');

$pdf->Output('D','Quiz_Certificate.pdf');
?>