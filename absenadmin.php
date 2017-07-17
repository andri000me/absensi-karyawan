<html>
  <head>
    <meta charset="utf-8">
    <title>Absensi Karyawan</title>
    <link rel="stylesheet" href="css & Bootstrap/master.css">
  </head>
  <body>
      <header>
      <nav>
        <div class="topnav" id="myTopnav">
  <a href="#">Home</a>
  <a href="#">Absensi</a>
  <a href="#">Login</a>
  <a href="#">Logout</a>
  <img src="image/idch.png" height="70px" width="250px">
        </div>
      </nav>
      </header>
<form method="post" action="">
      <table>
      <tr>
        <td>Nama Karyawan</td>  <td><input type="text" name="nm" class="ip"><br></td></tr>
            <tr><td>Tanggal</td> <td><input type="text" name="tg" class="ip"><br></td></tr>
        <tr><td>Keterangan</td> <td><input type="text" name="kt" class="ip"><br></td></tr>
        <tr><td colspan="2>"><center><input type="submit" name="kirim" value="simpan" class="kr"></center><br></td></tr>
      </table>
      </form>
      <?php
    include "koneksi.php";
    if (isset($_POST['kirim'])) {
    	# code...
    	$nama=$_POST['nm'];
    	$tanggal=$_POST['tg'];
    	$keterangan=$_POST['kt'];


    	$input=mysqli_query($koneksi , "INSERT INTO absensi(nma,tgl,ktr) VALUES ('$nama','$tanggal','$keterangan')");
    	if($input){
    		echo "<script>alert('Data berhasil disimpan');</script>";
    	}
    	else{
    		echo "<script>alert('Gagal disimpan');</script>";
    	}
    }
    ?>
<?php
include "koneksi.php";
$absen=mysqli_query($koneksi , "SELECT*FROM absensi ORDER BY nma asc");
echo "<center><table border=1  width=500></center>";
echo"
<tr>
<td><center>Nama Karyawan </center></td>
<td><center> Tanggal </center></td>
<td><center> Keterangan </center></td>
</tr>";
while ($data=mysqli_fetch_array($absen)) {
  echo"<td>".$data['nma']."</td>";
  echo"<td>".$data['tgl']."</td>";
  echo"<td>".$data['ktr']."</td>";
echo"</tr>";
}



?>





  </body>
</html>
