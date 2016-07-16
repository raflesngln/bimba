 <style>
 #tabel tr td{
	 padding-right:5px;
	 padding-left:5px;
	 padding-bottom:5px;
	 padding-top:5px;
	 border-bottom:1px #CCC solid;
	 border-right:1px #F2F2F2 solid;
	 }
 </style>
 
<?php
$no=1;
error_reporting(0);
    ob_start();
	ob_end_clean();
  include"../../koneksi/koneksi.php";
  $nip=$_GET['nip'];
  $guru=$_GET['guru'];

	
	?>
   <h3  style="margin-bottom:-10px; text-align:center">DAFTAR JADWAL MENGAJAR</h3>
   <p align="center">BIMBA AIUEO SUKASARI</p>
   <hr style="border:1px #CCC solid" />
   
   <p style="color:#666;">Nama Guru   <span style="color:#666; margin-top:-5px "><?php echo '..... : '. $guru;?></span></p>
   <p style="color:#666; margin-top:-5px ">Nip Guru  <span style="color:#666;"><?php echo '......... : '. $nip;?></span></p>
   
<table width="103%" border="" id="tabel">
  <tr bgcolor="#E9E9E9">
    <th width="55" height="46">No</th>
    <th width="55">Hari</th>
    <th width="100">Siswa</th>
    <th width="100">Materi</th>
    <th width="85">Jam</th>
    <th width="70">Level</th>
  </tr>
  <?php
	$cari=mysql_query("select *,siswa.nm_siswa as nm_siswa,guru.nm_guru as nama,materi.materi as mat,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join siswa on jadwal.nis=siswa.nis
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level where guru.nip='$nip' ORDER BY jadwal.hari
					"); 
  while($dt_jadwal=mysql_fetch_array($cari))
  {

  ?>
  <tr>
    <td><?php echo $no  ?></td>
    <td><?php echo $dt_jadwal['hari'];  ?></td>
    <td><?php echo $dt_jadwal['nm_siswa'];  ?></td>
    <td><?php echo $dt_jadwal['mat'];  ?></td>
    <td><?php echo $dt_jadwal['jam'];  ?></td>
    <td><?php echo $dt_jadwal['level'];  ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td height="43" colspan="6">TOTAL</td>
  </tr>
</table>


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