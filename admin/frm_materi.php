<form method="post" action="proses_materi.php?page=simpan">
<table width="500" align="center" border="0" style="box-shadow:0px 0px 10px black" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="2"><div align="center">FORM DATA INPUT MATERI</div></td>
  </tr>
  <tr>
    <td width="131" height="30">Level Materi</td>
    <td width="341"><select name="level" required >
    	<option value="">.:: pilih level materi ::.</option>
        <?php
    	  $str=mysql_query("select * from level");
  		while($dt_level=mysql_fetch_array($str)){
	  	echo"<option value='$dt_level[0]'>$dt_level[level]</option>";
 		 }
		?>
    </select></td>
  </tr>
  <tr>
    <td height="30">Nama Materi</td>
    <td><input type="text" name="materi" required /></td>
  </tr>
  <tr>
    <td height="48"><input type="submit" value="SIMPAN" /></td>
    <td><input type="reset" value="BATAL" onClick="location=('?page=materi')" ></td>
  </tr>
</table>
</form>