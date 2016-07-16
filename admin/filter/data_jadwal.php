<table  align="center"  style="box-shadow:0px 0px 8px #CCC" width="99%" cellspacing="4" cellpadding="4">
  <tr bgcolor="#E9E9E9">
    <th width="55" height="46">id jadwal</th>
    <th width="174">Guru</th>
    <th width="100">Siswa</th>
    <th width="100">Materi</th>
    <th width="70">Hari</th>
    <th width="85">Jam</th>
    <th width="70">Level</th>
    <th width="81">Admin</th>
    <th colspan="3"><div align="center">Pilihan</div></th>
     
  </tr>
 
  <?php
      include"../../koneksi/koneksi.php";
  $hari=$_POST['hari'];
  $guru=$_POST['guru'];
  
    if($hari=='semua' && $guru=='semua'){
   $where='';
  }
  else if($hari=='semua' and $guru !='semua'){
	$where="where guru.nip='$guru'";
  }
    else if($hari !='semua' and $guru =='semua'){
	$where="where jadwal.hari='$hari'";
	}
   else if($hari !='semua' and $guru !='semua'){
	$where="where guru.nip='$guru' AND jadwal.hari='$hari'"; 
  }
  
  $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level $where ORDER BY jadwal.hari
					");
while($dt_jadwal=mysql_fetch_array($str)){
  ?>
  <tr>
    <td><?php echo $dt_jadwal[0];  ?></td>
    <td><?php echo $dt_jadwal['nama'];  ?></td>
    <td><?php echo $dt_jadwal['nm_siswa'];  ?></td>
    <td><?php echo $dt_jadwal['mat'];  ?></td>
    <td><?php echo $dt_jadwal['hari'];  ?></td>
    <td><?php echo $dt_jadwal['jam'];  ?></td>
    <td><?php echo $dt_jadwal['level'];  ?></td>
    <td><?php echo $dt_jadwal['id_admin'];  ?></td>
    <td width="47"><a href="?page=edit jadwal&id=<?php echo $dt_jadwal[0];  ?>">Edit</a></td>
    <td width="45"><a href="proses_jadwal.php?page=hapus&id=<?php echo $dt_jadwal[0];  ?>">Hapus</a></td>
    <td width="45"><a target="new" href="laporan/jadwal_ajar.php?nip=<?php echo $dt_jadwal['nip'];  ?>&guru=<?php echo $dt_jadwal['nama'];  ?>"><i class="fa fa-print"></i> Print</a></td>
  </tr>
  <?php } ?>
</table>