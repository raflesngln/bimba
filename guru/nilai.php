<br />
<?php
$nip=$_SESSION['nip-guru'];
$str=mysql_query("select * from jadwal where nip='$nip'");
$dt_level=mysql_fetch_array($str);
$str2=mysql_query("select *,siswa.nm_siswa as nama from jadwal inner join siswa on jadwal.nis=siswa.nis  where jadwal.nip='$nip' and siswa.status='aktif' group by jadwal.nis");
?>
<form method="post" action="simpan_nilai.php">
<table width="466" align="center" style="box-shadow:0px 0px 5px black; border-radius:7px;" bgcolor="#AAAAAA" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td width="11">&nbsp;</td>
    <td width="418">Siswa</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><select name="nis" required>
    	<option value="">Pilih Siswa</option>
        <?php
		while($dt_jadwal=mysql_fetch_array($str2)){
			echo"<option value='$dt_jadwal[nis]'>$dt_jadwal[nama]</option>";
		}
		
		?>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nilai Tulis</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="number" min="0" max="100" name="tulis" required />&nbsp; 0-100</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nilai Baca</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><input type="number" min="0" max="100" name="baca" required />&nbsp; 0-100</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nilai Hitung</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><input type="number" min="0" max="100" name="hitung" required />&nbsp; 0-100</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>Catatan</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><textarea name="catatan" cols="60" rows="5" ></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" value="SIMPAN" ></td>
  </tr>
</table>
</form>