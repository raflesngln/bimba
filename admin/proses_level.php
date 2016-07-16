<?php session_start();
error_reporting(0);
include"../koneksi/koneksi.php";
$tanggal=date('Y/m/d H:i:s');
	$id_admin=$_SESSION['id_admin'];
if(isset($_GET['page'])){
	$menu=$_GET['page'];
	
	
	//buat simpan data admin
	if($menu=="simpan"){
	
		$simpan=mysql_query("insert into level
		values('','$tanggal','$_POST[level]','$id_admin')");
		if($simpan){
			echo"
			<script>
			alert('data berhasil di simpan');
			document.location='http://localhost/bimba/admin/?page=level';
			</script>
			";	
		}else{
			echo"
			<script>
			alert('data gagal di simpan');
			document.location='http://localhost/bimba/admin/?page=level';
			</script>
			";	
		}
	}
		
		//buat data haspu admin
		
		if($menu=="hapus"){
			$hapus=mysql_query("delete from level where id_level='$_GET[id_level]'");
			if($hapus){
				echo"
				<script>
				alert('data berhasil di hapus');
				document.location='http://localhost/bimba/admin/?page=level';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di hapus');
				document.location='http://localhost/bimba/admin/?page=level';
				</script>
				";	
			}
			
		}
		
		
		//untu proses edit admin
		
		if($menu=="edit"){
				$edit=mysql_query("update level set level='$_POST[level]',id_admin='$id_admin'
								where id_level='$_GET[id_level]'");
			if($edit){
				echo"
				<script>
				alert('data berhasil di edit');
				document.location='http://localhost/bimba/admin/?page=level';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di edit');
				document.location='http://localhost/bimba/admin/?page=level';
				</script>
				";	
			}		
			}else{
			$edit=mysql_query("update level set level='$_POST[level]' 
								where id_level='$_GET[id_level]'");
					if($edit){
				echo"
				<script>
				alert('data berhasil di edit');
				document.location='http://localhost/bimba/admin/?page=level';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di edit');
				document.location='http://localhost/bimba/admin/?page=level';
				</script>
				";	
			}					
			}
		
	
}else{
	
}
?>