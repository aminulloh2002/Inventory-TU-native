<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Peminjaman Barang</h3><br>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-primary col-md-2"><span class="glyphicon glyphicon-pencil"></span>Entry Peminjaman</button>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php 
			$pil=mysqli_query($conn,"select distinct tanggal from peminjaman order by tanggal desc");
			while($p=mysqli_fetch_array($pil)){
				?>
				<option><?php echo $p['tanggal'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>

</form>
<br/>
<?php 
if(isset($_GET['tanggal'])){
	$tanggal=mysqli_real_escape_string($conn,$_GET['tanggal']);
	$tg="lap_peminjaman_tgl.php?tanggal=$tanggal";
	?><a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{ 
	$tg="lap_peminjaman.php";
	?>
<a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}
?>

<br/>
<?php 
if(isset($_GET['tanggal'])){
		$date =  $_GET['tanggal'];
	$newdate = date("d-m-Y",strtotime($date));
	echo "<h4> Data Peminjaman Tanggal  <a style='color:blue'> ".$newdate."</a></h4>";
}
?>
<table class="table">
	<tr>
		<th class="text-center">No</th>
		<th class="text-center">Tanggal</th>
		<th class="text-center">Nama Peminjam</th>
		<th class="text-center">Kelas</th>
		<th class="text-center">Nama Barang</th>
		<th class="text-center">Jumlah Pinjam</th>			
		<th class="text-center">Jumlah Kembali</th>	
		<th class="text-center">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['tanggal'])){
		$tanggal=mysqli_real_escape_string($conn,$_GET['tanggal']);
		$brg=mysqli_query($conn,"select * from peminjaman where tanggal like '$tanggal' order by tanggal desc");
	}else{
		$brg=mysqli_query($conn,"select * from peminjaman order by id desc");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td class="text-center"><?php echo $no++ ?></td>
			<?php
				$date =  $b['tanggal'];
	$newdate = date("d-m-Y",strtotime($date));
	?>
			<td class="text-center"><?php echo $newdate ?></td>
			<td class="text-center"><?php echo $b['nama_peminjam'] ?></td>
			<td class="text-center"><?php echo $b['kelas'] ?></td>
			<td class="text-center"><?= $b['nama_barang']; ?></td>
			<td class="text-center"><?php echo $b['jumlah'] ?></td>
			<td class="text-center"><?= $b['jumlah_kembali']; ?></td>			
				
			<td class="text-center">		
				<a href="edit_pinjam.php?id=<?php echo $b['id']; ?>" class="btn btn-primary">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pinjam.php?id=<?php echo $b['id']; ?>&jumlah=<?php echo $b['jumlah'] ?>&nama=<?php echo $b['nama_barang']; ?>' }" class="btn btn-primary">Hapus</a>
			</td>
		</tr>

		<?php 
	}
	?>

</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Entry Peminjaman alat
				</div>
				<div class="modal-body">				
					<form action="peminjaman_act.php" method="post">
						<div class="form-group">
							<label>Tanggal</label>
							<input name="tgl" type="text" class="form-control" id="tgl" autocomplete="off" required>
						</div>	

						<div class="form-group">
							<label>Nama Peminjam</label>
							<input name="nama_peminjam" type="text" class="form-control" placeholder="Nama peminjam" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Kelas</label>
							<input name="kelas" type="text" class="form-control" placeholder="Kelas" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Nama alat</label>								
							<select class="form-control" name="nama_barang">
								<?php 
								$brg=mysqli_query($conn,"select * from barang");
								while($b=mysqli_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>									
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
						</div>																	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>											
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'dd/mm/yy'});							
		});
	</script>
	<?php include 'footer.php'; ?>