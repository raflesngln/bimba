<?php
include"../koneksi/koneksi.php";
error_reporting(0);
$nis=$_POST['nis'];
$st=$_POST['status'];

$update=mysql_query("update siswa set status='$st' where nis='$nis'");
echo"ok";
?>