<?php 
include 'config.php';
$id=$_GET['id'];
$jumlah=$_GET['jumlah'];
$nama=$_GET['nama'];

$a=mysqli_query($conn,"select sisa from barang where nama='$nama'");
$b=mysqli_fetch_array($a);
$kembalikan=$b['sisa']+$jumlah;
$c=mysqli_query($conn,"update barang set sisa='$kembalikan' where nama='$nama'");
mysqli_query($conn,"delete from peminjaman where id='$id'");
header("location:alat_pinjam.php");

 ?>