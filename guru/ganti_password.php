<br>
<br>
<?php
$str=mysql_query("select * from guru where nip='".$_SESSION['nip-guru']."'");
$dt_guru=mysql_fetch_array($str);
?>
<form method="post" action="konfirmasi_pass.php?nip=<?php echo $dt_guru[0];  ?>">
<table width="346" align="center" style="box-shadow:0px 0px 10px black;" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="2"><div align="center">Form Ganti Password</div></td>
  </tr>
  <tr>
    <td width="119" height="34">Password Lama</td>
    <td width="227"><input type="text" value="<?php echo $dt_guru['pass_guru'];   ?>" disabled name="pas1" /></td>
  </tr>
  <tr>
    <td height="33">Password Baru</td>
    <td><input type="password" name="pass_baru" value="" required></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Konfirmasi" ></td>
  </tr>
</table>
</form>