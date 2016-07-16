<?php session_start();
include"../koneksi/koneksi.php";
if(!isset($_SESSION['nis-siswa'])){
	$masuk=mysql_query("select * from siswa where nis='$_POST[nis]' and tgllahir_siswa='$_POST[pas]'");
	$dt_siswa=mysql_fetch_array($masuk);
	$hitung=mysql_num_rows($masuk);
	if($hitung>0){
		$_SESSION['nis-siswa']=$dt_siswa[0];
		$_SESSION['nama-siswa']=$dt_siswa['nm_siswa'];
		$_SESSION['foto_siswa']=$dt_siswa['foto'];
		$_SESSION['level_siswa']=$dt_siswa['id_level'];
		echo"
		<script>
			alert('Selamat Datang Di Ruang Siswa');	document.location='http://localhost/bimba/siswa/?page=home';
		</script>
		";
	}else{
		echo"
		<script>
			alert('Maaf, Anda Tidak Memiliki Hak Akses...   Nis dan Password Salah');
			document.location='http://localhost/bimba/siswa/?verifikasi gagal';
		</script>
		";	
	}
}else{
	unset($_SESSION['nis-siswa']);
	unset($_SESSION['nama-siswa']);
	unset($_SESSION['foto-siswa']);
	unset($_SESSION['level_siswa']);
	echo"
		<script>
			document.location='http://localhost/bimba/siswa/?verifikasi gagal';
		</script>
		";
}



?>