<option value="">Pilih Materi</option>
<?php
include"../koneksi/koneksi.php";
$id=$_GET['id'];
$str=mysql_query("select * from siswa where nis='$id'");
$dt_siswa=mysql_fetch_array($str);
$str=mysql_query("select * from materi where id_level='$dt_siswa[id_level]'");
while($dt_mat=mysql_fetch_array($str)){
echo"<option value='$dt_mat[0]'>$dt_mat[materi]</option>";
}
?>