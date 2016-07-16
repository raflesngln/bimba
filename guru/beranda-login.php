<table width="100%" border="0" bgcolor="#999999" cellspacing="0" cellpadding="0">
  <tr>
    <th><font color="#000000"><p>Selamat datang di halaman guru Bimba Aiueo Sukasari Tangerang. </p><p>Halaman ini merupakan salah satu fasilitas yang menyediakan informasi di Bimba Aiueo Sukasari Tangerang.</p></font></th>
  </tr>
</table>

<br>


<?php
$str=mysql_query("select * from berita order by id_berita desc limit 1");
$dt_berita=mysql_fetch_array($str);
?>
<center><p><h2><?php echo $dt_berita['judul_berita']; ?></h2></p></center>

<center><img src="../gambar/<?php echo $dt_berita['gambar'];   ?>" width="376" height="317" /></center>
<br>

   <?php echo $dt_berita['isi_berita']; ?>


