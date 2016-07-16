<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MENU ADMINSITRATOR</title>
<link rel="shortcut icon" href="../logo/favicon.png" />
<script language="javascript" src="../asset/jquery/jquery.js"></script>
<link rel="stylesheet" href="../asset/style-admin.css" />
<script language="javascript" src="../asset/tinymce/tinymce.min.js"></script>


<link href="../asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
<?php
if(!isset($_SESSION['id_admin'])){
header("location:login.php");	
}
include"../koneksi/koneksi.php";
?>
<center>
	<div id="bodi">
    	<div id="header"><center><img src="../logo/logo2.jpg"" width="1470" height="140"/></center>
        </div>
    	<div id="menu">
        <ul class="nav">
        	<li><a href="?page=beranda">BERANDA</a></li>
        	<li><a href="?page=admin">ADMIN</a></li>
            <li><a href="?page=berita">BERITA</a></li>
            <li><a href="?page=guru">GURU</a></li>
            <li><a href="?page=siswa">SISWA</a></li>
            <li><a href="?page=level">LEVEL</a></li>
            <li><a href="?page=materi">MATERI</a></li>
            <li><a href="?page=jadwal">JADWAL</a></li>
            <li><a href="?page=pembayaran">PEMBAYARAN</a></li>
            <li><a href="proses-login-admin.php">LOGOUT</a></li>
        </ul>
        </div>
         <div id="konten"><?php include"pemanggilan.php"; ?></div>
    <div id="footer">&copy;Copyright by Hana Eka Herita<br />Thn 2016</div>
    </div>
</center>
</body>
</html>