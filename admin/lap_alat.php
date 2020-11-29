<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");
date_default_timezone_set("Asia/Jakarta");
$pdf->SetMargins(2,1.5,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Cell(25.5,0.7,"LAPORAN DATA BARANG",0,10,'C');
$pdf->Cell(25.5,0.7,"TATA USAHA",0,10,'C');
$pdf->Cell(25.5,0.7,"SMKN 1 KEPANJEN",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5.5,0.7,"dicetak pada tanggal : ".date("d M Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(3, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'jumlah', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'sisa', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($conn,"select * from barang");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(3, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(8, 0.8, $lihat['nama'],1, 0, 'C');

	$pdf->Cell(7, 0.8, $lihat['jumlah'], 1, 0,'C');
	$pdf->Cell(7, 0.8, $lihat['sisa'],1, 1, 'C');

	$no++;
}

$pdf->Output("laporan_buku.pdf","I");

?>

