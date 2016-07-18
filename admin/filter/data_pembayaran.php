<table width="1151" cellpadding="2" align="center" cellspacing="3" border="0">
<tr bgcolor="#CCCCCC">
    <th width="117" height="40">Nis</th>
    <th width="284">Nama</th>
    <th width="169">Tgl Bayar</th>
    <th width="214">level</th>
    <th width="159">Nominal </th>
    <th width="163">Status Pembayar</th>
    </tr>
  <?php
   include"../../koneksi/koneksi.php";
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];
  $status=$_POST['status'];
  if($status=='semua'){
	  $where="WHERE pembayaran.tgl_bayar BETWEEN '$tgl1' AND '$tgl2'";
  } else {
	  $where="WHERE pembayaran.tgl_bayar BETWEEN '$tgl1' AND '$tgl2' AND pembayaran.status_bayar='$status'";
  }
  
if(isset($_GET['hal'])){
$hal=$_GET['hal'];	
}else{
$hal=1;	
}
$max=25;
$dari=($hal*$max)-$max;
 
 $str=mysql_query("select *,DATE_ADD(date(tgl_bayar),INTERVAL 6 MONTH) as jatuh,siswa.nm_siswa as nama from pembayaran
  					inner join siswa on pembayaran.nis=siswa.nis
					inner join level on pembayaran.id_level=level.id_level 
					$where 
					limit $dari,$max");
  
while($dt_pembayaran=mysql_fetch_array($str)){
	$status_bayar=$dt_pembayaran['status_bayar'];
	if($status_bayar=='LUNAS'){
	$status='<i class="fa fa-check green"></i> LUNAS';	
	} else{
	$status='<i class="fa fa-times red"></i> BELUM LUNAS';	
	}
?>
  <tr>
    <td><?php echo $dt_pembayaran['nis'];  ?></td>
    <td><?php echo $dt_pembayaran['nm_siswa'];  ?></td>
    <td><?php echo date('d-m-Y',strtotime($dt_pembayaran[1]));  ?></td>
    <td><?php echo $dt_pembayaran['level'];  ?></td>
    <td><div align="right">Rp. <?php echo number_format($dt_pembayaran['bayar']);  ?></div></td>

    <td><?php echo $status; ?></td>
    </tr>
  
<?php
}

?>
<tr>
<td height="50" align="center" colspan="25">
<?php
$str2=mysql_query("select * from siswa");
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
