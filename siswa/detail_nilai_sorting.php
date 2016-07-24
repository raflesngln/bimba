<style>
table tr td{
	border-bottom:1px #CCC solid;
}

.boxheader{
	padding-left:40px;
	}
.boxheader .cmbstatus{
	border:1px #CCC solid;
	height:30px;
	}
	
.box1{
	float:left;
		margin-bottom:20px;
		width:20%;
	}
	.box2{
		float:right;
		width:70%;
		text-align:right;
		margin-bottom:20px;
}
.boxheader button,.boxheader .submit{
	background:#0080C0;
	color:#FFF;
	border:0px;
	border-radius:4px;
	height:30px;
	cursor:pointer;
}
button:hover{
	background-color:#2DBBFF;
}
.submit:hover{
	background-color:#2DBBFF;
}
</style>
<table width="99%" id="tabelnilai">
<tr bgcolor="#00BFBF">
  <td height="41" colspan="4" style="color:#FFF">Detail Nilai Level &raquo;  <?php echo $_POST['level']; ;?></td>
  <td align="center"> <button class="submit" type="submit" style="padding:8px 20px; background-color:#FF9224; border:none; color:white; cursor:pointer"><i class="fa fa-print"></i> Cetak</button></td>
  </tr>
<tr bgcolor="#E9E9E9">
  <td width="47">NO</td>
    <td width="84" height="41"><div align="">Tgl</div></td>
    <td width="210"><div align="">Materi</div></td>
    <td width="138"><div align="center">Nilai Total</div></td>
    <td width="70">Grade</td>
    </tr>
  <?php
    include"../koneksi/koneksi.php";
$no='1';
error_reporting(0);
$nip=$_SESSION['nip-guru'];
$nis=$_POST['nis'];
$level=$_POST['level'];

$str=mysql_query("select *
	from nilai a
	left join siswa b on a.nis=b.nis
	inner join materi c on a.id_materi=c.id_materi
	WHERE b.nis='$nis' AND a.id_level='$level'
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
    <td><?php echo $dt_siswa['grade']; ?></td>
    </tr>
	<?php $no++; }?>
  <tr>
    <td height="50" colspan="3"><div align="center"><strong>TOTAL NILAI</strong></div></td>
    <td><div align="center"><strong><?php echo $t_nilai; ?></strong></div></td>
    <td>&nbsp;</td>
  </tr>
  

<br />
</table>