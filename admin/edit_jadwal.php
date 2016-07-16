<?php
$str=mysql_query("select *,guru.nm_guru as nama,materi.materi as materi,level.level as level from jadwal
  					inner join guru on jadwal.nip=guru.nip
					inner join materi on jadwal.id_materi=materi.id_materi
					inner join level on jadwal.id_level=level.id_level
					where id_jadwal='$_GET[id]'");
$dt_jadwal=mysql_fetch_array($str);

?>
<form method="post" action="proses_jadwal.php?page=edit&id=<?php echo $dt_jadwal[0];  ?>">
<table width="470" align="center" style="box-shadow:0px 0px 10px black; border-radius:7px" bgcolor="#FFFFFF" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td width=89>Guru</td>
     <td width=10>:</td>
    <td width="279"><?php echo $dt_jadwal['nama'];   ?></td>
  </tr>
  <tr>
   <td>Level</td>
   <td width=10>:</td>
    <td><?php echo $dt_jadwal['level'];   ?></td>
  </tr>
  <tr>
   <td>Materi</td>
   <td width=10>:</td>
    <td><?php echo $dt_jadwal['materi'];   ?></td>
  </tr>
  <tr>
   <td>Hari</td>
   <td width=10>:</td>
    <td><select name="hari" required="required" >
      <option value=""></option>
      <option value="senin" <?php echo ($dt_jadwal['hari']=="senin")?"selected='selected'":"";   ?>>SENIN</option>
      <option value="selasa" <?php echo ($dt_jadwal['hari']=="selasa")?"selected='selected'":"";   ?>>SELASA</option>
      <option value="rabu" <?php echo ($dt_jadwal['hari']=="rabu")?"selected='selected'":"";   ?>>RABU</option>
      <option value="kamis" <?php echo ($dt_jadwal['hari']=="kamis")?"selected='selected'":"";   ?>>KAMIS</option>
      <option value="jumat" <?php echo ($dt_jadwal['hari']=="jumat")?"selected='selected'":"";   ?>>JUMAT</option>
      <option value="sabtu" <?php echo ($dt_jadwal['hari']=="sabtu")?"selected='selected'":"";   ?>>SABTU</option>
    </select></td>
  </tr>
  <tr>
    <td>Jam Mulai</td>
    <td width=10>:</td>
   <td><input type="time" name="jam1" value="<?php echo substr($dt_jadwal['jam'],0,5);   ?>" required="required" /></td>
  </tr>
  <tr>
    <td>Jam Selesai</td>
    <td width=10>:</td>
    <td><input type="time" name="jam2"  value="<?php echo substr($dt_jadwal['jam'],6,5);   ?>" required="required" /></td>
  </tr>
    <tr>
      <td></td>
      <td colspan="2"><input type="submit" value="UPDATE"  /> <input type="reset" value="BATAL" onClick="location=('?page=jadwal')" ></td>
    </tr>
 
 
</table>
</form>