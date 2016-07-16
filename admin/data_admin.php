
<table width="700" cellpadding="3" align="center" cellspacing="3" border="1">
<tr>
    <td colspan="8" align="center" bgcolor="#CCCCCC"><h2>DATA ADMIN BIMBA AIUEO SUKASARI</h2></td>
  </tr>
  <tr>
  	<td colspan="7"><a href="?page=tambah admin">Tambah admin</a></td>
  </tr>
  <tr bgcolor="#00BFFF">
    <th><div align="center"><h5>Id Admin</h5></div></th>
    <th><div align="center">Nama</div></th>
    <th><div align="center">Email</div></th>
    <th><div align="center">Password</div></th>
   <th><div align="center">No Hp</div></th>
   <th colspan="2"><div align="center">Pilihan</div></th>
  </tr>
  <?php
$str=mysql_query("select * from admin");
while($dt_admin=mysql_fetch_array($str)){
?>
  <tr>
    <td><div align="center"><?php echo $dt_admin[0]; ?></div></td>
    <td><div align="center"><?php echo $dt_admin[1]; ?></div></td>
    <td><div align="center"><?php echo $dt_admin[2]; ?></div></td>
    <td><div align="center"><?php echo $dt_admin[3]; ?></div></td>
    <td><div align="center"><?php echo $dt_admin[4]; ?></div></td>
    
     <td><div align="center"><a href="?page=edit admin&id_admin=<?php echo $dt_admin[0]; ?>">Edit</a></div></td>
    <td><div align="center"><a href="proses_admin.php?page=hapus&id=<?php echo $dt_admin[0]; ?>">Hapus</a></div></td>
   
  </tr>
  
<?php
}

?>
<tr>
<td height="119" colspan="7">&nbsp;</td>
</tr>
</table>
