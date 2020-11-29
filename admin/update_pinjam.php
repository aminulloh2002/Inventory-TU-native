<?php 
include 'config.php';


$id=$_POST['id'];
$tanggal=$_POST['tgl'];
$namap=$_POST['nama_peminjam'];
$namab = $_POST['nama_barang'];
$jumlah=$_POST['jumlah'];
$usisa = $_POST['jumlahlama'] - $_POST['jumlah'];

$dt=mysqli_query($conn,"select * from barang where nama='$namab'");
$data=mysqli_fetch_assoc($dt);
$sisa = $data['sisa']  += $usisa;
mysqli_query($conn,"update barang set sisa = '$sisa' where nama = '$namab'");



mysqli_query($conn,"update peminjaman set tanggal='$tanggal', nama_peminjam='$namap',nama_barang = '$namab', jumlah='$jumlah' where id='$id'");
header("location:alat_pinjam.php");

?>