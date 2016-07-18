 <style>
 #tabel tr td{
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
<div style="background-color:#FFB66C; color:#FFF; width:44%; padding:9px 20px">SENIN</div>
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
                    
  <h4 style="background-color:#06F;color:#FFF;"><?php echo $nm_materi  ?></h4>
   <table width="90%" class="child">
  <tr>
    <td width="300px">Jam</td>
    <td width="400px">Nama Siswa</td>
    <td width="200px">Level</td>
    </tr>
 <?php
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    </tr>
 <?php } ?>
 
</table>
      <?php } ?> 


</div>


<div class="box">
<div style="background-color:#FFB66C; color:#FFF; width:44%; padding:9px 20px">KAMIS</div>
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
                    
  <p><?php echo $nm_materi  ?></p>
   <table width="90%" style="border:1px #F2F2F2 solid">
  <tr>
    <td width="300px">Jam</td>
    <td width="400px">Nama Siswa</td>
    <td width="200px">Level</td>
    <td width="200px">Jam</td>
  </tr>
 <?php
 $tampil1=mysql_query("select*from siswa a
 inner join jadwal b on a.nis=b.nis
 inner join materi c on b.id_materi=c.id_materi
 inner join guru d on b.nip=d.nip
 where d.nip='$nip' AND c.id_materi='$materi'
 ");
 while($row=mysql_fetch_array($tampil1)){
 
 ?>               
  <tr>
    <td><?php echo $row['jam'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['id_level'];?></td>
    <td><?php echo $row['jam'];?></td>
  </tr>
 <?php } ?>
 
</table>
      <?php } ?> 


</div>
  <!-- print to PDF --> 
   <?php
    $content = ob_get_clean();
    require_once(dirname(__FILE__).'/../../html2pdf/html2pdf.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->setTestTdInOnePage(false);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('report.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>