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




<h2 align="center">DATA NILAI SISWA</h2>



<br style="clear:both" />

<div id="boxtabel">
<table width="99%" cellpadding="2" align="center" cellspacing="3" border="0">
<tr bgcolor="#E9E9E9">
  <td width="30">No</td>
    <td width="80" height="41"><div align="center">Nis</div></td>
    <td width="73"><div align="">Nama</div></td>
    <td width="76"><div align="center">Nilai Total</div></td>
    <td width="84">Level Aktif</td>
    <td width="84">Status</td>
    <td width="94">Actions</td>
    </tr>
  <?php
  $no=1;
if(isset($_GET['hal'])){
$hal=$_GET['hal'];	
}else{
$hal=1;	
}
$max=25;
$dari=($hal*$max)-$max;

$str=mysql_query("select *,
(SELECT SUM(d.jumlah_nilai) from nilai d) as jml
	from nilai a
	left join siswa b on a.nis=b.nis
	inner join materi c on a.id_materi=c.id_materi
	GROUP BY a.nis
 limit $dari,$max");
 
while($dt_siswa=mysql_fetch_array($str)){
?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><div align=""><?php echo $dt_siswa['nis']; ?></div></td>
    <td><div align=""><?php echo $dt_siswa['nm_siswa']; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa['alamat']; ?></div></td>
    <td><div align="center"><?php echo $dt_siswa['id_level']; ?></div></td>
    <td><?php echo $dt_siswa['status']; ?></td>
    <td><div align="center"><a href="index.php?page=detail_nilai&nis=<?php echo $dt_siswa['nis'];  ?>"><i class="fa fa-eye"></i> Detail</a></div></td>
    </tr>
  
<?php $no++;
}

?>
<br />
<tr>
<td height="50" align="" colspan="10">
<?php
$str2=mysql_query("select * from nilai left join siswa
on nilai.nis=siswa.nis
");
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


