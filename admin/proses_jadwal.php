<?php session_start();
include"../koneksi/koneksi.php";
if(isset($_GET['page'])){
	$menu=$_GET['page'];
	
	if($menu=="simpan"){
	$jam=$_POST['jam1']."-".$_POST['jam2'];
	$str=mysql_query("select * from siswa where nis='$_POST[nis]'");
	$dt_siswa=mysql_fetch_array($str);
	$simpan=mysql_query("insert into jadwal values('','$_POST[nip]','$_POST[nis]','$_POST[hari]','$jam',
						'$_SESSION[id_admin]','$dt_siswa[id_level]','$_POST[materi]')");
		if($simpan){
			echo"
			<script>
			alert('berhasil menyimpan jadwal');
			document.location='http://localhost/bimba/admin/?page=jadwal';
			</script>
			";
		}else{
			echo"
			<script>
			alert('gagal menyimpan jadwal');
			document.location='http://localhost/bimba/admin/?page=jadwal';
			</script>
			";
		}
		
	}
	
	if($menu=="hapus"){
	$hapus=mysql_query("delete from jadwal where id_jadwal='$_GET[id]'");	
		if($hapus){
			echo"
			<script>
			alert('berhasil menghapus jadwal');
			document.location='http://localhost/bimba/admin/?page=jadwal';
			</script>
			";
		}else{
			echo"
			<script>
			alert('gagal menghapus jadwal');
			document.location='http://localhost/bimba/admin/?page=jadwal';
			</script>
			";
		}
		
		
	}
	
	
	if($menu=="edit"){
		$jam=$_POST['jam1']."-".$_POST['jam2'];
	$update=mysql_query("update jadwal set hari='$_POST[hari]',jam='$jam'
				where id_jadwal='$_GET[id]'");	
		if($update){
			echo"
			<script>
			alert('berhasil update jadwal');
			document.location='http://localhost/bimba/admin/?page=jadwal';
			</script>
			";
		}else{
			echo"
			<script>
			alert('gagal update jadwal');
			document.location='http://localhost/bimba/admin/?page=jadwal';
			</script>
			";
		}
		
	}
		
	
}else{
	
}




?>