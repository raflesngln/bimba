<table width="872" align="center" border="1" style="box-shadow:0px 0px 10px black" cellspacing="4" cellpadding="4">
<tr>
    <td colspan="8" align="center" ><h2>DATA PEMBAYARAN SISWA</h2></td>
  </tr>
  <tr>
    <td colspan="8"><p><a href="?page=form pembayaran">INPUT DATA PEMBAYARAN (kurang laporan cetak periode )</a></p></td>
  </tr>
 
  <tr bgcolor="#CCCCCC">
    <th width="86">Nis</th>
    <th width="147">Nama</th>
    <th width="147">level</th>
    <th width="102">Tagihan</th>
    <th width="250">Nominal Pembayaran</th>
    <th width="183">Status Pembayar</th>
    <th width="183">Tanggal Bayar</th>
    <th width="183">Jatuh Tempo</th>
    

  </tr>
   
  <?php
  $str=mysql_query("select *,DATE_ADD(date(tgl_bayar),INTERVAL 6 MONTH) as jatuh,siswa.nm_siswa as nama from pembayaran
  					inner join siswa on pembayaran.nis=siswa.nis
					inner join level on pembayaran.id_level=level.id_level
					");
while($dt_pembayaran=mysql_fetch_array($str)){
  ?>
  <tr>
    <td><?php echo $dt_pembayaran['nis'];  ?></td>
    <td><?php echo $dt_pembayaran['nama'];  ?></td>
    <td><?php echo $dt_pembayaran['level'];  ?></td>
    <td>Rp. <?php echo number_format(600000);  ?></td>
    <td>Rp. <?php echo number_format($dt_pembayaran['bayar']);  ?></td>
    <?php
	if($dt_pembayaran['bayar']<600000){
		$status="Pembayaran Kurang";
	}else if($dt_pembayaran['bayar']==600000){
		$status="LUNAS";	
	}
	?>
    <td><?php echo $status; ?></td>
    <td> <?php echo $dt_pembayaran[1];  ?></td>
	<td> <?php echo $dt_pembayaran['jatuh'];  ?></td>

  </tr>
  
  <?php } ?>
</table>
