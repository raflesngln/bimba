
<style>
#mytable tr td{
	border-bottom:1px #CCC solid;
}
</style>

<table width="1181" style="box-shadow:0px 0px 10px black;" cellpadding="3" align="center" cellspacing="3" border="0" id="mytable">
<tr>
    <td colspan="13" align="center" bgcolor="#999999"><h2>DATA PENGAJAR BIMBA AIUEO SUKASARI</h2></td>
  </tr>
  <tr>
  	<td height="29" colspan="13"><a href="?page=tambah guru">Tambah Guru</a></td>
  </tr>
  <tr style="background:#E9E9E9">
    <td width="118" height="38"><div align="center">Foto</div></td>
    <td width="91"><div align="center">Nip</div></td>
    <td width="95"><div align="center">Nama</div></td>
    <td width="101"><div align="center">Alamat</div></td>
    <td width="94"><div align="center">Tempat Lahir</div></td>
    <td width="90"><div align="center">Tanggal Lahir</div></td>
    <td width="91"><div align="center">Email</div></td>
    <td width="103"><div align="center">Telepon Guru</div></td>
    <td width="104"><div align="center">Tanggal Masuk</div></td>
    <td width="72"><div align="center">Password</div></td>
    <td width="75"><div align="center">Id Admin</div></td>
    <td colspan="2"><div align="center">Pilihan</div></td>
  </tr>
  <?php
$str=mysql_query("select * from guru");
while($dt_guru=mysql_fetch_array($str)){
?>
  <tr >
    <td><div align="center"><img src="../gambar/guru/<?php echo $dt_guru['foto']; ?>" width="100" height="120" /></div></td>
    <td><div align="center"><?php echo $dt_guru[0]; ?></div></td>
    <td><div align="center"><?php echo $dt_guru[1]; ?></div></td>
    <td><div align="center"><?php echo $dt_guru[2]; ?></div></td>
    <td><div align="center"><?php echo $dt_guru[3]; ?></div></td>
    <td><div align="center"><?php echo $dt_guru[4]; ?></div></td>
    <td><div align="center"><?php echo $dt_guru[6]; ?></div></td>

    <td><div align="center"><?php echo $dt_guru[7]; ?></div></td>
    <td><div align="center"><?php echo $dt_guru[8]; ?></div></td>
    <td><div align="center"><?php echo $dt_guru[10]; ?></div></td>
    <td><div align="center"><?php echo $dt_guru[9]; ?></div></td>
    
     <td width="39"><div align="center"><a href="?page=edit guru&nip=<?php echo $dt_guru[0]; ?>">Edit</a></div></td>        
    <td width="39"><div align="center"><a href="proses_guru.php?page=hapus&nip=<?php echo $dt_guru[0]; ?>">Hapus</a></div></td>
   
  </tr>
  
<?php
}

?>
<tr>
<td height="27" colspan="15">&nbsp;</td>
</tr>
</table>
