<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
	<title>Data Barang</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="" class="navbar-brand">Gudang TU</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#"><?php echo $_SESSION['uname']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>


<div class="col-md-2">
<?php 
$b  = '';
$c  = '';
$d  = '';

switch ($_SERVER['REQUEST_URI']) {
	case '/gudang_tu/admin/alat.php':
		$b = 'class="active"';
		break;
	case '/gudang_tu/admin/alat_pinjam.php':
		$c = 'class="active"';
		break;
	case '/gudang_tu/admin/pengembalian.php':
		$d = 'class="active"';
		break;
}

 ?>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">		
			<li <?= $b; ?>><a href="alat.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</a></li>
			<li <?= $c; ?>><a href="alat_pinjam.php"><span class="glyphicon glyphicon-briefcase"></span>   Peminjaman Barang</a></li>
			<li <?= $d; ?>><a href="pengembalian.php"><span class="glyphicon glyphicon-briefcase"></span>   Pengembalian Barang</a></li>     					
					

			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>		

		</ul>
	</div>
	<div class="col-md-10">