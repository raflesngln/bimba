<?php session_start();
include"../koneksi/koneksi.php";
$tgl=date('Y/m/d');
if($_POST['nom']<600000){
	?>
		<script>
		alert('Pembayaran Kurang gagal menyimpan');
		document.location='http://localhost/bimba/admin/?page=pembayaran';
		</script>
		<?php
}else if($_POST['nom']>600000){
		?>
		<script>
		alert('Pembayaran Lebih tidak bisa menyimpan');
		document.location='http://localhost/bimba/admin/?page=pembayaran';
		</script>
<?php
}else{
$str=mysql_query("select * from siswa where nis='$_POST[nis]'");
$dt_siswa=mysql_fetch_array($str);

$simpan=mysql_query("insert into pembayaran values('','$tgl','$_POST[nis]','$_POST[nom]','$dt_siswa[id_level]','$_SESSION[id_admin]','$_POST[status]')");
if($simpan){
?>
<script>
alert('Data pembayaran berhasil di simpan');
document.location='http://localhost/bimba/admin/?page=pembayaran';
</script>
<?php }else{ ?>
<script>
alert('Data pembayaran gagal di simpan');
document.location='http://localhost/bimba/admin/?page=pembayaran';
</script>
<?php } 

} ?>