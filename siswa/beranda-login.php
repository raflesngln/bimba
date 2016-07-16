<table width="100%" border="0" bgcolor="#999999" cellspacing="0" cellpadding="0">
  <tr>
    <td><marquee behavior="alternate" ><p>Selamat datang anda berada di halaman siswa Bimba Aiueo Sukasari Tangerang. </p><p>Halaman ini merupakan salah satu fasilitas yang menyediakan informasi di Bimba Aiueo Sukasari Tangerang.</p></marquee></td>
  </tr>
</table>



<?php
$str=mysql_query("select * from berita order by id_berita desc limit 1");
$dt_berita=mysql_fetch_array($str);
?>
<center><h2><?php echo $dt_berita['judul_berita']; ?></h2></center><br>

<center><img src="../gambar/<?php echo $dt_berita['gambar'];   ?>" width="800" height="274" /></center><br>
<p align="justify">
<?php echo $dt_berita['isi_berita']; ?>
</p>