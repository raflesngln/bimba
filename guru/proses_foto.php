<?php session_start();
include"../koneksi/koneksi.php";
$nip=$_SESSION['nip-guru'];
$foto=$_FILES['foto']['name'];
$dir="../gambar/guru/";
$str=mysql_query("update guru set foto='$foto' where nip='$nip'");
if($str){
	move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$foto);
	unset($_SESSION['foto_guru']);
	$_SESSION['foto_guru']=$foto;
	echo"
	<script>
	alert('Berhasil ganti foto');
	document.location='http://localhost/bimba/guru/';
	</script>
	";
}
	


?>