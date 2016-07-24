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


<h2 align="center">Detail Nilai Siswa</h2>
   <form action="laporan_nilai.php" method="post" target="new">

<div id="hdrbox">
<?php
error_reporting(0);
$nip=$_SESSION['nip-guru'];
  include"../koneksi/koneksi.php";
  $nis=$_GET['nis'];
  $cari=mysql_query("select*from siswa a
  inner join level b on a.id_level=b.id_level
   where nis='$nis' LIMIT 1");
  while($row=mysql_fetch_array($cari)){
	  $nomor_level=$row['id_level'];
?>

<table width="340" border="0">
  <tr>
    <td width="136">Nis</td>
    <td width="24">:</td>
    <td width="158"><?php echo $row['nis'];?>
      <input type="hidden" name="nis" id="nis" value="<?php echo $row['nis'];?>" /></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $row['nm_siswa'];?>
      <input type="hidden" name="nip" id="nip" value="<?php echo $row['nip'];?>" />
      <input type="hidden" name="nama" id="nama" value="<?php echo $row['nm_siswa'];?>" /></td>
  </tr>
  <tr>
    <td>Level Aktif</td>
    <td>:</td>
    <td><?php echo $row['id_level'];?></td>
  </tr>
  <tr>
    <td>Pilih Level</td>
    <td>:</td>
    <td><select name="level" required="required" id="level" onchange="return sorting()" style="height:30px; width:200px">
      <option value="">Pilih Level</option>
      <?php
		 include"../koneksi/koneksi.php";
$query=mysql_query("select * from level
");
	while($data=mysql_fetch_array($query)){
		?>
      <option value="<?php echo $data['id_level'];?>"><?php echo $data['level'];?></option>
      <?php } ?>
    </select></td>
  </tr>
</table>
<?php } ?>
</div>


<div id="boxtabel">

<table width="99%" id="tabelnilai">
<tr bgcolor="#00BFBF">
  <td height="41" colspan="4" style="color:#FFF">Detail Nilai Level &raquo;  <?php echo $nomor_level ;?></td>
  <td align="center">
 
 <button class="submit" type="submit" style="padding:8px 20px; background-color:#FF9224; border:none; color:white; cursor:pointer"><i class="fa fa-print"></i> Cetak</button>

  </td>
</tr>
<tr bgcolor="#E9E9E9">
  <td width="46">NO</td>
  <td width="83" height="41"><div align="">Tgl</div></td>
  <td width="208"><div align="">Materi</div></td>
  <td width="138"><div align="center">Nilai Total</div></td>
  <td width="74">Grade</td>
</tr>
  <?php
$no='1';
$str=mysql_query("select *
	from nilai a
	left join siswa b on a.nis=b.nis
	inner join materi c on a.id_materi=c.id_materi
	WHERE b.nis='$nis' AND a.id_level='$nomor_level'
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
</div>

 </form>
<script>
function sorting(){
//Mengambil value tgl 1 dan 2
	var nis = $('#nis').val();
	var level = $('#level').val();
	//Gunakan jquery AJAX
		$.ajax({
                type: "POST",
                url :'detail_nilai_sorting.php',
                data: "nis="+nis+"&level="+level,
                success: function(data){
					 $("#boxtabel").html(data);
                }
            });
}




</script>