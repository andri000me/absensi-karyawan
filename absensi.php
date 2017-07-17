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
<?php
include "koneksi.php";
$absen=mysql_query("SELECT*FROM absensi ORDER BY nma asc");
echo "<center><table border=1  width=500></center>";
echo"
<tr>
<td><center>Nama Karyawan </center></td>
<td><center> Tanggal </center></td>
<td><center> Keterangan </center></td>
</tr>";
while ($data=mysql_fetch_array($absen)) {
  echo"<td>".$data['nma']."</td>";
  echo"<td>".$data['tgl']."</td>";
  echo"<td>".$data['ktr']."</td>";
echo"</tr>";
}



?>





  </body>
</html>
