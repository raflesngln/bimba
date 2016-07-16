<script language="javascript">
function bersih(){
	$("#nama").val("");
	$("#email").val("");
	$("#pas").val("");
	$("#hp").val("");
}
</script>
<?php
$query=mysql_query("select * from admin where id_admin='$_GET[id_admin]'");
$dt_admin=mysql_fetch_array($query);
?>
<form method="post" action="proses_admin.php?page=edit&id=<?php echo $dt_admin[0]; ?>">
<table width="200" align="center" cellpadding="4" cellspacing="4" border="0">
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama" id="nama" value="<?php echo $dt_admin['nm_admin']; ?>" required /></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="email" name="email" id="email" value="<?php echo $dt_admin['email_admin']; ?>" required /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" id="pas" name="password" value="" /></td>
  </tr>
  <tr>
    <td>No.hp</td>
    <td><input type="number" min="0" id="hp" name="hp" value="<?php echo $dt_admin['no_tlp']; ?>" required /></td>
  </tr>
  <tr>
    <td><input type="submit" value="UPDATE" ></td>
   <td>  <input type="reset" value="BATAL" onClick="location=('index.php?page=admin')" ></td>
  </tr>
</table>
</form>