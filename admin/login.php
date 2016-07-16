<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MENU LOGIN</title>
<link rel="shortcut icon" href="../logo/favicon.png" />
</head>
<style>
#frm{
	background:#CCC;
	padding:10px 10px;
	margin-top:300px;
}
#gmb{
	position:fixed;
	overflow:hidden;
	margin-left:5px;
	margin-top:-120px;
	z-index:999;
}
</style>

<body>
<?php
if(isset($_SESSION['id_admin'])){
header("location:index.php?page=beranda");	
}
?>
<div id="gmb"><img src="../logo/welcome.jpg" width="68%" height="200" /></div>
<center>
<form id="frm" method="post" action="proses-login-admin.php">
<table align="center" width="334" border="0">
  <tr>
    <td colspan="4">MENU LOGIN ADMIN</td>
    </tr>
  <tr>
    <td width="66">Username</td>
    <td colspan="3"><input type="text" name="nama" required="required" /></td>
    </tr>
  <tr>
    <td>Password</td>
    <td colspan="3"><input type="password" name="pas"  required="required"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="102"><input type="submit" name="masuk" value="MASUK" /></td>
    <td width="72"><input type="reset" name="bersih" value="BERSIH"  /></td>
    <td width="76">&nbsp;</td>
  </tr>
</table>

</form>
</center>
</body>
</html>