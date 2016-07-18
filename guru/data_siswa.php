<script src="../asset/js/jquery-1.8.2.min.js"></script>
<style>
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




<h2 align="center">DATA SISWA </h2>

<div id="boxheader" class="boxheader">
  <div class="box2">
    <form action="laporan/laporan_siswa.php" method="post" target="new">

<span>LEVEL</span>
<select name="level" class="cmbstatus"  id="level" onChange="sorting()">
 <option value="semua">Semua Level</option>
 <option value="1">1</option>
 <option value="2">2</option>
  <option value="3">3</option>
   <option value="4">4</option>
 </select>
 
 <span> &nbsp;  STATUS</span>
<select name="cmbstatus" class="cmbstatus"  id="cmbstatus" onChange="sorting()">
 <option value="semua">Semua status</option>
 <option value="aktif">AKTIF</option>
 <option value="non aktif">NONAKTIF</option>
 <option value="lulus">LULUS</option>
 </select>
 <button class="submit" type="submit"><i class="fa fa-print"></i> Cetak</button>
 </form>
 
 </div>

</div>

<br style="clear:both" />

<div id="boxtabel">
<table width="99%" cellpadding="2" align="center" cellspacing="3" border="0">
<tr bgcolor="#E9E9E9">
    <td width="68"><div align="center">Nis</div></td>
    <td width="64"><div align="center">Nama</div></td>
    <td width="85"><div align="center">Jenis Kelamin</div></td>
    <td width="86"><div align="center">Agama</div></td>
    <td width="109"><div align="center">Alamat</div></td>
    <td width="72"><div align="center">Id Level</div></td>
    <td width="144"><div align="center">Status</div></td>
    <td colspan="2"><div align="center">pilihan</div></td>
  </tr>
  <?php
    $nip=$_SESSION['nip-guru'];
  
if(isset($_GET['hal'])){
$hal=$_GET['hal'];	
}else{
$hal=1;	
}
$max=25;
$dari=($hal*$max)-$max;
	  $str=mysql_query("select * from siswa a
	  inner join jadwal b on a.nis=b.nis
	  inner join guru c on b.nip=c.nip
	  where b.nip='$nip'
	   GROUP BY a.nis limit $dari,$max");
 
while($dt_siswa=mysql_fetch_array($str)){
?>
  <tr>
    <td><div align="center"><?php echo $dt_siswa[0]; ?></div></td>
    <td><div align="left"><?php echo $dt_siswa[1]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[4]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[5]; ?></div></td>
    <td><?php echo $dt_siswa[6]; ?></td>
    <td><div align="center"><?php echo $dt_siswa[16]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa['status']; ?></div></td>
    <td width="31"><div align="center"><a href="?page=detail_siswa&nis=<?php echo $dt_siswa[0]; ?>">Details</a></div></td>
    </tr>
  
<?php
}

?>
<tr>
<td height="50" align="center" colspan="12">
<?php
$str2=mysql_query("select * from siswa");
$jml=mysql_num_rows($str2);
$hasil=ceil($jml/$max);
echo"Halaman Ke $hal/$hasil <br />";
if($hal>1){
$new_hal=$hal-1;
echo"<a href='?page=siswa&hal=$new_hal'>Kembali</a>";	
}

for($a=1;$a<=$hasil;$a++){
	echo"&nbsp&nbsp<a href='?page=siswa&hal=$a'>$a</a>&nbsp&nbsp";
}

if($hal<$hal){
$new_hal=$hal+1;
echo"<a href='?page=siswa&hal=$new_hal'>Selanjutnya</a>";	
}
?>
</td>
</tr>
</table>
</div>

<script>
function sorting(){
//Mengambil value tgl 1 dan 2
	var status = $('#cmbstatus').val();
	var level = $('#level').val();
	//Gunakan jquery AJAX
		$.ajax({
                type: "POST",
                url :'filter/data_siswa.php',
                data: "status="+status+"&level="+level,
                success: function(data){
					 $("#boxtabel").html(data);
                }
            });
}

</script>


