<script src="../asset/js/jquery-1.8.2.min.js"></script>
<style>
table tr td{
	border-bottom:1px #CCC solid;
}
table tr:hover{
	background-color:#B7FFFF;
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




<h2 align="center">Data Jadwal Mengajar </h2>

<div id="boxheader" class="boxheader">

<div class="box1">
 <p><a href="?page=tambah jadwal"><button><i class="fa fa-plus"></i> Tambah Jadwal</button></a><br /><br /></p>
 </div>
 
 <div class="box2">
 <form action="laporan/laporan_siswa.php" method="post" target="new">

<span>PENGAJAR  &raquo; </span>
<select name="guru" class="cmbstatus"  id="guru" onchange="sorting()">
 <option value="semua">Semua Pengajar</option>
 <?PHP
 include"../../koneksi/koneksi.php";
 $query=mysql_query("select*from guru order by nm_guru");
 while($row=mysql_fetch_array($query)){
 ?>
 
 <option value="<?php echo $row['nip'];?>"><?php echo $row['nm_guru'];?></option>

   <?php } ?>
 </select>
 
 <span> &nbsp;  HARI  &raquo; </span>
<select name="cmbstatus" class="cmbstatus"  id="cmbstatus" onchange="sorting()">
 <option value="semua">Semua Hari</option>
 <option value="senin">senin</option>
 <option value="selasa">selasa</option>
 <option value="rabu">rabu</option>
 <option value="kamis">kamis</option>
 <option value="jumat">jumat</option>
 <option value="sabtu">sabtu</option>
<option value="minggu">minggu</option>
 </select>

 </form>
 
 </div>

</div>

<br style="clear:both" />
<div id="boxtabel">
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
  $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level ORDER BY jadwal.hari
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
</div>

<script>
function sorting(){
//Mengambil value tgl 1 dan 2
	var hari = $('#cmbstatus').val();
	var guru = $('#guru').val();
	//Gunakan jquery AJAX
		$.ajax({
                type: "POST",
                url :'filter/data_jadwal.php',
                data: "hari="+hari+"&guru="+guru,
                success: function(data){
					 $("#boxtabel").html(data);
                }
            });
}

</script>