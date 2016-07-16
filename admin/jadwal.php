<script language="javascript">
	function GetMateri(){
		var level=$("#nis").val();
		$.ajax({
			url:'getmateri.php?id='+level,
			success:function(data){
				$("#mat").html(data);	
			}
		})
	}
</script>
<form method="post" action="proses_jadwal.php?page=simpan">
<table width="535" align="center" style="box-shadow:0px 0px 10px black; border-radius:9px" bgcolor="#FFFFFF"border="0" cellspacing="4" cellpadding="4">
<tr>
    <td colspan="2"><div align="center">INPUT JADWAL BARU</div></td>
  </tr>
  <tr>
    <td width="90">Guru</td>
   
    <td width="417" ><select name="nip" required>
    <option value="">Pilih Guru</option>
      <?php
    	$str=mysql_query("select * from guru");
		while($dt_guru=mysql_fetch_array($str)){
			echo"<option value='$dt_guru[0]'>$dt_guru[nm_guru]</option>";
		}
		?>
    </select></td>
  </tr>
      <tr>
     <td>Siswa</td>
    <td><select name="nis" id="nis" onchange="GetMateri()" required="required">
      <option value="">Pilih Siswa</option>
      <?php
    	$str=mysql_query("select * from siswa where status='aktif'");
		while($dt_siswa=mysql_fetch_array($str)){
			echo"<option value='$dt_siswa[0]'>$dt_siswa[nm_siswa]</option>";
		}
		?>
    </select></td>
    <tr>
   <td>Materi</td>
    <td><select name="materi" id="mat" required="required">
      <option value="">Pilih Materi</option>
    </select></td>
  </tr>
      <tr>
        <td>Hari</td>
        <td><select name="hari" required="required" >
          <option value=""></option>
          <option value="senin">SENIN</option>
          <option value="selasa">SELASA</option>
          <option value="rabu">RABU</option>
          <option value="kamis">KAMIS</option>
          <option value="jumat">JUMAT</option>
          <option value="sabtu">SABTU</option>
        </select></td>
    </tr>
  <tr>
    <td>Jam Mulai</td>
   <td><input type="time" name="jam1" required="required" /></td>
  </tr>
    <tr>
      <td>Jam Selesai</td>
     <td><input type="time" name="jam2" required="required" /></td>
  </tr>
  <tr>
   <td></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
     <td></td>
    <td align="center"><input type="submit" value="SIMPAN"  />  <input type="reset" value="BATAL" onClick="location=('?page=jadwal')" ></td>
  </tr>

</table>
</form>