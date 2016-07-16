 <?php session_start();
include"../koneksi/koneksi.php";
if(!isset($_SESSION['id_admin'])){
	$pas=md5($_POST['pas']);
	$masuk=mysql_query("select * from admin where nm_admin='$_POST[nama]' and password='$pas'");
	$data_admin=mysql_fetch_array($masuk);
	$jml=mysql_num_rows($masuk);
	if($jml>0){
		$_SESSION['id_admin']=$data_admin[0];
		$_SESSION['nama_admin']=$data_admin['nm_admin'];
		$nama=$_POST['nama'];
			echo"<script>
			alert('Selamat datang $nama');
			document.location='http://localhost/bimba/admin/?page=beranda';	
			</script>";	
	}else{
		echo"<script>
		alert('username dan password tidak cocok');
		document.location='http://localhost/bimba/admin/login.php';	
		</script>";	
		
	}
	
}else{
	
	unset($_SESSION['id_admin']);
	unset($_SESSION['nama_admin']);
	echo"<script>
		document.location='http://localhost/bimba/admin/login.php';	
		</script>";	
}

?>