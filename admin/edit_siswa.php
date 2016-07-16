<?php
$str=mysql_query("select * from siswa where nis='$_GET[nis]'");
$dt_siswa=mysql_fetch_array($str);

?>
<form method="post" action="proses_siswa.php?page=edit&nis=<?php echo $dt_siswa[0];  ?>" enctype="multipart/form-data">
	<table width="500" align="center" cellpadding="4" cellspacing="4" border="0">
  			<tr>
    		<td>Nama</td>
    		<td><input type="text" name="nama_siswa" value="<?php echo $dt_siswa['nm_siswa']; ?>" required /></td>
  		</tr>
   		<tr>
    		<td>Tempat Lahir</td>
    		<td><input type="text" name="tmptlahir_siswa" value="<?php echo $dt_siswa['tmptlahir_siswa']; ?>" required /></td>
  		</tr>
  		<tr>
    		<td>Tanggal Lahir</td>
    		<td>
    			Tanggal.<select name="tgl" required>
    			<option value=""></option>
    			<?php
				for($a=1;$a<=31;$a++){
					?>
				<option value='<?php echo $a; ?>' <?php echo(substr($dt_siswa['tgllahir_siswa'],9,2)==$a)?"selected='selected'":"";  ?>><?php echo $a; ?></option>";	
                
                <?php
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
		?>
		<option value='<?php echo $a; ?>' <?php echo(substr($dt_siswa['tgllahir_siswa'],5,2)==$a)?"selected='selected'":"";  ?>><?php echo $bulan; ?></option>";	
        <?php
	}
	?>
    </select>
    
    Tahun.<select name="thn" required>
    <option value=""></option>
    <?php
	$thn=date('Y')-10;
	for($a=$thn;$a<=date('Y');$a++){
		?>
		<option value='<?php echo $a; ?>' <?php echo(substr($dt_siswa['tgllahir_siswa'],0,4)==$a)?"selected='selected'":"";  ?>><?php echo $a; ?></option>";	
        <?php
	}
	?>
    </select>
    
    
    </td>
  </tr>
   <tr>
    <td>Jenis Kelamin</td>
    <td>
    <input type="radio" name="jns" required value="laki-laki" <?php echo($dt_siswa['jns_kel']=="laki-laki")?"checked='checked'":"";  ?> >Laki - laki<br />
    <input type="radio" name="jns" required value="perempuan" <?php echo($dt_siswa['jns_kel']=="perempuan")?"checked='checked'":"";  ?>>Perempuan</td>
  </tr>
   <tr>
    <td>Agama</td>
    <td><select name="agama" required>
    <option value=""></option>
    <option value="Islam" <?php echo($dt_siswa['agama']=="Islam")?"selected='selected'":"";  ?>>Islam</option>
    <option value="Kristen" <?php echo($dt_siswa['agama']=="Kristen")?"selected='selected'":"";  ?>>Kristen</option>
     <option value="Protestan" <?php echo($dt_siswa['agama']=="Protestan")?"selected='selected'":"";  ?>>Protestan</option>
    <option value="Budha" <?php echo($dt_siswa['agama']=="Budha")?"selected='selected'":"";  ?>>Budha</option>
    <option value="Hindu" <?php echo($dt_siswa['agama']=="Hindu")?"selected='selected'":"";  ?>>Hindu</option>
    </select></td>
  </tr>
   <tr>
    <td>Alamat</td>
    <td><textarea name="alamat_siswa"><?php echo $dt_siswa['alamat']; ?></textarea></td>
  </tr>
    <tr>
    <td>Foto</td>
    <td><img src="../gambar/siswa/<?php echo $dt_siswa['foto'];  ?>" width="100" height="120" /></td>
  </tr>
  <tr>
    <td>Foto</td>
    <td><label for="gambar"></label>
      <input type="file" name="foto" id="foto"  accept="image/jpeg" ></td>
  </tr>
  <tr>
    <td>Nama Ayah</td>
    <td><input type="text" name="nama_ayah" value="<?php echo $dt_siswa['nm_ayah']; ?>" required /></td>
  </tr>
    <tr>
    <td>Agama Ayah</td>
    <td><select name="agama_ayah" required>
    <option value=""></option>
    <option value="Islam" <?php echo($dt_siswa['agama_ayah']=="Islam")?"selected='selected'":"";  ?>>Islam</option>
    <option value="Kristen" <?php echo($dt_siswa['agama_ayah']=="Kristen")?"selected='selected'":"";  ?>>Kristen</option>
     <option value="Protestan" <?php echo($dt_siswa['agama_ayah']=="Protestan")?"selected='selected'":"";  ?>>Protestan</option>
    <option value="Budha" <?php echo($dt_siswa['agama_ayah']=="Budha")?"selected='selected'":"";  ?>>Budha</option>
    <option value="Hindu" <?php echo($dt_siswa['agama_ayah']=="Hindu")?"selected='selected'":"";  ?>>Hindu</option>
    </select></td>
  </tr>
     <tr>
    <td>Kerja Ayah</td>
    <td><input type="text" name="kerja_ayah" value="<?php echo $dt_siswa['krj_ayah']; ?>" required /></td>
  </tr>
  <tr>
  	<td>Nomer Ayah</td>
    <td><input type="number" min="0" name="hp_ayah" value="<?php echo $dt_siswa['no_ayah']; ?>" required /></td>
  </tr>
    <tr>
    <td>Nama ibu</td>
    <td><input type="text" name="nama_ibu" value="<?php echo $dt_siswa['nm_ibu']; ?>" required /></td>
  </tr>
    <tr>
    <td>Agama ibu</td>
    <td><select name="agama_ibu" required>
    <option value=""></option>
   <option value="Islam" <?php echo($dt_siswa['agama_ibu']=="Islam")?"selected='selected'":"";  ?>>Islam</option>
    <option value="Kristen" <?php echo($dt_siswa['agama_ibu']=="Kristen")?"selected='selected'":"";  ?>>Kristen</option>
     <option value="Protestan" <?php echo($dt_siswa['agama_ibu']=="Protestan")?"selected='selected'":"";  ?>>Protestan</option>
    <option value="Budha" <?php echo($dt_siswa['agama_ibu']=="Budha")?"selected='selected'":"";  ?>>Budha</option>
    <option value="Hindu" <?php echo($dt_siswa['agama_ibu']=="Hindu")?"selected='selected'":"";  ?>>Hindu</option>
    </select></td>
  </tr>
     <tr>
    <td>Kerja ibu</td>
    <td><input type="text" name="kerja_ibu" value="<?php echo $dt_siswa['krj_ibu']; ?>" required /></td>
  </tr>
  <tr>
  	<td>Nomer ibu</td>
    <td><input type="number" min="0" name="hp_ibu" value="<?php echo $dt_siswa['no_ibu']; ?>" required /></td>
  </tr>
    <tr>
  	<td>Level Siswa</td>
    <td>
    <select name="level" required>
    <option value=""></option>
    <?php
	$str=mysql_query("select * from level");
	while($dt_level=mysql_fetch_array($str)){
		?>
	<option value='<?php echo $dt_level[0]; ?>' <?php echo($dt_siswa['id_level']==$dt_level[0])?"selected='selected'":"";   ?>><?php echo $dt_level['level']; ?></option>";
    <?php
	}
		
	?>
    </select>
    </td>
  </tr>
    <tr>
    <td>Status</td>
    <td>
      <select name="status">
      <option value="">Pilih Status</option>
      <option value="lulus">LULUS</option>
      <option value="aktif">AKTIF</option>
      <option value="non aktif">NON AKTIF</option>
      </select></td>
</tr>
    <td><input type="submit" value="UPDATE" ></td>
    <td><input type="reset" value="BATAL" onClick="location=('index.php?page=siswa')" ></td>
  </tr>
  <tr>
	<td height="263" colspan="7">&nbsp;</td>
 </tr>

</table>
</form>