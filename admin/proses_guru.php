<?php session_start();
include"../koneksi/koneksi.php";
$tanggal=date('Y/m/d');
if(isset($_GET['page'])){
	$menu=$_GET['page'];
	
	
	//buat simpan data admin
	if($menu=="simpan"){
		$id_admin=$_SESSION['id_admin'];
		$query=mysql_query("select * from guru");
		$jumlah=mysql_num_rows($query);
		$hasil=$jumlah+1;
		$no='984'.date("ymd").$hasil;
		$dir="../gambar/guru/"; // menentukan lokasi folder untuk menyimpan gambar
		$gambar=$_FILES['foto']['name']; //mengambil nama gambar
		$tgl_lahir=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
		$simpan=mysql_query("insert into guru
						 values('$no','$_POST[nama_guru]','$_POST[alamat_guru]','$_POST[tmptlahir_guru]',
						'$tgl_lahir','$gambar','$_POST[email_guru]',
						'$_POST[hp]','$tanggal','$id_admin','$_POST[password]')");
		if($simpan){
			move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$gambar); // mengkopi foto dan memindahkan foto ke folder yang di tentukan
			echo"
			<script>
			alert('data berhasil di simpan');
			document.location='http://localhost/bimba/admin/?page=guru';
			</script>
			";	
		}else{
			echo"
			<script>
			alert('data gagal di simpan');
			document.location='http://localhost/bimba/admin/?page=guru';
			</script>
			";	
		}
	}
		
		//buat data haspu admin
		
		if($menu=="hapus"){
			$hapus=mysql_query("delete from guru where nip='$_GET[nip]'");
			if($hapus){
				echo"
				<script>
				alert('data berhasil di hapus');
				document.location='http://localhost/bimba/admin/?page=guru';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di hapus');
				document.location='http://localhost/bimba/admin/?page=guru';
				</script>
				";	
			}
			
		}
		
		
		//untu proses edit admin
		
		if($menu=="edit"){
			$tgl_lahir=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
				$edit=mysql_query("update guru set nm_guru='$_POST[nama_guru]',
				alamat_guru='$_POST[alamat_guru]',tmptlahir_guru='$_POST[tmptlahir_guru]',
				tgllahir_guru='$tgl_lahir',email_guru='$_POST[email_guru]',
				tlp_guru='$_POST[tlp_guru]' where nip='$_GET[nip]'");
			if($edit){
				echo"
				<script>
				alert('data berhasil di update');
				document.location='http://localhost/bimba/admin/?page=guru';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di update');
				document.location='http://localhost/bimba/admin/?page=guru';
				</script>
				";	
			}			
		}
	
}else{
	
}
?>