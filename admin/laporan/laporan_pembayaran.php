 <style>
 #tabel tr td{
	 padding-right:5px;
	 padding-left:3px;
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
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
  $status=$_POST['status'];
	
	?>
   <h3  style="margin-bottom:-10px; text-align:center">DATA PEMBAYARAN</h3>
   <p align="center">BIMBA AIUEO SUKASARI</p>
   <hr style="border:1px #CCC solid" />
   
   <p style="color:#666;">Status  : <?php echo ' '. $status;?></p>
   <p style="color:#666; margin-top:-5px ">Periode  :<?php echo '  '. date('d M Y',strtotime($tgl1)).' - '.date('d M Y',strtotime($tgl2));?> </p>
   
<table width="100%" id="tabel">
<tr bgcolor="#CCCCCC">
    <th style="width:70px; height:35px">Nis</th>
    <th style="width:210">Nama</th>
    <th style="width:90px">Tgl Bayar</th>
    <th style="width:110px">level</th>
    <th style="width:120px"><span style="width:150px">Status Pembayar</span></th>
    <th style="width:150px">Nominal</th>
    </tr>
  <?php
  if($status=='semua'){
	  $where="WHERE pembayaran.tgl_bayar BETWEEN '$tgl1' AND '$tgl2'";
  } else {
	  $where="WHERE pembayaran.tgl_bayar BETWEEN '$tgl1' AND '$tgl2' AND pembayaran.status_bayar='$status'";
  }
  
 
 $str=mysql_query("select *,DATE_ADD(date(tgl_bayar),INTERVAL 6 MONTH) as jatuh,siswa.nm_siswa as nama from pembayaran
  					inner join siswa on pembayaran.nis=siswa.nis
					inner join level on pembayaran.id_level=level.id_level 
					$where ");
  
while($dt_pembayaran=mysql_fetch_array($str)){
	$status_bayar=$dt_pembayaran['status_bayar'];
	if($status_bayar=='LUNAS'){
	$status='<i class="fa fa-check"></i> LUNAS';	
	} else{
	$status='<i class="fa fa-times"></i> BELUM LUNAS';	
	}
	$bayar=$dt_pembayaran['bayar'];
	$total+=$bayar;
?>
  <tr>
    <td><?php echo $dt_pembayaran['nis'];  ?></td>
    <td><?php echo $dt_pembayaran['nm_siswa'];  ?></td>
    <td><?php echo date('d-m-Y',strtotime($dt_pembayaran[1]));  ?></td>
    <td><?php echo $dt_pembayaran['level'];  ?></td>
    <td><?php echo $status; ?></td>
    <td><div align="right"> <?php echo number_format($dt_pembayaran['bayar']);  ?></div></td>
  </tr><?php
}

?>
  <tr>
    <td height="41" colspan="5"><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="right"><strong>Rp. <?php echo number_format($total);  ?></strong></div></td>
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