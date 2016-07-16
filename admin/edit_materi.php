<script>
function hapus(){
	$("#level").val("");
	$("#materi").val("");
}

</script>
<?php
$str1=mysql_query("select * from materi where sha1(id_materi)='$_GET[id]'");
$dt_materi=mysql_fetch_array($str1);
?>

<form method="post" action="proses_materi.php?page=edit&id=<?php echo $dt_materi[0]; ?>">
<table width="500" align="center" border="0" style="box-shadow:0px 0px 10px black" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="2"><div align="center">FORM DATA EDIT MATERI</div></td>
  </tr>
  <tr>
    <td width="131" height="45">Level Materi</td>
    <td width="341"><select name="level" id="level" required >
    	<option value="">.:: pilih level materi ::.</option>
        <?php
    	  $str=mysql_query("select * from level");
  		while($dt_level=mysql_fetch_array($str)){
			?>
	  	<option value='<?php echo $dt_level[0]; ?>' <?php echo ($dt_level[0]==$dt_materi['id_level'])?"selected":"";  ?>><?php echo $dt_level['level']; ?></option>
        
        <?php
 		 }
		?>
    </select></td>
  </tr>
  <tr>
    <td height="46">Materi</td>
    <td><input type="text" name="materi" id="materi" value="<?php echo $dt_materi['materi'];  ?>" required /></td>
  </tr>
  <tr>
    <td height="48"><input type="submit" value="Update" /></td>
    <td><input type="reset" value="BATAL" onClick="location=('?page=materi')" /> </td>
  </tr>
</table>
</form>