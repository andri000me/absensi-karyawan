<?php
session_start();
if(isset($_SESSION['Nama'])){
    echo "Anda Belum <a href='home.php'>Keluar</a>";
}else{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome.css">
</head>
<body>
<div class="container">
<img src="image/19nNcx_8_400x400.jpg" style="border-radius: 15px;">
	<form action="" method="post">
		<div class="input-form">
			<input type="text" name="userr" placeholder="Enter Username">
		</div>
		<div class="input-form">
			<input type="password" name="psw" placeholder="Enter Password">
		</div>
		<select class="level" name="lvl" style="height: 30px; width: 150px; margin-top: 10px; margin-bottom: 20px; border-radius: 5px;">
		<option value="admin">Admin</option>
		<option value="karyawan">Karyawan</option>
		</select><br>
		<input type="submit" name="login" value="LOGIN" class="btn-login"><br>
		<a><p>Forget Password?</p></a>
	</form>
</div>

</body>
</html>
<?php
include "koneksi.php";
if (isset($_POST['login'])) {
	# code...
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$login=mysql_query("SELECT*FROM anggota WHERE Na='$user' AND Nama='$pass'");
	$hasil = mysql_fetch_array($login);
	$nama = $hasil['username'];
	
	if (mysql_num_rows($login)>0) {
		# code...
		session_start();
		$_SESSION['username'] = $nama;
		
		header("location:index.php");
	}
	else{
		echo "<script>alert('login gagal')</script>";
	}
}
?>

<?php }?>