<?php session_start();
include"../koneksi/koneksi.php";
$update=mysql_query("update guru set pass_guru='$_POST[pass_baru]' where nip='$_GET[nip]'");
if($update){
	unset($_SESSION['nip-guru']);
	unset($_SESSION['nama-guru']);
	unset($_SESSION['foto_guru']);
  echo"
  <script>
  	alert('berhasil Mengganti Password');
	document.location='http://localhost/bimba/guru/';
  </script>
  ";
}else{
	 echo"
  <script>
  	alert('Gagal Mengganti Password');
	document.location='http://localhost/bimba/guru/?page=password';
  </script>
  ";
}


?>