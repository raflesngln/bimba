<?php session_start();
include"../koneksi/koneksi.php";
if(!isset($_SESSION['nip-guru'])){
	$masuk=mysql_query("select * from guru where nip='$_POST[nip]' and pass_guru='$_POST[pas]'");
	$dt_guru=mysql_fetch_array($masuk);
	$hitung=mysql_num_rows($masuk);
	if($hitung>0){
		$_SESSION['nip-guru']=$dt_guru[0];
		$_SESSION['nama-guru']=$dt_guru['nm_guru'];
		$_SESSION['foto_guru']=$dt_guru['foto'];
		echo"
		<script>
		alert('Selamat Datang di Ruang Guru Bimba Aiueo Sukasari');	document.location='http://localhost/bimba/guru/?page=home';
		</script>
		";
	}else{
		echo"
		<script>
			alert('NIP dan Password tidak cocok');
			document.location='http://localhost/bimba/guru/?verifikasi gagal';
		</script>
		";	
	}
}else{
	unset($_SESSION['nip-guru']);
	unset($_SESSION['nama-guru']);
	unset($_SESSION['foto_guru']);
	echo"
		<script>
			document.location='http://localhost/bimba/guru/?verifikasi gagal';
		</script>
		";
}



?>