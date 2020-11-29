<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM barang WHERE id='$id'");
header("location:alat.php");

?>