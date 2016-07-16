<?php
$nis=$_SESSION['nis-siswa'];
$str=mysql_query("select * from nilai where nis='$nis' order by id_level asc");
?>
<table align="center" width="849" border="0" cellspacing="4" cellpadding="4">
  <tr bgcolor="#669966">
    <td rowspan="2"><div align="center">Level</div></td>
    <td colspan="3"><div align="center">Materi</div></td>
    <td rowspan="2"><div align="center">Hasil</div></td>
    <td rowspan="2"><div align="center">grade</div></td>
    <td rowspan="2"><div align="center">Catatan</div></td>
  </tr>
  <tr bgcolor="#669966">
    <td><div align="center">Baca</div></td>
    <td><div align="center">Tulis</div></td>
    <td><div align="center">Hitung</div></td>
  </tr>
  <?php
  while($dt_nilai=mysql_fetch_array($str)){
  ?>
  <tr bgcolor="#DDDDDD">
    <td><?php echo $dt_nilai['id_level'];   ?></td>
    <td><?php echo $dt_nilai['nilai_baca'];   ?></td>
    <td><?php echo $dt_nilai['nilai_tulis'];   ?></td>
    <td><?php echo $dt_nilai['nilai_hitung'];   ?></td>
    <td><?php echo $dt_nilai['hasil'];   ?></td>
    <td><?php echo $dt_nilai['grade'];   ?></td>
    <td><?php echo $dt_nilai['catatan'];   ?></td>
  </tr>
  <?php } ?>
  <tr>
  <td colspan="7" align="center"><a target="_blank" href="cetak_nilai.php?nis=<?php echo $nis;   ?>">cetak nilai</a></td>
  </tr>
</table>
