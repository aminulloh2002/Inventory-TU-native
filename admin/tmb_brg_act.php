<?php 
include 'config.php';
$nama=$_POST['nama'];
$jumlah=$_POST['jumlah'];
$sisa=$_POST['jumlah'];

mysqli_query($conn,"insert into barang values('','$nama','$jumlah','$sisa')");

header("location:alat.php");

 ?>