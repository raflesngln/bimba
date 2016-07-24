 <style>
 p{
	 margin-top:-3px;
 }
 table tr td{
	border-bottom:1px #CCC solid;
	height:25px;
}
 #tabel tr td{
	 padding-right:5px;
	 padding-left:3px;
	 padding-bottom:5px;
	 padding-top:5px;
	 border-bottom:1px #CCC solid;
	 border-right:1px #F2F2F2 solid;
	 }
 </style>
    <h3  style="margin-bottom:-10px; text-align:center">Laporan Nilai Siswa</h3>
   <h5 align="center">BIMBA AIUEO SUKASARI</h5>
   <hr style="border:1px #CCC solid" />
   <br />
   
   <p style="color:#666;">NIS  : <?php echo $_POST['nis'];?></p>
	<p style="color:#666;">NAMA  : <?php echo $_POST['nama'];?></p>
    <p style="color:#666;">LEVEL  : <?php echo $_POST['level'];?></p>
   
<table width="99%">
  <tr bgcolor="#E9E9E9">
  <td width="35" height="41">NO</td>
    <td width="266"><div align="">Materi</div></td>
    <td width="116"><div align="center">Nilai Total</div></td>
    <td width="59">Grade</td>
    <td width="251">Catt</td>
    </tr>
    <?php
    include"../koneksi/koneksi.php";
$no='1';
error_reporting(0);
$nip=$_SESSION['nip-guru'];
$nis=$_POST['nis'];
$level=$_POST['level'];

$str=mysql_query("select *
	from nilai a
	left join siswa b on a.nis=b.nis
	inner join materi c on a.id_materi=c.id_materi
	WHERE b.nis='$nis' AND a.id_level='$level'
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
    <td><?php echo $dt_siswa['materi']; ?></td>
    <td align="center">
    <?php echo $dt_siswa['jumlah_nilai']; ?></td>
    <td align="center"><?php echo $dt_siswa['grade']; ?>
   </td>
    <td><span style="word-wrap:break-word; position:static; font-size:small"><?php echo substr($dt_siswa['catatan'],0,110); ?></span></td>
  </tr>
  <?php $no++; } ?>
  <tr>
  <td height="41" colspan="2">TOTAL</td>
    <td width="116" align="center"><strong><?php echo $t_nilai; ?></strong></td>
    <td width="59">&nbsp;</td>
    <td width="251">&nbsp;</td>
    </tr>
</table>


   



  <!-- print to PDF --> 
   <?php
    $content = ob_get_clean();
    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.php');
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