<?php session_start();
include"../koneksi/koneksi.php";
$tanggal=date('Y/m/d');
$id_admin=$_SESSION['id_admin'];
if(isset($_GET['page'])){
	$menu=$_GET['page'];
	
	
	//buat simpan data admin
	if($menu=="simpan"){
		
		//$id_level=$_SESSION['id_level'];
		$query=mysql_query("select * from siswa");
		$jumlah=mysql_num_rows($query);
		$hasil=$jumlah+1;
		$no=date("ymd").$hasil;
		$dir="../gambar/siswa/"; // menentukan lokasi folder untuk menyimpan gambar
		$foto=$_FILES['foto']['name']; //mengambil nama gambar
		$tgl_lahir=$_POST['thn']."/".$_POST['bln']."/".$_POST['tgl'];
		$simpan=mysql_query("insert into siswa
						 values('$no','$_POST[nama_siswa]','$_POST[tmptlahir_siswa]','$tgl_lahir',
						 '$_POST[jns]','$_POST[agama]','$_POST[alamat]','$foto',
						'$_POST[nama_ayah]','$_POST[agama_ayah]','$_POST[kerja_ayah]','$_POST[hp_ayah]'
						,'$_POST[nama_ibu]','$_POST[agama_ibu]','$_POST[kerja_ibu]','$_POST[hp_ibu]',
						'$_POST[level]','$id_admin]','$_POST[status]')");
		if($simpan){
			move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$foto);
			echo"
			<script>
			alert('data berhasil di simpan');
			document.location='http://localhost/bimba/admin/?page=siswa';
			</script>
			";	
		}else{
			echo"
			<script>
			alert('data gagal di simpan');
			document.location='http://localhost/bimba/admin/?page=siswa';
			</script>
			";	
		}
	}
		
		//buat data haspu siswa
		
		if($menu=="hapus"){
			$hapus=mysql_query("delete from siswa where nis='$_GET[nis]'");
			if($hapus){
				echo"
				<script>
				alert('data berhasil di hapus');
				document.location='http://localhost/bimba/admin/?page=siswa';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di hapus');
				document.location='http://localhost/bimba/admin/?page=siswa';
				</script>
				";	
			}
			
		}
		
		
		//untu proses edit siswa
		
		if($menu=="edit"){
			$dir="../gambar/siswa/";
			$foto=$_FILES['foto']['name'];
			$tgl_lahir2=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
			if(empty($foto)){
				$edit=mysql_query("update siswa set nm_siswa='$_POST[nama_siswa]',
								tmptlahir_siswa='$_POST[tmptlahir_siswa]',tgllahir_siswa='$tgl_lahir2',jns_kel='$_POST[jns]',
								agama='$_POST[agama]',alamat='$_POST[alamat_siswa]',
								nm_ayah='$_POST[nama_ayah]',agama_ayah='$_POST[agama_ayah]'
								,krj_ayah='$_POST[kerja_ayah]',no_ayah='$_POST[hp_ayah]',
								nm_ibu='$_POST[nama_ibu]',agama_ibu='$_POST[agama_ibu]',
								krj_ibu='$_POST[kerja_ibu]',no_ibu='$_POST[hp_ibu]',
								id_level='$_POST[level]',id_admin='$id_admin',status='$_POST[status]'
								where nis='$_GET[nis]'");
			if($edit){
				echo"
				<script>
				alert('data berhasil di Update');
				document.location='http://localhost/bimba/admin/?page=siswa';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di Update');
				document.location='http://localhost/bimba/admin/?page=siswa';
				</script>
				";	
			}		
			}else{
							$edit=mysql_query("update siswa set nm_siswa='$_POST[nama_siswa]',
								'tmptlahir_siswa='$_POST[tmptlahir_siswa]',tgllahir_siswa='$tgl_lahir2',jns_kel='$_POST[jns]',
								agama='$_POST[agama]',alamat='$_POST[alamat_siswa]',foto='$foto',
								nm_ayah='$_POST[nama_ayah]',agama_ayah='$_POST[agama_ayah]'
								,krj_ayah='$_POST[kerja_ayah]',no_ayah='$_POST[hp_ayah]',
								nm_ibu='$_POST[nama_ibu]',agama_ibu='$_POST[agama_ibu]',
								krj_ibu='$_POST[kerja_ibu]',no_ibu='$_POST[hp_ibu]',
								id_level='$_POST[level]',id_admin='$id_admin',status='$_POST[status]'
								where nis='$_GET[nis]'");
					if($edit){
						move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$foto);
				echo"
				<script>
				alert('data berhasil di edit');
				document.location='http://localhost/bimba/admin/?page=siswa';
				</script>
				";	
			}else{
				echo"
				<script>
				alert('data gagal di edit');
				document.location='http://localhost/bimba/admin/?page=siswa';
				</script>
				";	
			}					
			}
		}
	
}else{
	
}
?>