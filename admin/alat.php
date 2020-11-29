<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Data Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-primary col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>

<br/>
<br/>
<?php 

function mysqli_result($result,$row,$field=0){
	$result->data_seek($row);
	$datarow =  $result->fetch_array();
	return $datarow[$field];

}

$per_hal=10;
$jumlah_record=mysqli_query($conn,"SELECT COUNT(*) from barang");
$jum=mysqli_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<br>
<form action="cari_act.php" method="get" class="col-md-8 pull-left">
	<div class="input-group col-md-5 " style="margin-left: -17px;">
			<input type="text" class="form-control" placeholder="Cari Alat.." aria-describedby="basic-addon1" name="cari">	
		<span class="input-group-addon" id="basic-addon1" onclick="document.getElementById('bt').click();"><span class="glyphicon glyphicon-search"></span></span>
		<button id="bt" type="submit" style="display: none;"></button>
	</div>
</form>
<div class="col-md-4 ">

	<a style="margin-bottom:10px" href="lap_Alat.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>

<table class="table table-hover " style="margin-top: 50px;">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-3">Nama Barang</th>
		<th class="col-md-2">Jumlah</th>
		<th class="col-md-2">Sisa</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($conn,$_GET['cari']);
		$brg=mysqli_query($conn,"select * from barang where nama like '%$cari%'");
	}else{
		$brg=mysqli_query($conn,"select * from barang order by id desc limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['jumlah'] ?></td>
			<td><?php echo $b['sisa'] ?></td>
			<td>
		
				<a href="edit.php?id=<?php echo $b['id']; ?>" class="btn btn-primary">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }" class="btn btn-primary">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Alat Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act.php" method="post">
					<div class="form-group">
						<label>Nama Alat</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Alat .." autocomplete="off">
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>