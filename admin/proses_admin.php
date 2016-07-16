<?php
include"../koneksi/koneksi.php";
if(isset($_GET['page'])){
	$menu=$_GET['page'];
	
	
	//buat simpan data admin
	if($menu=="simpan"){
		$pas=md5($_POST['password']);
		$simpan=mysql_query("insert into admin values('','$_POST[nama]','$_POST[email]','$pas','$_POST[hp]')");
		if($simpan){
			echo"
			<script>
			alert('data berhasil di simpan');
			document.location='http://localhost/bimba/admin/?page=admin';
			</script>
			";	
		}else{
			echo"
			<script>
			alert('data gagal di simpan');
			document.location='http://localhost/bimba/admin/?page=admin';
			</script>
			";	
		}
	}
		
		//buat data hapus admin
		
		if($menu=="hapus"){
			$hapus=mysql_query("delete from admin where id_admin='$_GET[id]'");
			if($hapus){
				echo"
				<script>
				alert('data berhasil di hapus');
				document.location='http://localhost/bimba/admin/?page=admin';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di hapus');
				document.location='http://localhost/bimba/admin/?page=admin';
				</script>
				";	
			}
			
		}
		
		
		//untu proses edit admin
		
		if($menu=="edit"){
			$pas=$_POST['password'];
			if($pas==""){
				$edit=mysql_query("update admin set nm_admin='$_POST[nama]',email_admin='$_POST[email]',no_tlp='$_POST[hp]' 
								where id_admin='$_GET[id]'");
			if($edit){
				echo"
				<script>
				alert('data berhasil di update');
				document.location='http://localhost/bimba/admin/?page=admin';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di update');
				document.location='http://localhost/bimba/admin/?page=admin';
				</script>
				";	
			}		
			}else{
				$pass=md5($pas);
			$edit=mysql_query("update admin set nm_admin='$_POST[nama]',email_admin='$_POST[email]',password='$pass',no_tlp='$_POST[hp]' 
								where id_admin='$_GET[id]'");
					if($edit){
				echo"
				<script>
				alert('data berhasil di edit');
				document.location='http://localhost/bimba/admin/?page=admin';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di edit');
				document.location='http://localhost/bimba/admin/?page=admin';
				</script>
				";	
			}					
			}
		}
	
}else{
	
}
?>