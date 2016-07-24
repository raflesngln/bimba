<?php session_start();
include"../koneksi/koneksi.php";
$tgl=date('Y/m/d');
$level=$_POST['level'];
$guru=$_POST['guru'];
$siswa=$_POST['siswa'];

$materi=$_POST['materi'];
$no="984".date('ymd').rand(99,999);

	foreach($materi as $key => $val){
   		$n_materi =$_POST['materi'][$key];
		$n_nilai=$_POST['nilai'][$key];
		$n_grade =$_POST['grade'][$key];
		$n_ket =$_POST['ket'][$key];
		
		if($n_nilai > 0 && $n_nilai <=59){
			$grade='C';
		} else if($n_nilai >59 && $n_nilai <=79){
			$grade='B';
		} else if($n_nilai >79 && $n_nilai <=100){
			$grade='A';
		}
		
		$cari=mysql_query("select * from nilai where id_materi='$n_materi' AND nis='$siswa'");
		$jum_data=mysql_num_rows($cari);
		
		if($jum_data >=1){
			// jika ada materi dan nis sama dgn yg diinput hapus semua nis dan materi yg sma dgn inputan dari nilai lalu insert baru
			$hapus=mysql_query("delete from nilai where id_materi='$n_materi' AND id_level='$level' AND nis='$siswa'");
			$simpan=mysql_query("insert into nilai values('','$tgl','$guru','$siswa','$level',
											'$n_materi','$n_nilai','$grade','$n_ket')");
					echo"
					<script>
					alert('berhasil Update nilai');
					document.location='http://localhost/bimba/guru/?page=nilai';
					</script>
					";
			
		} else {
			//jika ga ada ktemu di nilai insert baru
			$simpan=mysql_query("insert into nilai values('','$tgl','$guru','$siswa','$level',
											'$n_materi','$n_nilai','$grade','$n_ket')");	
							echo"
			<script>
			alert('Data menyimpan nilai');
			document.location='http://localhost/bimba/guru/?page=nilai';
			</script>
			";
		
		}
		

	}


?>