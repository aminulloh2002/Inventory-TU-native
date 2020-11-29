<?php include 'header.php';	?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data pengembalian Barang</h3><br>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-primary col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Entry pengembalian</button>

<br/>
<?php 

	$tg="lap_belumkembali.php";
	?>
<a style="margin-bottom:10px" href="<?php echo $tg ?>" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><br><br>

<h4>Data siswa yang belum mengembalikan</h4>
<br>
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

		$brg=mysqli_query($conn,"SELECT * FROM peminjaman WHERE jumlah > jumlah_kembali OR jumlah_kembali < jumlah ORDER BY id DESC");
	
	$no=1;
	while($b=mysqli_fetch_assoc($brg)){

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
				<h4 class="modal-title">Entry pengembalian Alat
				</div>
				<div class="modal-body">				
					<form action="pengembalian_act.php" method="post">
						<div class="form-group">
							<label>Nama Peminjam</label>								
							<select class="form-control" name="nama_peminjam" id="nuser">
								<?php 
								$brg=mysqli_query($conn,"select * from peminjaman where jumlah > jumlah_kembali or jumlah_kembali < jumlah");
								while($b=mysqli_fetch_assoc($brg)){
									?>	
									<option onclick="tampil(); " value="<?php echo $b['nama_peminjam']; ?>"><?php echo $b['nama_peminjam'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>		

						<div class="form-group">
							<label>Nama Alat</label>								
							<select class="form-control" name="nama_barang">
								<?php 
								$brg=mysqli_query($conn,"select distinct(nama_barang) from  peminjaman where jumlah > jumlah_kembali or jumlah_kembali < jumlah");
								while($b=mysqli_fetch_assoc($brg)){
									?>	
									<option value="<?php echo $b['nama_barang']; ?>"><?php echo $b['nama_barang'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>									
						<div class="form-group">
							<label>Jumlah alat yang dikembalikan</label>
							<input id="nama" name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off" required>
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

	<?php include 'footer.php'; ?>