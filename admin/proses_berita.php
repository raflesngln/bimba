<?php session_start();
error_reporting(0);
include"../koneksi/koneksi.php";
include"../fungsi/resize_foto.php";
$dir="../gambar/";
$nama=time().".jpg";
$ukuran=500;
$file="foto";
$tgl=date('Y/m/d');
if(isset($_GET['page'])){
	$menu=$_GET['page'];
	
	if($menu=="simpan"){
		$berita=addslashes($_POST['berita']);
		$simpan=mysql_query("insert into berita values('','$_POST[judul]','$berita','$nama','$tgl','$_SESSION[id_admin]')");
		if($simpan){
			ResizeFoto($nama,$file,$dir,$ukuran);
			echo"
			<script>
				alert('data berhasil di simpan');
				document.location='http://localhost/bimba/admin/?page=berita';
			</script>
			";
		}else{
			echo"
			<script>
				alert('data gagal di simpan');
				document.location='http://localhost/bimba/admin/?page=berita';
			</script>
			";
		}
	}
	
	if($menu=="hapus"){
	$hapus=mysql_query("delete from berita where id_berita='$_GET[id]'");	
	if($hapus){
			echo"
			<script>
				alert('data berhasil di hapus');
				document.location='http://localhost/bimba/admin/?page=berita';
			</script>
			";
		
	}else{
			echo"
			<script>
				alert('data gagal di hapus');
				document.location='http://localhost/bimba/admin/?page=berita';
			</script>
			";
		
	}
		
	}
	
	
	if($menu=="edit"){
		if(!empty($_FILES['foto']['name'])){
			$berita=addslashes($_POST['berita']);
			$edit1=mysql_query("update berita set judul_berita='$_POST[judul]',isi_berita='$berita',
				gambar='$nama',tgl_input='$tgl',id_admin='$_SESSION[id_admin]' where id_berita='$_GET[id]'");
			if($edit1){
			ResizeFoto($nama,$file,$dir,$ukuran);
			echo"
			<script>
				alert('data berhasil di update');
				document.location='http://localhost/bimba/admin/?page=berita';
			</script>
			";
		}else{
			echo"
			<script>
				alert('data gagal di update');
				document.location='http://localhost/bimba/admin/?page=berita';
			</script>
			";
		}
		}else{
			$berita=addslashes($_POST['berita']);
			$edit1=mysql_query("update berita set judul_berita='$_POST[judul]',isi_berita='$berita',tgl_input='$tgl',
				id_admin='$_SESSION[id_admin]' where id_berita='$_GET[id]'");
			if($edit1){
			echo"
			<script>
				alert('data berhasil di update');
				document.location='http://localhost/bimba/admin/?page=berita';
			</script>
			";
		}else{
			echo"
			<script>
				alert('data gagal di update');
				document.location='http://localhost/bimba/admin/?page=berita';
			</script>
			";
		}
			
		}
		
		
	}
	
	
}
?>