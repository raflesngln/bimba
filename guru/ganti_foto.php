<br>
<br>
<form method="post" action="proses_foto.php" enctype="multipart/form-data">
<table width="300" align="center" style="box-shadow:0px 0px 10px black; border-radius:8px" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td align="center"><img src="../gambar/guru/<?php echo $_SESSION['foto_guru'];  ?>" width="200" height="250" /></td>
  </tr>
  <tr>
    <td align="center"><input type="file" name="foto" accept="image/jpeg" required ></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" value="Ganti"></td>
  </tr>
</table>
</form>