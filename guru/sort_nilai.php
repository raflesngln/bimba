<table width="99%">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr bgcolor="#E9E9E9">
    <td width="5%" height="38">No</td>
    <td width="30%">Materi
      <label for="guru"></label></td>
    <td width="20%">Nilai</td>
    <td width="45%">Catatan</td>
  </tr>
          <?php
		  include"../koneksi/koneksi.php";
		  $nis=$_POST['siswa'];
		   $nip=$_POST['guru'];
		   $level=$_POST['level'];
		   
		 $no=1;
$query=mysql_query("select a.materi,a.id_materi,d.jumlah_nilai,d.grade,d.catatan from materi a
	INNER JOIN jadwal b on a.id_materi=b.id_materi
	INNER JOIN siswa c on b.nis=c.nis
	LEFT JOIN nilai d on a.id_materi=d.id_materi
	where b.nip='$nip' AND b.nis='$nis' AND a.id_level='$level' AND c.status='aktif' GROUP BY a.materi
");
	while($data=mysql_fetch_array($query)){
		?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $data['materi'];?>
    <label for="textfield">
      <input type="hidden" name="materi[]" id="materi[]" value="<?php echo $data['id_materi'];?>" />
    </label></td>
    <td>
    <input type="text" name="nilai[]" id="nilai[]" value="" /></td>
    <td><textarea name="ket[]" cols="50" rows="2" id="ket[]"></textarea></td>
  </tr>
  <?php $no ++;} ?>
  </table>
  
  