<table width="973" border="1" align="center" style="box-shadow:0px 0px 10px black" cellspacing="4" cellpadding="4">
<tr>
    <td colspan="8" align="center" bgcolor="#CCCCCC"><h2>DATA BERITA BIMBA AIUEO SUKASARI</h2></td>
  </tr>
  <tr>
    <td colspan="8"><a href="?page=tambah berita">Tambah Berita</a></td>
  </tr>
  <tr bgcolor="#0099CC">
    <td width="59">Id Berita</td>
    <td width="165">Judul Berita</td>
    <td width="184">Berita</td>
    <td width="145">Gambar</td>
    <td width="127">Tanggal Input</td>
    <td width="62">Admin</td>
    <td colspan="2" align="center">Pilihan</td>
  </tr>
  <?php
  $str=mysql_query("select * from berita");
  while($dt_berita=mysql_fetch_array($str)){
  ?>
  <tr>
    <td><?php echo $dt_berita[0]; ?></td>
    <td><?php echo $dt_berita[1]; ?></td>
    <td><?php echo $dt_berita['isi_berita']; ?></td>
    <td><img src="../gambar/<?php echo $dt_berita[3]; ?>" width="120" height="130" /></td>
     <td><?php echo $dt_berita['tgl_input']; ?></td>
    <td><?php echo $dt_berita[5]; ?></td>
    <td width="63"><div align="center"><a href="?page=edit berita&id=<?php echo $dt_berita[0]; ?>">Edit</a></div></td>
    <td width="50"><div align="center"><a href="proses_berita.php?page=hapus&id=<?php echo $dt_berita[0]; ?>">Hapus</a></div></td>
  </tr>
  <?php
  }
  ?>
</table>
