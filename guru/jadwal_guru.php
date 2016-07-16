<table  align="center" bgcolor="#00CC99" width="839" border="1" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="5"><div align="center">Data Jadwal Mengajar </div></td>
  </tr>
  <tr bgcolor="#EEEEEE">
  	<td width="70">Siswa</td>
    <td width="70">Materi</td>
    <td width="70">Hari</td>
    <td width="85">Jam</td>
    <td width="70">Level</td>
  </tr>
  <?php
  $ni=$_SESSION['nip-guru'];
  $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,level.level as level,materi.materi as mat from jadwal
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level
					where jadwal.nip='$ni' order by hari");
while($dt_jadwal=mysql_fetch_array($str)){
  ?>
  <tr bgcolor="#EEEEEE">
    <td><?php echo $dt_jadwal['nm_siswa'];  ?></td>
     <td><?php echo $dt_jadwal['mat'];  ?></td>
    <td><?php echo $dt_jadwal['hari'];  ?></td>
    <td><?php echo $dt_jadwal['jam'];  ?></td>
    <td><?php echo $dt_jadwal['level'];  ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="9"><div align="center"><a target="_blank" href="cetak_jadwal.php?nip=<?php echo $ni;  ?>">Cetak Jadwal</a></div></td>
  </tr>
</table>
