<table width="220" align="center" bgcolor="#EEEEEE" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td height="199" align="center"><img src="../gambar/siswa/<?php echo $_SESSION['foto_siswa'];  ?>" width="151" height="167" /></td>
  </tr>
    <tr>
    <td align="center"><?php echo strtoupper($_SESSION['nama-siswa']);  ?></td>
  </tr>
  <tr>
    <td height="29"><div align="center"><a href="proses-login-siswa.php">Keluar</a></div></td>
  </tr>
  <tr>
    <td bgcolor="#999933" align="center"><a href="?page=jadwal">JADWAL</a></td>
  </tr>
  <tr>
    <td bgcolor="#999933" align="center"><a href="?page=nilai">NILAI</a></td>
  </tr>
    <tr>
    <td bgcolor="#999933" align="center"><a href="?page=pembayaran">PEMBAYARAN</a></td>
  </tr>
 
</table>
