<?php 

include 'config.php';
$tgl=$_POST['tgl'];
$namap=$_POST['nama_peminjam'];
$namab=$_POST['nama_barang'];
$jumlah=$_POST['jumlah'];
$kelas = $_POST['kelas'];

$dt=mysqli_query($conn,"select * from barang where nama='$namab'");
$data=mysqli_fetch_assoc($dt);
$sisa=$data['sisa']-$jumlah;

mysqli_query($conn,"update barang set sisa='$sisa' where nama='$namab'");

mysqli_query($conn,"insert into peminjaman values('','$tgl','$namap','$kelas','$namab','$jumlah','0')")or die(mysqli_error());
header("location:alat_pinjam.php");

?>