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
  $status=$_POST['cmbstatus'];
  $level=$_POST['level'];
	
	?>
   <h3  style="margin-bottom:-10px; text-align:center">DAFTAR SISWA</h3>
   <p align="center">BIMBA AIUEO SUKASARI</p>
   <hr style="border:1px #CCC solid" />
   
   <p style="color:#666;">Status  : <?php echo ' '. $status;?></p>
   <p style="color:#666; margin-top:-5px ">Level  :<?php echo '  '. $level;?> </p>
   
<table width="103%" border="" id="tabel">
  <tr style="background-color:#EFEFEF">
    <td width="22" F">No</td>
    <td width="88" height="39" F">Nama</td>
    <td width="80">Tmpat &amp; Tgl lahir</td>
    <td width="80">Alamat</td>
    <td width="101">Nama Ibu / Bapak</td>
    <td width="110">Telp ibu/bapak</td>
    <td width="84">Status</td>
    <td width="35">Level</td>
    <td width="54">Status</td>
  </tr>
  <?php

  if($status=='semua' && $level=='semua'){
   $cari=mysql_query("select * from siswa");
  }
  else if($status=='semua' and $level !='semua'){
	$cari=mysql_query("select * from siswa where id_level='$level'");
  }
    else if($status !='semua' and $level =='semua'){
	$cari=mysql_query("select * from siswa where status='$status'");  
  }
   else if($status !='semua' and $level !='semua'){
	$cari=mysql_query("select * from siswa where status='$status'  AND id_level='$level'");  
  }


  while($row=mysql_fetch_array($cari))
  {

  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td><?php echo $row['tmptlahir_siswa'].' , ';?><?php echo date('d-m-Y',strtotime($row['tgllahir_siswa'])); ?></td>
    <td><?php echo $row['alamat'];?></td>
    <td><?php echo $row['nm_ibu'].' / ';?><?php echo $row['nm_ayah'];?></td>
    <td><?php echo $row['no_ibu'].' / ';?><?php echo $row['no_ayah'];?></td>
    <td><?php echo $row['nm_siswa'];?></td>
    <td>
    <div align="center"><?php echo $row['id_level'];?></div></td>
    <td><?php echo $row['status'];?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td height="43" colspan="7">TOTAL</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
</table>


  <!-- print to PDF --> 
   <?php
    $content = ob_get_clean();
    require_once(dirname(__FILE__).'/../../html2pdf/html2pdf.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'fr');
        $html2pdf->setTestTdInOnePage(false);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('report.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>