<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit alat</h3>
<a class="btn" href="alat_pinjam.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysqli_real_escape_string($conn,$_GET['id']);

$det=mysqli_query($conn,"select * from peminjaman where id='$id_brg'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<form action="update_pinjam.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
						
		<td><input type="hidden" class="form-control" name="jumlahlama" value="<?php echo $d['jumlah'] ?>"></td>
	
			</tr>

			<tr>
				<td>Tanggal</td>
				<td class="col-md-10"><input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off" value="<?php echo $d['tanggal'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Peminjam</td>
				<td><input type="text" class="form-control" name="nama_peminjam" value="<?php echo $d['nama_peminjam'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>
					<select class="form-control" name="nama_barang">
						<?php 
						$brg=mysqli_query($conn,"select * from barang");
						while($b=mysqli_fetch_array($brg)){
							?>	
							<option <?php if($d['nama_barang']==$b['nama']){echo "selected"; } ?> value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
							<?php 
						}
						?>
					</select>
				</td>
			</tr>		
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
 <script type="text/javascript">
        $(document).ready(function(){

            $('#tgl').datepicker({dateFormat: 'yy/mm/dd'});

        });
    </script>
<?php 
include 'footer.php';

?>