<script>
function bersih(){
$("#level").val("");	
}

</script>
<?php
$str=mysql_query("select * from level where id_level='$_GET[id_level]'");
$dt_level=mysql_fetch_array($str);
?>
<form method="post" action="proses_level.php?page=edit&id_level=<?php echo $_GET['id_level']; ?>">
<table width="700" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="2"><div align="center">EDIT DATA LEVEL PEMBELAJARAN</div></td>
    </tr>
  <tr>
    <td colspan="2">Level</td>
    </tr>
  <tr>
    <td colspan="2"><input type="text" name="level" id="level" value="<?php echo $dt_level['level']; ?>" required /></td>
    </tr>
  <tr>
    <td width="180"><input type="submit" value="update" /></td>
    <td width="492"><input type="reset" value="BATAL" onClick="location=('index.php?page=level')" ></td></td>
  </tr>
</table>


</form>