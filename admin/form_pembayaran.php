<script language="javascript" type="text/javascript">
    

function GetNama(){
	var nis=$("#nis").val();
	$.ajax({
		url:'get_nama_siswa.php?nis='+nis,
		success:function(data){
			$("#nama").html('Data Siswa');
			$("#data").html(data);
		}
	});
}
</script>
<br />
<br />
<form method="post" action="simpan_pembayaran.php">
<div id="coba"></div>
<table align="center" width="373" style="box-shadow:0px 0px 10px black" border="0" cellspacing="4" cellpadding="4">
  <tr>
    <td colspan="2"><div align="center">
      <h3>INPUT DATA PEMBAYARAN</h3>
    </div></td>
  </tr>
  <tr>
      <td width="91">Nis.</td>
    <td width="254"><select name="nis" id="nis" onChange="GetNama()">
    	<option value=""></option>
        <?php
		$str=mysql_query("select * from siswa");
		while($dt_siswa=mysql_fetch_array($str)){
			echo"<option value='$dt_siswa[0]'>$dt_siswa[0]</option>";	
		}
		?>
    </select></td>
  </tr>
  <tr>
    <td id="nama"></td>
    <td id="data"></td>
  </tr>
  <tr>
    <td>Tagihan</td>
    <td>Rp. 600.000</td>
  </tr>
  <tr>
    <td>Nominal Bayar</td>
    <td><input type="number" min="0" name="nom" /></td>
  </tr>
   <tr>
    <td><input type="submit" value="SIMPAN" /></td>
    <td><input type="reset" value="BATAL" onClick="location=('?page=pembayaran')" /></td>
  </tr>
</table>
</form>