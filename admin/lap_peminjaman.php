<?php

include 'config.php';
require('../assets/pdf/fpdf.php');
date_default_timezone_set("Asia/Jakarta");
$pdf = new FPDF("L","cm","A4");
$pdf->SetMargins(2,1.5,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Cell(25.5,0.7,"LAPORAN DATA PEMINJAMAN BARANG",0,10,'C');
$pdf->Cell(25.5,0.7,"TATA USAHA SMKN 1 KEPANJEN",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(6,0.7,"dicetak pada tanggal : ".date("d M Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Pinjam', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Peminjam', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Kelas', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jumlah Pinjam', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jumlah Kembali', 1, 1, 'C');


$no=1;

$query=mysqli_query($conn,"select * from peminjaman");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$date =  $lihat['tanggal'];
	$newdate = date("d-m-Y",strtotime($date));
	$pdf->Cell(4, 0.8, $newdate,1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nama_peminjam'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['kelas'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['nama_barang'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['jumlah'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['jumlah_kembali'], 1, 1,'C');
	
	
	$no++;
}

$pdf->Output("laporan_buku.pdf","I");

?>

