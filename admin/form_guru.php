<form method="post" action="proses_guru.php?page=simpan" enctype="multipart/form-data">
<body bgcolor="#FFFFFF">
<table width="500" align="center" cellpadding="4" cellspacing="4" border="0">
  <tr>
    <td colspan="21" align="center"><h2>INPUT DATA GURU BARU</h2></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td><input type="text" name="nama_guru" required /></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td><textarea name="alamat_guru" cols="50" rows="5" required></textarea></td>
  </tr>
  <tr>
    <td>Tempat Lahir</td>
    <td><input type="text" name="tmptlahir_guru" required /></td>
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
	$thn=date('Y')-50;
	$thn2=date('Y')-20;
	for($a=$thn;$a<=$thn2;$a++){
		echo"<option value='$a'>$a</option>";	
	}
	?>
    </select>
    
    
    </td>
  </tr>
  <tr>
    <td>Foto</td>
    <td><label for="gambar"></label>
      <input type="file" name="foto" id="foto"  accept="image/jpeg"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="email" name="email_guru" required /></td>
  </tr>
 
  <tr>
  	<td>No. Telepon</td>
    <td><input type="number" min="0" name="hp" required /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" required /></td>
  </tr>
  
    
  <tr>
    <td><input type="submit" value="SIMPAN" ></td>
    <td><input type="reset" value="BATAL" onClick="location=('index.php?page=guru')" /></td>
  </tr>
  <tr>
	<td height="263" colspan="7">&nbsp;</td>
 </tr>

</table>
</body>
</form>