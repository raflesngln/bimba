
<table width="700" cellpadding="3" align="center" cellspacing="3" border="1">
<tr>
    <td colspan="7" align="center" bgcolor="#CCCCCC"><h2>DATA LEVEL BIMBA AIUEO SUKASARI</h2></td>
  </tr>
  <tr>
  	<td height="35" colspan="7"><a href="?page=tambah level">Tambah Level</a></td>
  </tr>
  <tr bgcolor="#00BFFF">
    <td width="99"><div align="center">id level</div></td>
    <td width="183"><div align="center">Tanggal Input</div></td>
    <td width="79"><div align="center">Level</div></td>
    <td width="126"><div align="center">id Admin</div></td>
    <td colspan="3"><div align="center">pilihan</div></td>
  </tr>
  <?php
$str=mysql_query("select * from level");
while($dt_level=mysql_fetch_array($str)){
?>
  <tr>
    <td><div align="center"><?php echo $dt_level[0]; ?></div></td>
    <td><div align="center"><?php echo $dt_level[1]; ?></div></td>
    <td><div align="center"><?php echo $dt_level[2]; ?></div></td>
    <td><div align="center"><?php echo $dt_level[3]; ?></div></td>
  
   <td width="86"><div align="center"><a href="?page=edit level&id_level=<?php echo $dt_level[0]; ?>">Edit</a></div></td>
   <td width="70">detail materi</td>
    <td width="70"><div align="center"><a href="proses_level.php?page=hapus&id_level=<?php echo $dt_level[0]; ?>">Hapus</a></div></td>
   
  </tr>
  
<?php
}

?>
<tr>
<td height="27" colspan="8">&nbsp;</td>
</tr>
</table>
