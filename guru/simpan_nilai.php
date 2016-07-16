<?php session_start();
include"../koneksi/koneksi.php";
$tgl=date('Y/m/d');
$baca=$_POST['baca'];
$tulis=$_POST['tulis'];
$hitung=$_POST['hitung'];
$hasil=($baca+$tulis+$hitung)/3;
$nip=$_SESSION['nip-guru'];


if($hasil>85){
	$gread="A";	
}else if($hasil>75){
	$gread="B";
}else if($hasil>65){
	$gread="C";	
}else if($hasil>55){
	$gread="D";	
}else{
	$gread="E";	
}

$str=mysql_query("select * from siswa where nis='$_POST[nis]'");
$dt_siswa=mysql_fetch_array($str);
$no="984".date('ymd').rand(99,999);
$simpan=mysql_query("insert into nilai values('$no','$tgl','$nip','$_POST[nis]','$dt_siswa[id_level]',
											'$baca','$tulis','$hitung','$hasil','$gread','$_POST[catatan]')");
if($simpan){
	echo"
	<script>
	alert('berhasil menyimpan nilai');
	document.location='http://localhost/bimba/guru/?page=nilai';
	</script>
	";
	
}else{
		echo"
	<script>
	alert('gagal menyimpan nilai');
	document.location='http://localhost/bimba/guru/?page=nilai';
	</script>
	";
	
}

?>