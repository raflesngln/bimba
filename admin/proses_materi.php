<?php session_start();
include"../koneksi/koneksi.php";
$tgl=date('Y/m/d');
if(isset($_GET['page'])){
	$menu=$_GET['page'];
	
	
	//buat simpan data admin
	if($menu=="simpan"){
		$str=mysql_query("SELECT * FROM materi");
		$jml=mysql_num_rows($str);
		$hasil=$jml+1;
		$no=date('ymd').$hasil.rand(0,9);
		$ida=$_SESSION['id_admin'];
		$simpan=mysql_query("insert into materi values('$no','$tgl','$_POST[materi]','$ida','$_POST[level]')");
		if($simpan){
			echo"
			<script>
			alert('data berhasil di simpan');
			document.location='http://localhost/bimba/admin/?page=materi';
			</script>
			";	
		}else{
			echo"
			<script>
			alert('data gagal di simpan');
			document.location='http://localhost/bimba/admin/?page=materi';
			</script>
			";	
		}
	}
		
		//buat data haspu admin
		
		if($menu=="hapus"){
			$hapus=mysql_query("delete from materi where id_materi='$_GET[id]'");
			if($hapus){
				echo"
				<script>
				alert('data berhasil di hapus');
				document.location='http://localhost/bimba/admin/?page=materi';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di hapus');
				document.location='http://localhost/bimba/admin/?page=materi';
				</script>
				";	
			}
			
		}
		
		
		//untu proses edit admin
		
		if($menu=="edit"){
				$edit=mysql_query("update materi set id_level='$_POST[level]',materi='$_POST[materi]' 
								where id_materi='$_GET[id]'");
			if($edit){
				echo"
				<script>
				alert('data berhasil di update');
				document.location='http://localhost/bimba/admin/?page=materi';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di update');
				document.location='http://localhost/bimba/admin/?page=materi';
				</script>
				";	
			}		
		}
}
?>