<style>
#tabelnilai tr td{
	border-bottom:1px #CCC solid;
	line-height:25px;
}
</style>


<h2 align="center">Detail Nilai Siswa</h2>
<div id="hdrbox">
<?php
error_reporting(0);
  include"../koneksi/koneksi.php";
  $nis=$_GET['nis'];
  $cari=mysql_query("select*from siswa a
  inner join level b on a.id_level=b.id_level
   where nis='$nis' LIMIT 1");
  while($row=mysql_fetch_array($cari)){
?>

<table width="340" border="0">
  <tr>
    <td width="136">Nis</td>
    <td width="24">:</td>
    <td width="158"><?php echo $row['nis'];?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $row['nm_siswa'];?></td>
  </tr>
  <tr>
    <td>Level Aktif</td>
    <td>:</td>
    <td><?php echo $row['id_level'];?></td>
  </tr>
</table>
<?php } ?>
</div>


<div id="boxtabel">
<table width="99%" id="tabelnilai">
<tr bgcolor="#E9E9E9">
  <td width="47">NO</td>
    <td width="84" height="41"><div align="">Tgl</div></td>
    <td width="210"><div align="">Materi</div></td>
    <td width="138"><div align="center">Nilai Total</div></td>
    <td width="70">Grade</td>
    </tr>
  <?php
$no='1';
$str=mysql_query("select *
	from nilai a
	left join siswa b on a.nis=b.nis
	inner join materi c on a.id_materi=c.id_materi
	ORDER BY c.materi");
 
while($dt_siswa=mysql_fetch_array($str)){
	$nilai=$dt_siswa['jumlah_nilai'];
	$t_nilai+=$nilai;
	
	if($nilai > 0 AND $nilai <=59){
		$grade='C';
	} else if($nilai > 59 AND $nilai <=79){
		$grade='B';
	} else if($nilai > 80 AND $nilai <=100){
		$grade='A';
	}
	
?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><div align=""><?php echo $dt_siswa['tgl_input']; ?></div></td>
    <td><div align=""><?php echo $dt_siswa['materi']; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa['jumlah_nilai']; ?></div></td>
    <td><strong><?php echo $grade; ?></strong></td>
    </tr>
	<?php $no++; }?>
  <tr>
    <td height="50" colspan="3"><div align="center"><strong>TOTAL NILAI</strong></div></td>
    <td><div align="center"><strong><?php echo $t_nilai; ?></strong></div></td>
    <td>&nbsp;</td>
  </tr>
  

<br />
</table>
</div>