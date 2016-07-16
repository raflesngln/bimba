<?php
include"../koneksi/koneksi.php";
$nis=$_GET['nis'];
$query=mysql_query("select * from siswa where nis='$nis'");
$data_siswa=mysql_fetch_array($query);
$query1=mysql_query("select * from level where id_level='$data_siswa[id_level]'");
$data_level=mysql_fetch_array($query1);
?>
<ul style="list-style:none; padding-left:0px">
<pre>
<li>Nama           : <?php echo $data_siswa['nm_siswa']; ?></li>
<li>Jenis Kelamin  : <?php echo $data_siswa['jns_kel']; ?></li>
<li>Nama Ayah      :<?php echo $data_siswa['nm_ayah']; ?></li>
<li>Nama Ibu       :<?php echo $data_siswa['nm_ibu']; ?></li>
<li>Level          :<?php echo $data_level['level']; ?></li>
</pre>
</ul>