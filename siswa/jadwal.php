<table  align="center" bgcolor="#00CC99" width="839" border="1" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="5"><div align="center">Data Jadwal Materi </div></td>
  </tr>
  <tr bgcolor="#EEEEEE">
    <td width="174">Guru</td>
    <td width="174">Materi</td>
    <td width="70">Hari</td>
    <td width="85">Jam</td>
    <td width="70">Level</td>
  </tr>
  <?php
  $nis=$_SESSION['nis-siswa'];
  $str=mysql_query("select *,guru.nm_guru as nama,level.level as level,materi.materi as mat from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level
					where jadwal.nis='$nis' order by hari desc");
while($dt_jadwal=mysql_fetch_array($str)){
  ?>
  <tr bgcolor="#EEEEEE">
    <td><?php echo $dt_jadwal['nama'];  ?></td>
    <td><?php echo $dt_jadwal['mat'];  ?></td>
    <td><?php echo $dt_jadwal['hari'];  ?></td>
    <td><?php echo $dt_jadwal['jam'];  ?></td>
    <td><?php echo $dt_jadwal['level'];  ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="9"><div align="center"><a target="_blank" href="cetak_jadwal.php">Cetak Jadwal</a></div></td>
  </tr>
</table>
