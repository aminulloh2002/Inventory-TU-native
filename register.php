<?php 
include 'admin/config.php';
if (isset($_POST['login'])) {
	$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=md5($pass);
$q = mysqli_query($conn,"INSERT INTO admin VALUES('','$uname','$pas')");
if (mysqli_affected_rows($conn)>0) {
	echo"<script>alert('registrasi berhasil');
	document.location.href = 'index.php';
	</script>";
} else{
echo"<script>alert('registrasi gagal')</script>";
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>


	<div class="kotak_login">
		<p class="tulisan_login">Silahkan register</p>

		<form method="post">
			<label>Username</label>
			<input type="text" name="uname" class="form_login" placeholder="Username" required>

			<label>Password</label>
			<input type="password" name="pass" class="form_login" placeholder="Password" required>

			<button type="submit" class="tombol_login" name="login">register</button>

			<br><br>
			<center>
				<a class="index.php" href="index.php">login</a>
			</center>

		</form>
		
	</div>


</body>
</html>