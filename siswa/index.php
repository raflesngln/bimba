<?php session_start(); include"../koneksi/koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Siswa || bIMBA AIUEO</title>
<link rel="shortcut icon" href="../logo/favicon.png" />
<link rel="stylesheet" href="../asset/style-siswa.css" />
</head>

<body background="../logo/backkuning.jpg">
<center>
 <div id="bodi">
 	<div id="logo"><H3><center><img src="../logo/logo2.jpg"" width="1150" height="70"/></center></H3></div>
 	<div id="sidebar">
    <?php
		if(!isset($_SESSION['nis-siswa'])){
			include"menu-login-siswa.php";	
		}else{
			include"menu_siswa.php";
		}
	?>
    </div>
    <div id="konten">
    <?php
    if(isset($_SESSION['nis-siswa'])){
    	if(isset($_GET['page'])){
			$menu=$_GET['page'];
	
			switch($menu){
	
				case"home":include"home.php";
				break;	
				case"jadwal":include"jadwal.php";
				break;
				case"pembayaran":include"pembayaran.php";
				break;
				case"nilai":include"nilai.php";
				break;
				default: include"home.php";
				break;	
			}
		}
	}else{
			
		include"beranda-login.php";
	}
	?>
    
    
    </div>
 	<div style="clear:both"></div>
    <div id="footer">&copy;Copyright by Hana<br />Thn. 2016</div>
 </div>
</center>
</body>
</html>