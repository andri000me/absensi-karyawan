<?php
session_start();
if(isset($_SESSION['Nama'])){
    echo "Anda Belum <a href='home.php'>Keluar</a>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css & bootstrap/style.css">
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
		<option value="">Pilih Level User</option>
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
	
	$user=$_POST['userr'];
	$pass=$_POST['psw'];
	$level=$_POST['lvl'];
	$login=mysqli_query($koneksi,"SELECT*FROM login WHERE username='$user' AND password='$pass'");
	if(mysqli_num_rows($login) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$row = mysqli_fetch_assoc($login);

						if($row['level'] == admin && $level == admin){
												$_SESSION['username']=$user;
												$_SESSION['level']='admin';
												header("Location: index.php");
											}
						else if($row['level'] == karyawan && $level == karyawan){
						$_SESSION['username']=$user;
						$_SESSION['level']='karyawan';
	}
	else{
		echo "<script>alert('login gagal')</script>";
	}
}
}
?>
