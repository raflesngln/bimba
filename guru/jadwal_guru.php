 <style>
 .subtabel tr td{
	 padding-right:5px;
	 padding-left:5px;
	 padding-bottom:5px;
	 padding-top:5px;
	 border-bottom:1px #CCC solid;
	 border-right:1px #F2F2F2 solid;
	 }
.box{
	border:1px #FF8040 solid;
	padding-bottom:10px;
	padding-top:10px;
	padding-left:10px;
	margin-bottom:6px;
	
}
.child tr td{
	width:200px;
	padding-bottom:8px;
	padding-top:8px;
	border-bottom:1px #CCC solid;
}
.sub{
	background-color: #F2F2F2;
    color: #e27f7f;
    width: 25%;
    line-height: 25px;
    padding-left: 10px;
}
 </style>
 
<?php
$no=1;
error_reporting(0);
    ob_start();
	ob_end_clean();
  include"../../koneksi/koneksi.php";
  $nip=$_SESSION['nip-guru'];
  $guru=$_SESSION['nama-guru'];	
	?>
   <h3  style="margin-bottom:-10px; text-align:center">DAFTAR JADWAL MENGAJAR</h3>
   <p align="center">BIMBA AIUEO SUKASARI</p>
   <hr style="border:1px #CCC solid" />
   
   <p style="color:#666;">Nama Guru   <span style="color:#666; margin-top:-5px "><?php echo '..... : '. $guru;?></span></p>
   <p style="color:#666; margin-top:-5px ">Nip Guru  <span style="color:#666;"><?php echo '......... : '. $nip;?></span></p>
   

<div class="box">
<div style="background-color:#009688; color:#FFF; width:44%; padding:9px 20px">SENIN</div>
  <?php
    $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level where jadwal.hari='senin' AND guru.nip='$nip' GROUP BY materi.id_materi
					");
while($dt_jadwal=mysql_fetch_array($str)){
	$materi=$dt_jadwal['id_materi'];
	$nm_materi=$dt_jadwal['mat'];
					?>
                    
 
   <table width="90%" class="subtabel">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr style="background-color:#E9E9E9">
    <td colspan="4">Materi : <?php echo $nm_materi  ?></td>
    </tr>
  <tr style="background-color:#F2F2F2">
    <td width="10%">No</td>
    <td width="30%">Jam</td>
    <td width="40%">Nama Siswa</td>
    <td width="20%">Level</td>
    </tr>
 <?php
 $nomorsub=1;
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $nomorsub;?></td>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    </tr>
 <?php $nomorsub++; } ?>
 
</table>
      <?php } ?> 


</div>
   
   
<div class="box">
<div style="background-color:#FFC107; color:#FFF; width:44%; padding:9px 20px">SELASA</div>
  <?php
    $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level where jadwal.hari='selasa' AND guru.nip='$nip' GROUP BY materi.id_materi
					");
while($dt_jadwal=mysql_fetch_array($str)){
	$materi=$dt_jadwal['id_materi'];
	$nm_materi=$dt_jadwal['mat'];
					?>
                    
 
   <table width="90%" class="subtabel">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr style="background-color:#E9E9E9">
    <td colspan="4">Materi : <?php echo $nm_materi  ?></td>
    </tr>
  <tr style="background-color:#F2F2F2">
    <td width="10%">No</td>
    <td width="30%">Jam</td>
    <td width="40%">Nama Siswa</td>
    <td width="20%">Level</td>
    </tr>
 <?php
 $nomorsub=1;
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $nomorsub;?></td>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    </tr>
 <?php $nomorsub++; } ?>
 
</table>
      <?php } ?> 


</div>

<div class="box">
<div style="background-color:#4CAF50; color:#FFF; width:44%; padding:9px 20px">RABU</div>
  <?php
    $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level where jadwal.hari='rabu' AND guru.nip='$nip' GROUP BY materi.id_materi
					");
while($dt_jadwal=mysql_fetch_array($str)){
	$materi=$dt_jadwal['id_materi'];
	$nm_materi=$dt_jadwal['mat'];
					?>
                    
 
   <table width="90%" class="subtabel">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr style="background-color:#E9E9E9">
    <td colspan="4">Materi : <?php echo $nm_materi  ?></td>
    </tr>
  <tr style="background-color:#F2F2F2">
    <td width="10%">No</td>
    <td width="30%">Jam</td>
    <td width="40%">Nama Siswa</td>
    <td width="20%">Level</td>
    </tr>
 <?php
 $nomorsub=1;
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $nomorsub;?></td>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    </tr>
 <?php $nomorsub++; } ?>
 
</table>
      <?php } ?> 


</div>

<div class="box">
<div style="background-color:#673AB7; color:#FFF; width:44%; padding:9px 20px">KAMIS</div>
  <?php
    $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level where jadwal.hari='kamis' AND guru.nip='$nip' GROUP BY materi.id_materi
					");
while($dt_jadwal=mysql_fetch_array($str)){
	$materi=$dt_jadwal['id_materi'];
	$nm_materi=$dt_jadwal['mat'];
					?>
                    
 
   <table width="90%" class="subtabel">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr style="background-color:#E9E9E9">
    <td colspan="4">Materi : <?php echo $nm_materi  ?></td>
    </tr>
  <tr style="background-color:#F2F2F2">
    <td width="10%">No</td>
    <td width="30%">Jam</td>
    <td width="40%">Nama Siswa</td>
    <td width="20%">Level</td>
    </tr>
 <?php
 $nomorsub=1;
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $nomorsub;?></td>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    </tr>
 <?php $nomorsub++; } ?>
 
</table>
      <?php } ?> 


</div>

<div class="box">
<div style="background-color:#9E9E9E; color:#FFF; width:44%; padding:9px 20px">JUMAT</div>
  <?php
    $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level where jadwal.hari='jumat' AND guru.nip='$nip' GROUP BY materi.id_materi
					");
while($dt_jadwal=mysql_fetch_array($str)){
	$materi=$dt_jadwal['id_materi'];
	$nm_materi=$dt_jadwal['mat'];
					?>
                    
 
   <table width="90%" class="subtabel">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr style="background-color:#E9E9E9">
    <td colspan="4">Materi : <?php echo $nm_materi  ?></td>
    </tr>
  <tr style="background-color:#F2F2F2">
    <td width="10%">No</td>
    <td width="30%">Jam</td>
    <td width="40%">Nama Siswa</td>
    <td width="20%">Level</td>
    </tr>
 <?php
 $nomorsub=1;
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $nomorsub;?></td>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    </tr>
 <?php $nomorsub++; } ?>
 
</table>
      <?php } ?> 


</div>

<div class="box">
<div style="background-color:#E91E63; color:#FFF; width:44%; padding:9px 20px">SABTU</div>
  <?php
    $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level where jadwal.hari='sabtu' AND guru.nip='$nip' GROUP BY materi.id_materi
					");
while($dt_jadwal=mysql_fetch_array($str)){
	$materi=$dt_jadwal['id_materi'];
	$nm_materi=$dt_jadwal['mat'];
					?>
                    
 
   <table width="90%" class="subtabel">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr style="background-color:#E9E9E9">
    <td colspan="4">Materi : <?php echo $nm_materi  ?></td>
    </tr>
  <tr style="background-color:#F2F2F2">
    <td width="10%">No</td>
    <td width="30%">Jam</td>
    <td width="40%">Nama Siswa</td>
    <td width="20%">Level</td>
    </tr>
 <?php
 $nomorsub=1;
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $nomorsub;?></td>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    </tr>
 <?php $nomorsub++; } ?>
 
</table>
      <?php } ?> 


</div>

<div class="box">
<div style="background-color:#3F51B5; color:#FFF; width:44%; padding:9px 20px">MINGGU</div>
  <?php
    $str=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level where jadwal.hari='minggu' AND guru.nip='$nip' GROUP BY materi.id_materi
					");
while($dt_jadwal=mysql_fetch_array($str)){
	$materi=$dt_jadwal['id_materi'];
	$nm_materi=$dt_jadwal['mat'];
					?>
                    
 
   <table width="90%" class="subtabel">
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr style="background-color:#E9E9E9">
    <td colspan="4">Materi : <?php echo $nm_materi  ?></td>
    </tr>
  <tr style="background-color:#F2F2F2">
    <td width="10%">No</td>
    <td width="30%">Jam</td>
    <td width="40%">Nama Siswa</td>
    <td width="20%">Level</td>
    </tr>
 <?php
 $nomorsub=1;
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $nomorsub;?></td>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    </tr>
 <?php $nomorsub++; } ?>
 
</table>
      <?php } ?> 


</div>