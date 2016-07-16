
<form method="post" action="proses_berita.php?page=simpan" enctype="multipart/form-data" >
<table width="542" align="center" style="box-shadow:0px 0px 10px black; border-radius:8px;" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="2"><div align="center"><h2>INPUT BERITA</h2></div></td>
    </tr>
  <tr>
    <td colspan="2">Judul Berita</td>
    </tr>
  <tr>
    <td colspan="2"><input type="text" name="judul" required="required" /></td>
        </tr>
  <tr>
    <td colspan="2">Gambar</td>
    </tr>
        </tr>
  <tr>
    <td colspan="2"><input type="file" name="foto" required="required" accept="image/jpeg" /></td>
    </tr>
    </tr>
  <tr>
    <td colspan="2">Isi Berita</td>
    </tr>
    
  <tr>
    <td height="125" colspan="2"><textarea name="berita"></textarea></td>
    </tr>
  <tr>
    <td width="324"><div align="center">
    
    </div></td>
    <td width="190"><input type="submit" value="SIMPAN" >                <input type="reset" value="BATAL" onClick="location=('index.php?page=berita')" > </td>
  </tr>
</table>


</form>