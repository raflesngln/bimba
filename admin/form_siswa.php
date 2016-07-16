<form method="post" action="proses_siswa.php?page=simpan" enctype="multipart/form-data">
	<table width="500" align="center" cellpadding="4" cellspacing="4" border="0">
    <tr>
    <td colspan="21" align="center"><h2>INPUT DATA SISWA BARU</h2></td>
  </tr>
  			<tr>
    		<td>Nama</td>
    		<td><input type="text" name="nama_siswa" required /></td>
  		</tr>
   		<tr>
    		<td>Tempat Lahir</td>
    		<td><input type="text" name="tmptlahir_siswa" required /></td>
  		</tr>
  		<tr>
    		<td>Tanggal Lahir</td>
    		<td>
    			Tanggal.<select name="tgl" required>
    			<option value=""></option>
    			<?php
				for($a=1;$a<=31;$a++){
				echo"<option value='$a'>$a</option>";	
				}
				?>
    
    			</select>
     Bulan.<select name="bln" required>
    <option value=""></option>
    <?php
	for($a=1;$a<=12;$a++){
		switch($a){
		case 1:$bulan='Januari';
		break;
		case 2:$bulan='Februari';
		break;
		case 3:$bulan='Maret';
		break;
		case 4:$bulan='April';
		break;
		case 5:$bulan='Mei';
		break;
		case 6:$bulan='Juni';
		break;
		case 7:$bulan='Juli';
		break;
		case 8:$bulan='Agustus';
		break;
		case 9:$bulan='September';
		break;	
		case 10:$bulan='Oktober';
		break;
		case 11:$bulan='November';
		break;
		case 12:$bulan='Desember';
		break;	
		}
		echo"<option value='$a'>$bulan</option>";	
	}
	?>
    </select>
    
    Tahun.<select name="thn" required>
    <option value=""></option>
    <?php
	$thn=date('Y')-10;
	for($a=$thn;$a<=date('Y');$a++){
		echo"<option value='$a'>$a</option>";	
	}
	?>
    </select>
    
    
    </td>
  </tr>
   <tr>
    <td>Jenis Kelamin</td>
    <td>
    <input type="radio" name="jns" required value="laki-laki">Laki - laki<br />
    <input type="radio" name="jns" required value="perempuan">Perempuan</td>
  </tr>
   <tr>
    <td>Agama</td>
    <td><select name="agama" required>
    <option value=""></option>
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Protestan">Protestan</option> 
    <option value="Budha">Budha</option>
    <option value="Hindu">Hindu</option>
    </select></td>
  </tr>
   <tr>
    <td>Alamat</td>
    <td><textarea name="alamat"></textarea></td>
  </tr>
  <tr>
    <td>Foto</td>
    <td>
      <input type="file" name="foto" id="foto"  accept="image/*" required></td>
  </tr>
  <tr>
    <td>Nama Ayah</td>
    <td><input type="text" name="nama_ayah" required /></td>
  </tr>
    <tr>
    <td>Agama Ayah</td>
    <td><select name="agama_ayah" required>
    <option value=""></option>
   <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Protestan">Protestan</option> 
    <option value="Budha">Budha</option>
    <option value="Hindu">Hindu</option>
    </select></td>
  </tr>
     <tr>
    <td>Kerja Ayah</td>
    <td><input type="text" name="kerja_ayah" required /></td>
  </tr>
  <tr>
  	<td>Nomer Ayah</td>
    <td><input type="number" min="0" name="hp_ayah" required /></td>
  </tr>
    <tr>
    <td>Nama ibu</td>
    <td><input type="text" name="nama_ibu" required /></td>
  </tr>
    <tr>
    <td>Agama ibu</td>
    <td><select name="agama_ibu" required>
    <option value=""></option>
 <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Protestan">Protestan</option> 
    <option value="Budha">Budha</option>
    <option value="Hindu">Hindu</option
    ></select></td>
  </tr>
     <tr>
    <td>Kerja ibu</td>
    <td><input type="text" name="kerja_ibu" required /></td>
  </tr>
  <tr>
  	<td>Nomer ibu</td>
    <td><input type="number" min="0" name="hp_ibu" required /></td>
  </tr>
    <tr>
  	<td>Level Siswa</td>
    <td>
    <select name="level" required>
    <option value=""></option>
    <?php
	$str=mysql_query("select * from level");
	while($dt_level=mysql_fetch_array($str)){
	echo"<option value='$dt_level[0]'>$dt_level[level]</option>";
	}
		
	?>
    </select>
    </td>
  </tr>
  <tr >
    <td>Status</td>
    <td>
      <select name="status"  >
      
      <option value="aktif">AKTIF</option>
     
      </select></td>
</tr>
  
    
  <tr>
<td><button type="submit"> Simpan </button></td>
<td><button type="reset" onClick="location=('index.php?page=siswa')"> Batal </button></td>
  </tr>
  <tr>
	<td height="263" colspan="7">&nbsp;</td>
 </tr>

</table>
</form>