<form method="post" action="proses_admin.php?page=simpan">
<body>
<table width="249" align="center" cellpadding="4" cellspacing="4" border="0">
	<tr>
    <td colspan="2" align="center"><h2>INPUT DATA ADMIN BARU</h2></td>
    </tr>
  <tr>
    <td width="60">Nama</td>
    <td width="161"><input type="text" name="nama" required /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="email" name="email" required /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" required /></td>
  </tr>
  <tr>
    <td>No.hp</td>
    <td><input type="number" min="0" name="hp" required /></td>
  </tr>
  <tr>
    <td height="55" colspan="2" align="center"><input type="submit" value="SIMPAN" >
    <input type="reset" value="BATAL" onClick="location=('index.php?page=admin')" ></td>
  </tr>
  <tr>
	<td height="263" colspan="7">&nbsp;</td>
 </tr>

</table>
</body>
</form>