<script src="../asset/js/jquery-1.8.2.min.js"></script>
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




<h2 align="center">DATA SISWA BIMBA AIUEO SUKASARI</h2>

<div id="boxheader" class="boxheader">

<div class="box1">
 <p><a href="?page=tambah siswa"><button><i class="fa fa-plus"></i> Tambah siswa</button></a><br /><br /></p>
 </div>
 
 <div class="box2">
 <form action="laporan/laporan_siswa.php" method="post" target="new">

<span>LEVEL</span>
<select name="level" class="cmbstatus"  id="level" onchange="sorting()">
 <option value="semua">Semua Level</option>
 <option value="1">1</option>
 <option value="2">2</option>
  <option value="3">3</option>
   <option value="4">4</option>
 </select>
 
 <span> &nbsp;  STATUS</span>
<select name="cmbstatus" class="cmbstatus"  id="cmbstatus" onchange="sorting()">
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
<table width="1151" cellpadding="2" align="center" cellspacing="3" border="0">
<tr bgcolor="#E9E9E9">
    <td width="100"><div align="center">Foto</div></td>
    <td width="26"><div align="center">Nis</div></td>
    <td width="37"><div align="center">Nama</div></td>
    <td width="50"><div align="center">Tempat Lahir</div></td>
    <td width="51"><div align="center">Tanggal Lahir</div></td>
    <td width="50"><div align="center">Jenis Kelamin</div></td>
    <td width="52"><div align="center">Agama</div></td>
    <td width="68"><div align="center">Alamat</div></td>
    <td width="53"><div align="center">Nama Ayah</div></td>
    <td width="47"><div align="center">Agama Ayah</div></td>
    <td width="50"><div align="center">Kerja Ayah</div></td>
    <td width="50"><div align="center">Nomer Ayah</div></td>
     <td width="41"><div align="center">Nama Ibu</div></td>
    <td width="47"><div align="center">Agama Ibu</div></td>
    <td width="39"><div align="center">Kerja Ibu</div></td>
    <td width="47"><div align="center">Nomer Ibu</div></td>
    <td width="44"><div align="center">Id Level</div></td>
    <td width="44"><div align="center">Status</div></td>
    <td width="40"><div align="center">Id Admin</div></td>
    <td colspan="3"><div align="center">pilihan</div></td>
  </tr>
  <?php
if(isset($_GET['hal'])){
$hal=$_GET['hal'];	
}else{
$hal=1;	
}
$max=25;
$dari=($hal*$max)-$max;
  
  if(!isset($_GET['status'])){
	  
$str=mysql_query("select * from siswa limit $dari,$max");
  }else{
	  $str=mysql_query("select * from siswa where status='$_GET[status]' limit $dari,$max");
  }
while($dt_siswa=mysql_fetch_array($str)){
?>
  <tr>
    <td><div align="center"><img src="../gambar/siswa/<?php echo $dt_siswa['foto']; ?>" width="100" height="120" /></div></td>
    <td><div align="center"><?php echo $dt_siswa[0]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[1]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[2]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[3]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[4]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[5]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[6]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[8]; ?></div></td>
  	<td><div align="center"><?php echo $dt_siswa[9]; ?></div></td>   
   	<td><div align="center"><?php echo $dt_siswa[10]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[11]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[12]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[13]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[14]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[15]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[16]; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa['status']; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa[17]; ?></div></td>        
    <td width="37"><div align="center"><a href="?page=edit siswa&nis=<?php echo $dt_siswa[0]; ?>">Edit</a></div></td>
    <td width="39"><div align="center"><a href="proses_siswa.php?page=hapus&nis=<?php echo $dt_siswa[0]; ?>">Hapus</a></div></td>
  </tr>
  
<?php
}

?>
<tr>
<td height="50" align="center" colspan="25">
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


