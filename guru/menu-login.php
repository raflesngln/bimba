
<?php
if(isset($_SESSION['nip'])){
header("location:index.php?page=beranda");	
}
?>
<br>
<br>
<br>
<form method="post" action="proses-login-guru.php">
<table width="95%" bgcolor="#FFFFFF" cellspacing="4" align="center" >
  <tr bgcolor="#00BFFF">
    <td height="44" colspan="2" align="center">Login Guru</td>
    </tr>
  <tr>
    <td colspan="2">NIP.</td>
    </tr>
  <tr>
    <td colspan="2"><input type="text" name="nip" required /></td>
    </tr>
  <tr>
    <td colspan="2">Password</td>
    </tr>
  <tr>
    <td colspan="2"><input type="password" min="0" name="pas" required /></td>
    </tr>
  <tr>
    <td width="114" colspan="2" align="center"><input type="submit" value="MASUK" /></td>
  </tr>
</table>

</form>