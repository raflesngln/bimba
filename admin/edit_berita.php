<?php
$str=mysql_query("select * from berita where id_berita='$_GET[id]'");
$dt_berita=mysql_fetch_array($str);

?>
<form method="post" action="proses_berita.php?page=edit&id=<?php  echo $dt_berita[0];  ?>" enctype="multipart/form-data" >
<table width="542" align="center" style="box-shadow:0px 0px 10px black; border-radius:8px;" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="2"><div align="center">
      <h2>EDIT BERITA</h2></div></td>
    </tr>
  <tr>
    <td colspan="2">Judul Berita</td>
    </tr>
  <tr>
    <td colspan="2"><input type="text" name="judul" value="<?php echo $dt_berita['judul_berita'];  ?>" required="required" /></td>
        </tr>
   <tr>
    <td colspan="2"><img src="../gambar/<?php echo $dt_berita['gambar'];  ?>" width="120" height="130" /></td>
    </tr>
  <tr>
    <td colspan="2">Gambar</td>
    </tr>
        </tr>
  <tr>
    <td colspan="2"><input type="file" name="foto" accept="image/jpeg" /></td>
    </tr>
    </tr>
  <tr>
    <td colspan="2">Isi Berita</td>
    </tr>
    
  <tr>
    <td height="125" colspan="2"><textarea name="berita"><?php echo $dt_berita['isi_berita'];  ?></textarea></td>
    </tr>
  <tr>
    <td width="324"><div align="center">
    
    </div></td>
      <td><input type="submit" value="UPDATE" >
    <input type="reset" value="BATAL" onClick="location=('?page=berita')" ></td>
  </tr>
</table>


</form>