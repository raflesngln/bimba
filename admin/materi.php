<table width="718" align="center" border="1" cellspacing="4" cellpadding="4">
<tr>
    <td colspan="21" align="center" bgcolor="#CCCCCC"><h2>DATA MATERI BIMBA AIUEO SUKASARI</h2></td>
  </tr>
  <tr>
    <td height="34" colspan="7"><div align="left"><a href="?page=tambah materi">Tambah materi</a></div></td>
  </tr>
  <tr bgcolor="#00BFFF">
    <td width="116">id materi</td>
    <td width="107">tgl input</td>
    <td width="106">materi</td>
    <td width="99">admin</td>
    <td width="82">Level</td>
    <td colspan="2">Pilihan</td>
  </tr>
  <?php
  $str=mysql_query("select * from materi");
  while($dt_materi=mysql_fetch_array($str)){
  ?>
  <tr>
    <td><?php echo $dt_materi[0];  ?></td>
    <td><?php echo $dt_materi[1];  ?></td>
    <td><?php echo $dt_materi[2];  ?></td>
    <td><?php echo $dt_materi[3];  ?></td>
    <td><?php echo $dt_materi[4];  ?></td>
    <td width="56"><a href="?page=edit materi&id=<?php echo sha1($dt_materi[0]); ?>">Edit</a></td>
    <td width="64"><a href="proses_materi.php?page=hapus&id=<?php echo $dt_materi[0]; ?>">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>
