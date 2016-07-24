<table width="897" border="1" cellspacing="4" cellpadding="4" align="center">
  <tr>
    <td width="43">Nis</td>
    <td width="75">Nama</td>
      <td width="72">Level</td>
    <td width="100">Tagihan</td>
    <td width="84">Nominal Pembayaran</td>
    <td width="103">Status Pembayar</td>
    <td width="96">Tanggal Bayar</td>
    <td width="96">Jatuh Tempo</td>
    <td width="96">cetak</td>
    
   
  </tr>
  <?php
  $nis=$_SESSION['nis-siswa'];
  $str=mysql_query("select  *,DATE_ADD(date(tgl_bayar),INTERVAL 6 MONTH) as jatuh from pembayaran
  					where nis='$nis'
					");
while($dt_pembayaran=mysql_fetch_array($str)){
  ?>
  <tr>
    <td><?php echo $nis;  ?></td>
    <td><?php echo $_SESSION['nama-siswa'];  ?></td>
     <td><?php echo $dt_pembayaran['id_level'];  ?></td>
    <td width="100">Rp. <?php echo number_format(600000);  ?></td>
    <td>Rp. <?php echo number_format($dt_pembayaran['bayar']);  ?></td>
    <?php
	if($dt_pembayaran['bayar']<600000){
		$status="Pembayaran Kurang";
	}else if($dt_pembayaran['bayar']==600000){
		$status="LUNAS";	
	}
	?>
    <td><?php echo $dt_pembayaran['status_bayar'];  ?></td>
    <td> <?php echo $dt_pembayaran[1];  ?></td>
    <td><?php echo $dt_pembayaran['jatuh'];  ?></td>
	<td>cetak</td>


  </tr>
  <?php } ?>
   <tr>
  <td colspan="9" align="center"><a target="_blank" href="cetak_bayar.php?nis=<?php echo $nis;   ?>">cetak bayar</a></td>
  </tr>
</table>
